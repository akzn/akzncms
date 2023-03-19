<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Transactions extends CI_Controller
{

    private $num_rows = 10;

    public function __construct()
    {
        parent::__construct();
        $this->admin_login->cek_login();
        $this->load->model('Admin/Payments_model');

    }

    public function index($page = 0)
    {   
        $pagination_uri = 'admin/transactions/';
		$page = $this->uri->segment(3);
		$page_segment = 3;
		$num_rows = 10;
        $payment_data = $this->Payments_model->getAll($num_rows, $page);

        $rowscount = $this->Payments_model->countAll();
        
        $links_pagination = pagination( $pagination_uri, $rowscount, $num_rows, $page_segment);

        /* Render Page */
        $site = $this->mConfig->list_config();

        $data = array(
        'payments' => $payment_data,
        'links_pagination' => $links_pagination,
        );
        $data['title'] = 'Daftar Transaksi';
        $data['site'] = $site;
        $data['isi'] = 'admin/transactions/transaction_list';
        
        $this->load->view('admin/layout/wrapper',$data);
    }
}