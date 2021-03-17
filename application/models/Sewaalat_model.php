<?php
	/*
    
    @Class Name : sewaalat Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Sewaalat_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // get text
        public function get_sewaalat_text($id=NULL) {
            if ($id!=NULL) {
                 $this->db->where('id',$id);
            }
            $this->db->select('*');
            $this->db->from('sewaalat_text');
            return $this->db->get()->row();
        }

        public function update_text($id,$data){
            $this->db->where('id',$id);
            $this->db->update('sewaalat_text',$data);

        }

        public function get_item_all(){
            $this->db->select('*');
            $this->db->from('sewaalat_item');
            return $this->db->get()->result();
        }

        public function add_item($data){
            $this->db->insert('sewaalat_item',$data);
        }

        public function get_item_by_id($id){
            $this->db->select('*');
            $this->db->where('id',$id);
            return $this->db->get('sewaalat_item')->row();
        }

        public function update_item_by_id($id,$data){
            $this->db->where('id',$id);
            $this->db->update('sewaalat_item',$data);

        }

        public function delete_item_by_id($id){
            $this->db->where('id',$id);
            $this->db->delete('sewaalat_item');
        }
    }
