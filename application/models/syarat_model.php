<?php
class syarat_model extends CI_Model
{

    public function tampil_tf()
    {
        $this->db->where('kategori', 'transfer');
        return $this->db->get('syarat');
    }

    public function tampil_st()
    {
        $this->db->where('kategori', 'tunai');
        return $this->db->get('syarat');
    }

    public function tampil_minmax()
    {
        return $this->db->get('minmax');
    }

    public function simpan($data)
    {
        $this->db->insert('syarat', $data);
    }

    public function update($where, $data)
    {
        $this->db->where('id_syarat', $where);
        $this->db->update('syarat', $data);
    }

    public function update_harga($where, $data)
    {
        $this->db->where('id_minmax', $where);
        $this->db->update('minmax', $data);
    }

    public function hapus($id_syarat)
    {
        $this->db->where('id_syarat', $id_syarat);
        $this->db->delete('syarat');
    }
}
