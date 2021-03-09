<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {


	// Main Page Home
	public function index() {

		$site  	= $this->mConfig->list_config();

		$galleries = $this->mGalleries->listGalleries();
		$pages = $this->mPages->detailPagebyName('projects');

		$content = langify($pages['content']);

		$data = array(	
						'page' 		=> 'Projects',
						'title'		=> 'Projects - '.$site['nameweb']. ' - ' .$pages['metatitle'],
						'meta_desc' => $pages['metatext'],
						'site'		=> $site,
						'isi'		=> 'theme/zie/projects/projects',
						'projects'	=> $galleries,
						'description' => $content
				);



		$this->load->view('theme/'.$this->config->item('theme').'/layout/wrapper',$data);
	}

	/*ajax*/
	public function fetch_posts(){
		if (isset($_POST['getData']) && !empty($_POST['getData'])) {
			
		    $start = $this->input->post('start');
		    $limit = $this->input->post('limit');

		    /*For filtering service type on gallery_description*/
		    // $q = '['.'2d-3d-animation'.']';
		    if (isset($_POST['q'])) {
		    	$q = '['.$this->input->post('q').']';
		    	$que = "AND gallery_description like '%".$q."%'";
		    	$rep_gallery_description = ",replace(gallery_description,'$q','') as gallery_description";
		    } else {
		    	$que='';
		    	$rep_gallery_description='';
		    }

		    // $query = "SELECT * FROM galleries where position='project' order by gallery_id desc LIMIT $start, $limit";

		    $query = "SELECT * $rep_gallery_description FROM galleries where position='project' $que order by gallery_id desc LIMIT $start, $limit";
		    // $query = "SELECT * $rep_gallery_description FROM galleries where position='project' $que order by gallery_id desc ";

		    $result = $this->db->query($query);

		    foreach ($result->result() as $key) {	
		    	$key->gallery_name = ucwords($key->gallery_name);
		    	$key->gallery_description = preg_replace('#([).*?(])#', '', $key->gallery_description);
		    	$key->gallery_description_short = preg_replace('/\[(.*?)\]/', '',substr_replace($key->gallery_description,"...",200));
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