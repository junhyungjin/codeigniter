<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic extends CI_Controller {

	public function index()
	{
		$this->load->database();
		$this->load->model('topic_model');
		$data = $this->topic_model->gets();

		$this->load->view('head');
		$this->load->view('main', array('topics'=>$data));
		$this->load->view('footer');
	}

	function get($id){
		$this->load->view('head');
		$this->load->view('get',array('id'=>$id));
		$this->load->view('footer');
	}
}
?>
