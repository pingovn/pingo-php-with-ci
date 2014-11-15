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
    }

    public function add()
    {
        $errorMessage = "";
        $a = array();
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
            $this->load->model('Topics', 'topicModel');
            $allTopics = $this->topicModel->getAllTopics();

            $this->load->view("layout/layout", array(
                'allTopics' => $allTopics,
                'error'  => $errorMessage,
                'mainContent'   => VIEW_PATH . '/tip/add_tip.php',
            ));

        } else {
            header("Location: /"); exit();
        }
        $this->load->view("layout/layout", array(
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