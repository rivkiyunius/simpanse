<?php


class DatasetModel extends CI_Model
{
    private $table = "dataset";

    public function getAll()
    {
        return $this->db->get($this->table);
//        return $this->db->errorInfo();
    }

    public function getWhere($attributes)
    {
        return $this->db->where($attributes)->get($this->table);
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where(array("id" => $id))->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->where(array("id" => $id))->delete($this->table);
    }
}