<?php
/**
 * Created by PhpStorm.
 * User: rivki
 * Date: 2019-03-26
 * Time: 23:21
 */

class UserModel extends CI_Model
{
    private $table = "user";

    public function getAll()
    {
        return $this->db->get($this->table);
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

    public function validate($username, $password){
        $this->db->where('nama',$username);
        $this->db->where('password',$password);
        $result = $this->db->get("user",1);
        return $result;
    }
}