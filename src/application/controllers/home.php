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
//        $todayTips = $this->tipModel->getAllTipsToday();
        $todayTips = $this->tipModel->getAllTipsTodayWithLikeNumber();
        $this->load->model('Topics', 'topicModel');
        $allTopics = $this->topicModel->getAllTopics();

        $mostLikedTips = $this->tipModel->getMostLikedTip();
        $latestTips = $this->tipModel->getLatestTip();
//        var_dump($mostLikedTips); die();
        //pagination -start
        include("pagination.php");

        $this->load->view("layout/layout", array(
            'pageLink'  => $pageLink,
            'todayTips' => $showTips,
            'allTopics' => $allTopics,
            'mostLikedTips' => $mostLikedTips,
            'latestTips' => $latestTips,
            'mainContent'   => VIEW_PATH . '/layout/left_content.php',
//            'rightContent'  => VIEW_PATH . '/layout/right_content.php',
            ));
    }

    public function phpinfo()
    {
        phpinfo();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */