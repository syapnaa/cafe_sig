<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Akun_pengguna_model');
        $this->load->library('session');
    }

    // Menampilkan halaman login
    public function index() {
        // Jika sudah login, arahkan ke halaman utama
        if ($this->session->userdata('logged_in')) {
            redirect('cafe');
        }

        $this->load->view('login_view');
    }

    // Proses autentikasi login
    public function auth() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Cek jika username dan password tidak kosong
        if (empty($username) || empty($password)) {
            $this->session->set_flashdata('error', 'Username dan Password tidak boleh kosong');
            redirect('login');
        }

        // Ambil data pengguna dari database
        $user = $this->Akun_pengguna_model->get_user($username);

        // Verifikasi password menggunakan bcrypt
        if ($user && password_verify($password, $user->password)) {
            // Set session data
            $this->session->set_userdata([
                'logged_in' => TRUE,
                'username'  => $user->username
            ]);
            redirect('cafe');
        } else {
            $this->session->set_flashdata('error', 'Username atau Password tidak valid');
            redirect('login');
        }
    }

    // Proses logout
    public function logout() {
        // Hapus semua data session
        $this->session->sess_destroy();
        
        // Redirect ke halaman login
        redirect('login');
    }
}
?>
