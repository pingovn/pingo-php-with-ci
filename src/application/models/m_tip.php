<?php
/**
 * Created by PhpStorm.
 * User: Storm
 * Date: 11/14/14
 * Time: 12:40 PM
 */
class M_tip extends StormModel
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName ='tips';
    }

    public function showTip()
    {
        $row = $this->getAllRows('name');
        //var_dump($row);die;
        return $row;
    }

    public function addTips($data)
    {
        return $this->create($data);
    }

    public function getTipIdByName($tipname)
    {
        $this->tableName = 'topics';
        return $this->getRowByField('name',$tipname);
    }

    public function getNewTipsToday()
    {
        $sql = "SELECT tips.*, email,avatar,fullname, COUNT(user_like.tip_id) as like_number FROM tips
                    INNER JOIN users ON tips.user_id = users.id
                    LEFT JOIN user_like ON tips.id = user_like.tip_id
                    WHERE create_time >= CURDATE()
                    GROUP BY tips.id
                    ORDER BY create_time DESC
                    LIMIT 5";
        return $this->db->query($sql)->result_array();
    }

    public function getTipsWithMostLiked()
    {
        $sql = "SELECT tips.*, email,avatar,fullname,COUNT(user_like.tip_id) as like_number FROM tips
                    INNER JOIN users ON tips.user_id = users.id
                    LEFT JOIN user_like ON tips.id = user_like.tip_id
                    GROUP BY tips.id
                    ORDER BY like_number DESC
                    LIMIT 3";
        return $this->db->query($sql)->result_array();
    }

    public function getNewTipsTodayWithPagination($limit='',$pagenumber='',$orderby='t.create_time'){

        $this->db->select('t.*,email,avatar,fullname');
        $this->db->from('tips t');
        $this->db->join('users u','t.user_id = u.id');
        $this->db->where('t.create_time >=CURDATE()');
        $this->db->order_by($orderby);
        $count = $this->countAllTipToday();
        //var_dump($count[0]['numbers']);die;
        if($limit!='' && $pagenumber != '' && $count[0]['numbers'] > $limit)
        {
            $this->db->limit(intval($limit),intval(($pagenumber-1)*$limit));
        }
        $query = $this->db->get();
        //$this->db->save_queries = true;
        //$this->db->lastquery();
        return $query->result_array();
    }
    public function getAllTipsByUserID($id)
    {
        $sql = "SELECT tips.*, email,avatar,fullname,COUNT(user_like.tip_id) as like_number FROM tips
                    INNER JOIN users ON tips.user_id = users.id
                    LEFT JOIN user_like ON tips.id = user_like.tip_id
                    WHERE tips.user_id = ?
                    GROUP BY tips.id
                    ORDER BY create_time DESC";
        //var_dump($this->db->query($sql)->result_array());die;
        return $this->db->query($sql,$id)->result_array();
    }

    public function countAllTipToday()
    {
        $sql = "SELECT COUNT(*) as numbers FROM tips
        WHERE create_time >= CURDATE()
                    ORDER BY create_time DESC";
        $rows = $this->db->query($sql)->result_array();
        return $rows;
    }

    public function isUserLikedTip($userId, $tipId)
    {
        $sql = "
            SELECT COUNT(*) as like_number FROM user_like WHERE tip_id = ? AND user_id = ?
        ";
        $rows = $this->db->query($sql, array($tipId, $userId))->result_array();
        return $rows[0]['like_number'] > 0;
    }

    public function getAllTipsTodayWithLikeNumber()
    {
        $sql = "SELECT tips.*, email,avatar,fullname, COUNT(user_like.tip_id) as like_number FROM tips
                    INNER JOIN users ON tips.user_id = users.id
                    LEFT JOIN user_like ON tips.id = user_like.tip_id
                    WHERE create_time >= CURDATE()
                    GROUP BY tips.id
                    ORDER BY like_number DESC
                    LIMIT 5";
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
}
?>