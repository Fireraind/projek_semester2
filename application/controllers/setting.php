<?php
defined('BASEPATH') or exit('no direct script access allowed');
class setting extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                $this->load->library('form_validation');

                if (!$this->session->userdata('email')) {
                        redirect('auth');
                }
        }
        public function index()
        {
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                echo $data['user']['name'];
                $data['judul'] = "setting";
                $this->load->view('template/header', $data);
                $this->load->view('isi/setting', $data);
                $this->load->view('template/footer', $data);
        }

        public function edit()
        {

                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                echo $data['user']['name'];
                $this->form_validation->set_rules('name', 'Name', 'required|trim');
                $this->form_validation->set_rules('addres', 'Addres', 'trim');
                $this->form_validation->set_rules(
                        'phone',
                        'Phone',
                        'required|trim|numeric'
                );;

                $data['judul'] = "Edit Profile";
                if ($this->form_validation->run() == false) {

                        $this->load->view('template/header', $data);
                        $this->load->view('form/edit_profile', $data);
                        $this->load->view('template/footer', $data);
                } else {
                        // mengganti data (edit prpfil) di database
                        $name = $this->input->post('name');
                        $email = $this->input->post('email');
                        $phone = $this->input->post('phone');
                        $addres = $this->input->post('addres');
                        $upload_image = $_FILES['image']['name'];
                        // ganti gambar
                        if ($upload_image) {
                                $config['allowed_types'] = 'gif|jpg|png';
                                $config['max_size']     = '10000';
                                $config['upload_path'] = './assets/img/profile/';

                                $this->load->library('upload', $config);

                                if ($this->upload->do_upload('image')) {
                                        // biar file sebelumnya keapus
                                        $old_image = $data['user']['image'];
                                        // agar file default.jpg tidak terhapus
                                        if ($old_image != 'default.jpg') {
                                                // end
                                                unlink(FCPATH . 'assets/img/profile/' . $old_image);
                                        }
                                        // end
                                        $new_image = $this->upload->data('file_name');
                                        $this->db->set('image', $new_image);
                                } else {
                                        echo $this->upload->dispay_errors();
                                }
                        }
                        // ganti nama

                        $this->db->set('addres', $addres);
                        $cek = $this->db->get_where('user', array('phone' => $phone))->num_rows();
                        if ($cek > 0) {
                                echo "this phone already registered";
                                die();
                        } else {
                                $new_phone_data = array(
                                        'phone' => $phone
                                );
                        }
                        $this->db->where('email', $email);
                        $this->db->set('name', $name);
                        $this->db->update('user', $new_phone_data);
                        // end
                        $this->session->set_flashdata('message', '
			Your profile has been update!');
                        redirect('setting');
                }
        }

        public function changepw()
        {
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                echo $data['user']['name'];

                $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
                $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
                $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

                $data['judul'] = "Change Password";
                if ($this->form_validation->run() == false) {

                        $this->load->view('template/header', $data);
                        $this->load->view('form/change_password', $data);
                        $this->load->view('template/footer', $data);
                } else {

                        $email = $this->input->post('email');
                        $current_password = $this->input->post('current_password');
                        $new_password = $this->input->post('new_password1');
                        if (!password_verify($current_password, $data['user']['password'])) {
                                $this->session->set_flashdata('error', 'Wrong Password!');
                                redirect('setting/changepw');
                        } else {
                                if ($current_password == $new_password) {
                                        $this->session->set_flashdata('error', 'Password cannot be the same ');
                                        redirect('setting/changepw');
                                } else {
                                        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                                        $this->db->set('password', $password_hash);
                                        $this->db->where('email', $email);
                                        $this->db->update('user');
                                        $this->session->set_flashdata('message', 'Password Change!');
                                        redirect('auth/logout');
                                }
                        }
                }
        }
}
