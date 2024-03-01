<?php 

class Peminjaman_model extends CI_Model
{
    public function getPeminjamanBukuSortir($user, $sortir) {
        $this->db->select('peminjaman.*, buku.*, user.*');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.BukuID = peminjaman.BukuID'); 
        $this->db->join('user', 'user.UserID = peminjaman.UserID');
        $this->db->where('peminjaman.UserID', $user);
        $this->db->where('peminjaman.StatusPeminjaman', $sortir);
        $this->db->order_by('peminjaman.StatusPeminjaman', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getPeminjamanBuku($user) {
        $this->db->select('peminjaman.*, buku.*, user.*');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.BukuID = peminjaman.BukuID');
        $this->db->join('user', 'user.UserID = peminjaman.UserID');
        $this->db->where('peminjaman.UserID', $user);
        $this->db->order_by('peminjaman.StatusPeminjaman', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function jumlahBukuDiacc($user) 
    {
        $this->db->select('COUNT(peminjaman.BukuID) as jumlah_buku_diacc');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.BukuID = peminjaman.BukuID');
        $this->db->join('user', 'user.UserID = peminjaman.UserID');
        $this->db->where('peminjaman.UserID', $user);
        $this->db->where('peminjaman.StatusPeminjaman', '2');
        
        $query = $this->db->get();
        $result = $query->row();
        
        return $result->jumlah_buku_diacc;
    }

    public function jumlahBukuDipinjam($user) 
    {
        $this->db->select('COUNT(peminjaman.BukuID) as jumlah_buku_dipinjam');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.BukuID = peminjaman.BukuID');
        $this->db->join('user', 'user.UserID = peminjaman.UserID');
        $this->db->where('peminjaman.UserID', $user);
        $this->db->where('peminjaman.StatusPeminjaman', '3');
        $this->db->where('peminjaman.Peringatan', '0');
        
        $query = $this->db->get();
        $result = $query->row();
        
        return $result->jumlah_buku_dipinjam;
    }

    public function jumlahBukuPeringatan($user) 
    {
        $this->db->select('COUNT(peminjaman.BukuID) as jumlah_buku_dipinjam');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.BukuID = peminjaman.BukuID');
        $this->db->join('user', 'user.UserID = peminjaman.UserID');
        $this->db->where('peminjaman.UserID', $user);
        $this->db->where('peminjaman.StatusPeminjaman', '3');
        $this->db->where('peminjaman.Peringatan', '1');
        
        $query = $this->db->get();
        $result = $query->row();
        
        return $result->jumlah_buku_dipinjam;
    }

    public function kurangStok($id_buku, $qty) {
        $this->db->set('Stok', 'Stok - ' . (int)$qty, false);
        $this->db->where('BukuID', $id_buku);
        return $this->db->update('buku');
    }
}