<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	public function index()
	{
		if($this->session->userdata('email')!='')
		{	
			$this->welcome();
		}
		else 
		{
			$this->load->view('users/create');
		}	
	}
	public function edit()
	{
		
		$data['email']=$this->session->userdata('user_email');
		$data['pass']=$this->session->userdata('user_pass');
		
		$this->load->view('users/edit',$data);
// 		var_dump($this->session->userdata('user_pass'));
// 		var_dump($this->session->userdata('user_email'));
// 		var_dump($email);
// 		die('xxxxxxx');
		
		$result=$this->users_model->edit($data['email']);
	}
	public function login()
	{
		$email = $this->input->post('email');
		$pass = md5($this->input->post('password'));
// 		var_dump($pass);
// 		die(xxxxxxxx);
		$result = $this->users_model->login($email,$pass);
		if($result) $this->welcome();
		else $this->index();
	}
	public function logout()
	{
		$newdata =array(
			'user_id'=>'',
			'user_email'=>'',
			'user_pass'=>'',
			'login'=>FALSE
		);
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		$this->index();
	}
	public function thank()
	{
// 			$data['title']= 'Thanks';
		$this->load->view('users/thank_view');
	}
	public function welcome()
	{
		$this->load->view('users/welcome_view');
	}
	public function create()
	{	
		
// 		$data['title'] = "Create new user";
		
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
		if($this->form_validation->run()===FALSE)
		{
			$this->load->view('users/create');
		}
		else
		{
			$this->users_model->set_users();
			$this->thank();
// 			var_dump( $this->input->post());
// 			redirect('users/index','refresh');
		}
	}
	
// 	How to get $_POST, 
}