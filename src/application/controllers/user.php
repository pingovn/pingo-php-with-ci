<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    public function register()
    {
        
        $this->load->view("user/register");
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */