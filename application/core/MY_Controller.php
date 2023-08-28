<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->theme_dir = 'theme/'.$this->config->item('theme').'/';
        $this->wrapper = $this->theme_dir.'layout/wrapper';

        // site data
        $site = $this->mConfig->list_config();
        $this->load->vars(array(
            'site' => $site
        ));

    }
}
