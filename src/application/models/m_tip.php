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

    public function getAllTipsToday()
    {
        $sql = "SELECT tips.*, email,avatar,fullname FROM tips
                    INNER JOIN users ON tips.user_id = users.id
                    WHERE create_time >= CURDATE()
                    ORDER BY create_time DESC";
        return $this->db->query($sql)->result_array();
    }

    public function getTipsToday($limit='',$pagenumber='',$orderby='t.create_time'){

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
        $sql = "SELECT tips.*, email,avatar,fullname FROM tips
                    INNER JOIN users ON tips.user_id = users.id
                    WHERE tips.user_id = ?
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



}
?>