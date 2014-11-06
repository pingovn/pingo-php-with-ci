<?php
/**
 * Pingo Model class
 * This class contains all needed methods to populate data for one table
 * @author Tuan Duong <bacduong@gmail.com>
 * @package Pingo - CI
 */

class PingoModel extends CI_Model
{
    protected $tableName = '';
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Insert one row into table
     * @param  array  $data
     * @return bool | int Id of created row.
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

    /**
     * Get row by ID
     * @param  int $id Id
     * @return array associated row
     */
    protected function getById($id)
    {
        return $this->getByField('id', $id);
    }

    /**
     * [getByField description]
     * @param  String $fieldName 
     * @param  String $fieldData 
     * @return  boolean|array Row of data
     */
    protected function getByField($fieldName, $fieldData)
    {
        $row = $this->db->where($fieldName, $fieldData)->get($this->tableName, 1)->result_array();
        if (count($row) == 1) {
            return $row[0];
        } else {
            return false;
        }
    }
}
?>