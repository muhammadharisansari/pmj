<?php
class Tukar_model extends CI_Model
{
    public function tampil()
    {
        $hasil = $this->db->get('tukar');
        return $hasil->result();
    }

    public function update_stok($where_barang, $sisa_stok)
    {
        $this->db->where('id_barang', $where_barang);
        $this->db->update('tukar', $sisa_stok);
    }

    public function hitung_data()
    {
        return $this->db->get('tukar')->num_rows();
    }

    public function edit($id_barang, $data)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tukar', $data);
    }

    public function simpan($data)
    {
        $this->db->insert('tukar', $data);
    }

    //tabel pesan

    public function insert_pesan($data)
    {
        $this->db->insert('pesan', $data);
    }

    public function hapus($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('tukar');
    }
}
