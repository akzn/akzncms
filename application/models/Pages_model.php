<?php
	/*
    
    @Class Name : Galleries Model
    -- deprecated
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pages_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Gallery
        public function listPages() {
            $this->db->select('*');
            $this->db->from('pages');                       
            $this->db->order_by('pages_id','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Create Gallery
        public function createPage($data) {
            $this->db->insert('pages',$data);
        }

        // Detail Gallery
        public function detailPage($pages_id) {
            $this->db->select('*');
            $this->db->from('pages');
            $this->db->where('pages_id',$pages_id);
            $this->db->order_by('pages_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Detail Gallery
        public function detailPagebyName($page_name) {
            $this->db->select('*');
            $this->db->from('pages');
            $this->db->where('page_name',$page_name);
            $this->db->order_by('pages_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Edit Gallery
        public function editPage($data) {
            $this->db->where('pages_id',$data['pages_id']);
            $this->db->update('pages',$data);
        }   
}