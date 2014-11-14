<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model("PingoModel");
        $this->load->library('session');
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
                // $this->load->view("layout/layout", array(
                //     'errorMessage'  => $errorMessage,
                //     'mainContent'   => VIEW_PATH . '/user/registeranhkhoa.php'
                //     ));
                $this->load->view('/user/error.php');
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
            'mainContent'   => VIEW_PATH . '/user/registeranhkhoa.php'));
    }
    // public function update()
    // {
    //     $userId = (int) $userId;
    //     if ($userId == 0) {
    //         // Return error page
    //         return $this->errorPage("User khong ton tai");
    //     }
    //     $this->load->model('Users', 'userModel');
    //     $user = $this->userModel->getUserById($userId);
    //     if ($user == false) {
    //         return $this->errorPage("User khong ton tai");
    //     }
    //     $this->load->view("layout/layout", array(
    //         'errorMessage'  => $errorMessage,
    //         'mainContent'   => VIEW_PATH . '/user/Updateanhkhoa.php'
    //         ));
    //     // redirect('/user/register');
    // }


    public function update($id) {
        $this->load->view("layout/layout", array(
            'errorMessage'  => $errorMessage,
            'mainContent'   => VIEW_PATH . '/user/Updateanhkhoa.php'));
            // $this->load->library("form_validation");
            // $this->load->model('Muser');
            // $this->_data['titlePage'] = "Edit A User";
            // $this->_data['subview'] = "user/edit_view";
     
            // $this->_data['info'] = $this->Muser->getUserById($id);
            // $this->form_validation->set_rules("username", "Username", "required|xss_clean|trim|min_length[4]|callback_check_user");
            // $this->form_validation->set_rules("password", "Password", "matches[password2]|trim|xss_clean");
            // $this->form_validation->set_rules("email", "Email", "required|trim|xss_clean|valid_email|callback_check_email");
            // if ($this->form_validation->run() == TRUE) {
            //     $data_update = array(
            //         "username" => $this->input->post("username"),
            //         "email" => $this->input->post("email"),
            //         "level" => $this->input->post("level"),
            //     );
            //     if ($this->input->post("password")) {
            //         $data_update['password'] = $this->input->post("password");
            //     }
            //     $this->Muser->updateUser($data_update, $id);
            //     $this->session->set_flashdata("flash_mess", "Update Success");
            //     redirect(base_url() . "index.php/user");
            // }
            // $this->load->view('user/main.php', $this->_data);
        }


    function login()
    {
        $this->load->view("layout/layout", array(
            'mainContent'   => VIEW_PATH . '/user/login.php'));
        $errorMessage = '';
        $post  = $this->input->post();
        if (isset($post['btnLogin'])) {
            $email = $post['txtEmail'];
            $this->load->helper('email');
            if (!valid_email($email)) {
                $errorMessage = 'Please input valid email';
            } else {
                $password = $post['txtPassword'];   
                $this->load->model("Users", "userModel");
                $loginResult = $this->userModel->doLogin($email, $password);
                if ($loginResult === true) {
                    $userId = $this->session->userdata['userId'];
                    redirect('/user/info/' . $userId);
                } else {
                    $errorMessage = 'Can not login with email and password inputted';
                }
            }
        }
        $this->load->view("layout/layout", array(
            'errorMessage'  => $errorMessage,
            'mainContent'   => VIEW_PATH . '/user/info.php'
            ));
    }

    public function info($userId = 0)
    {
        $userId = (int) $userId;
        if ($userId == 0) {
            // Return error page
            return $this->errorPage("User khong ton tai");
        }
        $this->load->model('Users', 'userModel');
        $user = $this->userModel->getUserById($userId);
        if ($user == false) {
            return $this->errorPage("User khong ton tai");
        }

        $this->load->view("layout/layout", array(
            'user'  => $user,
            'mainContent'   => VIEW_PATH . '/user/info.php'
            ));
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