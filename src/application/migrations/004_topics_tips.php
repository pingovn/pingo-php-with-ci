<?php
class Migration_Topics_Tips extends CI_Migration {
    public function up(){
    /**
     * Create TIPs table
     */
        $this->dbforge->add_field(array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 10,
                    'unsigned' => TRUE,
                    'null' => FALSE,
                    'auto_increment' => TRUE,
                ),
                'content' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'user_id' => array(
                    'type' => 'INT',
                    'constraint' => 10,
                    'unsigned' => TRUE,
                    'null' => TRUE,
                ),
                'topic_id' => array(
                    'type' => 'INT',
                    'constraint' => 10,
                    'unsigned' => TRUE,
                    'null' => TRUE,
                ),
                'create_time' => array(
                    'type' => 'TIMESTAMP',
                    'null' => TRUE,
                ),
                'update_time' => array(
                    'type' => 'TIMESTAMP',
                    'null' => TRUE,
                ),
                'is_deleted' => array(
                    'type' => 'BOOLEAN',
                    'default' => 0,
                )
        ));
        //var_dump($a);die;
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tips', TRUE);
        echo "Created table tips with key id <br />";
        /**
         * Create TIPs table
         **/
        $this->dbforge->add_field(array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 10,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                    'null' => TRUE,
                )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('topics', TRUE);
        echo "Created table topics with key id <br />";
        /*Load default database  */
        $this->load->model("PingoModel");
        $this->load->model("Topics", "topicModel");
        $data = array('Love','Sports','Society','Funny','Future','God',
                'Communication','Car','Money','Girl','Learning','Science','Relationship',
                'Dream','Education','Pet','Food','Beauty','Beer'
        );
        $this->topicModel->createTopic($data);
    }

    public function down(){
        $this->dbforge->drop_table('tips');
        echo "Drop tips";
        
        $this->dbforge->drop_table('topics');
        echo "Drop topics";
        
    }
}