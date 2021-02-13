<?php
	/*
    
    @Class Name : Testimonials
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends CI_Controller {
	
	// Main Page Testimonials
	public function index() {

		$site  	  = $this->mConfig->list_config();
		$testimonials  = $this->mTestimonials->listTestimonials();
		
		$data = array(	'title'		=> 'Daftar Testimonial - '.$site['nameweb'],
						'testimonials'	=> $testimonials,
						'isi'		=> 'admin/testimonials/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Create Product
	public function create() {
		
		$site = $this->mConfig->list_config();
		
		$v = $this->form_validation;
		$v->set_rules('client_name','Client Name','required');
		$v->set_rules('testimony','Testimony Text','required');
		
		if($v->run()) {
			$nmfile = "imgtestimonial_".$this->input->post('client_name')."_".time();
			$config['file_name'] = $nmfile; 
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '5000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('image')) {
				
		$data = array(	'title'			=> 'Tambah Testimonial - '.$site['nameweb'],
						'site'			=> $site,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/testimonials/create');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$i = $this->input;
				$slugTestimonial = url_title($this->input->post('client_name'), 'dash', TRUE);
				$data = array(	'slug_testimonial'	=> $slugTestimonial,
								'client_name'	=> $i->post('client_name'),	
								'occupation'	=> $i->post('occupation'),
								'company'	=> $i->post('company'),	
								'testimony'	=> $i->post('testimony'),						
								'date_created'	=> date('Y-m-d'),								
								'status'		=> $i->post('status'),															
								'image'			=> $upload_data['uploads']['file_name']
				 			 );

				$this->mTestimonials->createTestimonial($data);
				$this->session->set_flashdata('sukses','Success');
				redirect(base_url('admin/testimonials/'));
		}}
		// Default page
		$data = array(	'title'		=> 'Tambah Testimonial - '.$site['nameweb'],
						'site'		=> $site,
						'isi'		=> 'admin/testimonials/create');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Edit Testimonial
	public function edit($testimonial_id) {

		$testimonial	= $this->mTestimonials->detailTestimonial($testimonial_id);
		$endTestimonial	= $this->mTestimonials->endTestimonial();		

		// Validation
		$v = $this->form_validation;
		$v->set_rules('client_name','Client Name','required');
		$v->set_rules('testimony','Testimony Text','required');
		
		if($v->run()) {
			if(!empty($_FILES['image']['name'])) {
			$nmfile = "imgtestimonial_".$this->input->post('client_name')."_".time();
			$config['file_name'] = $nmfile;
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '5000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('image')) {
		
		$data = array(	'title'		=> 'Edit Testimonial - '.$testimonial['client_name'],
						'testimonial'	=> $testimonial,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/testimonials/edit');
		$this->load->view('admin/layout/wrapper', $data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= FALSE;
				$config['width'] 			= 360; // Pixel
				$config['height'] 			= 200; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				
			$i = $this->input;

			unlink('./assets/upload/image/'.$testimonial['image']);
			unlink('./assets/upload/image/thumbs/'.$testimonial['image']);

			$slugTestimonial = $endTestimonial['testimonial_id'].'-'.url_title($i->post('client_name'),'dash', TRUE);
			$data = array(	'testimonial_id'     => $testimonial['testimonial_id'],
							'slug_testimonial'	=> $slugTestimonial,
							'client_name'	=> $i->post('client_name'),	
							'occupation'	=> $i->post('occupation'),
								'company'	=> $i->post('company'),	
								'testimony'	=> $i->post('testimony'),								
							'date_updated'			=> date('Y-m-d'),								
							'status'		=> $i->post('status'),															
							'image'			=> $upload_data['uploads']['file_name']
				 			 );
			$this->mTestimonials->editTestimonial($data);
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/testimonials'));
		}}else{
			$i = $this->input;
			$slugTestimonial = $endTestimonial['testimonial_id'].'-'.url_title($i->post('client_name'),'dash', TRUE);
			$data = array(	'testimonial_id'     => $testimonial['testimonial_id'],
							'slug_testimonial'	=> $slugTestimonial,
							'client_name'	=> $i->post('client_name'),		
							'occupation'	=> $i->post('occupation'),
								'company'	=> $i->post('company'),	
								'testimony'	=> $i->post('testimony'),							
							'date_updated'			=> date('Y-m-d'),								
							'status'		=> $i->post('status'),																
				 			 );
			$this->mTestimonials->editTestimonial($data);
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/testimonials'));			
		}}

		$data = array(	'title'		=> 'Edit Testimonial - '.$testimonial['client_name'],
						'testimonial'	=> $testimonial,
						'isi'		=> 'admin/testimonials/edit');
		$this->load->view('admin/layout/wrapper', $data);
	}	

	// Delete Testimonial
	public function delete($testimonial_id) {
		$data = array('testimonial_id' => $testimonial_id);
		$this->mTestimonials->deleteTestimonial($data);		
		$this->session->set_flashdata('sukses','Success');
		redirect(base_url('admin/testimonials'));
	}		
}