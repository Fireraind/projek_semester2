<?php
defined('BASEPATH') or exit('no direct script access allowed');
class dataproduct extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('product_model');
    }

    public function index()
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        echo $data['user']['name'];



        $this->load->library('pagination');


        $data['product_model'] = $this->product_model->getalldataproduct();

        $data['judul'] = "Product Data ";
        $this->load->view('template/header', $data);
        $this->load->view('isi/dataproduct', $data);
        $this->load->view('template/footer',);
    }
    // public function search()
    // {
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     echo $data['user']['name'];
    //     $this->load->library('pagination');

    //     $config['base_url'] = 'http://localhost/projek_semester3/dataproduct/index';
    //     $config['total_rows'] = $this->product_model->countproduct();
    //     $config['per_page'] = 8;

    //     $this->pagination->initialize($config);


    //     $data['start'] = $this->uri->segment(4);
    //     $data['product_model'] = $this->product_model->getalldataproduct($config['per_page'], $data['start']);
    //     $search = $this->input->post('search');

    //     $data['product'] = $this->product_model->getsearch($search, $config['per_page'], $data['start']);

    //     $data['judul'] = "Product Data ";
    //     $this->load->view('template/header', $data);
    //     $this->load->view('isi/dataproduct', $data);
    //     $this->load->view('template/footer',);
    // }


    public function insert()
    {
        $this->form_validation->set_rules('product', 'Product', 'trim|is_unique[product.product]');
        $this->form_validation->set_rules('id_brand', 'ID_Brand', 'trim');
        $this->form_validation->set_rules('price', 'Price', 'trim');
        $this->form_validation->set_rules('stock', 'Stock', 'trim');
        $this->form_validation->set_rules('spec', 'Specification', 'trim');
        $product = htmlspecialchars($this->input->post('product', true));
        $brand = $this->input->post('id_brand');
        $price = $this->input->post('price');
        $stock = $this->input->post('stock');
        $spec = htmlspecialchars($this->input->post('specification', true));
        $date_created = time();
        $image = $_FILES['img_product'];

        if ($image = '') {
        } else {
            $config['upload_path'] = './assets/img/product/';
            $config['allowed_types'] = 'jpg|png|gif';
            $config['max_size']     = '10000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('img_product')) {
                echo "Upload Gagal";
                die();
            } else {
                $image = $this->upload->data('file_name');
            }
        }
        // ganti nama

        $this->db->set('product', $product);
        $this->db->set('id_brand', $brand);
        $this->db->set('price', $price);
        $this->db->set('stock', $stock);
        $this->db->set('specification', $spec);
        $this->db->set('date_created', $date_created);
        $this->db->set('img_product', $image);
        $this->db->insert('product');
        $this->session->set_flashdata('message', 'Insert Data success');
        redirect('dataproduct');
    }
    public function deleteproduct($id)
    {
        $delete = $this->db->query("SELECT * FROM product WHERE id=$id");
        $data = $delete->row();
        if ($data) {
            $photo = $data->img_product;
            if (file_exists('assets/img/product/' . $photo)) {
                $this->product_model->deleteproduct($id);
                unlink('assets/img/product/' . $photo);
            } else {
                echo "File not found";
                die();
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil dihapus </div>');
        } else {
            echo "Data not found";
            die();
        }
        redirect('dataproduct');
    }
    public function editproduct()
    {
        // $data['product_model'] = $this->product_model->getalldataproduct($config['per_page'], $data['start']);
        $this->form_validation->set_rules('product', 'Product', 'trim|is_unique[product.product]');
        $this->form_validation->set_rules('id_brand', 'ID_Brand', 'trim');
        $this->form_validation->set_rules('price', 'Price', 'trim');
        $this->form_validation->set_rules('stock', 'Stock', 'trim');
        $this->form_validation->set_rules('spec', 'Specification', 'trim');

        $product_id = $this->input->post('id');
        $product = htmlspecialchars($this->input->post('product', true));
        $brand = $this->input->post('id_brand');
        $price = $this->input->post('price');
        $stock = $this->input->post('stock');
        $spec = htmlspecialchars($this->input->post('specification', true));
        $upload_image = $_FILES['img_product']['name'];
        // ganti gambar
        $current_product = $this->db->get_where('product', ['id' => $product_id])->row();
        $img_product = $current_product->img_product;
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '10000';
            $config['upload_path'] = './assets/img/product/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('img_product')) {
                // biar file sebelumnya keapus
                $old_image = $img_product;
                if ($old_image) {
                    // end
                    unlink(FCPATH . 'assets/img/product/' . $old_image);
                }
                // end
                $new_image = $this->upload->data('file_name');
                $this->db->set('img_product', $new_image);
            } else {
                echo "File not found";
                die();
            }
        }

        $this->db->set('product', $product);
        $this->db->set('id_brand', $brand);
        $this->db->set('price', $price);
        $this->db->set('stock', $stock);
        $this->db->set('specification', $spec);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('product');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Edit Data success </div>');
        redirect('dataproduct');
    }
}
