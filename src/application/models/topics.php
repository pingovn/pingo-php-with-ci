<?php
class Topics extends PingoModel
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'topics';
    }

    public function getAllTopics()
    {
        return  $this->getAll();
    }

}