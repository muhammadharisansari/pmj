<?php
class Info_model extends CI_Model
{
    public function get_data()
    {
        $this->db->order_by('id_info', 'DESC');
        $hasil = $this->db->get('info');
        return $hasil->result();
    }

    public function get_data_limit()
    {
        $this->db->order_by('id_info', 'DESC');
        $this->db->limit('3');
        $hasil = $this->db->get('info');
        return $hasil->result();
    }

    public function update($where, $data)
    {
        $this->db->where('id_info', $where);
        $this->db->update('info', $data);
    }

    public function hapus($where)
    {
        $this->db->where('id_info', $where);
        $this->db->delete('info');
    }

    public function insert($data)
    {
        $this->db->insert('info', $data);
    }
}
