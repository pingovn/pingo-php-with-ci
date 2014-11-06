<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_user extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->helper('url');
        $this->load->library('session');
    }
    public function register()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        if (isset($_POST['btnRegister'])) {
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
                $this->m_user->insert_user($data);
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
                'mainContent'   => VIEW_PATH . '/user/m_login.php'));
        }
        else
        {
            //Go to private area
            redirect('home', 'refresh');
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
        $result = $this->m_user->login($email, $password);

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
}
