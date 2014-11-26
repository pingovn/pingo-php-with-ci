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
    
    public function updateUserPas($user,$oldPassword,$newPassword)
    {
    	$data=$this->getUserByEmail($user['userEmail']);
    	var_dump($data);
    	$oldPassword =md5($oldPassword);
    	var_dump($oldPassword);
    	if ($data == false) {
//     		var_dump('aaaa');
    		return false;
    	}
    	if($oldPassword!=$data['password'])
    	{	
//     		var_dump('bbbb');
    		return false;
    	}
    	$data['password']=md5($newPassword);
    	return $this->update($data);
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

    public function editUser(array $user)
    {
    	if (isset($user['id'])) {
    		return $this->updateUser($user);
    	} else {
    		return false;
    	}
    }

    public function editAvt(array $user, $filename)
    {
    	if (isset($user['id'])) {
    		$user['avatar']=$filename;
//     		var_dump($user);
//     		die;
    		return $this->updateUser($user);
    	} else {
    		return false;
    	}
    }
    
    public function login(array $loginUser)
    {
    	$findUser=$this->getUserByEmail($loginUser['email']);
    	$loginUser['password']=md5($loginUser['password']);
//     	var_dump($loginUser);
//     	var_dump($findUser);
    	
//     	die;
    	if($findUser === FALSE)
    	{
    		return false;
    	}
    	elseif ($findUser['password']!=$loginUser['password'])
    	{
    		return false;
    	}	
    	$userSes= array (
    					'userId' => $findUser['id'],
    					'userEmail'=>$findUser['email'],
    			);
    		// 			var_dump($newses);
    		// 			die('xxxxx');
    	$this->session->set_userdata($userSes);
    	return true;
	}

    public function isLogged()
    {
        $userId = $this->session->userdata('userId');
        return !empty($userId);
    }
	
    public function likeTip($userId,$tipId)
    {
    	$userId = intval($userId);
    	$tipId = intval($tipId);
    	if($userId===0 || $tipId===0){
    		return false;
    	}
    	$sql = "INSERT INTO user_like (user_id,tip_id) VALUES (?,?)";
    	return $this->db->query($sql,array($userId,$tipId));
    }
}
?>