<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poligon_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Mengambil semua data poligon
    public function get_all() {
        $query = $this->db->get('poligon');
        return $query->result();
    }

//     // Mengambil satu data poligon berdasarkan ID
//     public function get_by_id($id) {
//         $query = $this->db->get_where('poligon', array('id' => $id));
//         return $query->row();
//     }

//     // Menyimpan data poligon baru
//     public function insert($data) {
//         return $this->db->insert('poligon', $data);
//     }

//     // Memperbarui data poligon
//     public function update($id, $data) {
//         $this->db->where('id', $id);
//         return $this->db->update('poligon', $data);
//     }

//     // Menghapus data poligon
//     public function delete($id) {
//         $this->db->where('id', $id);
//         return $this->db->delete('poligon');
//     }
// }
}
