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
				
				// truncate description to minimalize output
				$product_data['brief_description'] = brief_desc($product_data['description']);

				$data = array(	
					'product' => $product_data,
					'main_address' => $main_address,

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
		
		if ($this->form_validation->run() === false) {
			# if post not valid
			$message = array(
				'type' => 'danger',
				'message' => '<h3>Terjadi kesalahan : </h3>'.validation_errors('<p class="error">', '</p>'),
			);
		} else {
			# if post valid, create order
			$gross_amount = $this->products_model->getPriceByProductId($this->input->post('product_id'));
			$order_code = generate_code('OR');

			$data_ins = array(
				'user_id' => $this->user_id,
				'order_code' => $order_code,
				'product_id' => $this->input->post('product_id'),
				'address_id' => $this->input->post('address_id'),
				'order_status_id' => '1',
				'gross_amount' => $gross_amount,
			);

			$insert = $this->orders_model->createOrder($data_ins);
			if($insert){
                $message = array(
					'type' => 'success',
					'message' => 'Order Dibuat',
				);
				$this->session->set_flashdata('alert', $message);
				// redirect('order/'.$insert);

				// create midtrans transaction/request midtrans token
				$order_id = $insert;
				$this->requestMidtransTransaction($order_id);

            } else {
                // if failed to insert
                $message = array(
                    'type' => 'danger',
                    'message' => 'gagal menyimpan data'
                  );
            }

			$this->session->set_flashdata('alert',$message);
			redirect($_SERVER['HTTP_REFERER']);
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
		// $order_data->product_brief_description = brief_desc($order_data->product_description);

		if ($order_data) {
			//modify display status
			if (isset($payment_data) && $payment_data->payment_status == 'pending') {
				$order_data->status_string =  $payment_data->payment_status = 'menunggu pembayaran';
				$order_data->btn_pay = '
					<a href="" class="btn btn-primary btn-sm mb-3">Refresh Status Pembayaran</a>
					<a href="https://app.sandbox.midtrans.com/snap/v3/redirection" class="btn btn-primary btn-sm">Cara Bayar</a>
				';
			} else {
				$order_data->status_string = $order->order_status;
				$order_data->btn_pay = '<a href="'.base_url('order/req-pay/'.$order_id).'" class="btn btn-primary btn-sm">Bayar Sekarang</a>';
			}

			$site  = $this->mConfig->list_config();
			$data = array(	
				'order' => $order_data,
				'payment' => $payment_data,
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
	 * 
	 */
	public function requestMidtransTransaction($order_id)
	{
		# code...
		if (!$order_id) {
			show_404();
		}
		$params = $this->getMidtransParams($order_id);
				
		$redirect_url = $this->midtrans->getRedirectUrl($params);

		if ($redirect_url && $redirect_url['status']=='success') {
			// redirect($redirect_url,'refresh');
			header("Location:".$redirect_url['data']);
			exit;
		} else {
			# if midtrans returning 400 (id sudah digunakan), redirect to notification handlerd
			if ($redirect_url['HTTP_status_code'] == '400') {
				redirect('transaction/payment/MidtransStatusHandler/?order_id='.$params['transaction_details']['order_id']);
			}
		}
	}

	/**
	 * generate parameter for creating midtrans transaction
	 */
	private function getMidtransParams($order_id)
	{
		$this->load->library('midtrans');

		$order_data = $this->orders_model->getOrderById($order_id);
		$transaction_details = array(
			'order_id' => $order_data->order_code,
			'gross_amount' => $order_data->gross_amount,
		);

		// Optional
		$item1_details = array(
			'id' => $order_data->product_id,
			'price' => $order_data->gross_amount,
			'quantity' => 1,
			'name' => $order_data->product_name,
		);
		$item_details = array ($item1_details);
		// // Optional
		// $billing_address = array(
		// 	'first_name'    => "Andri",
		// 	'address'       => "Mangga 20",
		// 	'city'          => "Jakarta",
		// 	'postal_code'   => "16602",
		// 	'phone'         => "081122334455",
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
		
		$redirect_finish_callback = "http://testweb.local/akzncms/transaction/payment/MidtransStatusHandler/?order_id=".$order_data->order_code;
		$params = array(
			'transaction_details' => $transaction_details,
			// 'customer_details' => $customer_details,
			'item_details' => $item_details,
			"callbacks" => array(
				"finish" => $redirect_finish_callback,
			),
		);

		return $params;
	}
}