<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payments_model extends CI_Model {

    public function __construct() {
        
    }

    public function getAll($limit = null, $start = null)
    {   
        if ($limit !== null && $start !== null) {
            $this->db->limit($limit, $start);
        } else {
            $this->db->limit($limit);
        }
        $this->db
        ->select("
            a.id as payment_detail_id,
            a.transaction_id,
            a.payment_id,
            a.amount,
            a.due_date,
            a.payment_type as payment_detail_type,
            a.payment_gateway_transaction_id,
            a.payment_gateway_transaction_status,
            a.create_date as payment_detail_create_date,
            b.order_id,
            b.payment_type,
            b.interest_rate,
            b.tenor,
            c.product_id,
            c.order_code,
            d.title as product_name,
            d.price,
            d.down_payment,
            CASE 
                WHEN a.payment_type = 1 THEN 'Pembayaran Kontan'
                WHEN a.payment_type = 2 THEN 'DP'
                WHEN a.payment_type = 3 THEN 'Cicilan'
                ELSE 'undefined'
            END as payment_detail_type_string
        ")
        ->join('payments b','b.id = a.payment_id')
        ->join('orders c','c.id = b.order_id')
        ->join('products d','d.id = c.product_id')
        ->order_by('a.id','desc');

        return $this->db->get('payment_detail a')->result();;
    }

    public function countAll()
    {

        $data = $this->db
        ->join('payments b','b.id = a.payment_id')
        ->join('orders c','c.id = b.order_id')
        ->join('products d','d.id = c.product_id')
        ->count_all_results('payment_detail a');

        return $data;
    } 
}