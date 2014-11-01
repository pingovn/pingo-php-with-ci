<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    public function register()
    {
        if (isset($_POST['btnRegister'])) {
            // Processing registering new account
            $email = $this->input->post('txtEmail');
            $this->load->helper('email');
            if (valid_email($email)) {
                echo 'email is valid';
            } else {
                echo 'email is not valid';
            }

            $password = $this->input->post('txtPassword');
            $confirmPassword = $this->input->post('txtConfirmPassword');

            // Kiem tra email form name@domain.com
            // So sanh password voi confirm password
            // Kiem tra email co ton tai 
            // Password > 6 ky tu
            // 
            return $this->login();
        }
        $this->load->view("layout/layout", array(
            'mainContent'   => VIEW_PATH . '/user/register.php'
            ));
    }

    function login()
    {
        $this->load->view("layout/layout", array(
            'mainContent'   => VIEW_PATH . '/user/login.php'
            ));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */