<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {


	// public function index(){
	// 	redirect(base_url());
	// }

	function _remap($method=null) {
		$category = array(
			'2d-3d-animation',
			'audio-visual',
			'design-graphic',
			'course-education'
		);
		if ($method==null)
	    {
	        $this->index('2d-3d-animation');
	    }
	    else if (in_array($method,$category))
	    {
	        $this->index($method);
	    }
	    else
	    {
	        $this->$method();
	    }
    }

	// Main Page Home
	public function index($param=null) {

		if (!$param) {
			redirect(base_url('services/2d-3d-animation'));
		}

		if ($param=='2d-3d-animation') {
			$title = '2d & 3d Animation';
		}elseif ($param=='audio-visual') {
			$title = 'Audio Visual';
		}elseif ($param=='design-graphic') {
			$title = 'Design Graphic';
		}elseif ($param=='course-education') {
			$title = 'Course & Education';
		}

		$site  	= $this->mConfig->list_config();

		// $galleries = $this->mGalleries->listGalleries();

		$data = array(	
						'page' 		=> 'Services',
						'category'	=> $param,
						'title'		=> $title.' - '.$site['nameweb'],
						'site'		=> $site,
						'isi'		=> 'theme/zie/services/services',
						// 'projects'	=> $galleries
				);



		$this->load->view('theme/'.$this->config->item('theme').'/layout/wrapper',$data);
	}

	
}