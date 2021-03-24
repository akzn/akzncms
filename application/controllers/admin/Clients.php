<?php
	/*
    
    @Class Name : Clients
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {
	
	// Main Page Clients
	public function index() {

		$site  	  = $this->mConfig->list_config();
		$clients  = $this->mClients->listClients();
		
		$data = array(	'title'		=> 'Daftar Klien - '.$site['nameweb'],
						'clients'	=> $clients,
						'isi'		=> 'admin/clients/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Create Product
	public function create() {
		
		$site = $this->mConfig->list_config();
		
		$v = $this->form_validation;
		$v->set_rules('client_name','Client Name','required');
		
		if($v->run()) {
			$nmfile = "imgclient_".$this->input->post('client_name')."_".time();
			$config['file_name'] = $nmfile; 
			$config['upload_path'] 		= './img/clients/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '5000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('image')) {
				
		$data = array(	'title'			=> 'Tambah Klien - '.$site['nameweb'],
						'site'			=> $site,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/clients/create');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './img/clients/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './img/clients/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$i = $this->input;
				$slugClient = url_title($this->input->post('client_name'), 'dash', TRUE);
				$data = array(	'slug_client'	=> $slugClient,
								'user_id'		=> $this->session->userdata('id'),
								'client_name'	=> $i->post('client_name'),								
								'date_created'			=> $i->post('date'),								
								'status'		=> $i->post('status'),								
								'website' 		=> (empty($i->post('website')))? 'none' : $i->post('website'),								
								'image'			=> $upload_data['uploads']['file_name']
				 			 );

				$this->mClients->createClient($data);
				$this->session->set_flashdata('sukses','Success');
				redirect(base_url('admin/clients/'));
		}}
		// Default page
		$data = array(	'title'		=> 'Tambah Klien - '.$site['nameweb'],
						'site'		=> $site,
						'isi'		=> 'admin/clients/create');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Edit Client
	public function edit($client_id) {

		$client	= $this->mClients->detailClient($client_id);
		$endClient	= $this->mClients->endClient();		

		// Validation
		$v = $this->form_validation;
		$v->set_rules('client_name','Client Name','required');
		
		if($v->run()) {
			if(!empty($_FILES['image']['name'])) {
			$nmfile = "imgclient_".$this->input->post('client_name')."_".time();
			$config['file_name'] = $nmfile;
			$config['upload_path'] 		= './img/clients/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '5000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('image')) {
		
		$data = array(	'title'		=> 'Edit Client - '.$client['client_name'],
						'client'	=> $client,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/clients/edit');
		$this->load->view('admin/layout/wrapper', $data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './img/clients/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './img/clients/thumbs/';
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

			unlink('./img/clients/'.$client['image']);
			unlink('./img/clients/thumbs/'.$client['image']);

			$slugClient = $endClient['client_id'].'-'.url_title($i->post('client_name'),'dash', TRUE);
			$data = array(	'client_id'     => $client['client_id'],
							'slug_client'	=> $slugClient,
							'user_id'		=> $this->session->userdata('id'),
							'client_name'	=> $i->post('client_name'),								
							'date_updated'			=> date('Y-m-d'),								
							'status'		=> $i->post('status'),								
							'website' 		=> $i->post('website'),								
							'image'			=> $upload_data['uploads']['file_name']
				 			 );
			$this->mClients->editClient($data);
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/clients'));
		}}else{
			$i = $this->input;
			$slugClient = $endClient['client_id'].'-'.url_title($i->post('client_name'),'dash', TRUE);
			$data = array(	'client_id'     => $client['client_id'],
							'slug_client'	=> $slugClient,
							'user_id'		=> $this->session->userdata('id'),
							'client_name'	=> $i->post('client_name'),								
							'date_updated'			=> date('Y-m-d'),								
							'status'		=> $i->post('status'),								
							'website' 		=> $i->post('website'),								
				 			 );
			$this->mClients->editClient($data);
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/clients'));			
		}}

		$data = array(	'title'		=> 'Edit Client - '.$client['client_name'],
						'client'	=> $client,
						'isi'		=> 'admin/clients/edit');
		$this->load->view('admin/layout/wrapper', $data);
	}	

	// Delete Client
	public function delete($client_id) {
		$data = array('client_id' => $client_id);
		$this->mClients->deleteClient($data);		
		$this->session->set_flashdata('sukses','Success');
		redirect(base_url('admin/clients'));
	}		
}