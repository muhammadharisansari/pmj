<?php

/**
 * 
 */
class Login_nasabah_model extends CI_Model
{

    public function cek_login($user, $pass)
    {
        $this->db->where('username_nasabah', $user);
        $this->db->where('password_nasabah', $pass);
        return $this->db->get('nasabah');
    }

    public function cek_user($username)
    {
        $this->db->where('username_nasabah', $username);
        return $this->db->get('nasabah');
    }

    public function cek_hp($hp)
    {
        $this->db->where('hp_nasabah', $hp);
        return $this->db->get('nasabah');
    }

    public function cek_nik($NIK)
    {
        $this->db->where('nik_nasabah', $NIK);
        return $this->db->get('nasabah');
    }
}
