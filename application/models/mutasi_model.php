<?php

class Mutasi_model extends CI_model
{

    public function tampil_data($where)
    {
        $this->db->order_by('id_transaksi', 'DESC');
        $hasil = $this->db->where('id_nasabah', $where)->get('mutasi');
        return $hasil->result();
    }

    public function hitung_data()
    {
        date_default_timezone_set('Asia/Singapore');
        $tb        = date('Y-m');

        $this->db->like('tanggal_setor', $tb);
        return $this->db->get('riwayat_setoran')->num_rows();
    }

    public function hitung_menunggu()
    {
        $this->db->where('status', 'menunggu');
        return $this->db->get('mutasi');
    }

    public function deposit()
    {
        $this->db->select('*');
        $this->db->from('mutasi');
        $this->db->join('nasabah', 'nasabah.id_nasabah = mutasi.id_nasabah');
        $this->db->where('status', 'menunggu');
        $this->db->order_by('id_transaksi', 'DESC');
        $hasil = $this->db->get();
        return $hasil->result();
    }

    public function list_deposit()
    {
        $this->db->select('*');
        $this->db->from('mutasi');
        $this->db->join('nasabah', 'nasabah.id_nasabah = mutasi.id_nasabah');
        $this->db->order_by('id_transaksi', 'DESC');
        $hasil = $this->db->get();
        return $hasil->result();
    }

    public function data_minyak($where)
    {
        $this->db->order_by('id_setoran', 'DESC');
        $hasil = $this->db->where('id_nasabah', $where)->get('riwayat_setoran');
        return $hasil->result();
    }

    public function insert_setor($setoran)
    {
        $this->db->insert('riwayat_setoran', $setoran);
    }

    public function tampil_riwayat()
    {
        $this->db->select('*');
        $this->db->from('riwayat_setoran');
        $this->db->join('nasabah', 'nasabah.id_nasabah = riwayat_setoran.id_nasabah');
        $hasil = $this->db->get();
        return $hasil->result();
    }

    public function get_grafik($data)
    {
        $this->db->like('tanggal_setor', $data);
        return $this->db->get('riwayat_setoran');
    }

    public function tampil_laporan($keyword)
    {
        $this->db->like('tanggal_setor', $keyword);
        $this->db->select('*');
        $this->db->from('riwayat_setoran');
        $this->db->join('nasabah', 'nasabah.id_nasabah = riwayat_setoran.id_nasabah');
        $hasil = $this->db->get();
        return $hasil->result();
    }

    public function delete($where)
    {
        $this->db->where($where);
        $this->db->delete('riwayat_setoran');
    }

    public function verifikasi($id_transaksi, $data)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('mutasi', $data);
    }

    public function reset_id_tarik($data2, $id)
    {
        $this->db->where('id_nasabah', $id);
        $this->db->update('nasabah', $data2);
    }

    public function kembalikan($id, $saldo)
    {
        $this->db->where('id_nasabah', $id);
        $this->db->update('nasabah', $saldo);
    }
}
