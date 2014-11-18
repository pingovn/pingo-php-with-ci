<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'app_controller.php';

class C_user extends App_Controller {

    public $data;
    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model("StormModel");
        $this->load->model("M_user","modelUser");
        $this->load->helper('form');
        $this->load->library('form_validation');

        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $this->data['email'] = $session_data['email'];
            $this->data['id'] = $session_data['id'];
        }

    }


    /**
     * Function Registration
     */
    public function register()
    {
        $submit = $this->input->post('btnRegister');
        if (isset($submit)) {
            // Processing registering new account

            $this->form_validation->set_rules('txtEmail', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('txtPassword','Password','trim|required|matches[txtConfirmPassword]|min_length[6]|md5');
            $this->form_validation->set_rules('txtConfirmPassword','Confirm password','trim|required');
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view("layout/layout", array(
                    'mainContent'   => VIEW_PATH . '/user/v_register.php'
                ));
            }
            else
            {
                $data = array(
                    'email' => $this->input->post('txtEmail'),
                    'password' => $this->input->post('txtPassword')
                );
                $this->modelUser->insert_user($data);
                echo('Register success');
                redirect('c_user/login', 'refresh');
                //return  $this->load->view("layout/layout", array(
                //  'mainContent'   => VIEW_PATH . '/user/login.php'));
            }
        }else {
            $this->renderView('/user/v_register.php');
//            $this->load->view("layout/layout", array(
//                'mainContent'   => VIEW_PATH . '/user/v_register.php'
//            ));
        }
    }

    /**
     * Login Function
     */
    function login()
    {
        //This method will have the credentials validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txtEmail', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('txtPassword', 'Password', 'trim|required|xss_clean|callback_check_login');

        if($this->form_validation->run() == FALSE)
        {
            //Field validation failed.  User redirected to login page
            $this->load->view("layout/layout", array(
                'mainContent'   => VIEW_PATH . '/user/v_login.php'));
        }
        else
        {
            //Go to private area
            redirect('homepage', 'refresh');
        }
    }

    /**
     * @param $password
     * @return bool
     */
    function check_login($password)
    {
        //Field validation succeeded.  Validate against database
        $email = $this->input->post('txtEmail');

        //query the database
        $result = $this->modelUser->login($email, $password);

        if($result)
        {
            $sess_array = array();
            foreach($result as $row)
            {
                $sess_array = array(
                    'id' => $row->id,
                    'email' => $row->email
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_login', 'Invalid email or password');
            return false;
        }
    }

    function info()
    {
        //$id = $this->data['id'];
        $id = $this->uri->segment(3);
        $row = $this->modelUser->show_user($id);
        $this->load->model("M_tip", "modelTip");
        $tipofuser = $this->modelTip->getAllTipsByUserID($id);
        $this->data['ntip'] = $tipofuser;
        if($row)
        {
            $this->data['userinfo'] = $row;
            $this->renderView('/user/v_account.php');
            return true;
        }else{
            return false;
        }
    }

    function editUser()
    {

    }


    public function changePass()
    {
        $this->renderView('/user/v_changepass.php');
    }

    public function changePassProcess()
    {
        //$id = $this->uri->segment(3);
        //var_dump($id);die();
        if($this->session->userdata('logged_in'))
        {
            $value = $this->input->post('btnChange');
            if(isset($value))
            {
                $this->form_validation->set_rules('txtOldPassword', 'Old Password', 'trim|required|callback_checkpass');
                $this->form_validation->set_rules('txtPassword','New Password','trim|required|matches[txtConfirmPassword]|min_length[6]|md5');
                $this->form_validation->set_rules('txtConfirmPassword','Confirm New Password','trim|required');
                if ($this->form_validation->run() == FALSE)
                {
                    $this->data['mainContent'] = VIEW_PATH . '/user/v_changepass.php';
                    $this->load->view("layout/layout",$this->data);
                }
                else
                {
                    $data = array(
                        'id'=>$this->data['id'],
                        'password' => $this->input->post('txtPassword'),
                    );
                    $this->modelUser->save_user($data);
                    $id = $this->data['id'];
                    echo('Change password success');
                    redirect("c_user/info/$id", 'refresh');
                }
            }else{
                $this->load->view("layout/layout", array(
                    'mainContent'   => VIEW_PATH . '/user/v_changepass.php'
                ));
            }
            //$this->data['mainContent'] = VIEW_PATH . '/user/v_changepass.php';
            //$this->load->view("layout/layout", $this->data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('c_user/login', 'refresh');
        }
    }

    public function checkpass()
    {
        $opass = $this->input->post('txtOldPassword');
        $id = $this->data['id'];
        $pass = $this->modelUser->get_passbyid($id);
        if(md5($opass) == $pass){
            return true;
        }
        else {
            $this->form_validation->set_message('checkpass',"Current password dont match with old password in database");
            return false;
        }
    }

    public function uploadimage()
    {
        if($this->session->userdata('logged_in'))
        {
            $this->renderView('/user/v_upload.php');
        }
        else
        {
            //If no session, redirect to login page
            redirect('c_user/login', 'refresh');
        }
    }

    public function do_upload()
    {
        //var_dump($this->input->post('upload'));die;
        if($this->input->post('upload'))
        {
            $config['upload_path'] = './themes/phatnguyen/theme3/uploads/';
//            var_dump($config['upload_path']);die;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']    = '1024';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload())
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('user/v_upload', $error);
            }else
            {
                $data=$this->upload->data();
                //var_dump($data['file_name']);die;
                $id = $this->data['id'];
                $img  = array(
                    'id'=>$this->data['id'],
                    'avatar'=>$data['file_name']
                    );
                $this->modelUser->add_image($img);
                redirect("c_user/info/$id", 'refresh');
            }
        }else{

        }
    }

    public function update_profile()
    {
         $this->renderView('/user/v_editprofile.php');
    }

    public function process_updateprofile()
    {
        $value = $this->input->post('btnSave');
        if(isset($value))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('txtFullname', 'Full Name', 'required');
            $this->form_validation->set_rules('sex[]','options', 'required');
            if($this->form_validation->run()==FALSE)
            {
                $this->renderView('/user/v_editprofile.php');
            }
            //redirect("/user/v_editprofile.php",refresh);
            else{
                $data = array(
                    'id' => $this->data['id'],
                    'fullname' => $this->input->post("txtFullname"),
                    'age' => $this->input->post('age'),
                    'gender' => $this->input->post('sex')
                );
                $this->modelUser->save_user($data);
                $a = $data['id'];
                redirect("c_user/info/$a", 'refresh');
                //$this->renderView('/user/v_account.php','refresh');
            }
        }
    }
    public function showtips_byuserid()
    {
        $id = $this->uri->segment(3);
        $this->load->model("M_topic", "modelTopic");
        $ctopic = $this->modelTopic->showTopic();
        $this->data['ntopic'] = $ctopic;
        $this->load->model("M_tip", "modelTip");
        $tipofuser = $this->modelTip->getAllTipsByUserID($id);
        $this->data['ntip'] = $tipofuser;
        $this->renderView('/layout/left_content.php');
    }
}
