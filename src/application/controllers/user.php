<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model("PingoModel");
    }

    public function register()
    {
        $this->load->model("Users", "userModel");
        $errorMessage = '';
        if (isset($_POST['btnRegister'])) {
            // Processing registering new account
            $email = $this->input->post('txtEmail');
            $this->load->helper('email');
            if (!valid_email($email)) {
                $errorMessage =  'email is invalid';
                $this->load->view("layout/layout", array(
                    'errorMessage'  => $errorMessage,
                    'mainContent'   => VIEW_PATH . '/user/register.php'
                    ));
                return;
            }

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
            } else {
                return $this->login();    
            }
        }
        $this->load->view("layout/layout", array(
            'errorMessage'  => $errorMessage,
            'mainContent'   => VIEW_PATH . '/user/register.php'
            ));
    }

    function login()
    {
        $this->load->view("layout/layout", array(
            'mainContent'   => VIEW_PATH . '/user/login.php'
            ));
    }

    public function info($userId = 0)
    {
        if ($userId == 0) {
            // Return error page
            return $this->errorPage("User khong ton tai");
        }     
        echo "Load user info of userId {$userId} and display as user data form";

    }

    protected function errorPage($errorMessage)
    {
        echo $errorMessage; die();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */