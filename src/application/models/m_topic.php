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
        $this->tableName ='topics';
    }

    public function showTopic()
    {
        $row = $this->getAllRows('name');
        //var_dump($row);die;
        return $row;
    }

    public function getTopicIdByName($topicname)
    {
        return $this->getRowByField('name',$topicname);
    }
}
?>