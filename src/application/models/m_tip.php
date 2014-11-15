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
        $this->tableName ="tips";
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


}
?>