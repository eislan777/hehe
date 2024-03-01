<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Koleksi_model');
		$this->load->model('Peminjaman_model');
		$this->load->model('Final_model');

		if( !$this->session->userdata('email')) {
			$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-danger" role="alert">Sesi anda belum ada. Silahkan login terlebih dahulu!</div>');
			redirect('auth/login');
		}
	}
	public function profil()
	{
		$data['title'] = 'Profil';
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
		$user = $this->session->userdata('user');
		$data['dataAktivitasPeminjaman'] = $this->Peminjaman_model->getPeminjamanBuku($user);
		$data['jumlahBukuDiacc'] = $this->Peminjaman_model->jumlahBukuDiacc($user);
		$data['jumlahBukuDipinjam'] = $this->Peminjaman_model->jumlahBukuDipinjam($user);
		$data['jumlahBukuPeringatan'] = $this->Peminjaman_model->jumlahBukuPeringatan($user);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/profil', $data);
		$this->load->view('templates/footer');
	}

	public function editProfil($id)
	{
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|strtolower|regex_match[/^[^\s]+$/]', [
			'regex_match' => 'Username tidak boleh mengandung spasi'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim|numeric');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');

		if( $this->form_validation->run() == false) {
			$data['title'] = 'Profil';
			$email = $this->session->userdata('email');
			$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
			$user = $this->session->userdata('user');
			$data['dataAktivitasPeminjaman'] = $this->Peminjaman_model->getPeminjamanBuku($user);
			$data['jumlahBukuDiacc'] = $this->Peminjaman_model->jumlahBukuDiacc($user);
		$data['jumlahBukuDipinjam'] = $this->Peminjaman_model->jumlahBukuDipinjam($user);
		$data['jumlahBukuPeringatan'] = $this->Peminjaman_model->jumlahBukuPeringatan($user);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/profil', $data);
			$this->load->view('templates/footer');
		} else {
			$nama_lengkap = $this->input->post('nama_lengkap');
			$username = $this->input->post('username');
			$alamat = $this->input->post('alamat');
			$no_telp = $this->input->post('no_telp');
			$pekerjaan = $this->input->post('pekerjaan');
			$pesan = $this->input->post('pesan');

			$data = [
				'NamaLengkap' => $nama_lengkap,
				'Username' => $username,
				'Alamat' => $alamat,
				'NoTelp' => $no_telp,
				'Pekerjaan' => $pekerjaan,
				'Pesan' => $pesan
			];

			$this->db->where('UserID', $id);
			$this->db->update('user', $data);

			$this->session->set_flashdata('message', '<div class="col-12 my-2 btn btn-success" role="alert">Berhasil mengubah data pribadi!</div>');
			redirect('user/profil');
		}
	}

	public function tambahFavorit($id_buku, $id_user) 
	{

		$this->db->where('UserID', $id_user);
		$query_row = $this->db->get('koleksipribadi');

		if( $query_row->num_rows() < 10) {

			$this->db->where('BukuID', $id_buku);
			$this->db->where('UserID', $id_user);
			$query = $this->db->get('koleksipribadi');

			if( $query->num_rows() == 0 ) {

				$data = [
					'BukuID' => $id_buku,
					'UserID' => $id_user
				];
				
				$this->db->insert('koleksipribadi', $data);
				$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Berhasil menambahkan ke favorit!</div>');
				redirect('menu/pinjam');
			} else {
				$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-danger" role="alert">Buku sudah ada didalam daftar favorit!</div>');
				redirect('menu/pinjam');
			}
			
		} else {
			$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-danger" role="alert">Daftar buku sudah penuh!</div>');
			redirect('menu/pinjam');
		}
	}

	public function favorit()
	{
		$user = $this->session->userdata('user');
		$data['dataFavorit'] = $this->Koleksi_model->getKoleksiBuku($user);
		$data['dataJumlahFavorit'] = $this->Koleksi_model->countFavorit($user);
		$data['title'] = 'Favorit';
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
		$user = $this->session->userdata('user');
		$data['dataAktivitasPeminjaman'] = $this->Peminjaman_model->getPeminjamanBuku($user);
		$data['jumlahBukuDiacc'] = $this->Peminjaman_model->jumlahBukuDiacc($user);
		$data['jumlahBukuDipinjam'] = $this->Peminjaman_model->jumlahBukuDipinjam($user);
		$data['jumlahBukuPeringatan'] = $this->Peminjaman_model->jumlahBukuPeringatan($user);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/favorit', $data);
		$this->load->view('templates/footer');
	}

	public function hapusFavorit($id_buku, $id_user) 
	{
		$this->db->where('BukuID', $id_buku);
		$this->db->where('UserID', $id_user);
		$this->db->delete('koleksipribadi');

		$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Buku berhasil dihapus dari favorit!</div>');
		redirect('user/favorit');
	}

	public function aktivitasPeminjaman()
	{
		$user = $this->session->userdata('user');
		$sortir = $this->input->post('sortir_buku');

		if( $sortir == '1') {
			$data['dataAktivitasPeminjaman'] = $this->Peminjaman_model->getPeminjamanBukuSortir($user, $sortir);
		} elseif( $sortir == '2') {
			$data['dataAktivitasPeminjaman'] = $this->Peminjaman_model->getPeminjamanBukuSortir($user, $sortir);
		} elseif( $sortir == '3') {
			$data['dataAktivitasPeminjaman'] = $this->Peminjaman_model->getPeminjamanBukuSortir($user, $sortir);
		} elseif( $sortir == '4') {
			$data['dataAktivitasPeminjaman'] = $this->Peminjaman_model->getPeminjamanBukuSortir($user, $sortir);
		} elseif( $sortir == '5') {
			$data['dataAktivitasPeminjaman'] = $this->Peminjaman_model->getPeminjamanBukuSortir($user, $sortir);
		} else {
			$data['dataAktivitasPeminjaman'] = $this->Peminjaman_model->getPeminjamanBuku($user);
		}

		$data['title'] = 'Aktivitas Peminjaman';
		$email = $this->session->userdata('email');
		$user = $this->session->userdata('user');
		// $data['dataAktivitasPeminjaman'] = $this->Peminjaman_model->getPeminjamanBuku($user);
		$data['jumlahBukuDiacc'] = $this->Peminjaman_model->jumlahBukuDiacc($user);
		$data['jumlahBukuDipinjam'] = $this->Peminjaman_model->jumlahBukuDipinjam($user);
		$data['jumlahBukuPeringatan'] = $this->Peminjaman_model->jumlahBukuPeringatan($user);
		$data['dataCheck'] = $this->Final_model->getHistoryPeminjaman($user);
		$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/aktivitasPeminjaman', $data);
		$this->load->view('templates/footer');
	}

	public function pinjamBuku($id_buku, $id_user)
	{
		$this->db->where('UserID', $id_user);
		$this->db->where_in('StatusPeminjaman', array('1', '2', '3'));
		$jumlah_peminjaman = $this->db->count_all_results('peminjaman');

		$this->db->where('BukuID', $id_buku);
		$this->db->where('UserID', $id_user);
		$this->db->where_in('StatusPeminjaman', array('1', '2', '3'));
		$query = $this->db->get('peminjaman');
	
		if ($jumlah_peminjaman < 3) {
			if($query->num_rows() == 0) {

				$data = [
					'UserID' => $id_user,
					'BukuID' => $id_buku,
					'TanggalPeminjaman' => '-',
					'TanggalPengembalian' => '-',
					'StatusPeminjaman' => 1
				];
				
				$this->db->insert('peminjaman', $data);
				$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Buku berhasil dipinjam!</div>');
				redirect('menu/pinjam');
			} else {
				$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-danger" role="alert">Anda sudah meminjam buku ini!</div>');
				redirect('menu/pinjam');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-danger" role="alert">Anda sudah mencapai batas maksimum peminjaman!</div>');
			redirect('menu/pinjam');
		}
	}
	

	public function hapusPengajuanBuku($id)
	{
		$this->db->where('PeminjamanID', $id);
		$this->db->delete('peminjaman');

		$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Berhasil menghapus pengajuan buku!</div>');
		redirect('user/aktivitasPeminjaman');
	}

	public function historyPeminjaman()
	{
		$data['title'] = 'History Peminjaman';
		$email = $this->session->userdata('email');
		$user = $this->session->userdata('user');
		$data['dataAktivitasPeminjaman'] = $this->Peminjaman_model->getPeminjamanBuku($user);
		$data['jumlahBukuDiacc'] = $this->Peminjaman_model->jumlahBukuDiacc($user);
		$data['jumlahBukuDipinjam'] = $this->Peminjaman_model->jumlahBukuDipinjam($user);
		$data['jumlahBukuPeringatan'] = $this->Peminjaman_model->jumlahBukuPeringatan($user);
		$data['dataHistory'] = $this->Final_model->getHistoryPeminjaman($user);
		$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/historyPeminjaman', $data);
		$this->load->view('templates/footer');
	}

	public function ratingBuku($id_peminjaman, $id_buku, $id_user)
	{

		$data_check = [
			'StatusPeminjaman' => 5
		];

		$this->db->where('PeminjamanID', $id_peminjaman);
		$this->db->update('peminjaman', $data_check);
			
		$data = [
			'BukuID' => $id_buku,		
			'UserID' => $id_user,
			'Rating' => $this->input->post('rating', true),
			'Ulasan' => $this->input->post('ulasan', true),	
			'TanggalRating' => date("Y-m-d")
		];

		$this->db->insert('ulasanbuku', $data);	

		$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Berhasil merating buku yang telah selesai dipinjam!</div>');
		redirect('user/historyPeminjaman');
	}

	public function perpanjangPeminjaman($id_peminjaman, $id_buku, $id_user)
	{
		$perpanjang = $this->input->post('perpanjang_hari');
		$get = $this->db->get_where('peminjaman', ['PeminjamanID' => $id_peminjaman])->row_array();

		$TanggalPengembalian = date('Y-m-d', strtotime('+' . $perpanjang . ' days', strtotime($get['TanggalPengembalian'])));

		$data = [
			'TanggalPengembalian' => $TanggalPengembalian,
			'StatusPerpanjangan' => 1
		];

		$this->db->where('PeminjamanID', $id_peminjaman);
		$this->db->update('peminjaman', $data);

		$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Berhasil memperpanjang peminjaman!</div>');
		redirect('user/aktivitasPeminjaman');
	}

	public function hapusHistory($id_peminjaman, $id_ulasan) {
		$this->db->where('PeminjamanID', $id_peminjaman);
		$this->db->delete('peminjaman');

		$this->db->where('UlasanID', $id_ulasan);
		$this->db->delete('ulasanbuku');
		$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Berhasil menghapus history peminjaman!</div>');
		redirect('user/historyPeminjaman');
	}
}
