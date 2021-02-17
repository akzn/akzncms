<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	
	// Main Page
	public function index() {

		$site = $this->mConfig->list_config();
		$data = array(	'title'		=> 'Dashboard - '.$site['nameweb'],
						'admins'	=> $this->mStats->admins(),
						'blogs'		=> $this->mStats->blogs(),
						'products'	=> $this->mStats->products(),
						'clients'	=> $this->mStats->clients(),
						'galleries'	=> $this->mStats->galleries(),
						'downloads'	=> $this->mStats->downloads(), 	
						'contacts'	=> $this->mStats->contacts(), 	
						'isi'		=> 'admin/dashboard/list');

		$this->load->view('admin/layout/wrapper',$data);
	}
		
	// General Config
	public function config() {
		$site = $this->mConfig->list_config();
		
		// Validasi 
		$this->form_validation->set_rules('nameweb','Nama website','required');
		$this->form_validation->set_rules('email','Email','valid_email');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'General Settings - '. $site['nameweb'],
						'site'	=> $site,
						'isi'	=> 'admin/dashboard/config');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'config_id'	=> $i->post('config_id'),
							'nameweb'	=> $i->post('nameweb'),
							'address'	=> $i->post('address'),
							'email'		=> $i->post('email'),
							'keywords'	=> $i->post('keywords'),
							'metatext'	=> $i->post('metatext'),
							'about'		=> $i->post('about'),
							'phone_number'=> $i->post('phone_number'),
							'fax'		=> $i->post('fax'),
						);
			$this->mConfig->edit_config($data);
			$this->session->set_flashdata('sukses','Konfigurasi telah diupdate');
			redirect(base_url('admin/settings/config'));
		}
	}

	// Config Social
	public function social() {

			$site = $this->mConfig->list_config();

			$this->form_validation->set_rules('id','something','required');

			if($this->form_validation->run() === FALSE) {

			$data = array(	'title'	=> 'Social Campaign - '. $site['nameweb'],
							'site'	=> $site,
							'isi'	=> 'admin/dashboard/social');
			$this->load->view('admin/layout/wrapper',$data);
			
			}else{
			
			$i = $this->input;
			$data = array(	'config_id'	=> $i->post('config_id'),
							'facebook'	=> $i->post('facebook'),
							'twitter'	=> $i->post('twitter'),
							'google_plus'=> $i->post('google_plus'),
							'instagram'	=> $i->post('instagram'),
							'pinterest'	=> $i->post('pinterest'),
							'youtube'	=> $i->post('youtube'),
							'linkedin'	=> $i->post('linkedin')
						);
			$this->mConfig->edit_config($data);
			$this->session->set_flashdata('sukses','Configuration has updated');
			redirect(base_url('admin/settings/social'));
		}
	}

	// Config Locations
	public function locations() {

			$site = $this->mConfig->list_config();

			$this->form_validation->set_rules('google_maps','Google Maps Frame','required');

			if($this->form_validation->run() === FALSE) {

			$data = array(	'title'	=> 'Locations - '. $site['nameweb'],
							'site'	=> $site,
							'isi'	=> 'admin/dashboard/locations');
			$this->load->view('admin/layout/wrapper',$data);
			
			}else{
			
			$i = $this->input;
			$data = array(	'config_id'	=> $i->post('config_id'),
							'google_maps'=> $i->post('google_maps'),
						);
			$this->mConfig->edit_config($data);
			$this->session->set_flashdata('sukses','Configuration has updated');
			redirect(base_url('admin/dashboard/locations'));
		}
	}		
	
	// Config Logo
	public function logo() {
		$site = $this->mConfig->list_config();
		
		$v = $this->form_validation;
		$v->set_rules('config_id','ID Config','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '5000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('logo')) {
				
		$data = array(	'title'	=> 'Config Logo',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/dashboard/logo');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 166; // Pixel
				$config['height'] 			= 120; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site['logo']);
				unlink('./assets/upload/image/thumbs/'.$site['logo']);
				// End hapus gambar lama
				// Masuk ke database
				$i = $this->input;
				$data = array(	'config_id'		=> $i->post('config_id'),
								'logo'			=> $upload_data['uploads']['file_name']
							);
				$this->mConfig->edit_config($data);
				$this->session->set_flashdata('sukses','Konfigurasi Telah Diupdate');
				redirect(base_url('admin/dashboard/logo'));
		}}
		// Default page
		$data = array(	'title'	=> 'Config Logo',
						'site'	=> $site,
						'isi'	=> 'admin/dashboard/logo');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	// Config Icon
	public function icon() {
		$site = $this->mConfig->list_config();
		
		$v = $this->form_validation;
		$v->set_rules('config_id','ID Konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '5000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('icon')) {
				
		$data = array(	'title'	=> 'Config Icon',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/dasbor/icon');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
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
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site['icon']);
				unlink('./assets/upload/image/thumbs/'.$site['icon']);
				// End hapus gambar lama
				$this->image_lib->resize();
				// Masuk ke database
				$i = $this->input;
				$data = array(	'config_id'		=> $i->post('config_id'),
								'icon'			=> $upload_data['uploads']['file_name']
								);
				$this->mConfig->edit_config($data);
				$this->session->set_flashdata('sukses','Konfigurasi Telah Diupdate');
				redirect(base_url('admin/dashboard/icon'));
		}}
		// Default page
		$data = array(	'title'	=> 'Config Icon',
						'site'	=> $site,
						'isi'	=> 'admin/dashboard/icon');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	// Config Site
	public function site() {

			$site = $this->mConfig->list_config();

			$this->form_validation->set_rules('admin_show_link','admin show link','required');

			if($this->form_validation->run() === FALSE) {

			$data = array(	'title'	=> 'Site Settings',
							'site'	=> $site,
							'isi'	=> 'admin/settings/site');
			$this->load->view('admin/layout/wrapper',$data);
			
			}else{
			$i = $this->input;
			$data = array(	'config_id'	=> $i->post('config_id'),
							'admin_show_link'=> $this->input->post('admin_show_link'),
						);
			$this->mConfig->edit_config($data);
			$this->session->set_flashdata('sukses','Configuration has updated');
			redirect(base_url('admin/settings/site'));
		}
	}		

	// Config Slider
	public function slider() {
		// var_dump($_POST);



		$site = $this->mConfig->list_config();
		$slider = $this->db->select()->get('config_slider')->result();
		// var_dump($slider[0]->slider_image);

		$data = array(	'title'	=> 'Slider Setting',
							'site'	=> $site,
							'isi'	=> 'admin/settings/slider');

		// var_dump($_POST['submit']);

		if (!(isset($_POST['submit']))) {
			$data['slider'] = $slider;
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			# upload and resize/ compress image 
			if( !empty( $_FILES ) )
			{
			    $config['upload_path'] = './img/slider/'; //path folder
			    $config['allowed_types'] = 'jpg|jpeg|png'; //type yang dapat diakses bisa anda sesuaikan
			    // $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload


			    $this->load->library('upload');

			    $images = array();
			    $files = $_FILES['slider'];

			    $message = array();

			    foreach ($files['name'] as $key => $image) {
			    	unset($_FILES);
		            $_FILES['images']['name']= $files['name'][$key];
		            $_FILES['images']['type']= $files['type'][$key];
		            $_FILES['images']['tmp_name']= $files['tmp_name'][$key];
		            $_FILES['images']['error']= $files['error'][$key];
		            $_FILES['images']['size']= $files['size'][$key];

		            $file_ext = pathinfo($_FILES["images"]["name"], PATHINFO_EXTENSION);

		            $keyname = $key+1;
		            // $fileName =  'slider-'. ($keyname).'.jpg';
		            $fileName = md5(date('ymdhis').$key);


		            // $images[] = $fileName;

		            $config['file_name'] = $fileName;
		            $this->upload->initialize($config);
		            
		            if(!empty($_FILES['images']['name'])){
		            	if ($this->upload->do_upload('images')){
		            		# resize & Compress Image
		            		$gbr = $this->upload->data();

		            		$config_resize['image_library']='gd2';
			                $config_resize['source_image']='./img/slider/'.$gbr['file_name'];
			                $config_resize['create_thumb']= FALSE;
			                $config_resize['maintain_ratio']= true;
			                $config_resize['quality']= '50%';
			                $config_resize['width']= 1280;
			                // $config_resize['height']= 400;
			                $config_resize['new_image']= './img/slider/'.$gbr['file_name'];
			                $this->load->library('image_lib', $config_resize);
			                $this->image_lib->resize();

			                $this->db->where('slider_id',$keyname)->update('config_slider',array('slider_image' => $fileName.'.'.$file_ext));
			                unlink($config['upload_path'].$slider[$key]->slider_image);

		            		$message[] = "upload ".$_FILES['images']['name']." sukses";
		            		$message[] = "<br>";
		            	} else {
			                $message[] = "upload ".$_FILES['images']['name']." gagal";
			                $message[] = $this->upload->display_errors();
			            }
		            }
		        }

		        # update slider title and desc
		        foreach ($this->input->post('heading') as $index => $value) {
		         	$heading = $value;
		         	$desc = $this->input->post('description')[$index];

		         	$data_slider = array(
		         		'slider_title' => $heading, 
		         		'slider_description' => $desc,
		         	);

		         	$this->db->where('slider_id',$index+1)->update('config_slider',$data_slider);
		        } 
		        $message[] = '<br>';
		        $message[] = 'Text Berhasil Diupdate';
		        // exit();

		        $newresult = implode("\n",$message);
		        $this->session->set_flashdata('sukses',$newresult);
		        redirect(base_url('admin/settings/slider'));
			} 

		}

		// if (!(isset($_POST['submit']))) {
		// 	$data['slider'] = $slider;
		// 	$this->load->view('admin/layout/wrapper',$data);
		// } else {
		// 	# upload and resize/ compress image 
		// 	if( !empty( $_FILES ) )
		// 	{
		// 	    $config['upload_path'] = './img/slider/'; //path folder
		// 	    $config['allowed_types'] = 'jpg|jpeg|png'; //type yang dapat diakses bisa anda sesuaikan
		// 	    // $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload


		// 	    $this->load->library('upload');

		// 	    $images = array();
		// 	    $files = $_FILES['slider'];

		// 	    $message = array();

		// 	    foreach ($files['name'] as $key => $image) {
		// 	    	unset($_FILES);
		//             $_FILES['images']['name']= $files['name'][$key];
		//             $_FILES['images']['type']= $files['type'][$key];
		//             $_FILES['images']['tmp_name']= $files['tmp_name'][$key];
		//             $_FILES['images']['error']= $files['error'][$key];
		//             $_FILES['images']['size']= $files['size'][$key];

		//             $file_ext = pathinfo($_FILES["images"]["name"], PATHINFO_EXTENSION);

		//             $keyname = $key+1;
		//             // $fileName =  'slider-'. ($keyname).'.jpg';
		//             $fileName = md5(date('ymdhis').$key);


		//             // $images[] = $fileName;

		//             $config['file_name'] = $fileName;
		//             $this->upload->initialize($config);

		//             if(!empty($_FILES['images']['name'])){
		//             	if ($this->upload->do_upload('images')){
		//             		# resize & Compress Image
		//             		$gbr = $this->upload->data();

		//             		$config_resize['image_library']='gd2';
		// 	                $config_resize['source_image']='./img/slider/'.$gbr['file_name'];
		// 	                $config_resize['create_thumb']= FALSE;
		// 	                $config_resize['maintain_ratio']= true;
		// 	                $config_resize['quality']= '50%';
		// 	                $config_resize['width']= 1280;
		// 	                // $config_resize['height']= 400;
		// 	                $config_resize['new_image']= './img/slider/'.$gbr['file_name'];
		// 	                $this->load->library('image_lib', $config_resize);
		// 	                $this->image_lib->resize();

		// 	                $this->db->where('slider_id',$keyname)->update('config_slider',array('slider_image' => $fileName.'.'.$file_ext));
		// 	                unlink($config['upload_path'].$slider[$key]->slider_image);

		//             		$message[] = "upload ".$_FILES['images']['name']." sukses";
		//             		$message[] = "<br>";
		//             	} else {
		// 	                $message[] = "upload ".$_FILES['images']['name']." gagal";
		// 	                $message[] = $this->upload->display_errors();
		// 	            }
		//             }
		//         }

		//         // $data['slider'] = $this->db->select()->get('config_slider')->result();
		//         $newresult = implode("\n",$message);
		//         $this->session->set_flashdata('sukses',$newresult);
		//         redirect(base_url('admin/settings/slider'));
		// 	} else {
		// 		/*if no new image but heading and desc is present*/
		// 		echo "string";
		// 		var_dump($this->input->post('heading'));
		// 	}

		// }
				
	}	
	
}