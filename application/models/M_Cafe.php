<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Cafe extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load database jika belum diload
    }

    public function getDataCafe(){
        $this->db->select('*');
        $this->db->from('cafe');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCafeById($id){
        $this->db->where('id', $id);
        $query = $this->db->get('cafe');
        return $query->row();
    }

    public function insertDataCafe($data){
        return $this->db->insert('cafe', $data);
    }

    public function updateCafe($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('cafe', $data); 
    }

    public function hapusCafe($id){
        $this->db->where('id', $id);
        return $this->db->delete('cafe');
    }
}
?>
