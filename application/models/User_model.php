<?php

class User_model extends CI_Model
{
    public function jumlahDataPengguna()
    {
        $this->db->where('RoleID', '4');
        return $this->db->count_all_results('user');
    }
    public function jumlahDataPetugas()
    {
        $this->db->where('RoleID', '3');
        return $this->db->count_all_results('user');
    }
    public function jumlahDataAdmin()
    {
        $this->db->where('RoleID', '2');
        return $this->db->count_all_results('user');
    }
    public function jumlahBuku()
    {
        return $this->db->count_all('buku');
    }
}