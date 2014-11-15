<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('migration');
    }

    public function index()
    {
    	
        //var_dump( $this->migration->latest());die;
        if(!$this->migration->latest())
        {
            show_error($this->migration->error_string());
        }
        $this->migration->latest();
   
    }

    public function version($version)
    {
        $this->migration->version($version);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */