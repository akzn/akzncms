<?php
/**
 * Codeigniter library companion for official midtrans-php
 * by github.com/akzn
 * version 0.1
 */

/**
 * Method
 * 1. getRedirectUrl
 * 2. notificationHandler
 * 3. getTransactionStatus
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."/third_party/midtrans-php/Midtrans.php";

class Midtrans {
	
	// SET SUPER GLOBAL "CI" instance
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-LEqFXV8j2KpJtgDU5KyKaglm';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        // Override MIdrans notif url
        \Midtrans\Config::$overrideNotifUrl = base_url()."payment/notification";
	}
	
    /**
     * get snap redirect url (if we using snap redirect rather than snap.js)
     */
	public function getRedirectUrl($params) 
    {        
        try {
          // Get Snap Payment Page URL
          $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;
          
          // Redirect to Snap Payment Page
        //   header('Location: ' . $paymentUrl);
          $data = array(
            'status' => 'success',
            'data'  => $paymentUrl,
          );
        }
        catch (Exception $e) {
            $data = array(
                'status' => 'error',
                'data'  => $e->getMessage(),
                'HTTP_status_code' => $e->getCode(),
              );
        }

        return $data;
    }

    /**
     * function to handle midtrans notification 
     */
    public function notificationHandler()
    { 
        try {
            $notif = new \Midtrans\Notification();
        }
        catch (\Exception $e) {
            exit($e->getMessage());
        }

        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        return $notif;
    }

    public function getTransactionStatus($orderId)
    {
        try {
            $status = \Midtrans\Transaction::status($orderId);

            $data = array(
                'status' => 'success',
                'data'  => $status,
              );
        }
        catch (\Exception $e) {
            $data = array(
                'status' => 'error',
                'data'  => $e->getMessage(),
              );
        }

        return $data;
    }

    
}
