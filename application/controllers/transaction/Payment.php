<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

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

    /**
     * for now, 
     * Handle Midtrans redirect and notification 
     */
    public function MidtransStatusHandler()
    {
        $this->load->library('midtrans');

        # if order_id param present on url
        if (isset($_GET['order_id'])) {
            $order_code = $this->input->get('order_id',true);
            $order_id = $this->orders_model->getOrderByCode($order_code);
            $order_data = $this->orders_model->getOrderById($order_id);
            # get transaction status from midtrans
            $transaction_status = $this->midtrans->getTransactionStatus($order_code);
    
            # if midtrans transaction status found
            if ($transaction_status['status'] == 'success') {
                # check midtrans signature key
                $signature_check = $this->checkMidtransSignature();
                if ($signature_check) {
                    # check if db has payment data with midtrans transaction id and $order_id. If not, create new
                    $data_check = array(
                        'order_id' => $order_id,
                        'transaction_id' => $transaction_status['data']->transaction_id,
                    );
                    $check_payment_exist = $this->payments_model->checkPaymentExist($data_check);
                    $check_paymentDetail_exist = $this->payments_model->checkPaymentDetailExist($data_check);

                    if (!$check_payment_exist) {
                        # insert new data if no payment record
                        $payment_data = array(
                            'order_id' => $order_id,
                            'gross_amount' => $order_data->gross_amount,
                            'payment_type' => '1',
                            'status_id' => '1',
                        );

                        $ins_payment = $this->payments_model->add($payment_data);
                        $payment_id = $ins_payment;

                    } else {
                        $payment_id = $check_payment_exist->id;
                    }

                    if (!$check_paymentDetail_exist) {
                        # insert payment_detail (midtrans transaction) if no record
                        $paymentDetail_data = array(
                            'payment_id' => $payment_id,
                            'amount' => $transaction_status['data']->gross_amount,
                            'payment_gateway_transaction_id' => $transaction_status['data']->transaction_id,
                            'payment_gateway_transaction_status' => $transaction_status['data']->transaction_status,
                        );

                        $ins_detail = $this->payments_model->addPaymentDetail($paymentDetail_data);
                    } else {
                        # if payment detail found, update midtrans transaction status
                        $this->changeStatusHandler($transaction_status['data']);
                    }

                    redirect('order/'.$order_id.'?state=pgw_success');

                } else {
                    # if check signature failed
                    redirect('order/'.$order_id.'?state=pgw_signature_failed');
                }
                
            } else {
                # if failed to get transaction status
                // show_404();
                redirect('order/'.$order_id.'?state=pgw_failed');
            }
        }

    }

    /**
     * check validity of midtrans notification
     * for now it always return true
     * todo : check validity
     * https://docs.midtrans.com/docs/https-notification-webhooks#verifying-signature-key
     */
    private function checkMidtransSignature()
    {
        return true;
    }

    /**
     * Handle midtrans status change
     * write to payment_detail on midtrans status change
     */
    public function changeStatusHandler($transaction_data)
    {   
        $order_id = $transaction_data->order_id;
        $transaction_status = $transaction_data->transaction_status;
        $transaction_id = $transaction_data->transaction_id;
        $fraud = $transaction_data->fraud_status;
        $type = $transaction_data->payment_type;

        if ($transaction_status == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    // echo "Transaction order_id: " . $order_id ." is challenged by FDS";

                    $status_data = array(
                        'payment_gateway_transaction_status' => 'challange', 
                    );
                } else if ($fraud == 'accept'){
                    // set payment status in merchant's database to 'Success'
                    // echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
                    
                    // set payment detail status
                    $status_data = array(
                        'payment_gateway_transaction_status' => 'success', 
                    );
                }
            }
        } else if ($transaction_status == 'settlement') {
            // TODO set payment status in merchant's database to 'success'
            $status_data = array(
                'payment_gateway_transaction_status' => 'success', 
            );
        } else if ($transaction_status == 'pending') {
            // TODO set payment status in merchant's database to 'pending'
            $status_data = array(
                'payment_gateway_transaction_status' => 'pending', 
            );
        } else if ($transaction_status == 'deny') {
            // TODO set payment status in merchant's database to 'failure'
            $status_data = array(
                'payment_gateway_transaction_status' => 'failure', 
            );
        } else if ($transaction_status == 'expire') {
            // TODO set payment status in merchant's database to 'failure'
            $status_data = array(
                'payment_gateway_transaction_status' => 'failure', 
            );
        } else if ($transaction_status == 'cancel') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'failure'
                $status_data = array(
                    'payment_gateway_transaction_status' => 'failure', 
                );
            }
            else if ($fraud == 'accept') {
            // TODO Set payment status in merchant's database to 'failure'
                $status_data = array(
                    'payment_gateway_transaction_status' => 'failure', 
                );
            }
        }

        $change_status = $this->payments_model->updateStatus($data,$transaction_id);

        return $change_status;

    }
}