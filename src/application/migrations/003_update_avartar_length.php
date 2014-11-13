<?php

class Migration_Update_avatar_length extends CI_Migration {
    public function up() {
        $fields = array(
             'avatar'  => array(
                'type'                 => 'VARCHAR',
                'constraint'        => '100',
                'null'                  => TRUE
            ),
        );

        $this->dbforge->drop_column('users', 'avatar');
        $this->dbforge->add_column('users', $fields);
        echo "Change avatar length successfully.";
        die();
    }

    public function down(){
        $fields = array(
            'avatar'  => array(
                'type'                 => 'VARCHAR',
                'constraint'        => '30',
                'null'                  => TRUE
            ),
        );
        $this->dbforge->drop_column('users', 'avatar');
        $this->dbforge->add_column('users', $fields);
        Echo "Moved avatar length back to 30 successfully.";
    }
}