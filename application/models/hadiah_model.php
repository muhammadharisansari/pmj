<?php
class Hadiah_model extends CI_Model
{
    public function tampil()
    {
        $hasil = $this->db->get('hadiah');
        return $hasil->result();
    }

    public function tampil_klaim()
    {
        $this->db->where('status', 'menunggu');
        $hasil = $this->db->get('klaim_hadiah');
        return $hasil->result();
    }

    public function tampil_laporan($keyword)
    {
        $this->db->like('tanggal', $keyword);
        $hasil = $this->db->get('klaim_hadiah');
        return $hasil->result();
    }

    public function riwayat_klaim()
    {
        $hasil = $this->db->get('klaim_hadiah');
        return $hasil->result();
    }

    public function hitung_menunggu()
    {
        $this->db->where('status', 'menunggu');
        return $this->db->get('klaim_hadiah');
    }

    public function hitung_data()
    {
        return $this->db->get('klaim_hadiah')->num_rows();
    }

    public function simpan($data)
    {
        $this->db->insert('hadiah', $data);
    }

    public function hapus($id_hadiah)
    {
        $this->db->where('id_hadiah', $id_hadiah);
        $this->db->delete('hadiah');
    }

    public function edit($id_hadiah, $data)
    {
        $this->db->where('id_hadiah', $id_hadiah);
        $this->db->update('hadiah', $data);
    }

    public function klaim($id_hadiah, $data)
    {
        $this->db->where('id_hadiah', $id_hadiah);
        $this->db->update('klaim_hadiah', $data);
    }
}
