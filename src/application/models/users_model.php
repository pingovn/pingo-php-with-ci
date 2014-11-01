<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_users($id = FALSE)
	{
		if($id === FALSE)
		{
			$query = $this->db->get('users');
			return $query->result_array();
		}
		$query = $this->db->get_where('users',array ('id' => $id));
		$query->row_array();
	}
	public function edit($email)
	{
		$this->db->where('email',$email);
		$query = $this->db->get('users');
		
	}
	public function login($email,$pass)
	{
		$this->db->where('email',$email);
		$this->db->where('password',$pass);
		$query = $this->db->get('users');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $rows)
			{
				$newses = array (
				'user_email'=>$rows->email,
				'user_pass' => $rows->password,
				'login' => TRUE
				);
			}
// 			var_dump($query->result());
// 			var_dump($newses);
// 			die('xxxxx');
			$this->session->set_userdata($newses);
			return true;
		}
		return false;
	}
	public function set_users()
	{
		$data = array(
			'email' => $this->input->post('email'),
			'password'=> md5($this->input->post('password'))
			);
		$this->db->insert('users',$data);
	}
}