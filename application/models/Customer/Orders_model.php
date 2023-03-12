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
        $data = $this->db->insert('orders',$data);
        
        $insert_id = $this->db->insert_id();
        if ( $insert_id ) {
            return $insert_id;
        } else {
            return false;
        }
        
    }
}