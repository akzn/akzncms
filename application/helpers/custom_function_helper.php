
<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
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

function truncate_text($text, $limit) {
  $words = explode(' ', strip_tags($text));
  if (count($words) > $limit) {
      $text = implode(' ', array_slice($words, 0, $limit));
      $text .= '...';
  }
  return $text;
}

