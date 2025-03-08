<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->library('session');
        // Cek jika pengguna sudah login
        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }
		date_default_timezone_set('Asia/Jakarta');
    }
	public function index()
	{
		// $this->load->view('v_beranda');

		// load session user yang login
		$data['username'] = $this->session->userdata('username');
		$data['nama'] = $this->session->userdata('nama');
    	$data['level'] = $this->session->userdata('level');

		// tampilan tanggal hari ini
		$hari_array = array(
			'Sunday' => 'Minggu',
			'Monday' => 'Senin',
			'Tuesday' => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday' => 'Kamis',
			'Friday' => 'Jumat',
			'Saturday' => 'Sabtu'
		);

		$bulan_array = array(
			'January' => 'Januari',
			'February' => 'Februari',
			'March' => 'Maret',
			'April' => 'April',
			'May' => 'Mei',
			'June' => 'Juni',
			'July' => 'Juli',
			'August' => 'Agustus',
			'September' => 'September',
			'October' => 'Oktober',
			'November' => 'November',
			'December' => 'Desember'
		);

		$hari = date('l');
		$tanggal = date('d');
		$bulan = date('F');
		$tahun = date('Y');

		$hari_indo = $hari_array[$hari];
		$bulan_indo = $bulan_array[$bulan];

		$today = "$hari_indo, $tanggal $bulan_indo $tahun";

		// tampilkan ucapan selamat datang
		$jam = date('H');
		// var_dump($jam);
		$ucapan = '';
		if($jam >= 5 && $jam < 12){
			$ucapan = 'Selamat Pagi';
		}else if($jam >= 12 && $jam < 15){
			$ucapan = 'Selamat Siang';
		}else if($jam >= 15 && $jam < 18){
			$ucapan = 'Selamat Sore';
		}else{
			$ucapan = 'Selamat Malam';
		}

		$data['tanggal'] = $today;
		$data['ucapan'] = $ucapan;
		// $this->template->load('template', 'v_beranda', $data);
		$this->load->view('v_beranda', $data);
	}
}