<?php
	/*
    
    @Class Name : pages
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('userlevel')!='administrator') {
			show_404();
		}
	}
	
	// Main Page Products
	public function index() {

		$site      = $this->mConfig->list_config();
		$pages = $this->mPages->listPages();
		
		$data = array(	'title'		=> 'Menu Pages - '.$site['nameweb'],
						'pages'	=> $pages,
						'site'		=> $site,
						'isi'		=> 'admin/pages/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Create Gallery
	public function create() {
		
		$site = $this->mConfig->list_config();
		
		$v = $this->form_validation;
		$v->set_rules('page_name','Page Name','required');
		
		if($v->run()) {
			
			$data = array(	
								// 'user_id'		=> $this->session->userdata('id'),
								'page_name'	=> $this->input->post('page_name'),															
								'content' => $this->input->post('content'),								
								'metatitle' => $this->input->post('metatitle'),	
								'metatext' => $this->input->post('metatext'),	
				 			 );

				$this->mPages->createPage($data);
				$this->session->set_flashdata('sukses','Success');
				redirect(base_url('admin/pages/'));
		}

		// Default page
		$data = array(	'title'		=> 'Create Page - '.$site['nameweb'],
						'site'		=> $site,
						'isi'		=> 'admin/pages/create');
		$this->load->view('admin/layout/wrapper',$data);
	}

		// Edit Gallery
	public function edit($pages_id) {

		$pages	= $this->mPages->detailPage($pages_id);

		// Validation
		$v = $this->form_validation;
		$v->set_rules('page_name','Page Name','required');
		$i = $this->input;

		if($v->run()) {
			$data = array(	'pages_id'	=> $pages['pages_id'],
					'page_name'	=>  $i->post('page_name'),
					'content'	=>  $i->post('content'),
					'metatitle'	=>  $i->post('metatitle'),
					'metatext'	=>  $i->post('metatext'),
							);

			$this->mPages->editPage($data);
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/pages'));			

		}

		$data = array(	'title'		=> 'Edit Page - '.$pages['page_name'],
						'pages'	=> $pages,
						'isi'		=> 'admin/pages/edit');
		$this->load->view('admin/layout/wrapper', $data);
	}


}