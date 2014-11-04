<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class List_All_User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function index()
	{
		$this->load->Model("Muser");
		$data['query'] = $this->Muser->listall();
		$this->load->view('get_all',$data);
	}
}