<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tip extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model("PingoModel");
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }

    public function add_tip()
    {
        $this->load->model("Tips", "tipModel");
        $this->load->model("Topics", "topicModel");
    	$this->load->helper('form');
    	$this->load->library('form_validation');
        $errorMessage = '';
        $post  = $this->input->post();
//          var_dump($post);
//          die;
        
        
         // Processing adding new tip
        if (isset($post['btnAddTip'])&& $post['btnAddTip']=="Add-Tip") {
//         	die(xxxx);
       		$this->form_validation->set_rules ( 'txtTip', 'Tip', 'required' );
        	if ($this->form_validation->run () === FALSE) {
        		$this->load->view ( "layout/left_content", array (
        				'mainContent' => VIEW_PATH . '/tip/addTip.php','errorMessage'  => $errorMessage
        		));
        	return;
        	}
        	if($post['txtTip']!=""){
        		$data = array (
        			'content' => $post['txtTip'],
        			'topic_id'=> $post['slbTopic'],
        			'user_id' => $this->session->userdata('userId'),
        			'update_time'=>date('Y-m-d H:m:s')		
        		);
        		$result = $this->tipModel->createTip($data);
//         		var_dump($data);
//         		die;
        		if($result){
        			header('Location: /'); exit;
        		} else {
        			$errorMessage= "Cant save in database";
        		}
        		$this->load->model('Topics','topicModel');
        		$allTopics = $this->topicModel->getAllTopics();
        		
        		$this->load->view("layout/layout",array(
        		'errorMessage' => $errorMessage,
        		'allTopics' => $allTopics,
        		'mainContent' => VIEWPATH."tip/add_tip.php",
        		));
        	}
        } else{
        		header('Location: /'); exit;
        }
        $this->load->view ( "layout/left_content", array (
        				'mainContent' => VIEW_PATH . '/layout/left_content.php'));      
    }
}
