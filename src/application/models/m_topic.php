<?php
/**
 * Created by PhpStorm.
 * User: Storm
 * Date: 11/14/14
 * Time: 12:40 PM
 */
class M_topic extends StormModel
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName ="";
    }

    public function show()
    {
        $row = $this->getAllRows('name');
        //var_dump($row);die;
        return $row;
    }

    public function addTips($data)
    {
        $this->tableName = 'tips';
        $this->create($data);
        return ;
    }

    public function getTipIdByName($tipname)
    {
        $this->tableName = 'topics';
        return $this->getRowByField('name',$tipname);
    }


}
?>