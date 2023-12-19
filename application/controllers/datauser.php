<?php
defined('BASEPATH') or exit('no direct script access allowed');
class datauser extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                if (!$this->session->userdata('email')) {
                        redirect('auth');
                }

                $this->load->model('user_model');
                $this->load->library('form_validation');
        }
        public function index()
        {
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                echo $data['user']['name'];

                $data['judul'] = "User Data ";

                $this->load->library('pagination');

                // $config['base_url'] = 'http://localhost/projek_semester3/datauser/index';
                // $config['total_rows'] = $this->user_model->countuser();
                // $config['per_page'] = 8;

                // $this->pagination->initialize($config);

                // $data['start'] = $this->uri->segment(3);
                $data['user_model'] = $this->user_model->getalldatauser();
                $this->load->view('template/header', $data);
                $this->load->view('isi/datauser', $data);
                $this->load->view('template/footer',);
        }
        public function update()
        {
                $data['user_model'] = $this->user_model->getalldatauser($config['per_page'], $data['start']);

                $active = $this->input->post('is_active');
                $email = $this->input->post('email');
                $this->db->set('is_active', $active);
                $this->db->set('email', $email);
                $this->db->where('id', $this->input->post('id'));
                $this->db->update('user');
                $this->session->set_flashdata('message', '
        Update Data User success');
                redirect('datauser');
        }
}
