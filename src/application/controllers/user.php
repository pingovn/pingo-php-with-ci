<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
//        $this->load->helper('url');
        $this->load->model("PingoModel");
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->model("Users", "userModel");

        //prepare data to view in left_content
        $this->load->model('Tips', 'tipModel');
        $this->load->model('Topics', 'topicModel');
        $this -> todayTips = $this->tipModel->getAllTipsTodayWithLikeNumber();
        $this -> allTopics = $this->topicModel->getAllTopics();
    }



    public function register()
    {
        $this->load->model("Users", "userModel"); //minhtrieu: alias Users to userModel. Then, userModel is used instead of Users.
                                                    //purpose: for clear coding style:  after -> is lowcase char
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
        $this->load->model("Users", "userModel"); //minhtrieu: alias Users to userModel. Then, userModel is used instead of Users.
        //purpose: for clear coding style:  after -> is lowcase char
        $errorMessage = '';
        if (isset($_POST['btnLogin'])) {
            // checking user email
            $email = $this->input->post('txtEmail');
            $this->load->helper('email');
            if (!valid_email($email)) {
                $errorMessage =  'email is invalid';
                $this->load->view("layout/layout", array(
                    'errorMessage'  => $errorMessage,
                    'mainContent'   => VIEW_PATH . '/user/login.php'
                ));
                return;
            }
            //confirming password
            $password = $this->input->post('txtPassword');
            $user = $this->userModel->getUserByEmail($email);
            $userSession = array(
                'userId' => $user['id'],
                'email' => $user['email'],
            );
            if (md5($password) === $user['password'] ) {
                //login successful
                $this->session->set_userdata($userSession);
//                $todayTips = $this->tipModel->getAllTipsToday();
//                $allTopics = $this->topicModel->getAllTopics();

//                include("user_pagination.php");
//                $this->load->view("layout/layout", array(
//                    'pageLink'  => $this->pageLink,
//                    'todayTips' => $this->showTips,
//                    'allTopics' => $this->allTopics,
//                    'mainContent'   => VIEW_PATH . '/layout/left_content.php',
//                ));
                redirect('');
                return ;
            } else {
                $errorMessage = "Email and password mismatch. Please try again";
                $this->load->view("layout/layout", array(
                    'errorMessage'  => $errorMessage,
                    'mainContent'   => VIEW_PATH . '/user/login.php'
                ));
                return;
            }
        }
        $this->load->view("layout/layout", array(
            'mainContent'   => VIEW_PATH . '/user/login.php'
            ));

    }

    public function logout ()
    {
        $user = $this->userModel->getUserById($this->session->userdata('userId'));
//        var_dump($this->session->userdata('userId'));
//        var_dump($user); die();
        if ($user === false) {
//            return $this->errorPage("Logout Fail. Please try again");
            header("Location: /"); exit();
        }
        $this->session->unset_userdata('userId');
        $this->session->unset_userdata('email');

//        $todayTips = $this->tipModel->getAllTipsToday();
//        $allTopics = $this->topicModel->getAllTopics();
//        include("user_pagination.php");
//        $this->load->view("layout/layout", array(
//            'pageLink'  => $this->pageLink,
//            'todayTips' => $this->showTips,
//            'allTopics' => $this->allTopics,
//            'mainContent'   => VIEW_PATH . '/layout/left_content.php',
//        ));
        redirect('');
    }

    public function info($userId = 0)
    {
        $this->load->model("Users", "userModel"); //minhtrieu: alias Users to userModel. Then, userModel is used instead of Users.
        //purpose: for clear coding style:  after -> is lowcase char

        //change User info
        if (isset($_POST['btnUpdateInfo'])) {
            $gender = $this->input->post('txtGender');
            $age = $this->input->post('txtAge');
            $fullname = $this->input->post('txtFullname');

            //validate email - later

            $user = $this->userModel->getUserById($this->session->userdata('userId'));
            if ($user === false) {
                return $this->errorPage("Update user fail. Please try again");
            }
            if ($gender == 'Male') {
                $user['gender'] = 1;
            } elseif ($gender == 'Female') {
                $user['gender'] = 2;
            } else {
                $user['gender'] = 0;
            }
            $user['age'] = $age;
            $user['fullname']= $fullname;

            $query_result = $this->userModel->updateUser($user);
            if ($query_result === false) {
                return $this->errorPage("Update user fail. Please try again");
            } else { //udpate success -> go to home page
//                include("user_pagination.php");
//                return $this->load->view("layout/layout", array(
//                    'pageLink'  => $this->pageLink,
//                    'todayTips' => $this->showTips,
//                    'allTopics' => $this->allTopics,
//                    'mainContent'   => VIEW_PATH . '/layout/left_content.php',
//                ));
                redirect('');
            }
        }

        //change password
        if (isset($_POST['btnChangePassword'])) {
            return $this->load->view("layout/layout", array(
                'mainContent'   => VIEW_PATH . '/user/change_password.php',
                'errorMessage'  => ''
            ));
        }
        if (isset($_POST['btnUpdatePassword'])) {
            $user = $this->userModel->getUserById($this->session->userdata('userId'));
            if ($user===false) {
                return $this->load->view("layout/layout", array(
                    'mainContent'   => VIEW_PATH . '/user/change_password.php',
                    'errorMessage'  => 'Update password fail! Please try again'
                ));
            }
            $oldPassword = $this->input->post('txtOldPassword');
            $newPassword = $this->input->post('txtNewPassword');
            $confirmNewPassword = $this->input->post('txtConfirmNewPassword');
            if (($newPassword != $confirmNewPassword) | (md5($oldPassword) != $user['password'] ) ) {
                return  $this->load->view("layout/layout", array(
                    'mainContent'   => VIEW_PATH . '/user/change_password.php',
                    'errorMessage'  => 'Update password fail! Please try again'
                ));
            }

            $user['password'] = md5($newPassword);
            $query_result = $this->userModel->updateUser($user);
            if ($query_result === false) {
                return  $this->load->view("layout/layout", array(
                    'mainContent'   => VIEW_PATH . '/user/change_password.php',
                    'errorMessage'  => 'Update password fail! Please try again'
                ));
            } else { //udpate success -> go to home page
//                include("user_pagination.php");
//                return  $this->load->view("layout/layout", array(
//                    'pageLink'  => $this->pageLink,
//                    'todayTips' => $this->showTips,
//                    'allTopics' => $this->allTopics,
//                    'mainContent'   => VIEW_PATH . '/layout/left_content.php',
//                ));
                redirect('');
            }

        }

        //change avatar
        if (isset($_POST['btnChangeAvatar'])) {
            return $this->load->view("layout/layout", array(
                'mainContent'   => VIEW_PATH . '/user/change_avatar.php',
                'errorMessage'  => ''
            ));
        }

        if (isset($_POST['btnUpdateAvatar'])) {
            $config['upload_path'] = './images/avatars/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['overwrite'] = true;
            $config['file_name'] =  $this->session->userdata('userId');
            $this->load->library('upload', $config);
            $this->upload->do_upload('avatar');

            if ( ! $this->upload->do_upload('avatar'))
            {
                $this->load->view("layout/layout", array(
                    'mainContent'   => VIEW_PATH . '/user/change_avatar.php',
                    "erroMessage"  => $this->upload->display_errors()
                ));
                return;
            }
            else
            {
                $data =  $this->upload->data();
                //update avatar to database
                $user = $this->userModel->getUserById($this->session->userdata('userId'));
                $user['avatar'] = $data['file_name'];
                $query_result = $this->userModel->updateUser($user);
                if ($query_result === false) {
                    $errorMessage = 'Cannot upload Avatar.Please try again!';
                    $this->load->view("layout/layout", array(
                        'mainContent'   => VIEW_PATH . '/user/change_avatar.php',
                        "erroMessage"  => $errorMessage
                    ));
                    return;
                } else {
                    $this->load->view("layout/layout", array(
                        'mainContent'   => VIEW_PATH . '/user/info.php',
                        'userId' => $user['id'],
                        'email' => $user['email'],
                        'fullname' => $user['fullname'],
                        'age' => $user['age'],
                        'gender' => $user['gender'],
                        'avatar' => $user['avatar']

                    ));
                }
                return;
            }
        }

        //default: go here if there is no button is pushed
        if ($userId == 0) {
            // Return error page
            return $this->errorPage("User not found");
        } elseif ($this->session->userdata('userId') != $userId) {
            return $this->errorPage("Can't update user info. Please try again");
        }
        $user = $this->userModel->getUserById($userId);
        if ($user === false) {
            return $this->errorPage("Can't update user info. Please try again");
        }
        $this->load->view("layout/layout", array(
            'mainContent'   => VIEW_PATH . '/user/info.php',
            'userId' => $userId,
            'email' => $user['email'],
            'fullname' => $user['fullname'],
            'age' => $user['age'],
            'gender' => $user['gender'],
            'avatar' => $user['avatar']

        ));

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

    protected function errorPage($errorMessage)
    {
        echo $errorMessage; die();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */