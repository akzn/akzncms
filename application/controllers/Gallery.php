<?php
	/*
    
    @Class Name : Gallery(Front)
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	private $num_rows = 20;
	function __construct(){
		parent::__construct();
		$this->load->model('gallery_model');
	}

	public function index(){
		$site  		= $this->mConfig->list_config();
		// $gallery = $this->gallery_model->getGalleries($this->num_rows);
		$gallery = $this->gallery_model->getGalleries();
		$pages = $this->mPages->detailPagebyName('gallery');
		

		$data = array(	
			'site' 	=> $site,
			'gallery' => $gallery,
			// 'title'		=> 'Gallery - '.$site['nameweb'],
			'title'		=> @$pages['metatitle'].' - '.$site['nameweb'],
			'meta_desc' => @$pages['metatext'],
			'isi' 	=> 'theme/'.$this->config->item('theme').'/gallery/gallery',
		);
		
		$this->load->view('theme/'.$this->config->item('theme').'/layout/wrapper',$data);
	}

	/*ajax*/
	public function fetch_posts(){
		if (isset($_POST['getData']) && !empty($_POST['getData'])) {
	
		    $start = $this->input->post('start');
		    $limit = $this->input->post('limit');

		    $query = "SELECT * FROM galleries order by gallery_id desc LIMIT $start, $limit";

		    $result = $this->db->query($query);

			if ($result->num_rows() > 0){
				echo json_encode($result->result());
			} else {
				$cb = array('result' => 'no-data', );
				echo json_encode($cb);
			}
		}
	}

}