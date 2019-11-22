<?php


class PasienModel extends CI_Model
{
	private $table = "pasien";

	public function getAll()
	{
		return $this->db->get($this->table);
	}

	public function getWhere($id)
	{
		return $this->db->where($id)->get($this->table);
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($id, $data)
	{
		return $this->db->where(array("id"=>$id))->update($this->table, $data);
	}
}
