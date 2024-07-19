<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_pengguna_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_user($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('akun_pengguna');
        return $query->row();
    }
}
?>
