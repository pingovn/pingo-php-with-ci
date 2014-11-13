<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plogin_model extends CI_Model{
	
	protected $tablename='';
	
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function getUserById($id)
    {
    	return $this->getById($id);
    }
    
    protected function getById($id)
    {
    	return $this->getByField('id', $id);
    }
    
    protected function getByField($fieldName, $fieldData)
    {
    	$row = $this->db->where($fieldName, $fieldData)->get($this->tableName, 1)->result_array();
    	if (count($row) == 1) {
    		return $row[0];
    	} else {
    		return false;
    	}
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