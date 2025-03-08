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

	public function logout(){
		 // Hapus session ketika logout
		 $this->session->unset_userdata('logged_in');
		 $this->session->unset_userdata('username');
		 $this->session->unset_userdata('role');
		 $this->session->sess_destroy();
 
		 redirect('auth'); 
	}
}