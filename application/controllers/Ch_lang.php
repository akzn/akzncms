<?php if ( ! defined('BASEPATH')) exit('Direct access allowed');
class Ch_lang extends CI_Controller
{
   public function __construct() {
       parent::__construct();
   }

   function _remap($param) {
        $this->index($param);
    }

   function index($language = "") {
      $language = ($language != "") ? $language : "english";
      $this->session->set_userdata('site_lang', $language);

      $cookie_name = "lang";
      $cookie_value = $language;
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

      redirect($_SERVER['HTTP_REFERER']);
   }
}
