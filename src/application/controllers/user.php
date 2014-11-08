<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model("PingoModel");
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model("Users", "userModel");
    }

    public function register()
    {
        
        $errorMessage = '';
        if (isset($_POST['btnRegister'])) {
            // Processing registering new account
       		$this->form_validation->set_rules ( 'txtEmail', 'Email', 'trim|required|valid_email' );
       		$this->form_validation->set_rules ( 'txtPassword', 'Password', 'trim|required|min_length[6]|max_length[32]' );
        	$this->form_validation->set_rules ( 'txtConfirmPasword', 'Password Confirmation', 'trim|required|matches[txtPassword]' );
        	if ($this->form_validation->run () === FALSE) 
        	{
        		$this->load->view ( "layout/layout", array (
        				'mainContent' => VIEW_PATH . '/user/register.php','errorMessage'  => $errorMessage
        		) );
        	return;
        	}
            // Processing registering new account
            $email = $this->input->post('txtEmail');
            $password = $this->input->post('txtPassword');
            $confirmPassword = $this->input->post('txtConfirmPassword');

            // Kiem tra email form name@domain.com
            // So sanh password voi confirm password
            // Kiem tra email co ton tai 
            // Password > 6 ky tu
            $user = array(
                'email'         => $email,
                'password'  => $password
            );

            $userId = $this->userModel->createUser($user);
			
            if ($userId === false) {
                $errorMessage = "Can not create new user. Please try again";
//                 var_dump($userId);
//                 die();
            } else {
                return $this->login();    
            }
        }
        $this->load->view ( "layout/layout", array (
        				'mainContent' => VIEW_PATH . '/user/register.php','errorMessage' => $errorMessage));
      
    }

    function login()
    {
    	$result='';
        if (isset($_POST['btnLogin'])) {
        	$email = $this->input->post('txtEmail');
        	$pass = md5($this->input->post('txtPassword'));
        	$user = array(
        			'email'         => $email,
        			'password' 	 	=> $pass
        	);
        	$result = $this->userModel->login($user);
//         	var_dump($result);
//         	die('xxxxxxxx');
        }
        if($result === TRUE) return $this->info($this->session->userdata('user_id'));
        else
        {
//         	var_dump($result);
//         	die('xxxxxxxx');
        	$this->load->view("layout/layout", array(
        			'mainContent'   => VIEW_PATH . '/user/login.php','errorMessage' =>$result
        	));
        return;
        }
        $this->load->view("layout/layout", array(
        		'mainContent'   => VIEW_PATH . '/user/login.php','errorMessage' =>$result
        ));
    }

    public function info($userId)
    {
        if ($userId == 0) {
            // Return error page
            return $this->errorPage("User khong ton tai");
        }
        $this->load->view("layout/layout", array(
        		'mainContent'   => VIEW_PATH . '/user/show.php'
        ));
        echo "Load user info of userId {$userId} and display as user data form";

    }	

    protected function errorPage($errorMessage)
    {
        echo $errorMessage; die();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */