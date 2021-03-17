<?php
	/*
    
    @Class Name : Blogs
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {

	function __construct() {
	    parent::__construct();
	}
	
	// List
	public function index() {

		$site  = $this->mConfig->list_config();
		$project_on_all = $this->mProject->get_ongoing();
		$project_fin_all = $this->mProject->get_finished();
		
		$data = array(	
						'page' 		=> 'Portfolio',
						'site'		=> $site,
						'title'		=> 'Portfolio - '.$site['nameweb'],
						'project_on_all'		=> $project_on_all,
						'project_fin_all'		=> $project_fin_all,
						'isi'		=> 'front2/portfolio/list');

		$this->load->view('front2/layout/wrapper',$data);
	}
					
}