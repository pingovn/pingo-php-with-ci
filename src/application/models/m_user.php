<?php
/**
 * Created by PhpStorm.
 * User: Storm
 * Date: 11/2/14
 * Time: 10:55 PM
 */
class M_user extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function insert_user($data)
    {
        $this->db->insert('users', $data);
    }
    function login($email, $password)
    {
        $this -> db -> select('id, email, password');
        $this -> db -> from('users');
        $this -> db -> where('email', $email);
        $this -> db -> where('password', MD5($password));
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
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