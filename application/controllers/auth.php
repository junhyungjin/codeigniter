<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
  function __construct(){
    parent::__construct();
  }

  function login(){
    $this->load->view('head');
    $this->load->view('login');
    $this->load->view('footer');
  }

  function authentication(){
    var_dump($this->config->item('authentication'));
    echo "인증";
  }
}
?>
