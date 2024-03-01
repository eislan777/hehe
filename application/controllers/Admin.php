<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->model('Admin_model');
		$this->load->model('Buku_model');
		$this->load->model('Peminjaman_model');
		$this->load->model('User_model');
		$this->load->model('Final_model');
		
		if( $this->session->userdata('akses') == 4 ) {
			redirect('auth/block');
		}
		
		if( !$this->session->userdata('email') || !$this->session->userdata('user') || !$this->session->userdata('akses')) {
			$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-danger" role="alert">Sesi anda belum ada. Silahkan login terlebih dahulu!</div>');
			redirect('auth/login');
		}
		
	}

	public function dataBuku()
	{

		$sortir = $this->input->post('sortir_buku');
		$dataKategori = $this->db->get('kategoribuku')->result_array();

		if( $sortir ) {
			$data['dataBuku'] = $this->Buku_model->getBukuSortir($sortir);
		} else {
			$data['dataBuku'] = $this->Buku_model->getBuku();
		}

		$data['title'] = 'Data Buku';
		$data['dataKategori'] = $this->db->get('kategoribuku')->result_array();
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/dataBuku', $data);
		$this->load->view('templates/footer');
	}

	public function tambahBuku()
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required|trim');
		$this->form_validation->set_rules('kategori_buku', 'Jenis Buku', 'required|trim');
		$this->form_validation->set_rules('penulis', 'Penulis', 'required|trim');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim');
		$this->form_validation->set_rules('tahun_terbit', 'Tahun terbit', 'required|trim');
		$this->form_validation->set_rules('stok', 'Stok', 'required|trim|numeric');

		if( $this->form_validation->run() == false ) {
				$sortir = $this->input->post('sortir_buku');

			if( $sortir == 'Sastra') {
				$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Sastra'])->result_array();
			} elseif( $sortir == 'Bacaan') {
				$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Bacaan'])->result_array();
			} elseif( $sortir == 'Novel') {
				$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Novel'])->result_array();
			} elseif( $sortir == 'Bisnis & Ekonomi') {
				$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Bisnis & Ekonomi'])->result_array();
			} elseif( $sortir == 'Fantasi') {
				$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Fantasi'])->result_array();
			} else {
				$data['dataBuku'] = $this->db->get('buku')->result_array();
			}

			$data['title'] = 'Data Buku';
			$data['dataKategori'] = $this->db->get('kategoribuku')->result_array();
			$email = $this->session->userdata('email');
			$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataBuku', $data);
			$this->load->view('templates/footer');
		} else {
			$gambar = $_FILES['foto'];
			if( $gambar = '') {} else {
				$config['upload_path']       = './assets-template/gambar';
				$config['allowed_types']     = 'jpg|png|gif';

				$this->load->library('upload', $config);
				if( !$this->upload->do_upload('foto')) {
					echo "Upload gagal"; die();
				} else {
					$gambar = $this->upload->data('file_name');
				}
			}
			$data = [
				'Judul' => $this->input->post('judul', true),
				'Gambar' => $gambar,
				'Penulis' => $this->input->post('penulis', true),
				'Penerbit' => $this->input->post('penerbit', true),
				'TahunTerbit' => $this->input->post('tahun_terbit', true),
				'Stok' => $this->input->post('stok', true),
				'Deskripsi' => $this->input->post('deskripsi', true),
			];

			$this->db->insert('buku', $data);

			$buku_id = $this->db->insert_id();

			$data_kategori = [
				'BukuID' => $buku_id,
				'KategoriID' => $this->input->post('kategori_buku', true)
			];

			$this->db->insert('kategoribuku_relasi', $data_kategori);
			$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Buku berhasil ditambahkan!</div>');
			redirect('admin/dataBuku');
		}
	}

	public function editBuku($id, $id_kategori)
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required|trim');
		$this->form_validation->set_rules('penulis', 'Penulis', 'required|trim');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim');
		$this->form_validation->set_rules('tahun_terbit', 'Tahun terbit', 'required|trim');
		$this->form_validation->set_rules('stok', 'Stok', 'required|trim|numeric');

		if( $this->form_validation->run() == false ) {
			$data['title'] = 'Data Buku';
			$email = $this->session->userdata('email');
			$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataBuku', $data);
			$this->load->view('templates/footer');
		} else {

			$db = $this->db->get_where('buku', ['BukuID' => $id])->row_array();

			$gambar = $_FILES['foto'];
			if ($_FILES['foto']['name'] != '') {
				$config['upload_path']       = './assets-template/gambar';
				$config['allowed_types']     = 'jpg|png|gif';
			
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					$error = $this->upload->display_errors();
				} else {
					$gambar = $this->upload->data('file_name');
				}
			} else {
				$gambar = $db['Gambar'];
			}
			
			
			$data = [
				'Judul' => $this->input->post('judul', true),
				'Gambar' => $gambar,
				'Penulis' => $this->input->post('penulis', true),
				'Penerbit' => $this->input->post('penerbit', true),
				'TahunTerbit' => $this->input->post('tahun_terbit', true),
				'Stok' => $this->input->post('stok', true),
				'Deskripsi' => $this->input->post('deskripsi', true),
			];

			$this->db->where('BukuID', $id);
			$this->db->update('buku', $data);

			$data_kategori = [
				'KategoriID' => $this->input->post('kategori_buku', true)
			];

			$this->db->where('KategoriBukuID', $id_kategori);
			$this->db->update('kategoribuku_relasi', $data_kategori);
			$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Buku berhasil diubah!</div>');
			redirect('admin/dataBuku');
		}
	}

	public function hapusBuku($id, $id_kategori)
	{
		$this->db->where('BukuID', $id);
		$this->db->delete('buku');

		$this->db->where('KategoriBukuID', $id_kategori);
		$this->db->delete('kategoribuku_relasi');

		$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-danger" role="alert">Buku berhasil dihapus!</div>');
		redirect('admin/dataBuku');
	}

	public function dataAdmin()
	{
		$data['title'] = 'Data Admin';
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
		$data['dataAdmin'] = $this->db->get_where('user', ['RoleID' => '2'])->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/dataAdmin', $data);
		$this->load->view('templates/footer');
	}

	public function tambahAdmin()
	{
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.Email]', [
			'is_unique' => 'Email sudah terdaftar',
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password minimal 3 karakter',
		]);

		if( $this->form_validation->run() == false) {
			$data['title'] = 'Data Admin';
			$email = $this->session->userdata('email');
			$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
			$data['dataAdmin'] = $this->db->get_where('user', ['RoleID' => '2'])->result_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataAdmin', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'NamaLengkap' => $this->input->post('nama_lengkap', true),
				'FotoProfil' => 'user.png',
				'Username' => $this->input->post('username', true),
				'Email' => $this->input->post('email', true),
				'Password' => $this->input->post('password', true),
				'RoleID' => 2,
				'IsActive' => 1
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Berhasil meregistrasi akun Admin!</div>');
			redirect('admin/dataAdmin');
		}
	}

	public function editAdmin($id)
	{
		$dataAdmin = $this->db->get_where('user', ['UserID' => $id])->row_array();

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		if ( $dataAdmin['Email'] == $this->input->post('email') ) {
			$this->form_validation->set_rules('email', 'Email', 'required|trim');
		} else {
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.Email]');
		}
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password minimal 3 karakter',
		]);

		if( $this->form_validation->run() == false) {
			$data['title'] = 'Data Admin';
			$email = $this->session->userdata('email');
			$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
			$data['dataAdmin'] = $this->db->get_where('user', ['RoleID' => '2'])->result_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataAdmin', $data);
			$this->load->view('templates/footer');
		} else {

			$nama_lengkap = $this->input->post('nama_lengkap', true);
			$username = $this->input->post('username', true);
			$email = $this->input->post('email', true);
			$password = $this->input->post('password', true);

			$data = [
				'NamaLengkap' => $nama_lengkap,
				'Username' => $username,
				'Password' => $password,
				'Email' => $email,
			];

			$this->db->where('UserID', $id);
			$this->db->update('user', $data);

			$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Berhasil mengubah data Admin!</div>');
			redirect('admin/dataAdmin');
		}
	}

	public function hapusAdmin($id)
	{
		$this->db->where('UserID', $id);
		$this->db->delete('user');

		$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Akun admin berhasil dihapus!</div>');
		redirect('admin/dataAdmin');
	}

	public function dataPetugas()
	{
		$data['title'] = 'Data Petugas';
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
		$data['dataPetugas'] = $this->db->get_where('user', ['RoleID' => '3'])->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/dataPetugas', $data);
		$this->load->view('templates/footer');
	}

	public function tambahPetugas()
	{
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.Email]', [
			'is_unique' => 'Email sudah terdaftar',
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password minimal 3 karakter',
		]);

		if( $this->form_validation->run() == false) {
			$data['title'] = 'Data Petugas';
			$email = $this->session->userdata('email');
			$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
			$data['dataPetugas'] = $this->db->get_where('user', ['RoleID' => '3'])->result_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataPetugas', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'NamaLengkap' => $this->input->post('nama_lengkap', true),
				'FotoProfil' => 'user.png',
				'Username' => $this->input->post('username', true),
				'Email' => $this->input->post('email', true),
				'Password' => $this->input->post('password'),
				'RoleID' => 3,
				'IsActive' => 1
			];

			$this->db->insert('user', $data);

			$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Berhasil meregistrasi akun Petugas!</div>');
			redirect('admin/dataPetugas');
		}
	}

	public function editPetugas($id)
	{
		$dataAdmin = $this->db->get_where('user', ['UserID' => $id])->row_array();

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		if ( $dataAdmin['Email'] == $this->input->post('email') ) {
			$this->form_validation->set_rules('email', 'Email', 'required|trim');
		} else {
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.Email]');
		}
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password minimal 3 karakter',
		]);

		if( $this->form_validation->run() == false) {
			$data['title'] = 'Data Admin';
			$email = $this->session->userdata('email');
			$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
			$data['dataPetugas'] = $this->db->get_where('user', ['RoleID' => '3'])->result_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataPetugas', $data);
			$this->load->view('templates/footer');
		} else {

			$nama_lengkap = $this->input->post('nama_lengkap', true);
			$username = $this->input->post('username', true);
			$email = $this->input->post('email', true);
			$password = $this->input->post('password');

			$data = [
				'NamaLengkap' => $nama_lengkap,
				'Username' => $username,
				'Password' => $password,
				'Email' => $email,
			];

			$this->db->where('UserID', $id);
			$this->db->update('user', $data);

			$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Berhasil mengubah data Petugas!</div>');
			redirect('admin/dataPetugas');
		}
	}

	public function hapusPetugas($id)
	{
		$this->db->where('UserID', $id);
		$this->db->delete('user');

		$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Berhasil menghapus data Petugas!</div>');
		redirect('admin/dataPetugas');
	}

	public function dataPengguna()
	{
		$data['title'] = 'Data Pengguna';
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
		$data['dataPengguna'] = $this->db->get_where('user', ['RoleID' => '4'])->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/dataPengguna', $data);
		$this->load->view('templates/footer');
	}

	public function editPengguna($id)
	{
		$dataAdmin = $this->db->get_where('user', ['UserID' => $id])->row_array();

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		if ( $dataAdmin['Email'] == $this->input->post('email') ) {
			$this->form_validation->set_rules('email', 'Email', 'required|trim');
		} else {
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.Email]');
		}
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password minimal 3 karakter',
		]);

		if( $this->form_validation->run() == false) {
			$data['title'] = 'Data Pengguna';
			$email = $this->session->userdata('email');
			$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
			$data['dataPengguna'] = $this->db->get_where('user', ['RoleID' => '4'])->result_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataPengguna', $data);
			$this->load->view('templates/footer');
		} else {

			$nama_lengkap = $this->input->post('nama_lengkap', true);
			$username = $this->input->post('username', true);
			$email = $this->input->post('email', true);
			$password = $this->input->post('password');

			$data = [
				'NamaLengkap' => $nama_lengkap,
				'Username' => $username,
				'Password' => $password,
				'Email' => $email,
			];

			$this->db->where('UserID', $id);
			$this->db->update('user', $data);
			$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Berhasil mengubah data Pengguna!</div>');
			redirect('admin/dataPengguna');
		}
	}

	public function hapusPengguna($id)
	{
		$this->db->where('UserID', $id);
		$this->db->delete('user');

		$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Berhasil menghapus akun Pengguna!</div>');
		redirect('admin/dataPengguna');
	}

	public function aktivitasPeminjaman()
	{

		$sortir = $this->input->post('sortir_buku');

		if( $sortir == '1') {
			$data['dataAktivitasPeminjamanUser'] = $this->Admin_model->getPeminjamanBukuSortir($user, $sortir);
		} elseif( $sortir == '2') {
			$data['dataAktivitasPeminjamanUser'] = $this->Admin_model->getPeminjamanBukuSortir($user, $sortir);
		} elseif( $sortir == '3') {
			$data['dataAktivitasPeminjamanUser'] = $this->Admin_model->getPeminjamanBukuSortir($user, $sortir);
		} elseif( $sortir == '4') {
			$data['dataAktivitasPeminjamanUser'] = $this->Admin_model->getPeminjamanBukuSortir($user, $sortir);
		} elseif( $sortir == '5') {
			$data['dataAktivitasPeminjamanUser'] = $this->Admin_model->getPeminjamanBukuSortir($user, $sortir);
		} else {
			$data['dataAktivitasPeminjamanUser'] = $this->Admin_model->getPeminjamanBuku($user);
		}

		$user = $this->session->userdata('user');
		$data['title'] = 'Aktivitas Pinjam User';
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
		$data['dataHistory'] = $this->Final_model->getHistoryPeminjaman($user);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/aktivitasPeminjaman', $data);
		$this->load->view('templates/footer');
	}

	public function accPeminjaman($id_pinjam, $id_buku)
	{
		$dataSessionAcc = $this->db->get_where('user', ['Email' => $this->session->userdata('email')])->row_array();

		$qty = 1;
		$this->Peminjaman_model->kurangStok($id_buku, $qty);

		$data = [
			'StatusPeminjaman' => '2',
			'SessionAcc' => $dataSessionAcc['NamaLengkap']
		];

		$this->db->where('PeminjamanID', $id_pinjam);
		$this->db->update('peminjaman', $data);

		$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Pengajuan buku Pengguna berhasil di acc!</div>');
		redirect('admin/aktivitasPeminjaman');
	}

	public function hapusPengajuanBuku($id)
	{
		$this->db->where('PeminjamanID', $id);
		$this->db->delete('peminjaman');

		$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Berhasil menghapus pengajuan buku Pengguna!</div>');
		redirect('admin/aktivitasPeminjaman');
	}

	public function accDipinjam($id_pinjam)
	{
		$data = [
			'TanggalPeminjaman' => date('Y-m-d'),
			'TanggalPengembalian' => date('Y-m-d', strtotime('+7 days')),
			'StatusPeminjaman' => '3',
		];

		$this->db->where('PeminjamanID', $id_pinjam);
		$this->db->update('peminjaman', $data);

		$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Buku telah dipinjam oleh Pengguna!</div>');
		redirect('admin/aktivitasPeminjaman');
	}
	public function accSelesai($id_pinjam)
	{
		$data = [
			'TanggalPengembalian' => date('Y-m-d'),
			'StatusPeminjaman' => '4',
		];

		$this->db->where('PeminjamanID', $id_pinjam);
		$this->db->update('peminjaman', $data);

		$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Pengguna sudah mengembalikan buku!</div>');
		redirect('admin/aktivitasPeminjaman');
	}

	public function generateLaporan()
	{
		$user = $this->session->userdata('user');
		$data['title'] = 'Generate Laporan';
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
		$data['dataLaporanHarian'] = $this->Admin_model->getDataLaporanHarian();
		$data['dataLaporanMingguan'] = $this->Admin_model->getDataLaporanMingguan();
		$data['dataLaporanBulanan'] = $this->Admin_model->getDataLaporanBulanan();
		$data['dataBuku'] = $this->Buku_model->getBuku();
		$data['jumlahDataHarian'] = $this->Admin_model->jumlahDataHarian();
		$data['jumlahDataMingguan'] = $this->Admin_model->jumlahDataMingguan();
		$data['jumlahDataBulanan'] = $this->Admin_model->jumlahDataBulanan();
		$data['jumlahBuku'] = $this->User_model->jumlahBuku();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/generateLaporan', $data);
		$this->load->view('templates/footer');
	}

	public function pdf()
{
    $this->load->library('dompdf_gen');

    $data['dataLaporanHarian'] = $this->Admin_model->getDataLaporanHarian();
    $html = $this->load->view('pdf/laporanPdfHarian', $data, true); // Ubah menjadi string dengan 'true'

    $paper_size = 'A4'; // Mengubah variabel menjadi $paper_size
    $orientation = 'portrait'; // Mengubah 'potrait' menjadi 'portrait' dengan huruf kecil
    $this->dompdf->set_paper($paper_size, $orientation);

    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("laporanHarian.pdf", array('Attachment' => 0)); // Perbaiki penulisan 'array'
}



	public function dataKategori()
	{
		// $sortir = $this->input->post('sortir_buku');

		// if( $sortir == 'Sastra') {
		// 	$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Sastra'])->result_array();
		// } elseif( $sortir == 'Bacaan') {
		// 	$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Bacaan'])->result_array();
		// } elseif( $sortir == 'Novel') {
		// 	$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Novel'])->result_array();
		// } elseif( $sortir == 'Bisnis & Ekonomi') {
		// 	$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Bisnis & Ekonomi'])->result_array();
		// } elseif( $sortir == 'Fantasi') {
		// 	$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Fantasi'])->result_array();
		// } else {
		// 	$data['dataBuku'] = $this->db->get('buku')->result_array();
		// }
		
		$data['dataKategori'] = $this->db->get('kategoribuku')->result_array();
		$data['title'] = 'Data Kategori';
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/dataKategori', $data);
		$this->load->view('templates/footer');
	}

	public function tambahKategori()
	{
		// $sortir = $this->input->post('sortir_buku');

		// if( $sortir == 'Sastra') {
		// 	$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Sastra'])->result_array();
		// } elseif( $sortir == 'Bacaan') {
		// 	$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Bacaan'])->result_array();
		// } elseif( $sortir == 'Novel') {
		// 	$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Novel'])->result_array();
		// } elseif( $sortir == 'Bisnis & Ekonomi') {
		// 	$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Bisnis & Ekonomi'])->result_array();
		// } elseif( $sortir == 'Fantasi') {
		// 	$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Fantasi'])->result_array();
		// } else {
		// 	$data['dataBuku'] = $this->db->get('buku')->result_array();
		// }
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim');

		if( $this->form_validation->run() == false ) {
			$data['dataKategori'] = $this->db->get('kategoribuku')->result_array();
			$data['title'] = 'Data Kategori';
			$email = $this->session->userdata('email');
			$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataKategori', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'NamaKategori' => $this->input->post('nama_kategori', true)
			];

			$this->db->insert('kategoribuku', $data);
			$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Kategori baru berhasil ditambahkan!</div>');
			redirect('admin/dataKategori');
		}
	}

	public function hapusKategori($id) 
	{
		$this->db->where('KategoriID', $id);
		$this->db->delete('kategoribuku');
		$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Kategori buku berhasil dihapus!</div>');
		redirect('admin/dataKategori');
	}

	public function editKategori($id)
	{
		// $sortir = $this->input->post('sortir_buku');

		// if( $sortir == 'Sastra') {
		// 	$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Sastra'])->result_array();
		// } elseif( $sortir == 'Bacaan') {
		// 	$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Bacaan'])->result_array();
		// } elseif( $sortir == 'Novel') {
		// 	$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Novel'])->result_array();
		// } elseif( $sortir == 'Bisnis & Ekonomi') {
		// 	$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Bisnis & Ekonomi'])->result_array();
		// } elseif( $sortir == 'Fantasi') {
		// 	$data['dataBuku'] = $this->db->get_where('buku', ['JenisBuku' => 'Fantasi'])->result_array();
		// } else {
		// 	$data['dataBuku'] = $this->db->get('buku')->result_array();
		// }
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim');

		if( $this->form_validation->run() == false ) {
			$data['dataKategori'] = $this->db->get('kategoribuku')->result_array();
			$data['title'] = 'Data Kategori';
			$email = $this->session->userdata('email');
			$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataKategori', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'NamaKategori' => $this->input->post('nama_kategori', true)
			];

			$this->db->where('KategoriID', $id);
			$this->db->update('kategoribuku', $data);
			$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Kategori baru berhasil diubah!</div>');
			redirect('admin/dataKategori');
		}
	}

	public function peringatanAcc($id) 
	{

		$data = [
			'Peringatan' => 1
		];

		$this->db->where('PeminjamanID', $id);
		$this->db->update('peminjaman', $data);

		$this->session->set_flashdata('message', '<div class="col-12 mb-3 btn btn-success" role="alert">Berhasil memberikan peringatan kepada peminjam!</div>');
		redirect('admin/aktivitasPeminjaman');
	}

	public function aktivitasRating()
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

		$data['title'] = 'Aktivitas Rating User';
		$user = $this->session->userdata('user');
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['Email' => $email])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/aktivitasRating', $data);
		$this->load->view('templates/footer');
	}
	
}
