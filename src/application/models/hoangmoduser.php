<?php
class Hoangmoduser extends CI_Model
{
	
	function _construct()
	{
		
		parent::_construct();
	}
	
	public function getUserByEmail($email)
	{
		$user = $this->db->where('email', $email)->get('users', 1)->result_array();
		if (count($user) == 1) 
		{
			return $user[0];
		} else {
			return false;
		}
	}
	
	
	public function getUserById($id)
	{
		$user = $this->db->where('id', $id)->get('users', 1)->result_array();
		if (count($user) == 1)
		 {
			return $user[0];
		} else {
			return false;
		}
	}
	
	
	public function adduser()
	{
		 
		$data=array('email'=>$this->input->post('email'), 'password'=>md5($this->input->post('password')));
		if ($this->getUserByEmail($data['email']) !== false)
		{
			return false;
		}
		$this->db->insert('users',$data);
		return true;
		 
	}
	
	public function updateUser(array $user)
	{
		$where = array('id' => $user['id']);
		unset($user['id']);
		return $this->db->update('users', $user, $where);
	}
	
	 function login($email, $password)
	 {
	 		$this->db->where("email", $email);
	 		$this->db->where("password",$password);
	 		$query=$this->db->get("users");
	 		if($query->num_rows()>0)
	 		{
	 			
	 			foreach ($query->result() as $rows)
	 			{
	 				$newdata=array ('email'=> $rows->email,
	 				'password'=> $rows->password);
	 				
	 			}
	 			$this->session->set_userdata($newdata);
	 			return TRUE;
	 		}
	 		return FALSE;
	 }
	 
	 
	
}