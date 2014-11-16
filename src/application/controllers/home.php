<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model("PingoModel");
        $this->load->library('session');


    }

    public function index()
    {
        $this->load->model('Tips', 'tipModel');
        $todayTips = $this->tipModel->getAllTipsToday();
        $this->load->model('Topics', 'topicModel');
        $allTopics = $this->topicModel->getAllTopics();

        //pagination -start
        include("pagination.php");
        //pagination
//        $perpage = 5;
//        $this->load->library('pagination');
//        $config['base_url'] = '?page=';
//        $config['per_page'] = $perpage;
//        $config['page_query_string'] = TRUE;
//        $config['total_rows'] = count($todayTips);
//        $this->pagination->initialize($config);
//        $link =  $this->pagination->create_links();
//
//        $from = $this->input->get('per_page');
//        if ($from === false || $from === '') {
//            $from = 0;
//        }
//
//        $showTips = array_slice($todayTips,$from,$perpage);
        //pagination -end

        $this->load->view("layout/layout", array(
            'pageLink'  => $pageLink,
            'todayTips' => $showTips,
            'allTopics' => $allTopics,
            'mainContent'   => VIEW_PATH . '/layout/left_content.php',
            ));
    }

    public function phpinfo()
    {
        phpinfo();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */