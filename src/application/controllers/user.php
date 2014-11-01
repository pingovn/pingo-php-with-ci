<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {

  // --------------------------------------------------------------------
   /**
     * Controller  function:
     * INPUT: void
    * OPERATION: query all information in database and display
     * OUTPUT: void
     */
    public function get_all_user ()
    {
        $this->load->model ('my_model');
        $data['query'] = $this->my_model->get_all();
        $this->load->view ('user_view',$data);
    }

   // --------------------------------------------------------------------
    /**
     * Controller  function:
     * INPUT: target  ID  which want to query in database
     * OPERATION: query user  in database which match the input id  and display
     * OUTPUT: void
     */
    public function get_one_user ($id)
    {
        $this->load->model ('my_model');
        $data['query'] = $this->my_model->get_user($id);
        $this->load->view ('user_view',$data);
    }

    // --------------------------------------------------------------------
    /**
     * Controller  function:
     * INPUT: void - NOTICE: this will be changed in future. The input should be user information which should be added to database
     * OPERATION: insert information to database and query all information in database
     * OUTPUT: void
     */
    public function insert_user ()
    {
        $sql = array( 'test','pass','my test','11-11-11','test@a.com','female'); //data to insert todatabe
        $this->load->model ('my_model');
        $this->my_model->insert_user($sql);
        $this->get_all_user();
    }

    // --------------------------------------------------------------------
    /**
     * Controller  function:
     * INPUT: void - NOTICE: this will be changed in future. The input should be user information which should be updated  to database
     * OPERATION: update  information to database and query the updated  information in database
     * OUTPUT: void
     */
    public function update_user ()
    {
        $update_info = array(
            'id' => 7, //matching condition
            'username' => 'tui ne' //updated information
        );
        $this->load->model ('my_model');
        $this->my_model->update_user($update_info);
        $this->get_one_user($update_info['id']);
    }
    // --------------------------------------------------------------------
    /**
     * Controller  function:
     * INPUT: void - NOTICE: this will be changed in future. The input should be user id which should be delete  to database
     * OPERATION: delete user  information in database and query all  information in database
     * OUTPUT: void
     */
    public function delete_user ()
    {
        $delete_info = array(
            'username' => 'test'
        );
        $this->load->model ('my_model');
        $this->my_model->delete_user($delete_info);
        $this->get_all_user();
    }
}
?>