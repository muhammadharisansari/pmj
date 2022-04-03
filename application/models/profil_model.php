<?php
class profil_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('kontak');
    }

    public function update($data)
    {
        $this->db->update('kontak', $data);
    }
}
