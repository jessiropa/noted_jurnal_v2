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
		$id_user = $this->session->userdata('id_user');
		$data['id_user'] = $id_user;

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

		// jumlah project 
		$project_query = $this->db->query("SELECT COUNT(ID_PROJECTS) AS jumlah_projects FROM nj_project WHERE ID_USERS = '$id_user' AND STATUS_SIMPAN = 'BARU'");
		$project_jumlah = $project_query->row()->jumlah_projects;
		$data['project'] = $project_jumlah;

		// jumlah task all
		$task_query = $this->db->query("SELECT COUNT(ID_TASK) AS jumlah_task FROM nj_tasks WHERE ID_USERS = '$id_user' AND STATUS_SIMPAN = 'BARU'");
		$task_jumlah = $task_query->row()->jumlah_task;
		$data['task'] = $task_jumlah;

		// jumlah task selesai
		$done_query = $this->db->query("SELECT COUNT(ID_TASK) AS task_selesai FROM nj_tasks WHERE ID_USERS = '$id_user' AND STATUS_SIMPAN = 'BARU' AND PROGRES = 'Selesai'");
		$task_selesai = $done_query->row()->task_selesai;
		$data['done'] = $task_selesai;

		// jumlah task selesai
		$progres_query = $this->db->query("SELECT COUNT(ID_TASK) AS task_progres FROM nj_tasks WHERE ID_USERS = '$id_user' AND STATUS_SIMPAN = 'BARU' AND PROGRES = 'Sedang Dikerjakan'");
		$task_progres = $progres_query->row()->task_progres;
		$data['progres'] = $task_progres;

		// list task selesai
		// $list_query = $this->db->query("");

		$this->load->view('v_beranda', $data);
	}

	public function list_task_done(){
		$iduser = $this->input->post('iduser');

		$get_task_done = $this->db->query("SELECT 
		a.JUDUL_TASK,
		a.DEADLINE,
		b.NAMA_PROJECT,
		a.PRIORITAS
		FROM 
		nj_tasks a
		LEFT JOIN nj_project b ON a.ID_PROJECTS = b.ID_PROJECTS
		WHERE a.STATUS_SIMPAN = 'BARU'
		AND 
		a.ID_USERS = '$iduser'
		AND
		a.PROGRES = 'Selesai'
		GROUP BY 
		a.JUDUL_TASK,
		a.DEADLINE,
		b.NAMA_PROJECT,
		a.PRIORITAS
		ORDER BY a.WAKTU_INSERT DESC");

		$task_done = "";
		if($get_task_done->num_rows() > 0){
			foreach($get_task_done->result_array() as $row_task){
				$task_done .= ' 
					<div class="preview-list border-bottom" style="margin-bottom: 30px;">
						<div class="preview-item-content d-sm-flex flex-grow">
							<div class="flex-grow">
								<h6>'.ucwords(strtolower($row_task['JUDUL_TASK'])).'</h6>
								<p class="text-muted mb-0"> 📌 '.$row_task['NAMA_PROJECT'].' | ⚡ '.$row_task['PRIORITAS'].' | 📅
									'.$row_task['DEADLINE'].'</p>
							</div>
						</div>
					</div>';
			}
		}else{
			$task_done = '<div class="preview-item border-bottom">
            <div class="preview-item-content d-sm-flex flex-grow text-center">
                <center>TIDAK ADA TASK SELESAI</center>
            </div>
        </div>';
		}

		echo $task_done;
	}
}