<?php

/**
* 
*/
class Muser extends CI_Model
{
	
	public function __construct()
	{
		parent:: __construct();
		$this->load->helper('url');
		$this->load->database();
	}

	public function insert_user($data)
	{
		$this->db->insert('users',$data);
	}

	public function login($email, $password)
    {
    	$this -> db -> select('id, email, password');
        $this -> db -> from('users');
        $this -> db -> where('email', $email);
        $this -> db -> where('password', MD5($password));
        $this -> db -> limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }


}

?>