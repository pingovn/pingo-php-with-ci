<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home1 extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

    }
    public function index()
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['id'] = $session_data['id'];
            $this->load->view("layout/layout", array(
                'mainContent'   => VIEW_PATH . '/layout/left_content.php',
                'email'=>$data['email'],
                'id'=>$data['id'],
            ));
        }
        else
        {
            //If no session, redirect to login page
            redirect('user/login', 'refresh');
        }
    }
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */