<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic extends CI_Controller {

	public function index()
	{
		$this->load->view('head');
		$this->load->view('topic');
		$this->load->view('footer');
	}

	public function get($id){
		$data = array('id'=>$id);
		$this->load->view('head');
		$this->load->view('get',$data);
		$this->load->view('footer');
	}
}
?>