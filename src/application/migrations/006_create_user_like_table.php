<?php

class Migration_Create_user_like_table extends CI_Migration {
    public function up(){
        $this->dbforge->add_field("user_id int(10) unsigned NOT NULL");        
        $this->dbforge->add_field("tip_id int(10) unsigned NOT NULL");
        
        $this->dbforge->add_key('user_id', TRUE);        
        $this->dbforge->add_key('tip_id', TRUE);        
        $this->dbforge->create_table('user_likes', TRUE);
        echo "Created table user_likes with key user_id and tip_id <br />";
    }
 
    public function down(){
        $this->dbforge->drop_table('user_likes');
        echo "Drop user_likes";
    }
}