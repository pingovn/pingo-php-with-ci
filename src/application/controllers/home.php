<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model("PingoModel");
        $this->load->model("Topics","topicModel");
        $this->load->library('session');
    }

    public function index()
    {
    	$errorMessage='';
    	$this->load->model('Tips', 'tipModel');
    	$this->load->helper('date');
//         $todayTips = $this->tipModel->getAllTipsToday();
//         $todayTopTips = $this->tipModel->getAllTipsTodayWithLike();
        $todayTopTips = $this->tipModel->getAllTipsWithLike();
//         var_dump($todayTopTips);
//         var_dump(count($todayTopTips));
        
//         var_dump($this->uri->segment(2));
//         die();
		/* Paging */
        $this->load->library('pagination');
        $config['per_page']          = 2;
        $config['uri_segment']       = 3;
        $config['base_url']          = site_url('/home/index');
        $config['total_rows']        = count($todayTopTips);
        
//         $config['use_page_numbers']  = TRUE;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $offset = $page==0? 0: ($page-1)*$config["per_page"];
//         $this->pagination->cur_page = $offset;
        $limitedTips["results"] = $this->tipModel->getLimitedTipsWithLike($todayTopTips,$config['per_page'],$offset);
        $limitedTips["links"] = $this->pagination->create_links();
//         echo $this->pagination->create_links();
// 		var_dump($this->pagination->create_links());
// 		die;
        /*  */
        
        $this->load->model('Topics', 'topicModel');
        $allTopics = $this->topicModel->getAllTopics();
        $this->load->view("layout/layout", array(
            'todayTips' => $limitedTips,
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