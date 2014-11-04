<?php
/**
 * User Model class
 * @author Tuan Duong <bacduong@gmail.com>
 * @package Pingo - CI
 */

class Users extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * [getUserByEmail description]
     * @param  String $email Email of users need to be looked up.
     * @return bool|array Array of user information
     */
    public function getUserByEmail($email)
    {
        $user = $this->db->where('email', $email)->get('users', 1)->result_array();
        if (count($user) == 1) {
            return $user[0];
        } else {
            return false;
        }
    }

    /**
     * [getUserById description]
     * @param  int $id User Id
     * @return array Array of user information
     */
    public function getUserById($id)
    {
        $user = $this->db->where('id', $id)->get('users', 1)->result_array();
        if (count($user) == 1) {
            return $user[0];
        } else {
            return false;
        }
    }

    /**
     * [updateUser description]
     * @param  array  $user Array of user information
     * @return bool
     */
    public function updateUser(array $user)
    {
        $where = array('id' => $user['id']);
        unset($user['id']);
        return $this->db->update('users', $user, $where);
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
        $result = $this->db->insert('users', $user);
        if ($result == true) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function saveUser(array $user)
    {
        if (isset($user['id'])) {
            return $this->updateUser($user);
        } else {
            return $this->createUser($user);
        }
    }
}
?>