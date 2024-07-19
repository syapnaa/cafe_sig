<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poligon extends CI_Controller {
    public function getData() {
        $this->load->model('Poligon_model');
        $data = $this->Poligon_model->get_all();
        echo json_encode($data);
    }
}
?>