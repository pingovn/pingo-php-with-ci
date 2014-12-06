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
        $todayTips = $this->tipModel->getAllTipsTodayWithLikeNumber();
        $this->load->model('Topics', 'topicModel');
        $allTopics = $this->topicModel->getAllTopics();
        $this->load->view("layout/layout", array(
            'todayTips' => $todayTips,
            'allTopics' => $allTopics,
            'mainContent'   => VIEW_PATH . '/tip/today_list.php',
            ));
    }

    public function phpinfo()
    {
        phpinfo();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */