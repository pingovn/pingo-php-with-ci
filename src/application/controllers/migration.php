<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration extends CI_Controller {
    public function index()
    {
        $this->load->library('migration');
        $this->migration->latest();
    }

    public function version($version)
    {
        $version = intval($version);
        $this->load->library('migration');
        $this->migration->version($version);
    }
}

/* End of file migration.php */
/* Location: ./application/controllers/migration.php */