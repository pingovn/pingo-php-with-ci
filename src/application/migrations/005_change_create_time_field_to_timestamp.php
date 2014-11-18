<?php
class Migration_Change_create_time_field_to_timestamp extends CI_Migration {
	public function up(){
  	  	$this->load->database();
    	$sql="ALTER TABLE tips MODIFY COLUMN create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP";
        $result=$this->db->query($sql);
        if($result === TRUE){
        	echo "Modify create_time field to default current_timestamp successfully";
        }
        else{
        	echo "Modify create_time field to default current_timestamp fail";
        }
    }

    public function down(){
       $sql="ALTER TABLE tips MODIFY COLUMN create_time TIMESTAMP DEFAULT";
       $result=$this->db->query($sql);
       if($result === TRUE){
        	echo "Moved create_time field type back to old default type successfully.";
        }
        else{
        	echo "Moved create_time field type back to old default type fail";
        }
    }
}