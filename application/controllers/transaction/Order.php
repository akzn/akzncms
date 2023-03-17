<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->library('ion_auth');

		if (!($this->ion_auth->logged_in())) {
            redirect('login');
            die();
        }

        $this->user_id = $this->ion_auth->user()->row()->id;
		$this->load->model('products_model');
		$this->load->model('customer/address_model');
		$this->load->model('customer/orders_model');
		$this->load->model('transaction/payments_model');

	}

	// function _remap($method, $params=array())
    // {
    //     $methodToCall = method_exists($this, $method) ? $method : 'index';
    //     return call_user_func_array(array($this, $methodToCall), $params);
    // }

	public function purchase($page = 0)
	{	
		$pagination_uri = 'customer/purchase/';
		$page = $this->uri->segment(3);
		$page_segment = 3;
		$num_rows = 5;

		// $data['products'] = $this->shop_model->getProducts($this->num_rows, $page, $_GET);
		$order_list = $this->orders_model->getAllByUserId($this->user_id, $num_rows, $page);
        $rowscount = $this->orders_model->productsCountByUserId($this->user_id);
        
        $links_pagination = pagination( $pagination_uri, $rowscount, $num_rows, $page_segment);

		

		$site  = $this->mConfig->list_config();

		$data = array(	
			'order_list' => $order_list,
			'links_pagination' => $links_pagination,

			'title' => 'Purchase - '.$site['nameweb'],
			'meta_desc' => $pages['metatext'],
			'site' 	=> $site,
						'isi'		=> 'theme/'.$this->config->item('theme').'/customer/order/order_list',
					);
		$this->load->view('theme/'.$this->config->item('theme').'/layout/wrapper',$data);
	}

	/** 
	* View
	* Checkout  
	*/
	public function checkout($product_id=null)
	{
		if (!($product_id) || $product_id=='') {
			// show 404 if no product url
			show_404();
		} else {
			// check and get product data
			$product_data = $this->products_model->getOneProduct($product_id);
			$main_address = $this->address_model->getMainAddress($this->user_id);

			
			if ($product_data) {
				// if product found

				$site  = $this->mConfig->list_config();
				
				// get list tenor calculation
				$data_calc = array(
					'price' => $product_data['price'],
					'down_payment' => $product_data['down_payment'],
					'interest' => $site['interest_rate'],
				);
				
				$tenor_list = temp_tenor_list();
				$tenors = [];
				foreach ($tenor_list as $value) {
					$data_calc['tenor'] = $value['months'];
					$montly_payment = calc_monthly_payment($data_calc);
					$tenors[] = array(
						'tenor_month' => $value['months'],
						'tenor_year' => $value['years'],
						'monthly' => $montly_payment,
					);
				}
				
				// truncate description to minimalize output
				$product_data['brief_description'] = brief_desc($product_data['description']);

				$data = array(	
					'product' => $product_data,
					'main_address' => $main_address,
					'tenors' => $tenors,

					'title' => 'Checkout - '.$site['nameweb'],
					'meta_desc' => $pages['metatext'],
					'site' 	=> $site,
								'isi'		=> 'theme/'.$this->config->item('theme').'/transaction/checkout',
							);
				$this->load->view('theme/'.$this->config->item('theme').'/layout/wrapper',$data);
			} else {
				// if no product found
				show_404();
			}
		}

	}


	/**
	* action 
	* function to create the order 
	*/
	public function create_order_action(){
		// FORM VALIDATION
		$this->load->library('form_validation');
		$this->form_validation->set_rules('product_id', 'produk','trim|required');
		$this->form_validation->set_rules('address_id', 'property','trim|required');
		$this->form_validation->set_rules('paymentType', 'Jenis Pembayaran','trim|required');
		if(null !== $this->input->post('paymentType') && $this->input->post('paymentType') == '2'){
			$this->form_validation->set_rules('tenor', 'Tenor','trim|required');
		}

		if ($this->form_validation->run() === false) {
			# if post not valid
			$message = array(
				'type' => 'danger',
				'message' => '<h3>Terjadi kesalahan : </h3>'.validation_errors('<p class="error">', '</p>'),
			);
			$this->session->set_flashdata('alert',$message);
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			# if post valid, create order and insert payment
			$data_product = (object)$this->products_model->getOneProduct($this->input->post('product_id'));
			$gross_amount = $data_product->price;
			$down_payment = $data_product->down_payment;
			
			$order_code = generate_code('OR');

			$data_ins['order'] = array(
				'user_id' => $this->user_id,
				'order_code' => $order_code,
				'product_id' => $this->input->post('product_id'),
				'address_id' => $this->input->post('address_id'),
				'order_status_id' => '1',
				'gross_amount' => $gross_amount,
			);

			$data_ins['payment'] = array(
				// 'order_id' => $order_id,
				'gross_amount' => $gross_amount,
				'payment_type' => $this->input->post('paymentType'),
			);

			$data_ins['payment_detail'] = array(
				'amount' => $gross_amount,
			);

			if (null !== $this->input->post('paymentType') && $this->input->post('paymentType') == '2') {
				# add more data if payment type  is installment
				$data_ins['payment']['interest_rate'] = $this->mConfig->list_config()['interest_rate'];
				$data_ins['payment']['tenor'] = $this->input->post('tenor');

				$data_ins['payment_detail']['payment_type'] = '2';
				$data_ins['payment_detail']['amount'] = $down_payment;

				$tomorrow = new DateTime('tomorrow');
				$data_ins['payment_detail']['due_date'] = $tomorrow->format('Y-m-d');
			}

			if ($data_ins['payment_detail']['amount'] < 0.01) {
				# for now not supported 0 DP
				$message = array(
                    'type' => 'danger',
                    'message' => 'Sistem belum support DP 0 Rupiah'
                  );
				
				$this->session->set_flashdata('alert',$message);
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$insert = $this->orders_model->createOrder($data_ins);
			
				if($insert){				
					// create midtrans transaction/request midtrans token
					$this->requestMidtransTransaction($insert);

				} else {
					// if failed to insert
					$message = array(
						'type' => 'danger',
						'message' => 'gagal menyimpan data'
					);
					
					$this->session->set_flashdata('alert',$message);
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
			
		}

	}

	/** 
	 * view 
	 * invoice
	 * can select payment gateway if payment pending
	 * 
	*/
	public function detail($order_id)
	{
		$order_data = $this->orders_model->getOrderById($order_id);
		$payment_data = $this->payments_model->getPaymentByOrderId($order_id);

		# get active payment
		$payment_detail = $this->payments_model->getActivePaymentByOrderID($order_id);
		# get all success pgw payment 
		$payment_detail_list = $this->payments_model->getSuccessPaymentByOrderID($order_id);

		if ($order_data) {
			# modify display 
			if (isset($payment_detail) && $payment_detail->payment_gateway_transaction_status == 'pending') {
				$order_data->status_string =  $payment_detail->payment_gateway_transaction_status;
				$order_data->btn_pay = '
					<a href="'.base_url('transaction/payment/MidtransStatusHandler/?order_id='.$payment_detail->transaction_id.'&type=finish').'" class="btn btn-primary btn-sm mb-3">Refresh Status Pembayaran</a>
					<!-- <a href="https://app.sandbox.midtrans.com/snap/v3/redirection/'. $payment_detail->payment_gateway_transaction_id.'" class="btn btn-primary btn-sm mb-3">Cara Bayar</a> -->
				';

			} else if($payment_detail->payment_gateway_transaction_status == 'expire' || $payment_detail->payment_gateway_transaction_status == 'failure'){
				$order_data->status_string =  $payment_detail->payment_gateway_transaction_status;
				// $order_data->btn_pay = '<a href="'.base_url('order/req-pay/'.$order_id).'" class="btn btn-primary btn-sm">Ulangi Pembayaran</a>';
				$order_data->btn_pay = '<div class="alert alert-primary">
					payment on expire/failure transaction are under construction
					<br><a href="'.base_url('transaction/payment/create_new_invoice/').$payment_detail->payment_detail_id.'">Request New Invoice</a>
					</div>';
			} else {
				$order_data->status_string = $order->order_status;
				$order_data->btn_pay = '<a href="'.base_url('order/req-pay/'.$payment_detail->payment_detail_id).'" class="btn btn-primary btn-sm">Bayar Sekarang</a>';
			}
			# END modify display

			# calcualte monthly payment for future tenor display if payment are instalment
			if ($payment_data->payment_type=='2') {
				$data_calc = array(
					'price' => $order_data->price,
					'down_payment' => $order_data->down_payment,
					'interest' => $payment_data->interest_rate,
					'tenor' => $payment_data->tenor
				);
				$order_data->monthly_payment = calc_monthly_payment($data_calc);
			}

			$site  = $this->mConfig->list_config();
			$data = array(	
				'order' => $order_data,
				'payment' => $payment_data,
				'payment_detail' => $payment_detail,
				'payment_list' => $payment_detail_list,
				'order_status_string' => $order_status_string,

				'title' => 'Order - '.$site['nameweb'],
				'meta_desc' => $pages['metatext'],
				'site' 	=> $site,
							'isi'		=> 'theme/'.$this->config->item('theme').'/transaction/order',
						);
			$this->load->view('theme/'.$this->config->item('theme').'/layout/wrapper',$data);
		}
	}

	/**
	 * request new midtrans transaction by payment detail id
	 * make new 
	 */
	public function requestNewPayment($payment_detail_id)
	{	
		// $order_data = $this->payments_model->getDetailByPaymentDetailId($payment_detail_id);
		$data = array(
			// 'order_id' => $order_data->order_id,
			// 'payment_id' => $order_data->payment_id,
			'payment_detail_id' => $payment_detail_id,
		);

		$this->requestMidtransTransaction($data);
	}

	/**
	 * 
	 */
	private function requestMidtransTransaction($data_id)
	{
		# code...
		if (!$data_id) {
			show_404();
		}

		// $order_id = $data_id['order_id'];
		// $payment_id = $data_id['payment_id'];
		$payment_detail_id = $data_id['payment_detail_id'];

		$params = $this->getMidtransParams($payment_detail_id);
				
		$redirect_url = $this->midtrans->getRedirectUrl($params);

		if ($redirect_url && $redirect_url['status']=='success') {
			// redirect($redirect_url,'refresh');
			header("Location:".$redirect_url['data']);
			exit;
		} else {
			# if midtrans returning 400 (id sudah digunakan), redirect to notification handler
			if ($redirect_url['HTTP_status_code'] == '400') {
				redirect('transaction/payment/MidtransStatusHandler/?order_id='.$params['transaction_details']['order_id']."&type=finish"); // order id here are payment_detail.transaction_id that used as order id to request midtrans transaction
			} else {
				var_dump($redirect_url);
			}
		}
	}

	/**
	 * generate parameter for creating midtrans transaction
	 */
	private function getMidtransParams($payment_detail_id)
	{
		$this->load->library('midtrans');

		$order_data = $this->payments_model->getDetailByPaymentDetailId($payment_detail_id);
		$transaction_details = array(
			'order_id' => $order_data->transaction_id, //transaction_detail.transaction_id
			'gross_amount' => $order_data->amount, //transaction_detail.amount
		);

		// create name for transaction description
		// because objects for payment are installment, not product
		// TODO : payment_detail.payment_type desc
		switch ($order_data->payment_detail_type) {
			case '1':
				# code...
				$product_name = $order_data->product_name;
				break;
			case '2':
				# code...
				$product_name = 'Down Payment for '.$order_data->product_name;
				break;
			case '3':
				# code...
				$product_name = 'Installment for '.$order_data->product_name;
				break;
			default:
				# code...
				$product_name = $order_data->product_name;
				break;
		}
		
		// Optional
		$item1_details = array(
			'id' => $order_data->product_id,
			'price' => $order_data->amount, //transaction_detail.amount
			'quantity' => 1,
			'name' => $product_name,
		);
		$item_details = array ($item1_details);
		// // Optional
		// $billing_address = array(
		// 	'first_name'    => "Andri",
		// 	'address'       => "Mangga 20",
		// 	'city'          => "Jakarta",
		// 	'postal_code'   => "16602",
		// 	'phone'         => "0811223344v55",
		// 	'country_code'  => 'IDN'
		// );

		// // Optional
		// $customer_details = array(
		// 	'first_name'    => "Andri",
		// 	'last_name'     => "Litani",
		// 	'email'         => "andri@litani.com",
		// 	'phone'         => "081122334455",
		// 	'billing_address'  => $billing_address,
		// );
		
		$redirect_finish_callback = base_url()."transaction/payment/MidtransStatusHandler/?order_id=".$order_data->transaction_id.'&type=finish';
		$params = array(
			'transaction_details' => $transaction_details,
			// 'customer_details' => $customer_details,
			// 'item_details' => $item_details,
			"callbacks" => array(
				"finish" => $redirect_finish_callback,
			),
			"enabled_payments" => [
				'bank_transfer',
				'indomaret',
				'alfamart'
			],
		);

		return $params;
	}
}