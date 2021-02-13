<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {


	// Main Page Home
	public function index() {

		$site  	= $this->mConfig->list_config();

		$galleries = $this->mGalleries->listGalleries();

		$data = array(	
						'page' 		=> 'Projects',
						'title'		=> 'Projects - '.$site['nameweb'],
						'site'		=> $site,
						'isi'		=> 'theme/zie/projects/projects',
						'projects'	=> $galleries
				);



		$this->load->view('theme/'.$this->config->item('theme').'/layout/wrapper',$data);
	}

	/*ajax*/
	public function fetch_posts(){
		if (isset($_POST['getData']) && !empty($_POST['getData'])) {
	
		    $start = $this->input->post('start');
		    $limit = $this->input->post('limit');

		    $query = "SELECT * FROM galleries where position='project' order by gallery_id desc LIMIT $start, $limit";

		    // $query = "SELECT * FROM galleries where position='project' order by gallery_id desc";

		    $result = $this->db->query($query);

		    foreach ($result->result() as $key) {	
		    	$key->gallery_name = ucwords($key->gallery_name);
		    	$key->gallery_description_short = substr_replace($key->gallery_description,"...",200);
		    	if ($key->type == 'image') {
		    		$key->src_url = base_url('img/gallery/').$key->image;
		    	} else {
		    		$key->src_url = $key->video_url;
		    	}
		    }

			if ($result->num_rows() > 0){
				echo json_encode($result->result());
			} else {
				$cb = array('result' => 'no-data', );
				echo json_encode($cb);
			}
		}
	}
}