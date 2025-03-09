<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
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
		// $this->template->load('template', 'project/v_project', $data);
		$this->load->view('project/v_project', $data);
	}

	public function create_project(){
		$namaproject = $this->input->post('namaproject');
		$id_user = $this->session->userdata('id_user');
		$nama_user = $this->session->userdata('nama');
		
		$get_data_project = $this->M_project->create_project($namaproject, $id_user, $nama_user);

		if($get_data_project){
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan');
			echo 'success';
		}else{
			$this->session->set_flashdata('error', 'Data gagal ditambahkan');
			echo 'error';
		}
	}

	function view_list_project(){
		$iduser = $this->input->post('iduser');
		
		$get_project = $this->db->query("SELECT 
		ID_PROJECTS,
		NAMA_PROJECT,
		DESKRIPSI_PROJECT,
		WAKTU_INSERT
		FROM nj_project
		WHERE ID_USERS = '$iduser'
		AND STATUS_SIMPAN = 'BARU'
		ORDER BY WAKTU_INSERT DESC");

		$project = "";
		if($get_project->num_rows() > 0) {

			foreach($get_project->result_array() as $row_project){
						$project .= '<div class="preview-item border-bottom">
						<div class="preview-thumbnail">
							<div class="preview-icon bg-primary">
								<i class="mdi mdi-file-document"></i>
							</div>
						</div>
						<div class="preview-item-content d-sm-flex flex-grow">
							<div class="flex-grow">
								<h6 class="preview-subject">
									<a href="'. base_url('project/detail_task/'.$row_project['ID_PROJECTS'].'/'.$iduser).'" style="color: white; text-decoration: none;">'.$row_project['NAMA_PROJECT'].'</a>
								</h6>
								<p class="text-muted mb-0">
									30 tasks, 5 issues
								</p>
								<p class="text-muted mb-0">
									'.$row_project['DESKRIPSI_PROJECT'].'
								</p>
							</div>
							<div class="mr-auto text-sm-right pt-2 pt-sm-0">';
						// hitung waktu 
						$waktuinsert  = $row_project['WAKTU_INSERT'];
						$waktusekarang = time();
						$convert_waktu = strtotime($waktuinsert);
						$selisihdetik = $waktusekarang - $convert_waktu;

						$waktu = '';
						if($selisihdetik < 60){
							$waktu = 'Baru saja';
						}else if($selisihdetik < 3600){
							$menit = floor($selisihdetik / 60);
							$waktu = $menit . ' menit yang lalu';
						} elseif ($selisihdetik < 86400) {
							$jam = floor($selisihdetik / 3600);
							$waktu = $jam . ' jam yang lalu';
						} elseif ($selisihdetik < 604800) { // 7 hari = 604800 detik
							$hari = floor($selisihdetik / 86400);
							$waktu = $hari . ' hari yang lalu';
						} else {
							// Jika lebih dari 7 hari, tampilkan tanggal waktu insert
							$waktu = date('d M Y', $convert_waktu);// Format tanggal misalnya: 20 Sep 2024
						}
						$project .= '<p class="text-muted">'.$waktu.'</p>
							</div>
						</div>
					</div>';
			}

		}else{
			$project .= '<div class="preview-item border-bottom">
						<div class="preview-item-content d-sm-flex flex-grow text-center">
							<center> ANDA TIDAK MEMILIKI PROJECT </center>
						</div>
					</div>';

		}

		echo $project;
	}

	function detail_task($idproject, $iduser){
		$data['nama'] = $this->session->userdata('nama');
    	$data['level'] = $this->session->userdata('level');
		// $get_detail = $this->db->query("SELECT 
		// np.NAMA_PROJECT,
		// ndp.DESKRIPSI_PROJECT,
		// ndp.STATUS_PROJECT,
		// ndp.DEADLINE_PROJECT,
		// ndp.TANGGAL_PROJECT
		// FROM nj_project np
		// LEFT JOIN nj_deksripsi_project ndp ON np.ID_PROJECTS = ndp.ID_PROJECT
		// WHERE np.ID_PROJECTS = '$idproject'
		// AND np.STATUS_SIMPAN = 'BARU'
		// AND np.ID_USERS = '$iduser'");
		$get_detail = $this->db->query("SELECT 
		pj.ID_PROJECTS,
		pj.NAMA_PROJECT,
		pj.DESKRIPSI_PROJECT,
		pj.STATUS_PROJECT,
		pj.DEADLINE,
		usr.NAMA
		FROM 
		nj_project pj 
		LEFT JOIN nj_users usr ON pj.ID_USERS = usr.ID_USER
		WHERE 
		pj.ID_USERS = '$iduser'
		AND pj.STATUS_SIMPAN = 'BARU'
		AND pj.ID_PROJECTS = '$idproject'");

		$data['detail_project'] = $get_detail->row();
		
		if($data['detail_project']){
			$this->load->view('project/v_detail_project', $data);
		}else{
			$this->session->set_flashdata('error', 'Proyek tidak ditemukan.');
            redirect('project');
		}
		// $this->load->view('project/v_detail_project', $data);

	}

	// simpan hasil edit detail project
	public function simpan_pj(){
		$idpj = $this->input->post('idpj');
		$edit_namapj = $this->input->post('edit_namapj');
		$edit_deskripsipj = $this->input->post('edit_deskripsipj');
		$edit_statuspj = $this->input->post('edit_statuspj');
		$edit_deadlinepj = $this->input->post('edit_deadlinepj');
		$user_update = $this->session->userdata('nama');
		$user_insert = $this->session->userdata('nama');
		$id_user = $this->session->userdata('id_user');
		$tgl_insert = date('Y-m-d H:i:s');
		$tgl_update = date('Y-m-d H:i:s');
		date_default_timezone_set('Asia/Jakarta');

		// update status simpan data yang belum diubah menjadi revisi 
		$get_project = $this->db->query("SELECT * FROM nj_project WHERE ID_PROJECTS = '$idpj' AND STATUS_SIMPAN ='BARU'");
		if($get_project->num_rows() > 0){
			$this->db->query("UPDATE nj_project SET STATUS_SIMPAN = 'REVISI', WAKTU_UPDATE = '$tgl_update', USER_UPDATE = '$user_update' WHERE ID_PROJECTS = '$idpj' AND STATUS_SIMPAN ='BARU'");
		}
		// insert data yang terbaru
		$PJ['ID_PROJECTS'] = $idpj;
		$PJ['NAMA_PROJECT'] = $edit_namapj;
		$PJ['ID_USERS'] = $id_user;
		$PJ['WAKTU_INSERT'] = $tgl_insert;
		$PJ['USER_INSERT'] = $user_insert;
		$PJ['STATUS_SIMPAN'] = 'BARU';
		$PJ['DESKRIPSI_PROJECT'] = $edit_deskripsipj;
		$PJ['STATUS_PROJECT'] = $edit_statuspj;
		$PJ['DEADLINE'] = $edit_deadlinepj;

		$this->db->insert('nj_project', $PJ);

		echo 'berhasil';

	}

	public function hapus_project(){
		$idpj = $this->input->post('idpj');
		$user_update = $this->session->userdata('nama');
		$tgl_update = date('Y-m-d H:i:s');

		$this->db->query("UPDATE nj_project SET STATUS_SIMPAN = 'HAPUS', WAKTU_UPDATE = '$tgl_update', USER_UPDATE = '$user_update' WHERE ID_PROJECTS = '$idpj' AND STATUS_SIMPAN ='BARU'");
		$this->db->query("UPDATE nj_tasks SET STATUS_SIMPAN = 'HAPUS', WAKTU_UPDATE = '$tgl_update', USER_UPDATE = '$user_update' WHERE ID_PROJECTS = '$idpj' AND STATUS_SIMPAN ='BARU'");
		echo 'berhasil';
	}
}