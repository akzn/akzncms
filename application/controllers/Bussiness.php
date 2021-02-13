<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bussiness extends CI_Controller {


	public function index()
	{
		
		$site  		= $this->mConfig->list_config();

		$data = array(	'site' 	=> $site,
						'isi' 	=>'front2/home/list',);

		$this->load->view('front2/layout/wrapper',$data);
	}

	public function konstruksi()
	{
		
		$site  		= $this->mConfig->list_config();
		$konstruksi = $this->mKonstruksi->get_konstruksi_text();
		$item = $this->mKonstruksi->get_item_all();

		$data = array(	
			'site' 	=> $site,
			'isi' 	=> 'front2/bussiness/konstruksi',
			'title'		=> 'Konstruksi - '.$site['nameweb'],
			'konstruksi' => $konstruksi,
			'item' => $item,
		);
		
		$this->load->view('front2/layout/wrapper',$data);
	}

	public function sewa_alat_berat()
	{
		
		$site  		= $this->mConfig->list_config();
		$sewaalat 	= $this->mSewaalat->get_sewaalat_text();
		$item 		= $this->mSewaalat->get_item_all();

		$data = array(	
			'site' 	=> $site,
			'isi' 	=> 'front2/bussiness/sewa',
			'sewaalat' => $sewaalat,
			'item' => $item,
			'title'		=> 'Sewa Alat - '.$site['nameweb'],
		);
		
		$this->load->view('front2/layout/wrapper',$data);
	}
	
}