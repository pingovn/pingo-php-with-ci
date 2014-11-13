<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login controller class
 */
class Plogin extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    public function login($msg = NULL)
    {
        // Load our view to be displayed
    	//$data['msg'] = $msg;
        $this->load->view('layout/layout', array('msg' => $msg, 'mainContent' => VIEW_PATH . '/plogin_view.php'));
        
    }
    
    public function process(){
    	
        
        $this->load->model('plogin_model');
        // Validate the user can login
        $result = $this->plogin_model->validate();
        
        if(! $result)
        {
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Login failed, Try again!</font><br />';
            $this->login($msg);
        	
        }
        
        if ($loginResult === true)
        {
        	$userId = $this->session->userdata['userId'];
        	redirect('/plogin/pinfo/' . $userId);
        }
        
        else
        {
            // If user did validate, 
        
            redirect('http://ci.dev/index.php/phome');
        }        
    }
    
    protected function errorPage($errorMessage)
    {
    	echo $errorMessage; die();
    }
    
    public function info($userId = 0)
    {
    	$userId = (int) $userId;
    	if ($userId == 0) {
    		// Return error page
    		return $this->errorPage("Email khong ton tai");
    	}
    	$this->load->model('plogin_model');
    	$user = $this->plogin_model->getUserById($userId);
    	if ($user == false) {
    		return $this->errorPage("Email khong ton tai");
    	}
    
    	$this->load->view("layout/layout", array(
    			'user'  => $user,
    			'mainContent'   => VIEW_PATH . '/pinfo.php'
    	));
    }
    
}
?>

