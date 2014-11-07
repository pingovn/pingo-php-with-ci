<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_user extends CI_Controller {

    public $data;
    function __construct() {

        parent::__construct();
        $this->data = array();

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
            // define nhung gi can dung cho tat ca method
        }

    }

    /**
     * Function Registration
     */
    public function register()
    {
        $value = $this->input->post('btnRegister');
        if (isset($value)) {
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
            $this->load->view("layout/layout", array(
                'mainContent'   => VIEW_PATH . '/user/v_register.php'
            ));
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
        $id = $this->uri->segment(3);
        $row = $this->modelUser->show_user($id);
        $this->load->view("layout/layout", array(
            'mainContent'   => VIEW_PATH . '/user/v_account.php',
                'id' => $row['id'],
                'email'  => $row['email'],
                'password'  => $row['password'],
                'fullname' => $row['fullname'],
                'age' => $row['age'],
                'gender' => $row['gender'],
                'status' => $row['status'],
                'avatar' => $row['avatar'])
        );
    }

    function editUser()
    {

    }

    public function checksession()
    {

    }

    public function changePass()
    {
        if($this->session->userdata('logged_in'))
        {
            $this->data['mainContent'] = VIEW_PATH . '/user/v_changepass.php';
            $this->load->view("layout/layout", $this->data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('c_user/login', 'refresh');
        }
        //var_dump($this->uri->segment(3));die();
        //$id = $this->uri->segment(3);

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
                $this->form_validation->set_rules('txtOldPassword', 'Old Password', 'trim|required');
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
                    //$id = $this->uri->segment(3);
                    //var_dump($this->modelUser->save_user($data));die();
                    $this->modelUser->save_user($data);
                    $id = $this->data['id'];
                    echo('Change password success');
                    redirect("c_user/info/$id", 'refresh');
                    //$this->data['mainContent'] = VIEW_PATH . '/user/v_account.php';
                    //$this->load->view("layout/layout",$this->data);
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
}
