<?php
	/*
    
    @Class Name : project Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Project_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // get text
        public function get_project_all() {
            $this->db->select('*');
            $this->db->from('project');
            $this->db->order_by('id_project','desc');
            return $this->db->get()->result();
        }

        public function get_item_all(){
            $this->db->select('*');
            $this->db->from('project');
            $this->db->order_by('id_project','desc');
            return $this->db->get()->result();
        }

        public function add_item($data){
            $this->db->insert('project',$data);
        }

        public function get_item_by_id($id){
            $this->db->select('*');
            $this->db->where('id_project',$id);
            return $this->db->get('project')->row();
        }

        public function update_item_by_id($id,$data){
            $this->db->where('id_project',$id);
            $this->db->update('project',$data);

        }

        public function delete_item_by_id($id){
            $this->db->where('id_project',$id);
            $this->db->delete('project');
        }

        public function get_ongoing(){
            $this->db->select('*');
            $this->db->where('status','ongoing');
            $this->db->from('project');
            $this->db->order_by('id_project','desc');
            return $this->db->get()->result();
        }

        public function get_ongoing_6(){
            $this->db->select('*');
            $this->db->where('status','ongoing');
            $this->db->from('project');
            $this->db->order_by('id_project','desc');
            $this->db->limit(6);
            return $this->db->get()->result();
        }
        public function get_finished(){
            $this->db->select('*');
            $this->db->where('status','finished');
            $this->db->from('project');
            $this->db->order_by('id_project','desc');
            return $this->db->get()->result();
        }
        public function get_finished_6(){
            $this->db->select('*');
            $this->db->where('status','finished');
            $this->db->from('project');
            $this->db->order_by('id_project','desc');
            $this->db->limit(6);
            return $this->db->get()->result();
        }
    }
