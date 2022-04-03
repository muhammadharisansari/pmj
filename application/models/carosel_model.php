<?php
class carosel_model extends CI_Model
{
    public function tampil()
    {
        return $this->db->get('carosel')->result();
    }

    public function update($id_carosel)
    {
        $this->db->where('id_carosel', $id_carosel);
        $this->db->update('carosel');
    }
}
