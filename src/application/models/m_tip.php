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

    public function getAllTipsByUserID($id)
    {
        $sql = "SELECT tips.*, email,avatar,fullname FROM tips
                    INNER JOIN users ON tips.user_id = users.id
                    WHERE create_time >= CURDATE() AND tips.user_id =".$id."
                    ORDER BY create_time DESC";
        //var_dump($this->db->query($sql)->result_array());die;
        return $this->db->query($sql)->result_array();
    }
}
?>