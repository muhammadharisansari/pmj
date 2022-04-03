<?php
class login_admin_model extends CI_Model
{
    public function cek_login($user, $pass)
    {
        $this->db->where('username_admin', $user);
        $this->db->where('password_admin', $pass);
        return $this->db->get('admin');
    }
}
