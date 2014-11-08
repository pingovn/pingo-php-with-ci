<?php
/**
 * Created by PhpStorm.
 * User: Storm
 * Date: 11/2/14
 * Time: 10:55 PM
 */
class M_user extends StormModel
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'users';
    }


    /**
     * Function insert a user's information into table
     * @param array $user
     * @return bool
     */
    public function insert_user(array $user)
    {
        return $this->create($user);
    }

    /**
     * [updateUser description]
     * @param  array  $user Array of user information
     * @return bool
     */
    public function update_user(array $user)
    {
        return $this->update($user);
    }

    public function login($email, $password)
    {
        $this->db->select('id, email, password');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function show_user($id)
    {
        return $this->getById($id);
    }

    public function save_user(array $user)
    {
        if (isset($user['id'])) {
            return $this->update_user($user);
        } else {
            return $this->insert_user($user);
        }
    }

    public function change_pass(array $data)
    {
        return $this->update($data);
    }

    public function get_passbyid($id)
    {
        $user = $this->getFieldByField(array('password'), 'id', $id);
//        var_dump($user['password']);die;
        return $user['password'];
    }

    public function add_image(array $data)
    {
        return $this->update($data);
    }
}


?>