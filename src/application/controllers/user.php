<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
    public function register()
    {
        if (isset($_POST['btnRegister'])) {
            // Processing registering new account
            $email = $this->input->post('txtEmail');
            $this->load->helper('email');
            if (valid_email($email)) {
                //check if email is in database
                $this->load->database();
                $this->load->model('my_model');
                $sql = array(
                    'email' => $email
                );
                $query = $this->my_model->get_user($sql);
                if (empty($query)) {
                    $email_valid = 1;
                } else {
                    $this->register_err("Email already existed",$email); //wrong email
                }

            } else {
               $email_valid=  0;
            }

            $password = $this->input->post('txtPassword');
            $confirmPassword =  $this->input->post('txtConfirmPassword');
            if ($password === $confirmPassword) {
                if ($email_valid == 1) {
                    //put information to database
                    $this->load->model ('my_model');
                    $sql = array($email,$password);
                    $this->my_model->add_user($sql);
                    $this->login(); //success
                } else {
                    $this->register_err("Email format must be yourname@something.com",""); //wrong email
                }
            } else {
                $this->register_err("Password is mismatch",$email);
            }
            return $this->login();
        } elseif (isset($_POST['btnLogin'])) {
            return $this->login();
        }
        $this->load->view("layout/layout", array(
            'mainContent' => VIEW_PATH . '/user/register.php'
        ));



    }

    private function register_err ($err_msg, $email)
    {
        $this->load->view("layout/layout", array(
            'mainContent' => VIEW_PATH.'/user/register.php',
            'err_msg' => $err_msg,
            'email'   => $email
        ));
    }

    private function login_err ($err_msg, $email)
    {
        $this->load->view("layout/layout", array(
            'mainContent' => VIEW_PATH.'/user/login.php',
            'err_msg' => $err_msg,
            'email'   => $email
        ));

    }
    function login()
    {
//        var_dump($_POST);
        if (isset($_POST['btnLogin'])) {
            $email = $this->input->post('txtEmail');
            $password = $this->input->post("txtPassword");
            $this->load->helper('email');
            if (valid_email($email)) {

                //compare password in database
                $this->load->database();
                $this->load->model ('my_model');
                $sql = array(
                    'email' => $email
                );
                $query = $this->my_model->get_user($sql);
                $sql_row = $query[0];
                if ($password === $sql_row['password']) {
                    $_SESSION['login'] =1;
                    $this->load->view("layout/layout", array(
                        'mainContent'   => VIEW_PATH . '/layout/left_content.php'
                    ));

                } else {
                    $this->login_err("Invalid Password",$email);
                }
            } else {
                $this->login_err('Invalid Email',$email);
            }

        return  $this->load->view("layout/layout", array(
            'mainContent'   => VIEW_PATH . '/layout/left_content.php'
            ));
        }

        $this->load->view("layout/layout", array(
            'mainContent'   => VIEW_PATH . '/user/login.php'
        ));

    }

    function logout ()
    {
        $_SESSION['login'] = ''; //for removing PHP message
        unset($_SESSION['login']);
        $this->load->view("layout/layout", array(
            'mainContent'   => VIEW_PATH . '/layout/left_content.php'
        ));
    }
}



