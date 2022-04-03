<?php 
class klaim_model extends CI_Model{

    public function insert($klaim)
    {
        $this->db->insert('klaim_hadiah',$klaim); 
    }
}
