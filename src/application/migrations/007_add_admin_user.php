<?php

class Migration_Add_admin_user extends CI_Migration {
    public function up()
    {
        $fields = array(
                'is_admin'  => array(
                        'type'                 => 'INT',
                        'constraint'        => '1',
                        'null'                  => TRUE,
                        'default'             => '0'
                    )
            );
        $this->dbforge->add_column('users', $fields);
        $this->load->model("PingoModel");
        $this->load->model('users', 'userModel');
        $adminUser = array(
            'email' => 'admin@tip.com',
            'password'  => '123456',
            'is_admin'  => 1
            );
        $this->userModel->createUser($adminUser);
        echo "Added is_admin field and add new admin user";
    }
 
    public function down()
    {
        $this->dbforge->drop_column('users', 'is_admin');
        echo "Dropped is_admin field";
    }
}