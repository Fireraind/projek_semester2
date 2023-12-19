<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->session->userdata('email')) {
			redirect('home');
		}


		if ($this->form_validation->run() == false) {
			$data['judul'] = "login";
			$this->load->view('template/header_auth', $data);
			$this->load->view('auth/login', $data);
			$this->load->view('template/footer_auth', $data);
		} else {
			$this->_login();
		}
	}
	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			if ($user['is_active'] == 1) {
				//check password 
				if (password_verify($password, $user['password'])) {

					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('home');
					} else {
						redirect('shop');
					}
				} else {
					$this->session->set_flashdata('login_failed', 'Wrong password
					');
					redirect('auth');
				}
				// check password end
			} else {
				$this->session->set_flashdata('login_failed', 'Email has not been active
				');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('login_failed', 'Email is not registered	');
			redirect('auth');
		}
	}



	public function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('home');
		}
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|valid_email|is_unique[user.email]',
			[
				'is_unique' => 'This email has already registered!'
			],
		);
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[3]|matches[password2]',
			[
				'matches' => 'password dont match!',
				'min_length' => 'Password too short!'
			]
		);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]',);

		if ($this->form_validation->run() == false) {
			$data['judul'] = "Registration";
			$this->load->view('template/header_auth', $data);
			$this->load->view('auth/register', $data);
			$this->load->view('template/footer_auth', $data);
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', 'Your account has been created. Please Login');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', 'Logout success ');
		redirect('auth');
	}
}
