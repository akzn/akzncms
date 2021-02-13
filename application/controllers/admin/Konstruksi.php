<?php
	/*
    
    @Class Name : Blogs
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Konstruksi extends CI_Controller {

	function __construct() {
	    parent::__construct();
	}
	
	// Main Page edit text
	public function index() {

		$site  = $this->mConfig->list_config();
		$konstruksi = $this->mKonstruksi->get_konstruksi_text();
		
		$data = array(	'title'		=> 'Konstruksi - Edit Text',
						'konstruksi'		=> $konstruksi,
						'isi'		=> 'admin/konstruksi/form_text');

		$this->load->view('admin/layout/wrapper',$data);
	}

	// Edit text action
	public function edit_action($id_konstruksi) {
		
		$site 	  	 = $this->mConfig->list_config();
		$konstruksi	 = $this->mKonstruksi->get_konstruksi_text($category_id);

		// Validation
		$valid = $this->form_validation;
		$valid->set_rules('title','Title','required');
		$valid->set_rules('mini_desc','Mini Description','required');
		$valid->set_rules('content','Content','required');

		if($valid->run() === FALSE) {

		$konstruksi = $this->mKonstruksi->get_konstruksi_text();
		
		$data = array(	'title'	 	=> 'Konstruksi - Edit Text',
						'konstruksi'		=> $konstruksi,
						'isi'		=> 'admin/konstruksi/form_text');

		$this->load->view('admin/layout/wrapper',$data);

		} else {
			$i = $this->input;
			
			$data = array(		
							'title'		=> $i->post('title'),		
							'mini_desc'	=> $i->post('mini_desc'),					
							'content'		=> $i->post('content'),					
						);

			$this->mKonstruksi->update_text($id_konstruksi,$data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/konstruksi'));
		}
	}


	public function item(){
		$site  = $this->mConfig->list_config();
		$table = $this->mKonstruksi->get_item_all();
		
		$data = array(	'title'		=> 'Konstruksi - Item',
						'table'		=> $table,
						'isi'		=> 'admin/konstruksi/item');

		$this->load->view('admin/layout/wrapper',$data);
	}

	public function add_item_action(){
		$site 	  	 = $this->mConfig->list_config();

		// Validation
		$valid = $this->form_validation;
		$valid->set_rules('bidang','Bidang','required');
		// $valid->set_rules('kode','Kode','required');
		// $valid->set_rules('kualifikasi','Kualifikasi','required');

		if($valid->run() === FALSE) {

		$table = $this->mKonstruksi->get_item_all();
		
		$data = array(	'title'	 	=> 'Konstruksi - Item',
						'table'		=> $table,
						'isi'		=> 'admin/konstruksi/item');

		$this->load->view('admin/layout/wrapper',$data);

		} else {
			$i = $this->input;
			
			$data = array(		
							'bidang'		=> $i->post('bidang'),		
							'kode'	=> $i->post('kode'),					
							'kualifikasi'		=> $i->post('kualifikasi'),					
						);

			$this->mKonstruksi->add_item($data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/konstruksi/item'));
		}
	} 

	public function update_item($id){
		$site  = $this->mConfig->list_config();
		$item = $this->mKonstruksi->get_item_by_id($id);
		
		$data = array(	'title'		=> 'Konstruksi - Update Item',
						'item'		=> $item,
						'isi'		=> 'admin/konstruksi/item_update');

		$this->load->view('admin/layout/wrapper',$data);
	}


	public function update_item_action($id){
		$site 	  	 = $this->mConfig->list_config();

		// Validation
		$valid = $this->form_validation;
		$valid->set_rules('bidang','Bidang','required');
		// $valid->set_rules('kode','Kode','required');
		// $valid->set_rules('kualifikasi','Kualifikasi','required');

		if($valid->run() === FALSE) {

			$item = $this->mKonstruksi->get_item_by_id($id);
			
			$data = array(	'title'		=> 'Konstruksi - Update Item',
							'item'		=> $item,
							'isi'		=> 'admin/konstruksi/item_update');

			$this->load->view('admin/layout/wrapper',$data);

		} else {
			$i = $this->input;
			
			$data = array(		
							'bidang'		=> $i->post('bidang'),		
							'kode'	=> $i->post('kode'),					
							'kualifikasi'		=> $i->post('kualifikasi'),					
						);

			$this->mKonstruksi->update_item_by_id($id,$data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/konstruksi/item'));
		}
	}

	public function delete_item($id){
		$site 	  	 = $this->mConfig->list_config();

		$this->mKonstruksi->delete_item_by_id($id);		
		$this->session->set_flashdata('sukses','Success');
		redirect(base_url('admin/konstruksi/item'));
	}

					
}