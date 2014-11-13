<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_Controller extends CI_Controller {

    public $data;

    function __construct() {
        parent::__construct();
        $this->data = array();

        $this->load->library('session');
        $userId = $this->session->userdata('logged_in')['id'];
        if (isset($userId)) {
            $this->load->model("StormModel");
            $this->load->model("M_user", "userModel");
            $user = $this->userModel->show_user($userId);
            $this->data['userinfo'] = $user;
            if (!empty($user)) {
                $this->data['user'] = array(
                    'id' => $user['id'],
                    'email' => $user['email']
                );
            }
        }

    }

    protected function renderView($mainContent)
    {
        $this->data['mainContent']   = VIEW_PATH . $mainContent;
        $this->load->view("layout/layout", $this->data);
    }
}
