<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {
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
		// load session user yang login
		$data['username'] = $this->session->userdata('username');
		$data['nama'] = $this->session->userdata('nama');
    	$data['level'] = $this->session->userdata('level');
		$data['id_user'] = $this->session->userdata('id_user');
		// $this->template->load('template', 'mytask/v_task', $data);
		$this->load->view('mytask/v_task', $data);
	}

	public function simpan_task(){
		date_default_timezone_set('Asia/Jakarta');
		$idpj = $this->input->post('idpj');
		$kategori = $this->input->post('kategori');
		$prioritas = $this->input->post('prioritas');
		$progres = $this->input->post('progres');
		$task = $this->input->post('task');
		$deskripsi = $this->input->post('deskripsi');
		$deadline = $this->input->post('deadline');
		$user_insert = $this->session->userdata('nama');
		$id_user = $this->session->userdata('id_user');
		$tgl_insert = date('Y-m-d H:i:s');

		// ambil id terakhir di tabel task 
		$get_data = $this->db->query("SELECT 
        ID_TASK
        FROM nj_tasks
        ORDER BY ID_TASK DESC
        LIMIT 1");

		if($get_data->num_rows() > 0){
			$get_idtask = $get_data->row()->ID_TASK;
		}else{
			$get_idtask = null;
		}

		// buat id task 
		if($get_idtask){
			// jika ada 
			$num = (int) substr($get_idtask, 2);
            $num++;
            $new_id = 'TS'.str_pad($num, 4, '0', STR_PAD_LEFT);
		}else{
			// jika tidak ada
			$new_id = 'TS0001';
		}

		// insert database
		$ts['ID_TASK'] = $new_id;
		$ts['ID_PROJECTS'] = $idpj;
		$ts['JUDUL_TASK'] = $task;
		$ts['DESKRIPSI'] = $deskripsi;
		$ts['KATEGORI_TASK'] = $kategori;
		$ts['PRIORITAS'] = $prioritas;
		$ts['PROGRES'] = $progres;
		$ts['STATUS_SIMPAN'] = 'BARU';
		$ts['WAKTU_INSERT'] = $tgl_insert;
		$ts['USER_INSERT'] = $user_insert;
		$ts['DEADLINE'] = $deadline;
		$ts['ID_USERS'] = $id_user;
		
		$this->db->insert('nj_tasks', $ts);

		echo 'berhasil';
	}

	public function view_list_task(){
		$idpj = $this->input->post('idpj');
		$id_users = $this->session->userdata('id_user');
		$get_task = $this->db->query("SELECT 
		*
		FROM 
		nj_tasks
		WHERE ID_PROJECTS = '$idpj'
		AND STATUS_SIMPAN = 'BARU'
		AND ID_USERS = '$id_users'
		ORDER BY WAKTU_INSERT DESC");
				$task = "";
		if($get_task->num_rows() > 0){
			$tasks = $get_task->result_array();
			foreach($tasks as $index => $tk){
				// $position = ($index % 2 == 0) ? 'order-md-1' : 'order-md-2';
				// membuat baris baru 
				if($index % 2 == 0){
					$task .= ' <div class="row">';
				}
	
				$task .=' 
				<div class="col-md-6">
						<div class="preview-item border-bottom"> <br>
							✅ '.$tk['JUDUL_TASK'].' <br>
							📅 Deadline : '.$tk['DEADLINE'].' <br>
							🔄 Progress : '.$tk['PROGRES'].' <br>
							📎 File : 📂 proposal_skripsi.pdf <br> <br>
							<button type="button" class="btn btn-warning btn-sm mb-2" onclick="edit_task(\''.$tk['ID_TASK'].'\')"> ✏️ Edit</button>
							<button type="button" class="btn btn-danger btn-sm mb-2" onclick="konfirmasi_hapus(\''.$tk['ID_TASK'].'\',\''.$tk['JUDUL_TASK'].'\')"> ❌ Hapus</button>
						</div>
						<div class="preview-item border-bottom"></div>
				</div> ';
				
				if ($index % 2 == 1 || $index == count($tasks) - 1) {
					$task .= '</div><br><br>'; // Tutup row dan kasih spasi antar baris
				}
			}
		}else{
			$task .='<br>
			<h1>BELUM ADA TASK </h1> <br>';
		}

		echo $task;
	}

	public function hapus_task(){
		$idtask = $this->input->post('idtask');
		$user_update = $this->session->userdata('nama');
		$tgl_update = date('Y-m-d H:i:s');

		$this->db->query("UPDATE nj_tasks SET STATUS_SIMPAN = 'HAPUS', WAKTU_UPDATE = '$tgl_update', USER_UPDATE = '$user_update' WHERE ID_TASK = '$idtask' AND STATUS_SIMPAN ='BARU'");
		echo 'berhasil';
	}

	public function edit_task(){
		$idtask = $this->input->post('idtask');

		$get_task = $this->db->query("SELECT 
		JUDUL_TASK,
		ID_TASK,
		DESKRIPSI,
		DEADLINE,
		KATEGORI_TASK,
		PRIORITAS,
		PROGRES
		FROM 
		nj_tasks 
		WHERE 
		ID_TASK = '$idtask' 
		AND STATUS_SIMPAN = 'BARU'");

		if($get_task->num_rows() > 0){
			$judul_task = $get_task->row()->JUDUL_TASK;
			$id_task = $get_task->row()->ID_TASK;
			$deskripsi = $get_task->row()->DESKRIPSI;
			$deadline = $get_task->row()->DEADLINE;
			$kategori = $get_task->row()->KATEGORI_TASK;
			$prioritas = $get_task->row()->PRIORITAS;
			$progres = $get_task->row()->PROGRES;
			$status = '1';
		}else{
			$id_task = '';
			$judul_task = '';
			$deskripsi = '';
			$deadline = '';
			$kategori = '';
			$prioritas = '';
			$progres = '';
			$status = '0';
		}

		echo json_encode([
			'judul' => $judul_task,
			'id_task' => $id_task,
			'deskripsi' => $deskripsi,
			'deadline' => $deadline,
			'kategori' => $kategori,
			'prioritas' => $prioritas,
			'progres' => $progres,
			'status' => $status
		]);
	}

	public function simpan_edit_task(){
		date_default_timezone_set('Asia/Jakarta');
		$idpj = $this->input->post('idpj');
		$idtask = $this->input->post('idtask');
		$kategori = $this->input->post('kategori');
		$prioritas = $this->input->post('prioritas');
		$progres = $this->input->post('progres');
		$task = $this->input->post('task');
		$deskripsi = $this->input->post('deskripsi');
		$deadline = $this->input->post('deadline');
		$user_insert = $this->session->userdata('nama');
		$user_update = $this->session->userdata('nama');
		$id_user = $this->session->userdata('id_user');
		$tgl_insert = date('Y-m-d H:i:s');
		$tgl_update = date('Y-m-d H:i:s');

		// update status simpan data yang belum diubah menjadi revisi 
		$get_task = $this->db->query("SELECT * FROM nj_tasks WHERE ID_tASK = '$idtask' AND STATUS_SIMPAN ='BARU'");
		if($get_task->num_rows() > 0){
			$this->db->query("UPDATE nj_tasks SET STATUS_SIMPAN = 'REVISI', WAKTU_UPDATE = '$tgl_update', USER_UPDATE = '$user_update' WHERE ID_tASK = '$idtask' AND STATUS_SIMPAN ='BARU'");
		}

		// insert database
		$ts['ID_TASK'] = $idtask;
		$ts['ID_PROJECTS'] = $idpj;
		$ts['JUDUL_TASK'] = $task;
		$ts['DESKRIPSI'] = $deskripsi;
		$ts['KATEGORI_TASK'] = $kategori;
		$ts['PRIORITAS'] = $prioritas;
		$ts['PROGRES'] = $progres;
		$ts['STATUS_SIMPAN'] = 'BARU';
		$ts['WAKTU_INSERT'] = $tgl_insert;
		$ts['USER_INSERT'] = $user_insert;
		$ts['DEADLINE'] = $deadline;
		$ts['ID_USERS'] = $id_user;
		
		$this->db->insert('nj_tasks', $ts);

		echo 'berhasil';
	}
}