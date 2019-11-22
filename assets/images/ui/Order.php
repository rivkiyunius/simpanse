<?php


class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('OrderModel', 'MenusModel', 'MejaModel', 'OrderMenuModel'));
        if ($this->session->userdata('logged_in') !== true){
            redirect('login');
        }
    }

    public function index()
    {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('login'); # Login view
        } else {
            #user Logged in
            $data['page'] = 'content/order/v_order_list';
            $data['judul'] = 'Order';
            $data['user'] = $this->session->userData("username");
            $data['order'] = $this->OrderModel->getAll()->result();
            $data['menu'] = $this->MenusModel->getOnlyMenus()->result();
            $data['meja'] = $this->MejaModel->getAll()->result();
            $this->load->view('layout/main', $data);
        }
    }

    public function indexKitchen()
    {
        $data['page'] = 'content/order/v_order_list_for_kitchen';
        $data['judul'] = 'Order';
        $data['order'] = $this->OrderModel->getAll()->result();
        $data['meja'] = $this->MejaModel->getAll()->result();
        $this->load->view('layout/main', $data);

    }

    public function changeStatus($id)
    {
        $data = array("status_order" => "delivery");
        if ($this->input->post("status_order")){
            $data = array(
                "status_order" => "delivery"
            );
        }else{
            $this->OrderModel->update($id, $data);
            redirect('order/indexKitchen');
        }

    }

    function simpan()
    {
        $menuTrs = $this->input->post('menu_trs');
        $idMeja = $this->input->post('meja_id');
        $dataTransaksi = array(
            'meja_id' => $this->input->post('meja_id'),
            'tanggal' => date('Y-m-d'),
            'diskon' => $this->input->post('diskon'),
            'total' => $this->input->post('total'),
            'total_harga' => $this->input->post('total_harga'),
            'status_order' => 'cooking'
        );

        $idTransaksi = $this->OrderModel->insertGetId($dataTransaksi);
        foreach ($menuTrs as $mt) {
            $dataTransaksi = array(
                "orders_id" => $idTransaksi,
                "menu_id" => $mt["menu_id"],
                "qty" => $mt["qty"],
                "tanggal" => date('Y-m-d H:i:s')
            );
            $this->OrderMenuModel->insert($dataTransaksi);
        }

        $dataMeja = array(
          "status"  => "used"
        );
        $this->MejaModel->update($idMeja, $dataMeja);
        redirect('order/index');
    }


    function transaksi()
    {
        $data['page'] = 'content/order/v_order_list_for_casher';
        $data['judul'] = 'Order';
        $data['order'] = $this->OrderModel->getAll()->result();
        $data['meja'] = $this->MejaModel->getAll()->result();
        $this->load->view('layout/main', $data);
    }

    function pembayaran($id)
    {
        if ($this->input->post('bayar')){
            $data = array(
              'status_order' => 'paid'
            );
            $this->OrderModel->update($id, $data);
            $idMeja = $this->input->post("id_meja");
            $dataMeja = array(
                'status' => 'free'
            );
            $this->MejaModel->update($idMeja, $dataMeja);

            redirect('order/transaksi');
        }else{
            $dataTransaksi = $this->OrderModel->getWhereTrx(array("id_orders"=>$id))->result();
            $dataOrder = $this->OrderModel->getWhere(array("id"=>$id))->result();
            $data['page'] = 'content/order/v_order_transaksi';
            $data['judul'] = 'Transaksi Pembayaran';
            $data['trx'] = $dataTransaksi;
            $data['order'] = $dataOrder[0];
//        $data['meja'] = $this->MejaModel->getAll()->result();
//        var_dump($dataTransaksi);
            $this->load->view('layout/main', $data);
        }
    }

    function listForAdmin()
    {
        $data['page'] = 'content/order/v_order_list_for_admin';
        $data['judul'] = 'List Order Success transaksi';
        $data['orders'] = $this->OrderModel->getAll()->result();
        $data['meja'] = $this->MejaModel->getAll()->result();
        $this->load->view('layout/main', $data);
    }
}