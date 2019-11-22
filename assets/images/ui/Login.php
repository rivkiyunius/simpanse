<?php


class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel");
    }

    function index()
    {
        if (!$this->session->userdata("logged_in") == true){
            $this->load->view('layout/login/form_login');
        }else{
            if ($this->session->userdata("level") === 'manajer') {
                redirect('page');
            } elseif ($this->session->userdata("level") === 'dapur') {
                redirect('page/dapur');
            } else {
                redirect('page/kasir');
            }
        }
    }

    function auth()
    {
        $username = $this->input->post('username', true);
        $password = sha1($this->input->post('password', true));
        $validate = $this->UserModel->validate($username, $password);
        if ($validate->num_rows() > 0) {
            $data = $validate->row_array();
            $username = $data['name'];
            $password = $data['password'];
            $level = $data['jabatan'];
            $sesdata = array(
                'username' => $username,
                'password' => $password,
                'level' => $level,
                'logged_in' => true
            );
            $this->session->set_userdata($sesdata);

            if ($level === 'manajer') {
                redirect('page');
            } elseif ($level === 'dapur') {
                redirect('page/dapur');
            } else {
                redirect('page/kasir');
            }
        } else {
            echo $this->session->set_flashdata('msg', 'username atau password salah');
            redirect('login');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}