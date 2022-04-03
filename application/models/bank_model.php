<?php 
class Bank_model extends CI_Model{

    public function get_data()
    {
       $hasil = $this->db->get('bank');
       return $hasil->result();
    }

}
