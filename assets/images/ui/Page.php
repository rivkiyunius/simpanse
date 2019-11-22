<?php


class Page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== true){
            redirect('login');
        }
    }

    function index()
    {
        if ($this->session->userdata('level') === 'manajer'){
            redirect('order/listForAdmin');
        }else{
            echo "access denied";
        }
    }

    function dapur()
    {
        if ($this->session->userdata('level') === 'dapur'){
            redirect('order/indexKitchen');
        }else{
            echo "access denied";
        }
    }

    function kasir()
    {
        if ($this->session->userdata('level') === 'kasir'){
            redirect('order');
        }else{
            echo "access denied";
        }
    }
}