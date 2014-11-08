<?php
/**
 * User Model class
 * @author Tuan Duong <bacduong@gmail.com>
 * @package Pingo - CI
 */

class Users extends PingoModel
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'users';
    }

    /**
     * [getUserByEmail description]
     * @param  String $email Email of users need to be looked up.
     * @return bool|array Array of user information
     */
    public function getUserByEmail($email)
    {
        return $this->getByField('email', $email);
       
    }

    /**
     * [getUserById description]
     * @param  int $id User Id
     * @return array Array of user information
     */
    public function getUserById($id)
    {
        return $this->getById($id);
    }

    /**
     * [updateUser description]
     * @param  array  $user Array of user information
     * @return bool
     */
    public function updateUser(array $user)
    {
        return $this->update($user);
    }

    /**
     * [createUser description]
     * @param  array  $user Array of new user informaton
     * @return bool | int Id of created user.
     */
    public function createUser(array $user)
    {
        if (!isset($user['email']) || !isset($user['password'])) {
            return false;
        }

        if ($this->getUserByEmail($user['email']) !== false) {
            return false;
        }
        $user['password'] = md5($user['password']);
        return $this->create($user);
       
    }

    public function saveUser(array $user)
    {
        if (isset($user['id'])) {
            return $this->updateUser($user);
        } else {
            return $this->createUser($user);
        }
    }
    public function login(array $user)
    {
    	$result=$this->getUserByEmail($user['email']);
    	if($result === FALSE)
    	{
    		$errorMessage = "Sorry,your email is not registered!!!!";
    		return $errorMessage;
    	}
    	elseif ($user['password']!=$result['password'])
    	{
    		$errorMessage = "Sorry,your password is wrong!!!";
    		return $errorMessage;
    	}	
    	$user_data= array (
    					'user_id' => $result['id'],
    					'user_email'=>$result['email'],
    					'user_pass' => $result['password'],
    					'login' => TRUE
    			);
    		// 			var_dump($query->result());
    		// 			var_dump($newses);
    		// 			die('xxxxx');
    	$this->session->set_userdata($user_data);
    	return true;
	}
}
?>