<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        $this->admin_login->cek_login();
    }

    public function index()
    {
            $this->load->library('migration');

            if ($this->migration->current() === FALSE)
            {
                    show_error($this->migration->error_string());
            } else {
                echo('migration success');
            }
    }

}