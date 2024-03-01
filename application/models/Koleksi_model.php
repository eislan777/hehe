<?php 

class Koleksi_model extends CI_Model
{
    public function getKoleksiBuku($user) {
        $this->db->select('koleksipribadi.*, buku.*, user.*, kategoribuku_relasi.*, kategoribuku.*');
        $this->db->from('koleksipribadi');
        $this->db->join('buku', 'buku.BukuID = koleksipribadi.BukuID');
        $this->db->join('user', 'user.UserID = koleksipribadi.UserID');
        $this->db->join('kategoribuku_relasi', 'buku.BukuID = kategoribuku_relasi.BukuID');
        $this->db->join('kategoribuku', 'kategoribuku_relasi.KategoriID = kategoribuku.KategoriID');
        $this->db->where('koleksipribadi.UserID', $user);
        $query = $this->db->get();
        return $query->result();
    }

    public function countFavorit($user)
    {
        $this->db->where('UserID', $user);
        return $this->db->count_all_results('koleksipribadi');
    }

}