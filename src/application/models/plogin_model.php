<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plogin_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate(){
        // 
        $email = $this->security->xss_clean($this->input->post('email'));
        $password = md5($this->input->post('password'));
        
        
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        
        // Run the query
        $query = $this->db->get('users');
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'id' => $row->id,
                    'email' => $row->email,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        
        return false;
    }
}
?>