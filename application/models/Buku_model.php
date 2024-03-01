<?php 

class Buku_model extends CI_Model
{
    public function getBuku()
    {
        $this->db->select('buku.*, kategoribuku_relasi.*, kategoribuku.*');
        $this->db->from('buku');
        $this->db->join('kategoribuku_relasi', 'buku.BukuID = kategoribuku_relasi.BukuID');
        $this->db->join('kategoribuku', 'kategoribuku_relasi.KategoriID = kategoribuku.KategoriID');
    
        $query = $this->db->get();
        return $query->result();
    }

    public function getBukuSortir($sortir)
    {
        $this->db->select('buku.*, kategoribuku_relasi.*, kategoribuku.*');
        $this->db->from('buku');
        $this->db->join('kategoribuku_relasi', 'buku.BukuID = kategoribuku_relasi.BukuID');
        $this->db->join('kategoribuku', 'kategoribuku_relasi.KategoriID = kategoribuku.KategoriID');
        $this->db->where('kategoribuku.KategoriID', $sortir);
    
        $query = $this->db->get();
        return $query->result();
    }

    public function countStok() 
    {
        $query = $this->db->query('SELECT SUM(Stok) AS total_stok FROM buku');
        
        $row = $query->row();
        return $row->total_stok;
    }
    
    
}
