<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'app_controller.php';
class HomePage extends App_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

    }
    public function index()
    {
        $this->renderView('/layout/left_content.php');
    }
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
       // $this->session->unset_userdata('logged_in');
//        session_destroy();
        redirect('homepage', 'refresh');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */