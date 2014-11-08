<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login controller class
 */
class Plogin extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        /*$this->load->helper('url');*/
    }
    
    public function index($msg = NULL){
        // Load our view to be displayed
        // to the user
        $data['msg'] = $msg;
        $this->load->view('plogin_view', $data);
    }
    
    public function process(){
    	
        
        $this->load->model('plogin_model');
        // Validate the user can login
        $result = $this->plogin_model->validate();
        
        if(! $result){
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid Email or Password. Try again!</font><br />';
            $this->index($msg);
        	
        }else{
            // If user did validate, 
        
            redirect('http://ci.dev/index.php/phome');
        }        
    }
}
?>