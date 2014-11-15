<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'app_controller.php';
class HomePage extends App_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model("StormModel");


    }
    public function index()
    {
        $this->load->model("M_topic", "modelTopic");
        $ctopic = $this->modelTopic->showTopic();
        $this->data['ntopic'] = $ctopic;
        //var_dump($this->data['ntopic']);die;
        $this->renderView('/layout/left_content.php');
    }
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
       // $this->session->unset_userdata('logged_in');
//        session_destroy();
        redirect('c_user/login', 'refresh');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */