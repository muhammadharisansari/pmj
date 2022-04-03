<?php

class Harga_model extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('harga');
    }

    public function data_pengepul()
    {
        return $this->db->get('harga_pengepul');
    }

    public function update($data)
    {
        $this->db->update('harga', $data);
    }

    public function update_pengepul($data)
    {
        $this->db->update('harga_pengepul', $data);
    }
}
