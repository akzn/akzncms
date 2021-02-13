<?php
	/*
    
    @Class Name : Konstruksi Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Konstruksi_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // get text
        public function get_konstruksi_text($id=NULL) {
            if ($id!=NULL) {
                 $this->db->where('id',$id);
            }
            $this->db->select('*');
            $this->db->from('konstruksi_text');
            return $this->db->get()->row();
        }

        public function update_text($id,$data){
            $this->db->where('id',$id);
            $this->db->update('konstruksi_text',$data);

        }

        public function get_item_all(){
            $this->db->select('*');
            $this->db->from('konstruksi_item');
            return $this->db->get()->result();
        }

        public function add_item($data){
            $this->db->insert('konstruksi_item',$data);
        }

        public function get_item_by_id($id){
            $this->db->select('*');
            $this->db->where('id',$id);
            return $this->db->get('konstruksi_item')->row();
        }

        public function update_item_by_id($id,$data){
            $this->db->where('id',$id);
            $this->db->update('konstruksi_item',$data);

        }

        public function delete_item_by_id($id){
            $this->db->where('id',$id);
            $this->db->delete('konstruksi_item');
        }
    }
