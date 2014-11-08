<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hoang_user extends CI_Controller {
	
	function _construct()
	{
		parent::_construct();
		$this->load->helper('url');
		$this->load->database();
		
	}
	
	public function index()
	{
	
		$this->load->view('phatnguyen/theme3');
	}
	
	
    public function hoangregister()
    {
    	$this->load->model("hoangmoduser");
    	$errorMessage='';
        if (isset($_POST['btnsubmit']))
         {
            
            $email = $this->input->post('email');
            /**
            $this->load->helper('email');
            
            if (valid_email($email))
             {
                echo 'email is valid';
            } 
            
            else
             {
                echo 'email is not valid';
            }
			*/
            $password = $this->input->post('password');
            $repassword = $this->input->post('repassword');

            // Kiem tra email form name@domain.com	
            // So sanh password voi confirm password
            // Kiem tra email co ton tai 
            // Password > 6 ky tu
            
                       
            $uid = $this->hoangmoduser->adduser();
            
            
            if ($uid === false)
            {
            	$errorMessage = "Can not create new user. Please try again";
            }
             else 
            {
            return $this->hoanglogin();
            }
        }
        $this->load->view("layout/layout" , array('errorMessage ' => $errorMessage,
        		 'mainContent' => VIEW_PATH. '/hoang_register.php'));
        

    }

    function hoanglogin()
    {
        $this->load->view("layout/layout", array('mainContent'   => VIEW_PATH . '/hoang_login.php'));
        
    }
    
    function hoangupdate()
    {
    	$this->load->view("layout/layout", array('mainContent'   => VIEW_PATH . '/hoang_update.php'));
    
    }
    
    function hoanglogout()
    {
    	
    	
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */