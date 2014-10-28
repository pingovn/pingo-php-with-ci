<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hello extends CI_Controller {

	public function you()
	{
		$this->load->view('you_view');
	}

	public function test()
	{
		$this->load->view('test_view');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */