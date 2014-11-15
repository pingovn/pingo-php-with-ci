<?php
/**
 * Tip Model class
 * @author Tuan Duong <bacduong@gmail.com>
 * @package Pingo - CI
 */

class Tips extends PingoModel
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'tips';
    }

    public function createTip(array $data)
    {
        return $this->create($data);
    }

    public function getAllTipsToday()
    {
        $sql = "SELECT tips.*, email FROM tips  
                    INNER JOIN users ON tips.user_id = users.id
                    WHERE create_time >= CURDATE()
                    ORDER BY create_time DESC";
        return $this->db->query($sql)->result_array();
    }
}
?>