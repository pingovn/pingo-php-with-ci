<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('migration');
    }

    public function index()
    {
        $this->migration->latest();
    }

    public function version($version)
    {
        $this->migration->version($version);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */