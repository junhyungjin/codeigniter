<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->database();
		$this->load->model('topic_model');
		log_message('debug', 'topic초기화');
	}

	public function index(){
		$this->_head();
		$this->load->view('main');
		$this->load->view('footer');
	}

	function get($id){
		log_message('debug','get 호출');
		$this->_head();
		$topic = $this->topic_model->get($id);
		log_message('info', var_export($topic,1));

		if(empty($topic)){
			log_message('error', 'topic의 값이 없습니다');
			show_error('topic의 값이 없습니다');
		}
		$this->load->helper(array('url', 'HTML', 'korean'));
		log_message('debug', 'get view 로딩');
		$this->load->view('get',array('topic'=>$topic));
		log_message('debug','footer view 로딩');
		$this->load->view('footer');
	}

	function add(){

		// login
		// if didn't login, redirect to login page_missing
		// if login, go through
		if (true){
			$this->load->helper('url');
			redirect('/auth/login');
		}

		$this->_head();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', '제목', 'required');
		$this->form_validation->set_rules('description', '본문', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('add');
		}
		else
		{
			$topic_id = $this->topic_model->add($this->input->post('title'), $this->input->post('description'));
			$this->load->helper('url');
			redirect('/topic/get/'.$topic_id);

		}

		$this->load->view('footer');
	}

	function upload_receive(){
		$config['upload_path'] = './static/user';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload("user_upload_file"))
		{
			$error = array('error' => $this->upload->display_errors());

			echo $this->upload->display_errors();
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			echo "File upload success";
			var_dump($data);
		}

	}

	function upload_receive_from_ck(){
		$config['upload_path'] = './static/user';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload("upload"))
		{
			$error = array('error' => $this->upload->display_errors());

			echo $this->upload->display_errors();
		}
		else
		{

			$CKEditorFuncNum = $this->input->get('CKEditorFuncNum');

			$data = $this->upload->data();
			$filename = $data['file_name'];

			$url = '/static/user/'.$filename;

			echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction('".$CKEditorFuncNum."','".$url."','Transfer succeed')</script>";

		}

	}

	function upload_form(){
		$this->_head();
		$this->load->view('upload_form');
		$this->load->view('footer');
	}

	function _head(){
		var_dump($this->session->userdata('session_test'));
		$this->session->set_userdata('session_test','hjjun');

		$this->load->view('head');
		$topics = $this->topic_model->gets();
		$this->load->view('topic_list', array('topics'=>$topics));
	}
}
?>
