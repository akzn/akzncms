<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Address_model extends CI_Model {

    public function __construct() {
        
    }

    // get list by user id
    public function getListById($user_id)
    {
        $data = $this->db->where('user_id',$user_id)
            ->where('active','1')
            ->get('user_address')
            ->result();
        
        return $data;
    }

    // get single data by address id
    public function getById($address_id)
    {
        $data = $this->db->where('id',$address_id)
        ->get('user_address')
        ->row();
    
        return $data;
    }

    // get main address by user_id
    public function getMainAddress($user_id)
    {
        $data = $this->db->where('user_id',$user_id)
        ->where('is_main','1')
        ->get('user_address')
        ->row();
    
        return $data;
    }

    /* Add new address by user logged in */
    public function add($data,$user_id)
    {
        $this->db->trans_start();

        $this->db->where('user_id',$user_id)->update('user_address',array('is_main' => '0'));
        $this->db->insert('user_address',$data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return false;
        } else {
            return true;
        }
        
    }

    /* update address by address_id and user_id */
    public function update($data,$params)
    {
        $this->db->where('user_id',$params['user_id'])
        ->where('id',$params['address_id'])
        ->update('user_address',$data);

        return $this->db->affected_rows() > 0;
    }

    /* delete address by address_id and user_id*/
    public function delete($params)
    {   
        $data = array(
            'active' => '0'
        );
        $this->db->where('user_id',$params['user_id'])
        ->where('id',$params['address_id'])
        ->update('user_address',$data);

        return $this->db->affected_rows() > 0;
    }

    /* Set address as main address */
    public function setMain($data,$params)
    {   
        $this->db->trans_start();

        $this->db->where('user_id',$params['user_id'])->update('user_address',array('is_main' => '0'));

        $this->db->where('user_id',$params['user_id'])
            ->where('id',$params['address_id'])
            ->update('user_address',$data);
        
        $this->db->trans_complete();
        
        
        if ($this->db->trans_status() === FALSE) {
            return false;
        } else {
            return true;
        }
    }
}