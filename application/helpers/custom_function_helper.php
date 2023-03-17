<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!function_exists('alert_html')) {
	function alert_html(){
		$CI =& get_instance();
		
		if ($CI->session->flashdata('alert')): ?>
	      <div class="alert alert-<?=$CI->session->flashdata('alert')['type']?> alert-dismissible" role="alert">
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <?php if (isset($CI->session->flashdata('alert')['message']->message)): ?>
	          <?=$CI->session->flashdata('alert')['message']->message?>
	          <?php else: ?>
	            <?=$CI->session->flashdata('alert')['message']?>
	        <?php endif; ?>
	        <?php if (isset($CI->session->flashdata('alert')['message']->data)){
	          echo "<br /><br /><pre>";
	          var_dump($CI->session->flashdata('alert')['message']->data);
	          echo "</pre>";
	        }; ?>
	      </div>
	  <?php endif; 
	}
}

if (!function_exists('ion_userdata')) {
	function ion_userdata(){
		$CI =& get_instance();

		$CI->load->library('ion_auth');
    
    if ($CI->ion_auth->logged_in()) {
      $name = $CI->ion_auth->user()->row()->first_name;
      $first_name = strtok($name, " ");

      $data = array(
        'full_name' => $name,
        'first_name' => $first_name
      );

      return (object)$data;
    }
    return false;

  }
}



function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function langify($string){
  $ci =& get_instance();
  $ci->load->helper('language');

  $siteLang = (isset($_COOKIE['lang'])) ? $_COOKIE['lang'] : $ci->config->item('language');

  if ($siteLang == 'indonesian') {
    $content = get_string_between($string,'[id]','[/id]');
  } else {
    $content = get_string_between($string,'[en]','[/en]');
  }

  if ($content=='') {
    $content = $string;
  }

  return $content;
}

function html_lang(){
  $ci =& get_instance();
  $ci->load->helper('language');
  $siteLang = (isset($_COOKIE['lang'])) ? $_COOKIE['lang'] : $ci->config->item('language');

  if ($siteLang == 'indonesian') {
    $lang = 'id';
  } else {
    $lang = 'en';
  }

  return $lang;
}

function is_home(){
  $ci =& get_instance();
  $is_home = ($ci->router->method === $ci->router->default_controller) ? true : false;
  echo $ci->router->method;
  echo $ci->router->default_controller;
  return $is_home;

}

if (!function_exists('generate_code')) {
  function generate_code($prefix = null, $length = 8)
  {
    $date = date('Ymd');
     
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    
    $randomString = $date.$randomString;

    if ($prefix != null) {
      $randomString = $prefix.$randomString;
    }
    return $randomString;
  }
}

if (!function_exists('brief_desc')) {
  # code...
  function brief_desc($text){
    preg_match('/^([^.!?]*[\.!?]+){0,3}/', strip_tags($text), $abstract);
		return $abstract[0];
  }
}

if (!function_exists('calc_monthly_payment')) {
  # code...
  function calc_monthly_payment($params){
    $params['interest'] = $params['interest'] / 100;
    
    $pokok_pinjaman = $params['price'] - $params['down_payment'];
    $pokok_angsuran = $pokok_pinjaman / $params['tenor'];
    $bunga_angsuran = ($pokok_pinjaman * $params['interest']) / $params['tenor'];

    $total_angsuran_bulanan = $pokok_angsuran + $bunga_angsuran;
    // php_prettify($pokok_pinjaman);
    // php_prettify($pokok_angsuran);
    // php_prettify($bunga_angsuran);
    return $total_angsuran_bulanan;
  }
}

if (!function_exists('temp_tenor_list')) {
  function temp_tenor_list(){
    $tenors_year = [1,5,10,15,20,25,30];

    foreach ($tenors_year as $value) {
      $tenors_months[] = array(
        'years' => $value,
        'months' => $value * 12
      );
    }

    return $tenors_months;
  }
}

if (!function_exists('add_month')) {
  function add_month($date,$num)
  {
    $newDate = new DateTime($date.' + '.$num.' month');

    return date('Y-m-d',strtotime($newDate->format('d M Y')));
  }
}

function php_prettify($data){
  print("<pre>".print_r($data,true)."</pre>");
}


?>