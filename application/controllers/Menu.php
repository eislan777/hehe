<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Koleksi_model');
		$this->load->model('Admin_model');
		$this->load->model('Peminjaman_model');
		$this->load->model('Final_model');
		$this->load->model('Buku_model');

		if( !$this->session->userdata('email')) {
			$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-danger" role="alert">Sesi anda belum ada. Silahkan login terlebih dahulu!</div>');
			redirect('auth/login');
		}
	}
	public function index()
	{
		$sortir = $this->input->post('sortir_rating');

		if( $sortir == '1') {
			$data['dataHistory'] = $this->Final_model->getUlasanData($sortir);
		} elseif ( $sortir == '2' ) {
			$data['dataHistory'] = $this->Final_model->getUlasanData($sortir);
		} elseif ( $sortir == '3' ) {
			$data['dataHistory'] = $this->Final_model->getUlasanData($sortir);
		} elseif ( $sortir == '4' ) {
			$data['dataHistory'] = $this->Final_model->getUlasanData($sortir);
		} elseif ( $sortir == '5' ) {
			$data['dataHistory'] = $this->Final_model->getUlasanData($sortir);
		} else {
			$data['dataHistory'] = $this->Final_model->getUlasan();
		}

		$data['title'] = 'Dashboard';
		$user = $this->session->userdata('user');
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
		$data['jumlahDataPengguna'] = $this->User_model->jumlahDataPengguna();
		$data['jumlahDataPetugas'] = $this->User_model->jumlahDataPetugas();
		$data['jumlahDataAdmin'] = $this->User_model->jumlahDataAdmin();
		$data['jumlahBukuDiajukan'] = $this->Admin_model->jumlahBukuDiajukan();
		$data['jumlahBukuDipinjam'] = $this->Admin_model->jumlahBukuDipinjam();
		$data['jumlahBukuPeringatan'] = $this->Peminjaman_model->jumlahBukuPeringatan($user);
		$data['jumlahBuku'] = $this->User_model->jumlahBuku();
		$data['dataAktivitasPeminjaman'] = $this->Peminjaman_model->getPeminjamanBuku($user);
		$data['jumlahBukuDiacc'] = $this->Peminjaman_model->jumlahBukuDiacc($user);
		$data['jumlahBukuDipinjam'] = $this->Peminjaman_model->jumlahBukuDipinjam($user);
		$data['jumlahStokBuku'] = $this->Buku_model->countStok();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('templates/footer');
	}

	public function pinjam()
	{
		$sortir = $this->input->post('sortir_buku');
		$dataKategori = $this->db->get('kategoribuku')->result_array();

		if( $sortir ) {
			$data['dataBuku'] = $this->Buku_model->getBukuSortir($sortir);
		} else {
			$data['dataBuku'] = $this->Buku_model->getBuku();
		}

		$this->db->where('UserID', $this->session->userdata('user'));
		$this->db->where_in('StatusPeminjaman', array('1', '2', '3'));
		$data['jumlah_peminjaman'] = $this->db->count_all_results('peminjaman');


		$data['dataKategori'] = $this->db->get('kategoribuku')->result_array();
		$user = $this->session->userdata('user');
		$data['dataFavorit'] = $this->Koleksi_model->getKoleksiBuku($user);
		$data['title'] = 'Pinjam';
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
		$user = $this->session->userdata('user');
		$data['jumlahBukuPeringatan'] = $this->Peminjaman_model->jumlahBukuPeringatan($user);
		$data['dataAktivitasPeminjaman'] = $this->Peminjaman_model->getPeminjamanBuku($user);
		$data['jumlahBukuDiacc'] = $this->Peminjaman_model->jumlahBukuDiacc($user);
		$data['jumlahBukuDipinjam'] = $this->Peminjaman_model->jumlahBukuDipinjam($user);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/pinjam', $data);
		$this->load->view('templates/footer');
	}
}
