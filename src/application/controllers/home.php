<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


    public function index()
    {
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