<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {


	public function index()
	{
		
		$site  = $this->mConfig->list_config();
		$pages = $this->mPages->detailPagebyName('about');
		// $about = $this->mConfig->get_about();

		$data = array(	
			'title' => 'About Us - '.$site['nameweb']. ' - ' .$pages['metatitle'],
			'meta_desc' => $pages['metatext'],
			'site' 	=> $site,
						'isi'		=> 'theme/'.$this->config->item('theme').'/about/about',
					);
		$this->load->view('theme/'.$this->config->item('theme').'/layout/wrapper',$data);

	}

	public function milestones()
	{
		
		$site  		= $this->mConfig->list_config();

		$data = array(	
			'site' 	=> $site,
			'isi' 	=> 'front2/about/milestones',
			'title'		=> 'Milestones - '.$site['nameweb'],
		);
		
		$this->load->view('front2/layout/wrapper',$data);
	}

	public function contact() {
		
		$site  		= $this->mConfig->list_config();
		$gallery    = $this->mGalleries->listGalleryPubProfile();
		$blogs		= $this->mBlogs->listBlogsPub();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('name','Name','required');
		$valid->set_rules('email','Email','required');
		$valid->set_rules('subject','Subject','required');
		$valid->set_rules('messages','Messages','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Kontak Kami - '.$site['nameweb'],
						'site'	=> $site,
						'blogs'	=> $blogs,
						'gallery'=> $gallery,
						'isi'	=> 'front2/kontak/list');
		$this->load->view('front2/layout/wrapper',$data);
		}else{

			$i = $this->input;
			$data = array(	'name'		=> $i->post('name'),
							'email'		=> $i->post('email'),				
							'subject'	=> $i->post('subject'),
							'email'		=> $i->post('email'),
							'messages'	=> $i->post('messages'),
							'date'		=> $i->post('date'),
						);
			$this->mContacts->sendMessage($data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('kontak'));
		}
	}
	
}