<?php


class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("PraktisiMedisModel");
    }

    public function index(){
        $this->load->view("login/login.php");
    }
}