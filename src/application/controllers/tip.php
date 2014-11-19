<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tip extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model("PingoModel");
        $this->load->library('session');
        $this->load->model("Tips", "tipModel");
        $this->load->model('Topics', 'topicModel');
        $this -> allTopics = $this->topicModel->getAllTopics();
        $this -> todayTips = $this->tipModel->getAllTipsToday();
    }

    public function add()
    {
        $errorMessage = "";
        $post = $this->input->post();
        if (isset($post['btnAddTip']) && $post['btnAddTip'] =='Add Tip') {
            // Validate du lieu tu form
            if ($post["txtTip"] != "") {
                // Xu ly luu vao database
                $data = array(
                        "content"   => $post["txtTip"],
                        "topic_id"  => $post["slbTopic"],
                        'user_id'   => $this->session->userdata('userId'),
                        'update_time'  => date("Y-m-d H:i:s")
                    );
                $result = $this->tipModel->createTip($data);
                if ($result) {
                    header("Location: /"); exit();
                } else {
                    $errorMessage = "Khong luu duoc du lieu vao database" ;
                }
            } else {
                $errorMessage = "Noi gi thi doi di";
            }

            $allTopics = $this->topicModel->getAllTopics();

            $this->load->view("layout/layout", array(
                'allTopics' => $allTopics,
                'error'  => $errorMessage,
                'mainContent'   => VIEW_PATH . '/tip/add_tip.php',
            ));

        } else {
            header("Location: /"); exit();
        }
    }

    public function user_tip($user_id =0 )
    {
        if ($user_id == 0) {
            return $this->errorPage("User not found");
        }
//        var_dump($userTips); die();
        //Actually, todayTip is tips of user. Because include file use todayTip, we can't change todayTips name
        $this->todayTips = $this->tipModel->getTipsByUser($user_id);

        include("user_pagination.php");
//        var_dump($this->pageLink);
//        var_dump($this->showTips);
//        var_dump($this->allTopics);
//        die();
        return  $this->load->view("layout/layout", array(
            'pageLink'  => $this->pageLink,
            'todayTips' => $this->showTips,
            'allTopics' => $this->allTopics,
            'mainContent'   => VIEW_PATH . '/layout/left_content.php',
        ));
    }

    protected function errorPage($errorMessage)
    {
        echo $errorMessage; die();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */