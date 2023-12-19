<?php
defined('BASEPATH') or exit('no direct script access allowed');
class shop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('shop_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        echo $data['user']['name'];
        $this->load->library('pagination');
        $data['shop_model'] = $this->shop_model->getshop();

        $data['judul'] = "Shop ";
        $this->load->view('template/header', $data);
        $this->load->view('isi/shop', $data);
        $this->load->view('template/footer', $data);
    }
}
