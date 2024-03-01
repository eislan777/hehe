<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if( $this->form_validation->run() == false) {
			$data['title'] = 'Halaman Login';
			$this->load->view('templates/header-auth', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/footer-auth');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$login = $this->db->get_where('user', ['Email' => $email])->row_array();

			if($login) {

				if( $login['IsActive'] == 1) {

					
					if($login['Password'] == $password) {
					$data = [
						'email' => $login['Email'],
						'akses' => $login['RoleID'],
						'user' => $login['UserID'],
					];

					$this->session->set_userdata($data);

					if($login['RoleID'] == 1) {
						redirect('menu/index');
					} else {
						redirect('menu/index');
					}
					} else {
						$this->session->set_flashdata('message', '<div class="col-12 btn btn-danger" role="alert">Terjadi kesalahan password!</div>');
						redirect('auth/login');
					}
				
				} else {
					$this->session->set_flashdata('message', '<div class="col-12 btn btn-danger" role="alert">Akun anda sudah tidak aktif!</div>');
					redirect('auth/login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="col-12 btn btn-danger" role="alert">Email anda tidak terdaftar!</div>');
				redirect('auth/login');
			}
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|strtolower|regex_match[/^[^\s]+$/]', [
			'regex_match' => 'Username tidak boleh mengandung spasi'
		]);
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email[user.Email]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]|min_length[3]', [
			'matches' => 'Password tidak sama',
			'min_length' => 'Password minimal 3 karakter'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password2]');

		if( $this->form_validation->run() == false ) {
			$data['title'] = 'Halaman Register';
			$this->load->view('templates/header-auth', $data);
			$this->load->view('auth/register');
			$this->load->view('templates/footer-auth');
		} else {
			$data = [
				'NamaLengkap' => $this->input->post('nama_lengkap', true),
				'FotoProfil' => 'user.png',
				'Username' => $this->input->post('username', true),
				'Email' => $this->input->post('email', true),
				'Password' => $this->input->post('password1', true),
				'RoleID' => 4,
				'IsActive' => 1
			];

			$this->db->insert('user', $data);

			$this->session->set_flashdata('message', '<div class="col-12 btn btn-success" role="alert">Berhasil meregisterasi akun anda. Silahkan Login!</div>');
			redirect('auth/login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('akses');
		$this->session->unset_userdata('user');	

		$this->session->set_flashdata('message', '<div class="col-12 btn btn-success" role="alert">Berhasil logout. Sesi anda berakhir!</div>');
		redirect('auth/login');
	}

	public function block()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('akses');
		$this->session->unset_userdata('user');
		
		$data['title'] = 'Error 404 Page';
		$this->load->view('auth/block', $data);
	}
}
