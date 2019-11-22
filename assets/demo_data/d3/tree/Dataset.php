<?php


class Dataset extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("DatasetModel");
    }

    public function index()
    {
        $data["dataset"] = $this->DatasetModel->getAll()->result();
        var_dump($data['dataset']);
    }
}