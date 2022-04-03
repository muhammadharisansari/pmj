<?php

class Pesan_model extends CI_model
{

    public function tampil_data($where)
    {
        $this->db->order_by('id_pesan', 'DESC');
        $hasil = $this->db->where('id_nasabah', $where)->get('pesan');
        return $hasil->result();
    }

    public function hitung_data()
    {
        $this->db->where('status', 'dipesan');
        return $this->db->get('pesan')->num_rows();
    }

    public function hitung_menunggu()
    {
        $this->db->where('status', 'dipesan');
        return $this->db->get('pesan');
    }

    public function get_pesan()
    {
        $this->db->where('status', 'dipesan');
        $this->db->select('*');
        $this->db->from('pesan');
        $this->db->join('nasabah', 'nasabah.id_nasabah = pesan.id_nasabah');
        $this->db->order_by('id_pesan', 'DESC');
        $hasil = $this->db->get();
        return $hasil->result();
    }

    public function get_laporan($keyword)
    {
        $this->db->like('tanggal', $keyword);
        $this->db->select('*');
        $this->db->from('pesan');
        $this->db->join('nasabah', 'nasabah.id_nasabah = pesan.id_nasabah');
        $hasil = $this->db->get();
        return $hasil->result();
    }

    public function selesai($data, $id_pesan)
    {
        $this->db->where('id_pesan', $id_pesan);
        $this->db->update('pesan', $data);
    }
}
