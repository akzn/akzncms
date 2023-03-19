<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends CI_Model {

    public function __construct() {
        
    }

    public function getAll($limit = null, $start = null)
    {
        if ($limit !== null && $start !== null) {
            $this->db->limit($limit, $start);
        } else {
            $this->db->limit($limit);
        }
        
        $data = $this->db
            ->select("*,
            CASE
                WHEN b.payment_type = 1 THEN 'kontan'
                WHEN b.payment_type = 2 THEN 'kredit'
                ELSE 'undefined'
            END as payment_type_string,
            d.name as order_status_string
            ")
            ->order_by('a.id','desc')
            ->join('payments b','a.id = b.order_id')
            ->join('users c','c.id = a.user_id')
            ->join('order_status d','d.id = a.order_status_id')
            ->get('orders a')->result();
        
        return $data;
    }

    public function orderCounts()
    {
        return $this->db
            ->count_all_results('orders a');
    } 
}