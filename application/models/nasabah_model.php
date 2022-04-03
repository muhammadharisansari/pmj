<?php

class Nasabah_model extends CI_model
{

    public $table   = 'nasabah';
    public $id      = 'id_nasabah';

    public function tampil_data()
    {
        return $this->db->get('nasabah')->result();
    }

    public function tampil_filter($dari, $sampai)
    {
        $this->db->where('tgl_daftar>=', $dari);
        $this->db->where('tgl_daftar<=', $sampai);
        return $this->db->get('nasabah')->result();
    }

    public function get_data($id)
    {
        $this->db->where('username_nasabah', $id);
        return $this->db->get('nasabah')->row();
    }

    public function hitung_data()
    {
        return $this->db->get('nasabah')->num_rows();
    }
    public function hitung_menunggu()
    {
        $this->db->where('status_verifikasi', 'menunggu');
        return $this->db->get('nasabah');
    }

    public function get_nasabah($id)
    {
        $this->db->where('id_nasabah', $id);
        return $this->db->get('nasabah')->row();
    }

    public function get_grafik($data)
    {
        $this->db->like('tgl_daftar', $data);
        return $this->db->get('nasabah');
    }

    public function tampil_nasabah($where)
    {
        $this->db->where('id_nasabah', $where);
        return $this->db->get('nasabah')->result();
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function insert_deposit($data)
    {
        $this->db->insert('mutasi', $data);
    }

    public function update_nasabah($where, $data, $table)
    {
        $this->db->where('id_nasabah', $where);
        $this->db->update($table, $data);
    }

    public function update_saldo($where, $data2, $table)
    {
        // var_dump($where, $data2);
        // die();
        $this->db->where('id_nasabah', $where);
        $this->db->update($table, $data2);
    }
    public function update_poin($where, $data2, $table)
    {
        // var_dump($where, $data2);
        // die();
        $this->db->where('id_nasabah', $where);
        $this->db->update($table, $data2);
    }

    public function verifikasi($where, $data)
    {
        $this->db->where('id_nasabah', $where);
        $this->db->update('nasabah', $data);
    }

    public function kirim($notif)
    {
        $this->db->insert('notif', $notif);
    }

    public function hapus($id_nasabah)
    {
        $this->db->where('id_nasabah', $id_nasabah);
        $this->db->delete('nasabah');
    }
}
