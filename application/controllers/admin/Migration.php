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
                $current = $this->db->get('migrations')->row('version');
                
                echo('migration done');
                echo('<br>');
                echo('Current Version : '.$current);

            }

            echo('<br>');
            echo('<br>');

            echo "migration List : ";
            echo "<pre>";
            var_dump($this->migration->find_migrations());
            echo "</pre>";
    }

}