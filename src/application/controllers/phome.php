<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Phome extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->check_isvalidated();
    }
    
    public function index(){
        // If the user is validated, then this function will run
        echo 'Congratulations, you are logged in.';
        // Add a link to logout
        echo '<br /><a href="'.base_url().'phome/do_logout">Logout!</a>';
    }
    
    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('plogin');
        }
    }
    
    public function do_logout(){
        $this->session->sess_destroy();
        redirect('plogin');
    }
 }
 ?>