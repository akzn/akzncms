<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payments_model extends CI_Model {

    public function __construct() {
        
    }

    /**
     * 
     */
    public function getPaymentByOrderId($order_id)
    {
        return $this->db 
            ->select('*,b.name as payment_status')
            ->join('payment_status b','b.id = a.status_id')
            ->where('order_id',$order_id)
            ->get('payments a')->row();
    }

    /**
     * 
     */
    function add($payment_data){
        $this->db->trans_begin();
        $this->db->insert('payments',$payment_data);
      
        $payment_id = $this->db->insert_id();
      
        if( $this->db->trans_status() === FALSE )
        {
          $this->db->trans_rollback();
          return( 0 );
        }
        else
        {
          $this->db->trans_commit();
          return( $payment_id );
        }
    }

    /**
     * 
     */
    function addPaymentDetail($data_detail){
        $this->db->trans_begin();
        $this->db->insert('payment_detail',$data_detail);
      
        $payment_detail_id = $this->db->insert_id();
      
        if( $this->db->trans_status() === FALSE )
        {
          $this->db->trans_rollback();
          return( 0 );
        }
        else
        {
          $this->db->trans_commit();
          return( $payment_detail_id );
        }
    }

    /**
     * check if data payment exist (have order_id )
     */
    public function checkPaymentExist($data)
    {
        # code...
        $this->db
            ->where('order_id',$data['order_id']);
        
        $result = $this->db->get('payments');

        if ($result->num_rows() > 0){
            return $result->row();
        } else {
            return false;
        }
    }

    /**
     * check if data payment exist (have order_id and midtrans transaction id)
     */
    public function checkPaymentDetailExist($data)
    {
        # code...
        $this->db
            ->where('payment_gateway_transaction_id',$data['transaction_id']);
        
        $result = $this->db->get('payment_detail');

        if ($result->num_rows() > 0){
            return $result->row();
        } else {
            return false;
        }
    }

    /**
     * 
     */

     public function updateStatus($status_data,$transaction_id)
     {  
        $this->db
            ->where('payment_gateway_transaction_id',$transaction_id)
            ->update('payment_detail',$status_data);

        if ( $$this->db->affected_rows() > 0 ) {
            return true;
        } else {
            return false;
        }
     }

}