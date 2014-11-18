<?php
class Topics extends PingoModel
{
	public function __construct()
	{
		parent::__construct();
		$this->tableName = 'topics';
	}
	/**
	 * [createUser description]
	 * @param  array  $user Array of new user informaton
	 * @return bool | int Id of created user.
	 */
	public function createTopic(array $data)
	{
		foreach ($data as $name)
		{
			$topic=array('name'=>$name);
			$this->create($topic);
            //$this->db->save_queries = true;
            //echo $this->db->last_query();die;
		}
	}
	public function getByName($name)
	{
		return $this->getByField('name', $name);
	}
	public function getAllTopics()
	{
// 		die;	
		return $this->getAllFields();
// 		foreach ($data as $)
// 		var_dump($this->getAllFields());
// 		die;
	}
}