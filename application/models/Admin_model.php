<?php 

class Admin_model extends CI_Model
{
    public function getPeminjamanBuku($user) {
        $this->db->select('peminjaman.*, buku.*, user.*');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.BukuID = peminjaman.BukuID');
        $this->db->join('user', 'user.UserID = peminjaman.UserID');
        $this->db->order_by('peminjaman.StatusPeminjaman', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getPeminjamanBukuSortir($user, $sortir) {
        $this->db->select('peminjaman.*, buku.*, user.*');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.BukuID = peminjaman.BukuID');
        $this->db->join('user', 'user.UserID = peminjaman.UserID');
        $this->db->order_by('peminjaman.StatusPeminjaman', 'ASC');
        $this->db->where('peminjaman.StatusPeminjaman', $sortir);
        $query = $this->db->get();
        return $query->result();
    }

    public function jumlahBukuDiajukan()
    {
        $this->db->where('StatusPeminjaman', '1');
        return $this->db->count_all_results('peminjaman');
    }

    public function jumlahBukuDipinjam()
    {
        $this->db->where('StatusPeminjaman', '3');
        return $this->db->count_all_results('peminjaman');
    }

    public function getDataLaporanHarian() {
        $this->db->select('peminjaman.*, buku.*, user.*, kategoribuku.*, kategoribuku_relasi.*  ');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.BukuID = peminjaman.BukuID');
        $this->db->join('user', 'user.UserID = peminjaman.UserID');
        $this->db->join('kategoribuku_relasi', 'buku.BukuID = kategoribuku_relasi.BukuID');
        $this->db->join('kategoribuku', 'kategoribuku_relasi.KategoriID = kategoribuku.KategoriID');
        $this->db->where('peminjaman.TanggalPeminjaman', date('Y-m-d'));
        $this->db->order_by('peminjaman.StatusPeminjaman', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getDataLaporanMingguan() {
        $this->db->select('peminjaman.*, buku.*, user.*');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.BukuID = peminjaman.BukuID');
        $this->db->join('user', 'user.UserID = peminjaman.UserID');
        $this->db->where('peminjaman.TanggalPeminjaman >=', date('Y-m-d', strtotime('-7 days')));
        $this->db->order_by('peminjaman.StatusPeminjaman', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataLaporanBulanan() {
        $this->db->select('peminjaman.*, buku.*, user.*');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.BukuID = peminjaman.BukuID');
        $this->db->join('user', 'user.UserID = peminjaman.UserID');
        $this->db->where('peminjaman.TanggalPeminjaman >=', date('Y-m-d', strtotime('-30 days')));
        $this->db->order_by('peminjaman.StatusPeminjaman', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function jumlahDataHarian()
    {
        $this->db->where('TanggalPeminjaman', date("Y-m-d"));
        return $this->db->count_all_results('peminjaman');
    }
    public function jumlahDataMingguan()
    {
        $seminggu = date('Y-m-d', strtotime('-7 days'));
        $this->db->where('TanggalPeminjaman >=', $seminggu);
        return $this->db->count_all_results('peminjaman');
    }

    public function jumlahDataBulanan()
    {
        $sebulan = date('Y-m-d', strtotime('-30 days'));
        $this->db->where('TanggalPeminjaman >=', $sebulan);
        return $this->db->count_all_results('peminjaman');
    }

}