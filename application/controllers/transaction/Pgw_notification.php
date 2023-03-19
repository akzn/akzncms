<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pgw_notification extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('products_model');
		$this->load->model('Customer/Address_model', 'address_model');
		$this->load->model('Customer/Orders_model','orders_model');
		$this->load->model('Transaction/Payments_model', 'payments_model');

	}

    /**
     * Handle Midtrans redirect and notification 
     */
    public function MidtransStatusHandler()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            http_response_code(404);
            echo 'Restricted Access';
            exit;
        }
        $this->load->library('midtrans');

        $redir_type = $_GET['type'];

         # if order_id param present on url
         if (null !== $this->input->post('order_id')) {
            $payment_detail_transaction_id = $this->input->post('order_id',true);
            
            $is_paymentDetail_exist = $this->payments_model->checkPaymentDetailExist($payment_detail_transaction_id);
            if ($is_paymentDetail_exist) {
                # get transaction status from midtrans
                $transaction_status = $this->midtrans->getTransactionStatus($payment_detail_transaction_id);
                
                # if midtrans transaction status found
                if ($transaction_status['status'] == 'success') {
                    # check midtrans signature key validity
                    $signature_check = $this->checkMidtransSignature();
                    if ($signature_check) {
                        # update midtrans_transaction_id if redir_type are "finish" / first time midtrans redirection
                        if ($redir_type == 'finish') {
                            # code...
                            $this->payments_model->linkPaymentGateway($transaction_status['data'],$payment_detail_transaction_id);
                        }
                        
                        $change_status = $this->changeStatusHandler($transaction_status['data']);

                        # create new invoice (payment_detail) 
                        # IF payment.payment_type type are credit/installment, 
                        # if midtrans status == success, and tenor are still ongoing, 
                        $order_data = $this->payments_model->getDetailByPaymentDetailId($is_paymentDetail_exist->id);
                        $payed_tenors = $this->payments_model->getSuccessTenorsPaymentByOrderID($order_data->order_id)->num_rows();
                        if (
                            $order_data->payment_type == '2' &&
                            $change_status['callback_db'] == true && 
                            $change_status['transaction_status'] == 'success' &&
                            $payed_tenors < $order_data->tenor
                            ) {

                            #calculate monthly pay amount
                            $data_calc = array(
                                'price' => $order_data->price,
                                'down_payment' => $order_data->down_payment,
                                'interest' => $order_data->interest_rate,
                                'tenor' => $order_data->tenor
                            );

                            $monthly_payment = calc_monthly_payment($data_calc);
                            $due_date = add_month($order_data->due_date,'1');
                            $transaction_id = md5($is_paymentDetail_exist->payment_id.time());
                            $new_payment_detail_data = array(
                                'payment_id' => $is_paymentDetail_exist->payment_id,
                                'transaction_id' => $transaction_id,
                                'payment_type' => '3',
                                'amount' =>  $monthly_payment,
                                'due_date' => $due_date,
                            );
                            
                            $this->payments_model->addPaymentDetail($new_payment_detail_data);
                        }

                        # change payment status if all tenors has been paid
                        if (
                            $change_status['callback_db'] == true && 
                            $change_status['transaction_status'] == 'success' &&
                            $payed_tenors >= $order_data->tenor) {
                            $this->payments_model->changePaymentStatus('3',$is_paymentDetail_exist->payment_id);
                        }

                        # change order status to success if DP has been paid OR payment type is cash
                        if (
                            $change_status['callback_db'] == true && 
                            $change_status['transaction_status'] == 'success' &&
                            in_array($order_data->payment_detail_type,array('1','2'))) {
                            $this->orders_model->changeStatus('3',$order_data->order_id);
                        }

                        # echo success
                        http_response_code(200);
                        echo "success";
                    } else {
                        http_response_code(301);
                        echo "failed to pass signature validity";
                    }
                } else {
                    http_response_code(500);
                    var_dump($transaction_status['data']);
                }
            } else {
                show_404();
            }
        } else {
            show_404();
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

        $change_status = $this->payments_model->updateStatus($status_data,$transaction_id);

        $data_return = array(
            'transaction_status' => $status_data['payment_gateway_transaction_status'],
            'callback_db' => $change_status
        );

        return $data_return;

    }
    
}