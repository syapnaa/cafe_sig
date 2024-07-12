<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cafe extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('M_Cafe');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $recordCafe = $this->M_Cafe->getDataCafe();
        $DATA = array('cafe' => $recordCafe);
        $this->load->view('index', $DATA);
    }

    public function input(){
        $this->load->view('input');
    }

    public function edit($id){
        $recordCafe = $this->M_Cafe->getCafeById($id);
        $DATA = array('cafe' => $recordCafe);
        $this->load->view('edit', $DATA);
    }    

    public function AksiTambah(){
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|numeric');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('input');
        } else {
            $nama = $this->input->post('nama');
            $deskripsi = $this->input->post('deskripsi');
            $harga = $this->input->post('harga');
            $alamat = $this->input->post('alamat');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');

            $DataTambah = array(
                'nama' => $nama,
                'deskripsi' => $deskripsi,
                'harga' => $harga,
                'alamat' => $alamat,
                'latitude' => $latitude,
                'longitude' => $longitude,
            );

            $this->M_Cafe->insertDataCafe($DataTambah);
            redirect(base_url('cafe'));
        }
    }

    public function AksiUpdate(){
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|numeric');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id');
            $recordCafe = $this->M_Cafe->getCafeById($id);
            $DATA = array('cafe' => $recordCafe);
            $this->load->view('edit', $DATA);
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $deskripsi = $this->input->post('deskripsi');
            $harga = $this->input->post('harga');
            $alamat = $this->input->post('alamat');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');

            $DataUpdate = array(
                'nama' => $nama,
                'deskripsi' => $deskripsi,
                'harga' => $harga,
                'alamat' => $alamat,
                'latitude' => $latitude,
                'longitude' => $longitude,
            );

            $this->M_Cafe->updateCafe($id, $DataUpdate);
            redirect(base_url('cafe'));
        }
    }

    public function AksiDelete($id){
        $this->M_Cafe->hapusCafe($id);
        redirect(base_url('cafe'));
    }

    public function getData() {
        // Set CORS headers
        header('Access-Control-Allow-Origin: http://localhost');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type');
    
        // Load model (assuming M_Cafe is your model)
        $this->load->model('M_Cafe');
    
        // Get data from model
        $recordCafe = $this->M_Cafe->getDataCafe();
    
        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($recordCafe);
    }
    
}
?>
