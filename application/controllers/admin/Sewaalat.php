<?php
	/*
    
    @Class Name : Blogs
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewaalat extends CI_Controller {

	function __construct() {
	    parent::__construct();
	}
	
	// Main Page edit text
	public function index() {

		$site  = $this->mConfig->list_config();
		$sewaalat = $this->mSewaalat->get_sewaalat_text();
		
		$data = array(	'title'		=> 'Sewa Alat - Edit Text',
						'sewaalat'		=> $sewaalat,
						'isi'		=> 'admin/sewaalat/form_text');

		$this->load->view('admin/layout/wrapper',$data);
	}

	// Edit text action
	public function edit_action($id_Sewaalat) {
		
		$site 	  	 = $this->mConfig->list_config();
		$sewaalat	 = $this->mSewaalat->get_sewaalat_text($category_id);

		// Validation
		$valid = $this->form_validation;
		$valid->set_rules('title','Title','required');
		$valid->set_rules('mini_desc','Mini Description','required');
		$valid->set_rules('content','Content','required');

		if($valid->run() === FALSE) {

		$sewaalat = $this->mSewaalat->get_sewaalat_text();
		
		$data = array(	'title'	 	=> 'Sewa Alat - Edit Text',
						'sewaalat'		=> $sewaalat,
						'isi'		=> 'admin/sewaalat/form_text');

		$this->load->view('admin/layout/wrapper',$data);

		} else {
			$i = $this->input;
			
			$data = array(		
							'title'		=> $i->post('title'),		
							'mini_desc'	=> $i->post('mini_desc'),					
							'content'		=> $i->post('content'),					
						);

			$this->mSewaalat->update_text($id_Sewaalat,$data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/sewaalat'));
		}
	}


	public function item(){
		$site  = $this->mConfig->list_config();
		$table = $this->mSewaalat->get_item_all();
		
		$data = array(	'title'		=> 'Sewa Alat - Item',
						'table'		=> $table,
						'isi'		=> 'admin/sewaalat/item');

		$this->load->view('admin/layout/wrapper',$data);
	}

	public function add_item_action(){
		$site 	  	 = $this->mConfig->list_config();

		// Validation
		$valid = $this->form_validation;
		$valid->set_rules('nama','Nama Alat','required');
		// $valid->set_rules('kode','Kode','required');
		// if (empty($_FILES['image']['name']))
		// {
		//     $this->form_validation->set_rules('image', 'Image', 'required');
		// }


		if($valid->run() === FALSE) {

		$table = $this->mSewaalat->get_item_all();
		
		$data = array(	'title'	 	=> 'Sewa Alat - Item',
						'table'		=> $table,
						'isi'		=> 'admin/sewaalat/item');

		$this->load->view('admin/layout/wrapper',$data);

		} else {

			if (empty($_FILES['image']['name'])) {
				# Save other data
					$i = $this->input;
				
					$data = array(		
									'nama'		=> $i->post('nama'),		
									'merk'	=> $i->post('merk'),					
									'tahun'		=> $i->post('tahun'),	
									'jml'		=> $i->post('jml'),	
								);

					$this->mSewaalat->add_item($data);		
					$this->session->set_flashdata('sukses','Success');
					redirect(base_url('admin/sewaalat/item'));
			} else {

				# Img Upload
				$config['upload_path'] 		= './assets/upload/image/';
				$config['allowed_types'] 	= 'jpeg|jpg|png';
				$config['max_size']			= '5000'; // KB			
				$this->load->library('upload', $config);

				if(! $this->upload->do_upload('image')) {

					$table = $this->mSewaalat->get_item_all();
					
					$data = array(	'title'	 	=> 'Sewa Alat - Item',
									'table'		=> $table,
									'error'			=> $this->upload->display_errors(),
									'isi'		=> 'admin/sewaalat/item');
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
									'nama'		=> $i->post('nama'),		
									'merk'	=> $i->post('merk'),					
									'tahun'		=> $i->post('tahun'),	
									'jml'		=> $i->post('jml'),	
									'image'		=>	$upload_data['uploads']['file_name'],	
								);

					$this->mSewaalat->add_item($data);		
					$this->session->set_flashdata('sukses','Success');
					redirect(base_url('admin/sewaalat/item'));
				}
			}
		}
	} 

	public function update_item($id){
		$site  = $this->mConfig->list_config();
		$item = $this->mSewaalat->get_item_by_id($id);
		
		$data = array(	'title'		=> 'Sewa Alat - Update Item',
						'item'		=> $item,
						'isi'		=> 'admin/sewaalat/item_update');

		$this->load->view('admin/layout/wrapper',$data);
	}


	public function update_item_action($id){
		$site 	  	 = $this->mConfig->list_config();

		// Validation
		$valid = $this->form_validation;
		$valid->set_rules('nama','Nama Alat','required');
		// $valid->set_rules('kode','Kode','required');
		// $valid->set_rules('kualifikasi','Kualifikasi','required');

		if($valid->run() === FALSE) {

			$item = $this->mSewaalat->get_item_by_id($id);
			
			$data = array(	'title'		=> 'Sewa Alat - Update Item',
							'item'		=> $item,
							'isi'		=> 'admin/sewaalat/item_update');

			$this->load->view('admin/layout/wrapper',$data);

		} else {


			if (empty($_FILES['image']['name'])){
				# If img empty
				# Update data without img

				$i = $this->input;
				
				$data = array(		
								'nama'		=> $i->post('nama'),		
								'merk'	=> $i->post('merk'),					
								'tahun'		=> $i->post('tahun'),	
								'jml'		=> $i->post('jml'),					
							);

				$this->mSewaalat->update_item_by_id($id,$data);		
				$this->session->set_flashdata('sukses','Success');
				redirect(base_url('admin/sewaalat/item'));
			} else {

				# Img Upload
				$config['upload_path'] 		= './assets/upload/image/';
				$config['allowed_types'] 	= 'jpeg|jpg|png';
				$config['max_size']			= '5000'; // KB			
				$this->load->library('upload', $config);

				if(! $this->upload->do_upload('image')) {

					$item = $this->mSewaalat->get_item_by_id($id);
					
					$data = array(	'title'	 	=> 'Sewa Alat - Update Item',
									'item'		=> $item,
									'error'			=> $this->upload->display_errors(),
									'isi'		=> 'admin/sewaalat/item_update');
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
									'nama'		=> $i->post('nama'),		
									'merk'	=> $i->post('merk'),					
									'tahun'		=> $i->post('tahun'),	
									'jml'		=> $i->post('jml'),		
									'image'		=>	$upload_data['uploads']['file_name'],				
								);

					$this->mSewaalat->update_item_by_id($id,$data);		
					$this->session->set_flashdata('sukses','Success');
					redirect(base_url('admin/sewaalat/item'));
				}
			}
		}
	}

	public function delete_item($id){
		$site 	  	 = $this->mConfig->list_config();

		$this->mSewaalat->delete_item_by_id($id);		
		$this->session->set_flashdata('sukses','Success');
		redirect(base_url('admin/sewaalat/item'));
	}

					
}