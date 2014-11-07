<?php
/**
 * Storm Model class
 * Created by PhpStorm.
 * User: Storm
 * Date: 11/7/14
 * Time: 9:40 AM
 */
class StormModel extends CI_Model
{
    protected  $tableName = '';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * function insert a row into table
     * @param array $data
     * @return bool
     */
    protected function create(array $data)
    {
        $result = $this->db->insert($this->tableName, $data);
        if ($result == true) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    /**
     * Get row by ID
     * @param  int $id Id
     * @return array associated row
     */
    protected function getById($id)
    {
        return $this->getRowByField('id', $id);
    }

    /**
     * [getRowByField description]
     * @param  String $fieldName
     * @param  String $fieldData
     * @return  boolean|array Row of data
     */
    protected function getRowByField($fieldName, $fieldData)
    {
        $this->db->where($fieldName, $fieldData);
        $query = $this->db->get($this->tableName, 1);
        $row = $query->result_array();
        if (count($row) == 1) {
            return $row[0];
        } else {
            return false;
        }
    }

    /**
     * [getFieldByField description]
     * @param  String $fieldName
     * @param  String $fieldData
     * @return  boolean|array Row of data
     */
    protected function getFieldByField(array $fieldDataNeed,$fieldName, $fieldData)
    {
        $this->db->select($fieldDataNeed);
        $this->db->where($fieldName, $fieldData);
        $query = $this->db->get($this->tableName, 1);
        $row = $query->result_array();
        if (count($row) == 1) {
            return $row[0];
        } else {
            return false;
        }
    }

    /**
     *  Update data in table
     * @param  array  $data
     * @return bool | int   Number of effected rows.
     */
    protected function update(array $data)
    {
        $where = array('id' => $data['id']);
        unset($data['id']);
        return $this->db->update($this->tableName, $data, $where);
    }
}
?>