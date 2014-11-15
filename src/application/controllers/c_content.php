<?php
/**
 * Created by PhpStorm.
 * User: Storm
 * Date: 11/14/14
 * Time: 12:44 PM
 */
require_once 'app_controller.php';
class C_content extends App_Controller
{
    public $data;
    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model("StormModel");
        $this->load->model("M_topic","modelTopic");
        $this->load->model("M_tip","modelTip");
        $this->load->helper('form');
        $this->load->library('form_validation');

        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $this->data['email'] = $session_data['email'];
            $this->data['id'] = $session_data['id'];
        }
    }
    function showtopic()
    {
        $submit = $this->input->post('btnAddTips');
        if(isset($submit))
        {
            $this->form_validation->set_rules('txtContent', 'Content', 'required');
            $this->form_validation->set_rules('catTopic', 'Category Topic', 'required');
            if($this->form_validation->run()==FALSE)
            {
                $this->renderView('/C_content/showtopic.php');
            }
            else
            {
                $txtContent = $this->input->post('txtContent');
                $catTopic = $this->input->post('catTopic');
                $topicid = $this->modelTopic->getTopicIdByName($catTopic);
                $now = date("Y-m-d H:i:s");
                //var_dump($tipid['name']);die;
                $tip = array(
                    'user_id' => $this->data['id'],
                    'content' => $txtContent,
                    'topic_id' => $topicid['id'],
                    'create_time' => $now,
                    'is_deleted' => '1',
                );
                $this->modelTip->addTips($tip);
                redirect('homepage', 'refresh');
            }
        }

    }
}