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
        $this->load->helper(array('form', 'url'));
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

    public function login($userId=0)
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
    		if ($userId == 0|| !$loggedUser['userId'])
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
    		$this->form_validation->set_rules ( 'txtFulName', 'fullName','alpha_dash|min_length[6]|max_length[10]' );
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
//     		var_dump($userId);
// 			die();
    	
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
    		if ($result === false) 
    		{
    			$errorMessage = "Can not create new user. Please try again";
    		} else 
    		{
    			redirect('/user/info/' . $user['id']);
    		}
    		 
    
    	}
    	//redirect: another request (2 requests) des
    	//return: as a request (1 request ) re-post
    	$this->load->view("layout/layout", array(
    			'mainContent'   => VIEW_PATH . '/user/edit.php',
    			'userId' => $userId,
    			'errorMessage'  => $errorMessage,
    	));
    	//         echo "Load user info of userId {$userSession['user_id']} and display as user data form";
	}
	
	public function do_upload()
	{
// 		var_dump($this->input->post());
// 		die('controller');
		$this->load->helper('form');
		$userId=$this->uri->segment(3);
		$loggedUser=$this->session->all_userdata();
		$errorMessage ='';
		 	
// 		    	var_dump($userSession['user_id']);
// 		    	var_dump($this->session->all_userdata());
// 		    	var_dump($userId);
//  				var_dump($this->input->post());
//  		    	var_dump($loggedUser);
// 	    die();
		$post = $this->input->post();
		    	
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
			$userId = $loggedUser['userId'];
			$user = $this->userModel->getUserById($loggedUser['userId']);
			$config ['upload_path'] = './images/avatars/';
			$config ['allowed_types'] = 'gif|jpg|png|jpeg';
			$config ['file_name'] = $user['fullname'];
			$config ['max_size'] = '1000';
			$config ['max_width'] = '1500';
			$config ['max_height'] = '1500';
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			//
// 			var_dump($_FILES['userfile']);
// 			var_dump($this->upload->do_upload());
// 			die;
			
			
			if (!$this->upload->do_upload())
			{
// 				$errorMessage= "Can't upload file";
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('upload_form', $error);
				$this->load->view("layout/layout", array(
    			'mainContent'   => VIEW_PATH . '/user/do_upload.php',
    			'errorMessage'  => $error));
			} else {
				$data = array (
					'upload_data' => $this->upload->data());
// 				var_dump($this->upload->data());
// 				die('in else');
// 				$this->load->view ( 'upload_success', $data );
			}
			$oldAvt=$user['avatar'];
			
// 			var_dump($user);
// 			die;
			//     		 var_dump($this->input->post('btnEdit'));
			//              die;
// 			$data['upload_data']['raw_name']=$user['fullname'];
// 			var_dump($data['upload_data']['']);
// 			var_dump($data['upload_data']['full_path']);
			$path = '/images/avatars/'.$data['upload_data']['file_name'];
// 			$data=$this->upload->data();	
// 			var_dump($path);
// 			die('out else');
			$result = $this->userModel->editAvt($user,$path);
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
				'mainContent'   => VIEW_PATH . '/user/do_upload.php',
				'userId' => $userId,
				'errorMessage'  => $errorMessage,
		));
		//         echo "Load user info of userId {$userSession['user_id']} and display as user data form";
		
	}
	public function changePass($userId=0)
	{
		$this->load->helper('form');
    	$this->load->library('form_validation');
        $errorMessage = '';
        $post  = $this->input->post();
        if (isset($post['btnChangePass'])) 
        {
//         var_dump($this->input->post('btnRegister'));
//         die;
            // Processing registering new account
       		$this->form_validation->set_rules ( 'txtOldPas', 'oldpass', 'trim|required|min_length[6]|max_length[32]' );
       		$this->form_validation->set_rules ( 'txtNewPas', 'newpass', 'trim|required|min_length[6]|max_length[32]' );
       		$this->form_validation->set_rules ( 'txtConPas', 'confpass', 'trim|required|min_length[6]|max_length[32]|matches[txtNewPas]' );
        	if ($this->form_validation->run () === FALSE) 
        	{
//         		die('xxxxxxxxxx');
        		$this->load->view ( "layout/layout", array (
        				'mainContent' => VIEW_PATH . '/user/changePass.php','errorMessage'  => $errorMessage
        		) );
        	return;
        	}
            // Processing registering new account
            $oldPassword = $this->input->post('txtOldPas');
            $newPassword = $this->input->post('txtNewPas');
            $confPassword = $this->input->post('txtConfPas');

            // Kiem tra email form name@domain.com
            // So sanh password voi confirm password
            // Kiem tra email co ton tai 
            // Password > 6 ky tu

            $user= $this->session->all_userdata();
            $result = $this->userModel->updateUserPas($user,$oldPassword,$newPassword);
            if ($result === false) {
                $errorMessage = "Can not update new pass. Please try again";
//                 var_dump($userId);
//                 die();
            } else {
                redirect('/user/info/' . $user['userId']);   
            }
        }
        $this->load->view ( "layout/layout", array (
        				'mainContent' => VIEW_PATH . '/user/changePass.php','errorMessage' => $errorMessage));
      
	}
	
   	protected function errorPage($errorMessage)
    {
        echo $errorMessage; die();
    }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */