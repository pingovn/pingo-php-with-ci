<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Storm extends CI_Controller {

    public function temp()
    {
        $this->load->view('storm_index');
    }
}
