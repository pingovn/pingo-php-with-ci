<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model("PingoModel");
        $this->load->library('session');
        $this->load->model("Users", "userModel");
    }

    public function register()
    {
    	$this->load->helper('form');
    	$this->load->library('form_validation');
        $errorMessage = '';
        $post  = $this->input->post();
        if (isset($post['btnRegister'])) {
//         var_dump($this->input->post('btnRegister'));
//         die;
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
    	$userId = $this->session->userdata('userId');
    	if (!empty($userId)) {
    		redirect('/user/info' . $this->session->userdata('userId'));
    	}
    	$result='';
    	$errorMessage = '';
    	$post  = $this->input->post();
    	if (isset($post['btnLogin'])) {
    		$email = $post['txtEmail'];
    		$this->load->helper('email');
    		if (!valid_email($email)) {
    			$errorMessage = 'Please input valid email';
    		} else {
    			$password = $post['txtPassword'];
    			$user = array(
    					'email'         => $email,
    					'password' 	 	=> $password
    			);
    			var_dump($user);
    			//     			die;
    			$loginResult = $this->userModel->login($user);
//     			var_dump($loginResult);
//     			die;
    			if ($loginResult === true) {
    				$userId = $this->session->userdata['userId'];
    				redirect('/user/info/' . $userId);
    			} else {
    				$errorMessage = 'Can not login with email and password inputted';
    			}
    		}
        	
//         return $this->info($this->session->all_userdata());
        }
        $this->load->view("layout/layout", array(
        		'mainContent'   => VIEW_PATH . '/user/login.php',
        		'errorMessage' =>$errorMessage
        ));
    }
    public function logout()
    {
    	$oldData =array(
    			'user_id'=>'',
    			'user_email'=>'',
    			'user_pass'=>'',
    			'login'=>FALSE
    	);
    	$userSession=$this->session->unset_userdata($oldData);
    	$this->session->sess_destroy();
    	redirect('');
    }

    public function info($userId=0)
    {
    	$userId =(int) $userId;
    	
//     	var_dump($userSession['user_id']);
//     	die();
//     	var_dump($this->session->userdata($user_data));
        if ($userId == 0) {
            // Return error page
            return $this->errorPage("User khong ton tai");
        }
        $user = $this->userModel->getUserById($userId);
        if ($user === FALSE) {
            // Return error page
            return $this->errorPage("User khong ton tai");
        }
        $this->load->view("layout/layout", array(
        		'mainContent'   => VIEW_PATH . '/user/info.php',
        		'user'  => $user,
        ));
//         echo "Load user info of userId {$userSession['user_id']} and display as user data form";

    }	

    protected function errorPage($errorMessage)
    {
        echo $errorMessage; die();
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */