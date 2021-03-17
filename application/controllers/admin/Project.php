<?php
	/*
    
    @Class Name : Blogs
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	function __construct() {
	    parent::__construct();
	}
	
	// List
	public function index() {



		$site  = $this->mConfig->list_config();
		$list = $this->mProject->get_project_all();
		
		$data = array(	'title'		=> 'Project - List',
						'list'		=> $list,
						'isi'		=> 'admin/project/list');

		$this->load->view('admin/layout/wrapper',$data);
	}

	// add
	public function add() {
		
		$site  = $this->mConfig->list_config();
		// $list = $this->mProject->get_project_all();
		
		$data = array(	'title'		=> 'Project - Add New',
						'list'		=> $list,
						'isi'		=> 'admin/project/add');

		$this->load->view('admin/layout/wrapper',$data);
	}

	//add action
	public function add_action() {

		$site 	  	 = $this->mConfig->list_config();

		// Validation
		$valid = $this->form_validation;
		$valid->set_rules('project-name','Project Name','required');
		// $valid->set_rules('kode','Kode','required');
		/*if (empty($_FILES['image']['name']))
		{
		    $this->form_validation->set_rules('image', 'Image', 'required');
		}*/


		if($valid->run() === FALSE) {

		$list = $this->mProject->get_project_all();
		
		$data = array(	'title'	 	=> 'Project - Add New',
						'list'		=> $list,
						'isi'		=> 'admin/project/add');

		$this->load->view('admin/layout/wrapper',$data);

		} else {

			if (empty($_FILES['image']['name'])) {
				# Save other data
				$i = $this->input;
			
				$data = array(		
								'project_name'		=> $i->post('project-name'),		
								'field'	=> $i->post('field'),					
								'location'		=> $i->post('location'),	
								'owner'		=> $i->post('owner'),	
								'start_date'		=> date('Y-m-d',strtotime($i->post('start_date'))),	
								'end_date'		=> date('Y-m-d',strtotime($i->post('end_date'))),
								'contract_value'		=> $i->post('value'),	
								'status'		=> $i->post('status'),	
								'desc'		=> $i->post('desc'),	
							);

				$this->mProject->add_item($data);		
				$this->session->set_flashdata('sukses','Success');
				redirect(base_url('admin/project'));
			} else {

				# Img Upload
				$config['upload_path'] 		= './assets/upload/image/';
				$config['allowed_types'] 	= 'jpeg|jpg|png';
				$config['max_size']			= '5000'; // KB			
				$this->load->library('upload', $config);

				if(! $this->upload->do_upload('image')) {

					$list = $this->mProject->get_project_all();
					
					$data = array(	'title'	 	=> 'Project - Add New',
									'list'		=> $list,
									'error'			=> $this->upload->display_errors(),
									'isi'		=> 'admin/project/add');
					$this->load->view('admin/layout/wrapper',$data);
				}else{

					# make thumbnails

					$upload_data				= array('uploads' =>$this->upload->data());
					// Image Editor
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

					# Save other data
					$i = $this->input;
				
					$data = array(		
									'project_name'		=> $i->post('project-name'),		
									'field'	=> $i->post('field'),					
									'location'		=> $i->post('location'),	
									'owner'		=> $i->post('owner'),	
									'start_date'		=> date('Y-m-d',strtotime($i->post('start_date'))),	
									'end_date'		=> date('Y-m-d',strtotime($i->post('end_date'))),
									'contract_value'		=> $i->post('value'),	
									'status'		=> $i->post('status'),	
									'desc'		=> $i->post('desc'),	
									'image'		=>	$upload_data['uploads']['file_name'],	
								);

					$this->mProject->add_item($data);		
					$this->session->set_flashdata('sukses','Success');
					redirect(base_url('admin/project'));
				}
			}
		}
	} 

	public function update($id){
		$site  = $this->mConfig->list_config();
		$item = $this->mProject->get_item_by_id($id);
		
		$data = array(	'title'		=> 'Project - Update Item',
						'item'		=> $item,
						'isi'		=> 'admin/project/update');

		$this->load->view('admin/layout/wrapper',$data);
	}


	public function update_action($id){
		$site 	  	 = $this->mConfig->list_config();

		// Validation
		$valid = $this->form_validation;
		$valid->set_rules('project-name','Project Name','required');

		if($valid->run() === FALSE) {

			$item = $this->mProject->get_item_by_id($id);
			
			$data = array(	'title'		=> 'Project - Update Item',
						'item'		=> $item,
						'isi'		=> 'admin/project/update');

			$this->load->view('admin/layout/wrapper',$data);

		} else {


			if (empty($_FILES['image']['name'])){
				# If img empty
				# Update data without img

				$i = $this->input;
				
				$data = array(		
								'project_name'		=> $i->post('project-name'),		
								'field'	=> $i->post('field'),					
								'location'		=> $i->post('location'),	
								'owner'		=> $i->post('owner'),	
								'start_date'		=> date('Y-m-d',strtotime($i->post('start_date'))),	
								'end_date'		=> date('Y-m-d',strtotime($i->post('end_date'))),
								'contract_value'		=> $i->post('value'),	
								'status'		=> $i->post('status'),	
								'desc'		=> $i->post('desc'),	
								'image'		=>	$upload_data['uploads']['file_name'],	
							);

				$this->mProject->update_item_by_id($id,$data);		
				$this->session->set_flashdata('sukses','Success');
				redirect(base_url('admin/project'));
			} else {

				# Img Upload
				$config['upload_path'] 		= './assets/upload/image/';
				$config['allowed_types'] 	= 'jpeg|jpg|png';
				$config['max_size']			= '5000'; // KB			
				$this->load->library('upload', $config);

				if(! $this->upload->do_upload('image')) {

					$item = $this->mProject->get_item_by_id($id);
					
					$data = array(	'title'	 	=> 'Project - Update Item',
									'item'		=> $item,
									'error'			=> $this->upload->display_errors(),
									'isi'		=> 'admin/project/update');
					$this->load->view('admin/layout/wrapper',$data);
				}else{

					# make thumbnails

					$upload_data				= array('uploads' =>$this->upload->data());
					// Image Editor
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

					# Update other data

					$i = $this->input;
					
					$data = array(		
									'project_name'		=> $i->post('project-name'),		
									'field'	=> $i->post('field'),					
									'location'		=> $i->post('location'),	
									'owner'		=> $i->post('owner'),	
									'start_date'		=> date('Y-m-d',strtotime($i->post('start_date'))),	
									'end_date'		=> date('Y-m-d',strtotime($i->post('end_date'))),
									'contract_value'		=> $i->post('value'),	
									'status'		=> $i->post('status'),	
									'desc'		=> $i->post('desc'),	
									'image'		=>	$upload_data['uploads']['file_name'],				
								);

					$this->mProject->update_item_by_id($id,$data);		
					$this->session->set_flashdata('sukses','Success');
					redirect(base_url('admin/project'));
				}
			}
		}
	}

	public function delete_item($id){
		$site 	  	 = $this->mConfig->list_config();

		$this->mProject->delete_item_by_id($id);		
		$this->session->set_flashdata('sukses','Success');
		redirect(base_url('admin/project'));
	}

					
}