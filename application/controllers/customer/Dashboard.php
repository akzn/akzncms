<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

		$this->load->library('ion_auth');

		if (!($this->ion_auth->logged_in())) {
            redirect('login');
            die();
        }
	}

	public function index()
	{
		$this->load->library('ion_auth');
		
		$site  = $this->mConfig->list_config();

		$data = array(	
			'title' => 'dashboard - '.$site['nameweb'],
			'meta_desc' => $pages['metatext'],
			'userdata' => $this->ion_auth->user()->row(),
			'site' 	=> $site,
						'isi'		=> 'theme/'.$this->config->item('theme').'/customer/dashboard/dashboard',
					);
		$this->load->view('theme/'.$this->config->item('theme').'/layout/wrapper',$data);

	}

}