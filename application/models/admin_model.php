<?php
class admin_model extends CI_Model
{
    public function get_all()
    {
        return $this->db->get('admin');
    }

    public function cek_username($username)
    {
        $this->db->where('username_admin', $username);
        return $this->db->get('admin');
    }

    public function get_data($id)
    {
        $this->db->where('username_admin', $id);
        return $this->db->get('admin')->row();
    }

    // public function get_profil($hp)
    // { 
    //     $this->db->where('hp_admin', $hp);
    //     return $this->db->get('admin')->row();
    // }

    public function get_profil($hp)
    {
        $this->db->where('username_admin', $hp);
        return $this->db->get('admin')->row();
    }

    public function hitung_data()
    {
        return $this->db->get('admin')->num_rows();
    }

    public function profil($where)
    {
        $this->db->where('username_admin', $where);
        return $this->db->get('admin')->result();
    }

    public function update_admin($where, $data)
    {
        $this->db->where('username_admin', $where);
        $this->db->update('admin', $data);
    }

    public function insert($data)
    {
        $this->db->insert('admin', $data);
    }

    public function hapus($username_admin)
    {
        $this->db->where('username_admin', $username_admin);
        $this->db->delete('admin');
    }
}
