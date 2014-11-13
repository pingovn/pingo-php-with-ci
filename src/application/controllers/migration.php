<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('migration');
    }

    public function index()
    {
    	$this->load->model("PingoModel");
    	$this->load->model("Topics", "topicModel");
    	$data = array('Love','Sports','Society','Funny','Future','God',
    			'Communication','Car','Money','Girl','Learning','Science','Relationship',
    			'Dream','Education','Pet','Food','Beauty','Beer'
    			);
        $this->migration->latest();
        $this->topicModel->createTopic($data);
    }

    public function version($version)
    {
        $this->migration->version($version);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */