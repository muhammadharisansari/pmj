<?php
class Notif_model extends CI_Model
{
    public function get_data($where)
    {
        $this->db->where('id_nasabah', $where);
        $this->db->where('status', 'belum');
        return $this->db->get('notif');
    }

    public function tampil_data($where)
    {
        $this->db->where('id_nasabah', $where);
        $this->db->order_by('id_notif', 'DESC');
        $hasil = $this->db->get('notif');
        return $hasil->result();
    }

    public function baca($where, $data)
    {
        $this->db->where($where);
        $this->db->update('notif', $data);
    }

    public function hapus($where)
    {
        $this->db->where($where);
        $this->db->delete('notif');
    }

    public function insert($data)
    {
        $this->db->insert('notif', $data);
    }
}
