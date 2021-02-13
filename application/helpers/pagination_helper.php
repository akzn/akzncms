<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function pagination($url, $rowscount, $per_page, $segment = 2)
{
    $ci = & get_instance();
    $ci->load->library('pagination');

    $config = array();
    // $config["base_url"] = LANG_URL . '/' . $url;
    $config["base_url"] = base_url() . '/' . $url;
    $config["total_rows"] = $rowscount;
    $config["per_page"] = $per_page;
    $config["uri_segment"] = $segment;
    $config['full_tag_open'] = '<nav><ul class="pagination">';
    $config['full_tag_close'] = '</ul></nav>';
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close'] = '</span></li>';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';
    $config['first_link'] = '<span title="First Page"><i class="fa fa-backward"></i></span>';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';
    $config['last_link'] = '<span title="Last Page"><i class="fa fa-forward"></i></span>';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';
    $config['next_link'] = '<span title="Next"><i class="fa fa-chevron-right"></i></span>';
    $config['prev_link'] = '<span title="Previous"><i class="fa fa-chevron-left"></i></span>';
    $config['reuse_query_string'] = TRUE;
    $config['attributes'] = array('class' => 'page-link');
    $ci->pagination->initialize($config);
    return $ci->pagination->create_links();
}
