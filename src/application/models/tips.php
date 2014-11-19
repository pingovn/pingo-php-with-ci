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
        $sql = "SELECT tips.*, users.fullname as 'user_name', users.avatar, topics.name as 'topic_name' FROM tips
                    INNER JOIN users ON tips.user_id = users.id
                    INNER JOIN topics ON tips.topic_id = topics.id
                    WHERE create_time >= CURDATE()
                    ORDER BY create_time DESC";
        return $this->db->query($sql)->result_array();
    }

    public function getTipsByUser($user_id)
    {
//        var_dump($user_id); die();
        $sql = "SELECT tips.*, users.fullname as 'user_name', users.avatar, topics.name as 'topic_name' FROM tips
                    INNER JOIN users ON tips.user_id = users.id
                    INNER JOIN topics ON tips.topic_id = topics.id
                    WHERE tips.user_id = " . $user_id .
                    " ORDER BY create_time DESC";
        return $this->db->query($sql)->result_array();
    }
}
?>