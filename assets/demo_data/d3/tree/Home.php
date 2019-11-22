<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title']= "Dashboard";
		$data['page']="content/dashboard";
		$this->load->view('layout/main', $data);
	}
}
