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

    public function login()
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
//     			var_dump($user);
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
            return $this->errorPage("User khong ton tai trang info");
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
    
    public function edit($userId=0)
    {

    	$this->load->helper('form');
    	$this->load->library('form_validation');
    	$userId=$this->uri->segment(3);
    	$loggedUser=$this->session->all_userdata();
    	$errorMessage ='';
    	
//     	var_dump($loggedUser);
//     	var_dump($this->session->all_userdata());
//     	var_dump($userId);
//     	die;
    	//     	var_dump($userSession['user_id']);
    	//     	die();
    	$post = $this->input->post();
    
    	if (!isset($post['btnEdit'])) 
    	{
    		if ($userId == 0)
    		{
    			var_dump($userId);
    			// Return error page
    			return $this->errorPage("User khong ton tai");
    		}
    		if ($userId != $loggedUser['userId'])
    		{
    			return $this->errorPage("Dont have permission to update other users's profile");
    		}
    		$user = $this->userModel->getUserById($userId);
    		if ($user === FALSE)
    		{
    			// Return error page
    			return $this->errorPage("User khong ton tai");
    		}
    	}
    	else
    	{
//     		var_dump($post);
//     		die;
//     		 var_dump($this->input->post('btnEdit'));
//              die;
//     		// Processing registering new account
    		$this->form_validation->set_rules ( 'txtFulName', 'fullName' );
    		$this->form_validation->set_rules ( 'age', 'Age', 'trim|is_natural|greater_than[10]|less_than[100]' );
    		if ($this->form_validation->run () === FALSE)
    		{
    			$this->load->view ( "layout/layout", array (
    					'mainContent' => VIEW_PATH . '/user/edit.php',
    					'errorMessage'  => $errorMessage,
    					'userId' => $userId
    			) );
    			return;
    		}
    		// Processing registering new account
    		$fullName = $this->input->post('txtFulName');
    		$age = $this->input->post('age');
    		$gender = $this->input->post('gender');
    	
    		// Kiem tra email form name@domain.com
    		// So sanh password voi confirm password
    		// Kiem tra email co ton tai
    		// Password > 6 ky tu
    		$user = array(
    				'id'			=>$loggedUser['userId'],
    				'gender'         => $gender,
    				'age'  			=> $age,
    				'fullname'		=> $fullName
    				
    		);
    	
    		$result = $this->userModel->updateUser($user);
//     		var_dump($userId);
// 			die();
    		if ($result === false) 
    		{
    			$errorMessage = "Can not create new user. Please try again";
    		} else 
    		{
    			redirect('/user/info/' . $user['id']);
    		}
    		 
    
    	}
    	$this->load->view("layout/layout", array(
    			'mainContent'   => VIEW_PATH . '/user/edit.php',
    			'userId' => $userId,
    			'errorMessage'  => $errorMessage,
    	));
    	//         echo "Load user info of userId {$userSession['user_id']} and display as user data form";
	}

	public function doUpload()
	{
		var_dump($this->input->post());
		die;
		$config ['upload_path'] = '/images/avatar/';
		$config ['allowed_types'] = 'gif|jpg|png';
		$config ['max_size'] = '100';
		$config ['max_width'] = '1024';
		$config ['max_height'] = '768';
		$this->load->library('upload',$config);
		$this->load->helper('form');
		$userId=$this->uri->segment(3);
		$loggedUser=$this->session->all_userdata();
		$errorMessage ='';
		 	
// 		    	var_dump($userSession['user_id']);
// 		    	var_dump($this->session->all_userdata());
// 		    	var_dump($userId);
// 		    	var_dump($loggedUser);
// 		    	die();
		
		if (!isset($post['btnUpload']))
		{
			
			if ($userId == 0)
			{
				var_dump($userId);
				// Return error page
				return $this->errorPage("User khong ton tai");
			}
			if ($userId != $loggedUser['userId'])
			{
				return $this->errorPage("Dont have permission to update other users's profile");
			}
			$user = $this->userModel->getUserById($userId);
			if ($user === FALSE)
			{
				// Return error page
				return $this->errorPage("User khong ton tai");
			}
		}
		else
		{
			var_dump($post);
			die;
			$userId = $loggedUser['userId'];
			if (!$this->upload->doUpload())
			{
				$errorMessage= "Can't upload file";
			
				$this->load->view("layout/layout", array(
    			'mainContent'   => VIEW_PATH . '/user/Upform.php',
    			'errorMessage'  => $errorMessage));
			} else {
				$data = array (
					'upload_data' => $this->upload->data());
			var_dump($data);
			die;
// 				$this->load->view ( 'upload_success', $data );
			}
			$oldAvt=$loggedUser['avatar'];
			//     		var_dump($post);
			//     		die;
			//     		 var_dump($this->input->post('btnEdit'));
			//              die;
			$user = array(
					'avatar'			=> $post['avatar'],		
			);
			 
			$result = $this->userModel->editAvt($user);
			//     		var_dump($userId);
			// 			die();
			if ($result === false)
			{
				$errorMessage = "Can not updata avatar. Please try again";
			} else
			{
				
				redirect('/user/info/' . $user['id']);
			}
			 
		
		}
		$this->load->view("layout/layout", array(
				'mainContent'   => VIEW_PATH . '/user/Upform.php',
				'userId' => $userId,
				'errorMessage'  => $errorMessage,
		));
		//         echo "Load user info of userId {$userSession['user_id']} and display as user data form";
		
	}
	public function changePass($userId=0)
	{
		
	}
	
   	protected function errorPage($errorMessage)
    {
        echo $errorMessage; die();
    }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */