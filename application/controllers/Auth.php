<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_users');
		$this->load->library('session');
	}
	public function index()
	{
		$this->load->view('login');
		// $this->template->load('template', '');
	}

	public function login(){
		// inputan login
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// var_dump($username, $password);

		// check data di database
		$get_user = $this->M_users->login($username, $password);
		// var_dump($get_user);

		if($get_user){
			// setting session jika login berhasil
			$set_session = array(
				'username' => $get_user->USERNAME,
				'nama' => $get_user->NAMA,
				'level' => $get_user->LEVEL,
				'id_user' => $get_user->ID_USER
			);
			// var_dump($set_session);

			$this->session->set_userdata($set_session);
			// print_r($this->session->userdata());
			// $this->session->set_userdata('level', $get_user->level);

			// tampil berdasarkan level 
			if($get_user->LEVEL == '1'){
				redirect('beranda/');
			}else{
				redirect('beranda/');
			}
			// echo 'ada data ', $get_user->USERNAME, $get_user->ID_USER;
		}else{
			$this->session->set_flashdata('error', 'Username atau password salah');
            redirect('auth');
			echo 'tidak ada data';
		}

	}

	public function registrasi(){
		$this->load->view('registrasi');
	}

	public function simpan_regis(){
		$nama = $this->input->post('reg_nama');
		$username = $this->input->post('reg_username');
		$password = $this->input->post('reg_password');
		$repassword = $this->input->post('reg_repassword');

		// Validasi
		if (empty($nama) || empty($username) || empty($password) || empty($repassword)) {
			$this->session->set_flashdata('error', 'Semua field harus diisi.');
			redirect('auth/registrasi'); // arahkan balik ke form registrasi
			return;
		}
	
		if ($password !== $repassword) {
			$this->session->set_flashdata('error', 'Password dan konfirmasi tidak cocok.');
			redirect('auth/registrasi');
			return;
		}
	
		// Cek username
		$cek_username = $this->db->get_where('nj_users', ['USERNAME' => $username])->row();
		if ($cek_username) {
			$this->session->set_flashdata('error', 'Username sudah digunakan.');
			redirect('auth/registrasi');
			return;
		}
	
		// Insert user
		$data_insert = [
			'NAMA' => $nama,
			'USERNAME' => $username,
			'PASSWORD' => password_hash($password, PASSWORD_DEFAULT),
			'LEVEL' => 2,
			'TGL_INSERT' => date('Y-m-d H:i:s')
		];
	
		$this->db->insert('nj_users', $data_insert);
	
		$this->session->set_flashdata('success', 'Registrasi berhasil. Silahkan login.');
		redirect('auth');
	}

	public function logout(){
		 // Hapus session ketika logout
		 $this->session->unset_userdata('logged_in');
		 $this->session->unset_userdata('username');
		 $this->session->unset_userdata('role');
		 $this->session->sess_destroy();
 
		 redirect('auth'); 
	}
}