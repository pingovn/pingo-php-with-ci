<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User2 extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('muser');
    }

	public function dangky()
    {
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('txtEmail','Email','required|valid_email');
        $this->form_validation->set_rules('txtPasword','Password','required|trim|matches[txtConfirmPasword]|min_length[6]|md5');
        $this->form_validation->set_rules('txtConfirmPasword','Confirm Password','required|trim');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->load->view("layout/layout", array(
            'mainContent'   => VIEW_PATH .'/user/dangky.php'
            )); 
        }
        else
        {
            $data=array(
                'email' => $this->input->post('txtEmail') ,
                'password' => $this->input->post('txtPasword') 
                );
            $this->muser->insert_user($data);
            return $this->load->view("layout/layout", array(
                'mainContent'   => VIEW_PATH . '/user/login.php'));
        } 
        
    }

    function login()
    {

        $this->load->helper(array('form','url' ));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('txtEmail','Email','required|valid_email');
        $this->form_validation->set_rules('txtPasword','Password','required|trim|check_login()');
    
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view("layout/layout", array(
                'mainContent'   => VIEW_PATH . '/user/login.php'));
        }
        else
        {
            redirect('home', 'refresh');
        }

    }

    function check_login()
     {
        $email = $this->input->post('txtEmail');

        $result = $this->muser->login($email, $password);

        if($result)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_login', 'Invalid email or password');
            return false;
        }
    }
}