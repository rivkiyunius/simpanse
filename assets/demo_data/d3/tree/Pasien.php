<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array("PasienModel"));
	}

	public function index()
	{
		$data['title'] = "Daftar Pasien";
		$data['page'] = "content/pasien/v_list_pasien";
		$data['pasien'] = $this->PasienModel->getAll()->result();
		$this->load->view('layout/main', $data);
	}

	public function tambah()
	{
		if ($this->input->post("submit")) {
			$data = array(
				'kode_pasien' => $this->input->post("kode_pasien"),
				'nama' => $this->input->post("nama"),
				'jk' => $this->input->post("jk"),
				'umur' => $this->input->post("umur"),
				'berat_badan' => $this->input->post("berat_badan"),
				'riwayat_diabetes' => $this->input->post("riwayat_diabetes")
			);
			$this->PasienModel->insert($data);
			redirect(pasien);
		} else {
			$data['title'] = "Tambah Data Pasien";
			$data['page'] = "content/pasien/v_add_pasien";
			$this->load->view('layout/main', $data);
		}
	}

	public function edit($id, $data)
	{
		if ($this->input->post("submit")) {
			$data = array(
				'kode_pasien' => $this->input->post("kode_pasien"),
				'nama' => $this->input->post("nama"),
				'jk' => $this->input->post("jk"),
				'umur' => $this->input->post("umur"),
				'berat_badan' => $this->input->post("berat_badan"),
				'riwayat_diabetes' => $this->input->post("riwayat_diabetes")
			);
			$this->PasienModel->update($id, $data);
			redirect(pasien);
		}else{
			$data['title'] = "Ubah Data Pasien";
			$data['page'] = "content/pasien/v_edit_pasien";
			$pasien = $this->PasienModel->getWhere(array("id" => $id))->result();
			$data['pasien']= $pasien[0];
			$this->load->view('layout/main', $data);
		}
	}
}
