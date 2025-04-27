<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->library('session');
		// load model dari project 
		$this->load->model('M_project');
        // Cek jika pengguna sudah login
        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }
		date_default_timezone_set('Asia/Jakarta');
    }
	public function index()
	{
		// load session user yang login
		$data['username'] = $this->session->userdata('username');
		$data['nama'] = $this->session->userdata('nama'); 
    	$data['level'] = $this->session->userdata('level');
    	$data['id_user'] = $this->session->userdata('id_user');
    	$id_user = $this->session->userdata('id_user');


        $get_user = $this->db->query("SELECT 
        NAMA,
        USERNAME,
        ID_USER
        FROM nj_users 
        WHERE ID_USER ='$id_user'");
        $data['user'] = $get_user;
		$this->load->view('setting_acc/v_setting', $data);
	}

	function update_acc(){
		$iduser = $this->input->post('id_user');
		$nama_user = $this->input->post('nama_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$repassword = $this->input->post('repassword');

    // Ambil data user dari database
    $user = $this->db->get_where('nj_users', ['ID_USER' => $iduser])->row();

    if (!$user) {
        echo json_encode(['status' => 'error', 'message' => 'User tidak ditemukan.']);
        return;
    }

    // Update nama dan username tetap dilakukan
    $data_update = [
        'nama' => $nama_user,
        'username' => $username,
    ];

    // Kalau password field diisi
    if (!empty($password)) {

        // Step 1: Password baru TIDAK BOLEH sama dengan password lama
        if (password_verify($password, $user->PASSWORD)) {
            echo json_encode(['status' => 'error', 'message' => 'Password baru tidak boleh sama dengan password lama.']);
            return; // Stop di sini
        }
    
        // Step 2: Cek konfirmasi password
        if ($password !== $repassword) {
            echo json_encode(['status' => 'error', 'message' => 'Konfirmasi password tidak cocok.']);
            return;
        }
    
        // Step 3: Password valid, hash dan simpan
        $data_update['password'] = password_hash($password, PASSWORD_DEFAULT);
    }
    

    // Proses update ke database
    $this->db->where('id_user', $iduser);
    $this->db->update('nj_users', $data_update);

    echo json_encode(['status' => 'success']); 
	}
}