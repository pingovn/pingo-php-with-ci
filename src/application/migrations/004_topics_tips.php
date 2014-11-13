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
						'auto_increment' => TRUE
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
						'default' => FALSE,
				)
		));		
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
		$this->dbforge->create_table('topics', TRUE);
		echo "Created table topics with key id <br />";
	}

	public function down(){
		$this->dbforge->drop_table('tips');
		echo "Drop tips";
		
		$this->dbforge->drop_table('topics');
		echo "Drop tips";
		
	}
}