<?php
defined('BASEPATH') or exit('no direct script access allowed');
class invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model('invoice_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        echo $data['user']['name'];

        $this->load->library('pagination');

        // $config['base_url'] = 'http://localhost/projek_semester3/invoice/index';
        // $config['total_rows'] = $this->invoice_model->countinvoice();
        // $config['per_page'] = 1;

        // $this->pagination->initialize($config);

        // $data['start'] = $this->uri->segment(3);
        $data['invoice_model'] = $this->invoice_model->getinvoice();
        $data['judul'] = "invoice";
        $this->load->view('template/header', $data);
        $this->load->view('isi/invoice', $data);
        $this->load->view('template/footer', $data);
    }
    public function update()
    {
        $data['user_model'] = $this->invoice_model->getinvoice($config['per_page'], $data['start']);

        $data = array(
            'resi' => $this->input->post('resi'),
            'status' => $this->input->post('status'),
            'invoice' => $this->input->post('invoice')
        );
        $this->db->where('id_order', $this->input->post('id_order'));
        $this->db->update('ordering', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Data Invoice success</div>');
        redirect('invoice');
    }
}
