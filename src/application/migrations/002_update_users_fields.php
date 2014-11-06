<?php

class Migration_Update_users_fields extends CI_Migration {
    public function up() {
        $fields = array(
                'fullname'  => array(
                        'type'                 => 'VARCHAR',
                        'constraint'        => '50',
                        'null'                  => TRUE
                    ),
                'age'  => array(
                        'type'                 => 'INT',
                        'constraint'        => '3',
                        'null'                  => TRUE,
                        'default'             => '0'
                    ),
                'gender'  => array(
                        'type'                 => 'INT',
                        'constraint'        => '1',
                        'null'                  => TRUE,
                        'default'             => '0'
                    ),
                'status'  => array(
                        'type'                 => 'INT',
                        'constraint'        => '1',
                        'null'                  => TRUE,
                        'default'             => '1'
                    ),
                'avatar'  => array(
                        'type'                 => 'VARCHAR',
                        'constraint'        => '30',
                        'null'                  => TRUE
                    ),
            );
        $this->dbforge->add_column('users', $fields);
        echo "Added fields fullname, age, gender, status, avatar successfully.";
    }
 
    public function down(){
        $this->dbforge->drop_column('users', 'fullname');
        $this->dbforge->drop_column('users', 'age');
        $this->dbforge->drop_column('users', 'gender');
        $this->dbforge->drop_column('users', 'status');
        $this->dbforge->drop_column('users', 'avatar');
        Echo "Removed fields fullname, age, gender, status, avatar successfully.";
    }
}