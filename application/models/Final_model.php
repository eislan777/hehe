<?php

class Final_model extends CI_Model 
{
    public function getHistoryPeminjaman($user) 
    {
        $this->db->select('peminjaman.*, buku.*, user.*, ulasanbuku.*');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.BukuID = peminjaman.BukuID');
        $this->db->join('user', 'user.UserID = peminjaman.UserID');
        $this->db->join('ulasanbuku', 'ulasanbuku.BukuID = buku.BukuID AND ulasanbuku.UserID = user.UserID');
        $this->db->where('peminjaman.UserID', $user);
        $this->db->where_in('peminjaman.StatusPeminjaman', '5');
        $this->db->order_by('peminjaman.StatusPeminjaman', 'ASC');
        
        $query = $this->db->get();
        return $query->result();
    }

    public function getUlasan() 
    {
        $this->db->select('peminjaman.*, buku.*, user.*, ulasanbuku.*, SUBSTRING_INDEX(ulasanbuku.Ulasan, " ", 3) as UlasanAwal');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.BukuID = peminjaman.BukuID');
        $this->db->join('user', 'user.UserID = peminjaman.UserID');
        $this->db->join('ulasanbuku', 'ulasanbuku.BukuID = peminjaman.BukuID AND user.UserID = ulasanbuku.UserID');
        $this->db->where('peminjaman.StatusPeminjaman', '5');
        $this->db->order_by('ulasanbuku.Rating', 'DESC');
        $this->db->limit(5);
        
        $query = $this->db->get();
        return $query->result();
    }

    public function getUlasanData($sortir) 
    {
        $this->db->select('peminjaman.*, buku.*, user.*, ulasanbuku.*, SUBSTRING_INDEX(ulasanbuku.Ulasan, " ", 3) as UlasanAwal');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.BukuID = peminjaman.BukuID');
        $this->db->join('user', 'user.UserID = peminjaman.UserID');
        $this->db->join('ulasanbuku', 'ulasanbuku.BukuID = peminjaman.BukuID AND user.UserID = ulasanbuku.UserID');
        $this->db->where('peminjaman.StatusPeminjaman', '5');
        $this->db->where('ulasanbuku.Rating', $sortir);
        $this->db->order_by('ulasanbuku.Rating', 'DESC');
        $this->db->limit(10);
        
        $query = $this->db->get();
        return $query->result();
    }
}