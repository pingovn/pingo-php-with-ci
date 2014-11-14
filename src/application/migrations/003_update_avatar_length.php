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

        $this->dbforge->modify_column ('users', $fields);
        echo "Change avatar length successfully.";
    }

    public function down(){
        $fields = array(
            'avatar'  => array(
                'type'                 => 'VARCHAR',
                'constraint'        => '30',
                'null'                  => TRUE
            ),
        );
        $this->dbforge->modify_column ('users', $fields);
        echo "Moved avatar length back to 30 successfully.";
    }
}