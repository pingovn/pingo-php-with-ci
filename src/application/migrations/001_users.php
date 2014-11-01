<?php

class Migration_Users extends CI_Migration {
    public function up(){
        $this->dbforge->add_field("id int(10) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("email varchar(255) NOT NULL DEFAULT ''");
        $this->dbforge->add_field("password varchar(255) NOT NULL DEFAULT ''");
 
        $this->dbforge->add_key('id', TRUE);        
        $this->dbforge->create_table('users', TRUE);
        echo "Created table users with key id <br />";
    }
 
    public function down(){
        $this->dbforge->drop_table('users');
        echo "Drop users";
    }
}