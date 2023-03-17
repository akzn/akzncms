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
        // $result = $this->db 
        //     ->select('*,b.name as payment_status')
        //     ->join('payment_status b','b.id = a.status_id')
        //     ->where('order_id',$order_id)
        //     ->get('payments a')->row();
        
        $sql = "SELECT *, `b`.`name` as `payment_status`,
            CASE 
                WHEN a.payment_type = 1 THEN 'cash'
                WHEN a.payment_type = 2 THEN 'kredit'
                ELSE 'undefined'
            END as payment_type_string
        FROM `payments` `a`
        JOIN `payment_status` `b` ON `b`.`id` = `a`.`status_id`
        WHERE `order_id` = ?";

        $result = $this->db->query($sql, array($order_id))->row();
        return $result;
    }

    public function getActivePaymentByOrderID($order_id)
    {
        # code...
        $result = $this->db
            ->select('*,a.id as payment_detail_id')
            ->join('payments b','b.id = a.payment_id')
            ->where("(payment_gateway_transaction_status != 'success' or payment_gateway_transaction_status is NULL)")
            ->where('b.status_id NOT IN (3,4)')
            ->where('order_id',$order_id)
            ->order_by('a.id','desc')
            ->get('payment_detail a')->row();

        return $result;
    }

    public function getSuccessPaymentByOrderID($order_id)
    {
        # code...
        $result = $this->db
            ->select('*,
            a.id as payment_detail_id,
            a.payment_type as payment_detail_type,
            b.id as payment_id,
            b.payment_type as payment_type,
            ')
            ->join('payments b','b.id = a.payment_id')
            ->where("payment_gateway_transaction_status = 'success'")
            ->where('order_id',$order_id)
            ->get('payment_detail a')->result();
        
        return $result;
    }

    public function getSuccessTenorsPaymentByOrderID($order_id)
    {
        # code...
        $result_object = $this->db
            ->select('*,
            a.id as payment_detail_id,
            a.payment_type as payment_detail_type,
            b.id as payment_id,
            b.payment_type as payment_type,
            ')
            ->join('payments b','b.id = a.payment_id')
            ->where("payment_gateway_transaction_status = 'success'")
            ->where("a.payment_type = '3'")
            ->where('order_id',$order_id)
            ->get('payment_detail a');
        
        return $result_object;
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
     * check if data payment exist ()
     */
    public function checkPaymentDetailExist($transaction_id)
    {
        # code...
        $this->db
            ->where('transaction_id',$transaction_id);
        
        $result = $this->db->get('payment_detail');

        if ($result->num_rows() > 0){
            return $result->row();
        } else {
            return false;
        }
    }

    public function changePaymentStatus($status_id,$id)
    {
        $data = array(
            'status_id' => $status_id
        );
        $this->db
            ->where('id',$id)
            ->update('payments',$data);
        
        if ( $this->db->affected_rows() > 0 ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     */
     public function updateStatus($status_data,$GWtransaction_id)
     {  
        $this->db
            ->where('payment_gateway_transaction_id',$GWtransaction_id)
            ->update('payment_detail',$status_data);

        if ( $this->db->affected_rows() > 0 ) {
            return true;
        } else {
            return false;
        }
     }

    public function linkPaymentGateway($PGdata,$transaction_id)
    {
        $data = array(
            'payment_gateway_transaction_id' => $PGdata->transaction_id,
            'expiry_time' => $PGdata->expiry_time,
        );
        $this->db
            ->where('transaction_id',$transaction_id)
            ->update('payment_detail',$data);

        if ( $this->db->affected_rows() > 0 ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     */
    public function getDetailByPaymentDetailId($payment_detail_id)
    {
        # code...
        $data = $this->db
            ->select('
                a.id as payment_detail_id,
                a.transaction_id,
                a.payment_id,
                a.amount,
                a.due_date,
                a.payment_type as payment_detail_type,
                a.payment_gateway_transaction_id,
                a.payment_gateway_transaction_status,
                b.order_id,
                b.payment_type,
                b.interest_rate,
                b.tenor,
                c.product_id,
                d.title as product_name,
                d.price,
                d.down_payment
            ')
            ->join('payments b','b.id = a.payment_id')
            ->join('orders c','c.id = b.order_id')
            ->join('products d','d.id = c.product_id')
            ->where('a.id',$payment_detail_id)
            ->get('payment_detail a')->row();

        return $data;
        
    }

}