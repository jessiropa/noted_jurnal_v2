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
		$id_user = $this->session->userdata('id_user');
		$get_project = $this->db->query("SELECT
		* 
		FROM
		nj_project
		WHERE 
		STATUS_SIMPAN = 'BARU'
		AND ID_USERS = '$id_user'");
		$data['project'] = $get_project;
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
		$todos = $this->input->post('todos');
		$statuses = $this->input->post('todos_status');

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

		
		if ($todos && $statuses && is_array($todos)) {
			// ambil id terakhir dari todo dengan format yang benar
			$get_last_todo = $this->db->query("SELECT 
				ID_TODO_TASK 
				FROM nj_todolist 
				WHERE ID_TODO_TASK LIKE 'TD%' 
				ORDER BY CAST(SUBSTRING(ID_TODO_TASK, 3) AS UNSIGNED) DESC 
				LIMIT 1");
				
			if($get_last_todo->num_rows() > 0){
				$last_todo_id = $get_last_todo->row()->ID_TODO_TASK;
				// Ambil nomor setelah 'TD'
				$num = (int) substr($last_todo_id, 2);
			}else{
				$num = 0;
			}
	
			// insert todos
			for ($i = 0; $i < count($todos); $i++) {
				$num++;
				$new_todo_id = 'TD' . str_pad($num, 4, '0', STR_PAD_LEFT);

				// var_dump($new_todo_id);
				
				$todo_data = [
					'ID_TODO_TASK' => $new_todo_id,
					'ID_TASK' => $new_id,
					'NAMA_TODO' => $todos[$i],
					'IS_DONE' => $statuses[$i] == 1 ? 1 : 0,
					'WAKTU_INSERT' => $tgl_insert,
					'USER_INSERT' => $user_insert,
					'ID_USER' => $id_user,
					'STATUS_SIMPAN' => 'BARU'
				];
				
				$this->db->insert('nj_todolist', $todo_data);
			}
		}


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
							🔄 Progress : '.$tk['PROGRES'].' <br><br>
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
		$this->db->query("UPDATE nj_todolist SET STATUS_SIMPAN = 'HAPUS', WAKTU_UPDATE = '$tgl_update', USER_UPDATE = '$user_update' WHERE ID_TASK = '$idtask' AND STATUS_SIMPAN ='BARU'");
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
		ID_PROJECTS,
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
			$idpj = $get_task->row()->ID_PROJECTS;
			$status = '1';
		}else{
			$id_task = '';
			$judul_task = '';
			$deskripsi = '';
			$deadline = '';
			$kategori = '';
			$prioritas = '';
			$progres = '';
			$idpj = '';
			$status = '0';
		}

		$get_todo = $this->db->query("SELECT * FROM nj_todolist WHERE ID_TASK = '$idtask' AND STATUS_SIMPAN = 'BARU'")->result();

		echo json_encode([
			'judul' => $judul_task,
			'id_task' => $id_task,
			'deskripsi' => $deskripsi,
			'deadline' => $deadline,
			'kategori' => $kategori,
			'prioritas' => $prioritas,
			'progres' => $progres,
			'idpj' => $idpj,
			'status' => $status,
			'todolist' => $get_todo
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
		$todos = $this->input->post('todos');
		$todos_status = $this->input->post('todos_status');
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


		// ambil todo sebelumnya
		$get_todo = $this->db->query("SELECT * FROM nj_todolist WHERE ID_TASK = '$idtask' AND STATUS_SIMPAN = 'BARU' ORDER BY ID_TODO_TASK ASC");
		$todo_lama = $get_todo->result_array();

		// update status todo sebelumnya menjadi revisi
		$this->db->query("UPDATE nj_todolist SET STATUS_SIMPAN = 'REVISI', WAKTU_UPDATE = '$tgl_update', USER_UPDATE = '$user_update' WHERE ID_TASK = '$idtask' AND STATUS_SIMPAN = 'BARU'");

		// insert todos yang baru
		if (!empty($todos)) {
			 // ambil id terakhir dari todo dengan format yang benar
			 $get_last_todo = $this->db->query("SELECT 
			 ID_TODO_TASK 
			 FROM nj_todolist 
			 WHERE ID_TODO_TASK LIKE 'TD%' 
			 ORDER BY CAST(SUBSTRING(ID_TODO_TASK, 3) AS UNSIGNED) DESC 
			 LIMIT 1");
			 
			if($get_last_todo->num_rows() > 0){
				$last_todo_id = $get_last_todo->row()->ID_TODO_TASK;
				// Ambil nomor setelah 'TD'
				$num = (int) substr($last_todo_id, 2);
			}else{
				$num = 0;
			}
 
			foreach ($todos as $index => $todo_nama) {
				if (trim($todo_nama) != '') {
					// Jika ada todo lama di index ini, gunakan ID-nya, jika tidak, buat ID baru
					if (isset($todo_lama[$index]['ID_TODO_TASK']) && strpos($todo_lama[$index]['ID_TODO_TASK'], 'TD') === 0) {
						$todo_id = $todo_lama[$index]['ID_TODO_TASK'];
					} else {
						$num++;
						$todo_id = 'TD' . str_pad($num, 4, '0', STR_PAD_LEFT);
					}
					
					$todolist = array(
						'ID_TODO_TASK' => $todo_id,
						'ID_TASK' => $idtask,
						'NAMA_TODO' => $todo_nama,
						'IS_DONE' => isset($todos_status[$index]) ? $todos_status[$index] : 0,
						'WAKTU_INSERT' => $tgl_insert,
						'USER_INSERT' => $user_insert,
						'ID_USER' => $id_user,
						'STATUS_SIMPAN' => 'BARU'
					);
					$this->db->insert('nj_todolist', $todolist);
				}
			}
		}



		echo 'berhasil';
	}

	public function all_list_task(){
		$id_users = $this->session->userdata('id_user');
		$get_task = $this->db->query("SELECT 
		a.JUDUL_TASK,
		a.ID_TASK,
		a.ID_PROJECTS,
		b.NAMA_PROJECT,
		a.PRIORITAS,
		a.PROGRES,
		a.DEADLINE
		FROM 
		nj_tasks a 
		LEFT JOIN nj_project b ON a.ID_PROJECTS = b.ID_PROJECTS 
		WHERE a.ID_USERS = '$id_users'
		AND a.STATUS_SIMPAN = 'BARU'
		AND b.STATUS_SIMPAN = 'BARU'
		GROUP BY
		a.JUDUL_TASK,
		a.ID_TASK,
		a.ID_PROJECTS,
		b.NAMA_PROJECT,
		a.PRIORITAS,
		a.PROGRES,
		a.DEADLINE
		ORDER BY a.WAKTU_INSERT DESC");

		$tsk = "";
		if($get_task->num_rows() > 0){
			foreach($get_task->result_array() as $row_task){
				$tsk .= '<tr>
							<td>'.$row_task['JUDUL_TASK'].'</td>
							<td>
								'.$row_task['NAMA_PROJECT'].'
							</td>
							<td> '.$row_task['PRIORITAS'].' </td>
							<td> '.$row_task['DEADLINE'].'  </td>
							<td> '.$row_task['PROGRES'].'  </td>
							<td>
								<button type="button" class="btn btn-warning btn-sm mb-2"
									onclick="edit_task(\''.$row_task['ID_TASK'].'\')"> ✏️ Edit</button>
								<button type="button" class="btn btn-danger btn-sm mb-2"
									onclick="konfirmasi_hapus(\''.$row_task['ID_TASK'].'\',\''.$row_task['JUDUL_TASK'].'\')"> ❌
									Hapus</button>
							</td>
						</tr>';
			}
		}else{
			// $tsk .= '<tr>
			// 				 <td colspan="6" class="text-center">TIDAK ADA TASK</td>
			// 			</tr>';

			$tsk .= '<tr>
				<td class="text-center" colspan="6">TIDAK ADA TASK</td>
			</tr>';

		}
		
		echo $tsk;
	}
}