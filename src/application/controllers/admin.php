<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model("PingoModel");
        $this->load->library('session');
        $this->load->library('grocery_CRUD');
    }

    private function _requiredAdmin()
    {
        $userId = $this->session->userdata('userId');
        if (empty($userId)) {
            redirect('/');
            exit;
        }

        $isAdmin = $this->session->userdata('is_admin');
        if ($isAdmin != 1) {
            redirect('/');
            exit;
        }
    }

    public function users()
    {
        $this->_requiredAdmin();
        $this->grocery_crud->set_theme('datatables');
        $output = $this->grocery_crud->render();
        $this->_example_output($output);
    }

    public function index()
    {
        $this->_requiredAdmin();
        $this->load->view("layout/layout", array(
            'mainContent'   => VIEW_PATH . '/admin/index.php'
        ));
    }

    public function user_like()
    {
        $this->_requiredAdmin();
        $output = $this->grocery_crud->render();
        $this->_example_output($output);
    }

    public function tips()
    {
        $this->_requiredAdmin();
        $this->grocery_crud->set_theme('twitter-bootstrap');
        $output = $this->grocery_crud->render();
        $this->_example_output($output);
    }

    public function _example_output($output = null)
    {
        $this->load->view('example.php',$output);
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
        $userId = $this->session->userdata('userId');
        if (!empty($userId)) {
            redirect('/user/info' . $this->session->userdata('userId'));
        }

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
            'mainContent'   => VIEW_PATH . '/user/login.php'
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

    public function likeTip($tipId)
    {
        $tipId = intval($tipId);
        if ($tipId === 0) {
            die("Like cai gi ma like");
        }
        $userId = $this->session->userdata("userId");
        $this->load->model("Users", "userModel");
        $this->load->model("Tips", "tipModel");
        $isLiked = $this->tipModel->isUserLikedTip($userId, $tipId);
        if ($isLiked) {
            die("Like roi like chi nua");
        }
        $this->userModel->likeTip($userId, $tipId);
        header("Location: /");
        exit();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */