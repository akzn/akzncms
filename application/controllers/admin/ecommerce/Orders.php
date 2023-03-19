<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Orders extends CI_Controller
{

    private $num_rows = 10;

    public function __construct()
    {
        parent::__construct();
        $this->admin_login->cek_login();
        $this->load->model(array(
            'Admin/Products_model', 
            'Admin/ShopCategories_model',
            'Admin/Orders_model'));

    }

    public function index($page = 0)
    {   
        $pagination_uri = 'admin/orders/';
		$page = $this->uri->segment(3);
		$page_segment = 3;
		$num_rows = 10;
        $order_data = $this->Orders_model->getAll($num_rows, $page);

        $rowscount = $this->Orders_model->orderCounts();
        
        $links_pagination = pagination( $pagination_uri, $rowscount, $num_rows, $page_segment);

        /* Render Page */
        $site = $this->mConfig->list_config();

        $data = array(
        'order' => $order_data,
        'links_pagination' => $links_pagination,
        );
        $data['title'] = 'Daftar Pesanan';
        $data['site'] = $site;
        $data['isi'] = 'admin/orders/order_list';
        
        $this->load->view('admin/layout/wrapper',$data);
    }
}