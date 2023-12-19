<?php
defined('BASEPATH') or exit('no direct script access allowed');
class home extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                if (!$this->session->userdata('email')) {
                        redirect('auth');
                }
        }

        public function index()
        {

                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                echo $data['user']['name'];
                $data['judul'] = "Dassboard";
                $this->load->view('template/header', $data);
                $this->load->view('isi/dashboard', $data);
                $this->load->view('template/footer', $data);
        }
}
