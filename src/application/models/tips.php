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

    public function getAllTipsTodayWithLikeNumber()
    {
        $sql = "SELECT tips.*, users.fullname as 'user_name', users.avatar, topics.name as 'topic_name', COUNT(user_like.tip_id) as like_number FROM tips
                    INNER JOIN users ON tips.user_id = users.id
                    INNER JOIN topics ON tips.topic_id = topics.id
                    LEFT JOIN user_like ON tips.id = user_like.tip_id
                    WHERE create_time >= CURDATE()
                    GROUP BY tips.id
                    ORDER BY like_number DESC";
        $tips = $this->db->query($sql)->result_array();
        return $tips;
    }

    public function calculateLikeNumber($tipId)
    {
        $sql = "
            SELECT COUNT(*) as like_number FROM user_like WHERE tip_id = ?
        ";
        $rows = $this->db->query($sql, $tipId)->result_array();
        return $rows[0]['like_number'];
    }

    public function isUserLikedTip($userId, $tipId)
    {
        $sql = "
            SELECT COUNT(*) as like_number FROM user_like WHERE tip_id = ? AND user_id = ?
        ";
        $rows = $this->db->query($sql, array($tipId, $userId))->result_array();
        return $rows[0]['like_number'] > 0;
    }

    public function getMostLikedTip ()
    {
        $sql = "SELECT tips.*, users.fullname as 'user_name', users.avatar, topics.name as 'topic_name', COUNT(user_like.tip_id) as like_number FROM tips
                    INNER JOIN users ON tips.user_id = users.id
                    INNER JOIN topics ON tips.topic_id = topics.id
                    LEFT JOIN user_like ON tips.id = user_like.tip_id
                    GROUP BY tips.id
                    ORDER BY like_number DESC
                    LIMIT 5 ";
        $tips = $this->db->query($sql)->result_array();
        return $tips;
    }

    public function getLatestTip ()
    {
        $sql = "SELECT tips.*, users.fullname as 'user_name', users.avatar, topics.name as 'topic_name', COUNT(user_like.tip_id) as like_number FROM tips
                    INNER JOIN users ON tips.user_id = users.id
                    INNER JOIN topics ON tips.topic_id = topics.id
                    LEFT JOIN user_like ON tips.id = user_like.tip_id
                    GROUP BY tips.id
                    ORDER BY create_time DESC
                    LIMIT 3 ";
        $tips = $this->db->query($sql)->result_array();
        return $tips;
    }

}
?>