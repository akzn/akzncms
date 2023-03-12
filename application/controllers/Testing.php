<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {
    public function index()
    {
        $this->load->library('midtrans');
        echo "Testing Page";
        echo '<br>';

        // $redirect_url = $this->midtrans->getRedirectUrl();
        // echo "<pre>";
        // var_dump($redirect_url);
        // echo "/<pre>";
        
        $transaction_status = $this->midtrans->getTransactionStatus('1501682611');
        echo "<pre>";
        var_dump($transaction_status['data']);
        echo "</pre>";

    }

    public function req_token()
    {
        $this->load->library('midtrans');
        echo "Testing Page";
        echo '<br>';

        $params = array(
            'transaction_details' => array(
                'order_id' => 102983019283091283,
                'gross_amount' => 10000,
            )
        );
        $redirect_url = $this->midtrans->getRedirectUrl($params);
        echo "<pre>";
        var_dump($redirect_url);
        echo "/<pre>";
        
        // $transaction_status = $this->midtrans->getTransactionStatus('1501682611');
        // echo "<pre>";
        // var_dump($transaction_status);
        // echo "/<pre>";

    }
}