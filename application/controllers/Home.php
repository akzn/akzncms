<?php
/*

@Class Name : Home(Front)
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	
	// Main Page Home
	public function index() {

		$this->load->model('products_model');
		$pages = $this->mPages->detailPagebyName('home');

		$site  	= $this->mConfig->list_config();
		$slider = $this->db->select()->get('config_slider')->result();
		$galleries  = $this->mGalleries->listGalleriesPubHome();

		# attachment
		$this->db->select('a.title,a.image,b.name as categori_name, a.url, a.description');
		$this->db->join('product_categories b', "a.shop_categorie = b.id");
		// $this->db->where('b.sub_for',11);
		// $this->db->or_where('b.id',11);
		$this->db->order_by('rand()');
		$this->db->limit(10);
		$randomProductItems = $this->db->get('products a')->result();

		// truncate description to minimalize output
		foreach ($randomProductItems as $key) {
			preg_match('/^([^.!?]*[\.!?]+){0,1}/', strip_tags($key->description), $abstract);
			$key->description = $abstract[0];
		}

		# spareparts
		$this->db->select('a.title,a.image,b.name as categori_name, a.url');
		$this->db->join('product_categories b', "a.shop_categorie = b.id");
		$this->db->where('b.sub_for',15);
		$this->db->or_where('b.id',15);
		$this->db->limit(10);
		$product_spareparts = $this->db->get('products a')->result();

		# testimonial
		// $this->db->limit(4);
		// $testimonials = $this->db->get('testimonials')->result();

		# section video
		$videos = $this->db->limit(4)->order_by('gallery_id','desc')->where('type','video')->get('galleries')->result();


		$clients = $this->mClients->get_clients_all();

		// $products = $this->products_model->getProducts();

		$data = array(	
						'page' 		=> 'Home',
						'title'		=> $site['nameweb'] .' - '. $site['metatitle'],
						'meta_desc' => isset($pages) ? langify($pages['metatext']) : langify($site['metatext']),
						'site'		=> $site,
						'slider'	=> $slider,
						'galleries'	=> $galleries,

						'randomProductItems' => $randomProductItems,
						'spareparts' => $product_spareparts,

						'clients'	=> $clients,
						'videos'	=> $videos,
						'isi'		=> 'theme/'.$this->config->item('theme').'/home/home');



		$this->load->view('theme/'.$this->config->item('theme').'/layout/wrapper',$data);
	}

	public function maintenance(){
		$this->output->set_status_header('503'); 
		$data['site'] = $this->mConfig->list_config();
     	$this->load->view('maintenance',$data);
	}
}