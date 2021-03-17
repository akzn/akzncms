<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*class LanguageLoader
{
   function initialize() {
       $ci =& get_instance();
       $ci->load->helper('language');
       $ci->lang->load('menu','english');
   }
}*/

class LanguageLoader
{
   function initialize() {
       $ci =& get_instance();
       $ci->load->helper('language');


	    // if ($_GET['l']=='id') {
	    // 	$ci->session->set_userdata('site_lang','indonesian');
	    // } else {
	    // 	$ci->session->set_userdata('site_lang','english');
	    // }


      // $siteLang = $ci->session->userdata('site_lang');
      // if(!isset($_COOKIE['lang'])) {
      //   echo "Cookie named '" . $cookie_name . "' is not set!";
      // } else {
      //   echo "Cookie '" . $cookie_name . "' is set!<br>";
      //   echo "Value is: " . $_COOKIE[$cookie_name];
      // }

      $siteLang = (isset($_COOKIE['lang'])) ? $_COOKIE['lang'] : $ci->config->item('language');

      if ($siteLang) {
          $ci->lang->load('menu',$siteLang);
          $ci->lang->load('heading',$siteLang);
          $ci->lang->load('slider',$siteLang);
          $ci->lang->load('landing_page',$siteLang);
      } else {
          $ci->lang->load('menu',$ci->config->item('language'));
          $ci->lang->load('heading',$ci->config->item('language'));
          $ci->lang->load('slider',$ci->config->item('language'));
          $ci->lang->load('landing_page',$ci->config->item('language'));
      }

      // if ($siteLang == 'english') {
      //   $ci->lang->load('about',$siteLang);
      // }
   }
}
