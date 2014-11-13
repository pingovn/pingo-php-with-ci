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

<<<<<<< HEAD:src/application/migrations/003_update_avartar_length.php
        $this->dbforge->drop_column('users', 'avatar');
        $this->dbforge->add_column('users', $fields);
=======
        $this->dbforge->modify_column ('users', $fields);
>>>>>>> 834c880... correct code in migration for avatar length:src/application/migrations/003_update_avatar_length.php
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
<<<<<<< HEAD:src/application/migrations/003_update_avartar_length.php
        $this->dbforge->drop_column('users', 'avatar');
        $this->dbforge->add_column('users', $fields);
=======
        $this->dbforge->modify_column ('users', $fields);
>>>>>>> 834c880... correct code in migration for avatar length:src/application/migrations/003_update_avatar_length.php
        Echo "Moved avatar length back to 30 successfully.";
    }
}