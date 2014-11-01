<?php
class My_model extends CI_Model
{
    // --------------------------------------------------------------------
    /**
     * Database function:
     * INPUT: void - NOTICE: input will be change to  target  table name  which want to query in database
     * OPERATION: query user  in database which match the input id  and display
     * OUTPUT: information returned from database
     */
    public function get_all ()
    {
        $table = 'users';
        $this->load->database();
        $query = $this->db->get($table);
        return $query->result();
    }

    // --------------------------------------------------------------------
    /**
     * Database function:
     * INPUT: void - NOTICE: input will be change to  target  table name  which want to query in database
     * OPERATION: query user  in database which match the input id  and display
     * OUTPUT: information returned from database
     */
    public function get_user ($id)
    {
        $table = 'users';
        $this->load->database();
        $sql = 'SELECT * FROM ' . $table . ' WHERE id = ' . $id;
        $query = $this->db->query($sql);
        return $query->result();
    }
    // --------------------------------------------------------------------
    /**
     * Database function:
     * INPUT: void - NOTICE: input will be change to  target  user information  which want to query in database
     * OPERATION: insert the information to database
     * OUTPUT: void
     */
    public function insert_user($insert_db)
    {
        $this->load->database();
        $table = 'users';
        $sql = array(
            //'id' => $insert_db[0],
            'username' => $insert_db[0],
            'password' => $insert_db[1],
            'fullname'  => $insert_db[2],
            'birth'     => $insert_db[3],
            'mail'      => $insert_db[4],
            'gender'    => $insert_db[5]
        );
        $query = $this->db->insert($table, $sql) ;
    }

    // --------------------------------------------------------------------
    /**
     * Database function:
     * INPUT:  target  user information  which want to query in database
     * OPERATION: update  the information to database
     * OUTPUT: void
     */
    public function update_user($update_info)
    {
        $table = 'users';
        $this->load->database();
        //get all information  from database
        $sql = 'SELECT * FROM ' . $table . ' WHERE id = ' . $update_info['id'];
        $db_info = $this -> db -> query ($sql);
        $row = $db_info -> row_array();
        //update the information need to be changed
        foreach ($update_info as $key => $value) {
            $row[$key] = $value;
        }
        //update the information to database
        $sql = 'UPDATE ' . $table . ' SET ' .
            'username  = \'' . $row['username'] . '\' , ' .
            'password  = \'' . $row['password'] . '\' , ' .
            'fullname  = \'' . $row['fullname'] . '\' , ' .
            'birth     = \'' . $row['birth']    . '\' , ' .
            'mail      = \'' . $row['mail']     . '\' , ' .
            'gender    = \'' . $row['gender']   . '\'   ' .
            ' WHERE id = ' . $row['id'];
        $query = $this->db->query($sql);
    }
    // --------------------------------------------------------------------
    /**
     * Database function:
     * INPUT:  target  user information  which want to delete  in database
     * OPERATION: delete  the information in database
     * OUTPUT: void
     */
    public function delete_user($delete_info)
    {
        $table = 'users';
        $this->load->database();
        //delete  the information to database
        foreach ($delete_info as $key => $value)
        {
            $sql = 'DELETE FROM ' . $table .
                ' WHERE ' . $key . '  = \'' . $value  .'\'' ;
            $query = $this->db->query($sql);
        }
    }
}
?>