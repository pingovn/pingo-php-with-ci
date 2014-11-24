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
        $this->load->library('pagination');


    }
    public function index()
    {
        $this->load->model("M_topic", "modelTopic");
        $ctopic = $this->modelTopic->showTopic();
        $this->data['ntopic'] = $ctopic;
        $this->load->model("M_tip", "modelTip");
        $tiptoday = $this->modelTip->getAllTipsToday();
        $this->data['ntip'] = $tiptoday;
        //$totalrowstoday = $this->modelTip->countAllTipToday();
        //var_dump($totalrowstoday[0]['numbers']);die;
        //var_dump($this->data['ntip']);die;
        //var_dump($this->data['ntopic']);die;
        $this->renderView('/layout/left_content.php');
        //$config['base_url'] = 'http://ci.dev/homepage/index.php';
        //$config['total_rows'] = $totalrowstoday[0]['numbers'];
        //$config['per_page'] = 2;
        //$this->pagination->initialize($config);
        //echo $this->pagination->create_links();
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