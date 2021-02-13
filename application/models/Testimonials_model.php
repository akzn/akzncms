<?php
	/*
    
    @Class Name : Testimonials Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Testimonials_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Testimonials
        public function listTestimonials() {
            $this->db->select('*');
            $this->db->from('testimonials');
            // $this->db->join('admins','admins.admin_id = testimonials.user_id','LEFT');                        
            $this->db->order_by('testimonial_id','desc');
            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_testimonials_all() {
            $this->db->select('*');
            $this->db->from('testimonials');
            $this->db->join('admins','admins.admin_id = testimonials.user_id','LEFT');                        
            $this->db->order_by('testimonial_id','desc');
            $query = $this->db->get();
            return $query->result();
        }

         // Listing Testimonials
        public function get4testimonials() {
            $this->db->select('*');
            $this->db->from('testimonials');
            $this->db->join('admins','admins.admin_id = testimonials.user_id','LEFT');                        
            $this->db->order_by('testimonial_id','desc');
            $this->db->limit(4);
            $query = $this->db->get();
            return $query->result();
        }

        // Create Testimonial
        public function createTestimonial($data) {
            $this->db->insert('testimonials',$data);
        }

        // Detail Testimonial
        public function detailTestimonial($testimonial_id) {
            $this->db->select('*');
            $this->db->from('testimonials');
            $this->db->where('testimonial_id',$testimonial_id);
            $this->db->order_by('testimonial_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Edit Testimonial
        public function editTestimonial($data) {
            $this->db->where('testimonial_id',$data['testimonial_id']);
            $this->db->update('testimonials',$data);
        }           

        // Delete Testimonial
        public function deleteTestimonial($data) {
            $this->db->where('testimonial_id',$data['testimonial_id']);
            $this->db->delete('testimonials',$data);
        }

        // End Testimonial
        public function endTestimonial() {
            $this->db->select('*');
            $this->db->from('testimonials');
            $this->db->order_by('testimonial_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }                      

    }
