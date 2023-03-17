<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends CI_Model {

    public function __construct() {
        
    }

    public function getAllByUserId($user_id,$limit = null, $start = null)
    {   
        if ($limit !== null && $start !== null) {
            $this->db->limit($limit, $start);
        } else {
            $this->db->limit($limit);
        }
        $this->db
            ->select('*,
                a.id as order_id,
                a.create_date as create_date,
                b.title as product_name,
                b.description as product_description,
                b.price as product_price,
                b.image as product_image,
                c.address as address,
                c.full_name as customer_name,
                c.phone as customer_phone,
                d.name as order_status,
            ')
            ->join('products b','b.id=a.product_id')
            ->join('user_address c','c.id=a.address_id')
            ->join('order_status d','d.id=a.order_status_id')
            ->order_by('a.id','desc')
            ->where('a.user_id',$user_id);
        
        return $this->db->get('orders a')->result();
    }

    public function productsCountByUserId($user_id)
    {
        return $this->db
            ->where('user_id',$user_id)
            ->count_all_results('orders');
    } 

    public function getOrderById($id)
    {
        # get data order by id
        $this->db
            ->select('*,
                a.create_date as create_date,
                a.order_status_id,
                b.title as product_name,
                b.description as product_description,
                b.price as product_price,
                c.address as address,
                c.full_name as customer_name,
                c.phone as customer_phone,
                d.name as order_status,
            ')
            ->join('products b','b.id=a.product_id')
            ->join('user_address c','c.id=a.address_id')
            ->join('order_status d','d.id=a.order_status_id')
            ->where('a.id',$id);
        
        $data = $this->db->get('orders a')->row();
        return $data;
    }

    public function getOrderByCode($code)
    {
        # get data order by code
        $this->db
            ->where('order_code',$code);
        
        $data = $this->db->get('orders')->row()->id;
        return $data;
    }

    // get list by user id
    public function createOrder($data)
    {   
        $insert_id;
        $insert_payment_id;
        $transaction_id;
        $insert_payment_detail_id;

        $this->db->trans_start();

        #insert tb order
        $this->db->insert('orders',$data['order']);
        
        $insert_id = $this->db->insert_id();

        #insert tb payment
        $data['payment']['order_id'] = $insert_id; 
        $this->db->insert('payments',$data['payment']);

        #insert tb payment_detail
        $insert_payment_id = $this->db->insert_id();
        $transaction_id = md5($insert_payment_id.time());
        $data['payment_detail']['transaction_id'] = $transaction_id;
        $data['payment_detail']['payment_id'] = $insert_payment_id;

        $this->db->insert('payment_detail',$data['payment_detail']);
        $insert_payment_detail_id = $this->db->insert_id();

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return false;
        } else {
            return array(
                'order_id' => $insert_id,
                'payment_id' => $insert_payment_id,
                'payment_detail_id' => $insert_payment_detail_id,
            );
        }
        
    }

    public function changeStatus($status_id,$id)
    {
        $data = array(
            'order_status_id' => $status_id
        );
        $this->db
            ->where('id',$id)
            ->update('orders',$data);
        
        if ( $this->db->affected_rows() > 0 ) {
            return true;
        } else {
            return false;
        }
    }

}