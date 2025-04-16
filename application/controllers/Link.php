<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends CI_Controller {
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
		$get_kategori = $this->db->query("SELECT
		* 
		FROM
		nj_kategori
		WHERE 
		STATUS_SIMPAN = 'BARU'
		AND ID_USERS = '$id_user'");
		$data['kategori'] = $get_kategori;

		$get_link = $this->db->query("SELECT 
		a.JUDUL_LINK,
		a.URL,
		b.NAMA_KATEGORI,
		b.ID_KATEGORI
		FROM 
		nj_link a
		LEFT JOIN nj_kategori b ON a.ID_KATEGORI = b.ID_KATEGORI
		WHERE a.ID_USERS = '$id_user'
		AND a.STATUS_SIMPAN = 'BARU'
		AND b.STATUS_SIMPAN = 'BARU'");
		$data['referensi'] = $get_link;
		// load session user yang login
		$data['username'] = $this->session->userdata('username');
		$data['nama'] = $this->session->userdata('nama');
    	$data['level'] = $this->session->userdata('level');
		$data['id_user'] = $this->session->userdata('id_user');
		// $this->template->load('template', 'link/v_link', $data);
		$this->load->view('link/v_link', $data);
	}

	public function simpan_kategori(){
		date_default_timezone_set('Asia/Jakarta');
		$id_user = $this->session->userdata('id_user');
		$user_insert = $this->session->userdata('nama');
		$user_update = $this->session->userdata('nama');
		$tgl_insert = date('Y-m-d H:i:s');
		$tgl_update = date('Y-m-d H:i:s');
		$kategori = $this->input->post('kategori');
		$idkategori = $this->input->post('idkategori');

		$cek_data = $this->db->query("SELECT * FROM nj_kategori WHERE ID_KATEGORI = '$idkategori' AND STATUS_SIMPAN = 'BARU'");

		if($cek_data->num_rows() > 0){
			$this->db->query("UPDATE nj_kategori SET STATUS_SIMPAN = 'REVISI', WAKTU_UPDATE = '$tgl_update', USER_UPDATE = '$user_update' WHERE ID_KATEGORI = '$idkategori' AND STATUS_SIMPAN ='BARU'");
			
			$kt['ID_KATEGORI'] = $idkategori;
			$kt['NAMA_KATEGORI'] = $kategori;
			$kt['WAKTU_INSERT'] = $tgl_insert;
			$kt['USER_INSERT'] = $user_insert;
			$kt['ID_USERS'] = $id_user;
			$kt['STATUS_SIMPAN'] = 'BARU';

			$this->db->insert('nj_kategori', $kt);
			echo 'berhasil';

		}else{
					// membuat id kategori 
		// ambil id terakhir dari tabel kategori 
		$get_data = $this->db->query("SELECT 
        ID_KATEGORI
        FROM nj_kategori
        ORDER BY ID_KATEGORI DESC
        LIMIT 1");

		if($get_data->num_rows() > 0){
			$get_idkategori = $get_data->row()->ID_KATEGORI;
		}else{
			$get_idkategori = null;
		}

		// buat id kategori 
		if($get_idkategori){
			// jika ada 
			$num = (int) substr($get_idkategori, 2);
            $num++;
            $new_id = 'KT'.str_pad($num, 4, '0', STR_PAD_LEFT);
		}else{
			// jika tidak ada
			$new_id = 'KT0001';
		}

		// insert database
		$kt['ID_KATEGORI'] = $new_id;
		$kt['NAMA_KATEGORI'] = $kategori;
		$kt['WAKTU_INSERT'] = $tgl_insert;
		$kt['USER_INSERT'] = $user_insert;
		$kt['ID_USERS'] = $id_user;
		$kt['STATUS_SIMPAN'] = 'BARU';

		$this->db->insert('nj_kategori', $kt);

		echo 'berhasil';

		}

	}

	public function simpan_link(){
		date_default_timezone_set('Asia/Jakarta');
		$id_user = $this->session->userdata('id_user');
		$user_insert = $this->session->userdata('nama');
		$tgl_insert = date('Y-m-d H:i:s');
		$kategori = $this->input->post('kategori');
		$judul_link = $this->input->post('judul_link');
		$url = $this->input->post('link');

		// membuat id kategori 
		// ambil id terakhir dari tabel kategori 
		$get_data = $this->db->query("SELECT 
        ID_LINK
        FROM nj_link
        ORDER BY ID_LINK DESC
        LIMIT 1");

		if($get_data->num_rows() > 0){
			$get_idlink = $get_data->row()->ID_LINK;
		}else{
			$get_idlink = null;
		}

		// buat id kategori 
		if($get_idlink){
			// jika ada 
			$num = (int) substr($get_idlink, 2);
            $num++;
            $new_id = 'LNK'.str_pad($num, 4, '0', STR_PAD_LEFT);
		}else{
			// jika tidak ada
			$new_id = 'LNK0001';
		}

		// insert database
		$lnk['ID_LINK'] = $new_id;
		$lnk['ID_KATEGORI'] = $kategori;
		$lnk['JUDUL_LINK'] = $judul_link;
		$lnk['URL'] = $url;
		$lnk['ID_USERS'] = $id_user;
		$lnk['STATUS_SIMPAN'] = 'BARU';
		$lnk['USER_INSERT'] = $user_insert;
		$lnk['WAKTU_INSERT'] = $tgl_insert;

		$this->db->insert('nj_link', $lnk);

		echo 'berhasil';

	}

	public function hapus_kategori(){
		$idkategori = $this->input->post('idkategori');
		$user_update = $this->session->userdata('nama');
		$tgl_update = date('Y-m-d H:i:s');

		// update status simpan link 
		$this->db->query("UPDATE nj_link SET STATUS_SIMPAN = 'HAPUS', WAKTU_UPDATE = '$tgl_update', USER_UPDATE = '$user_update' WHERE ID_KATEGORI = '$idkategori' AND STATUS_SIMPAN ='BARU'");
		// update status simpan kategori
		$this->db->query("UPDATE nj_kategori SET STATUS_SIMPAN = 'HAPUS', WAKTU_UPDATE = '$tgl_update', USER_UPDATE = '$user_update' WHERE ID_KATEGORI = '$idkategori' AND STATUS_SIMPAN ='BARU'");
		echo 'berhasil'; 
	}

	public function edit_kategori(){
		$idkategori = $this->input->post('idkategori');

		$get_kategori = $this->db->query("SELECT 
		NAMA_KATEGORI,
		ID_KATEGORI
		FROM 
		nj_kategori 
		WHERE 
		ID_KATEGORI = '$idkategori' 
		AND STATUS_SIMPAN = 'BARU'");

		if($get_kategori->num_rows() > 0){
			$nama_kategori = $get_kategori->row()->NAMA_KATEGORI;
			$id_kategori = $get_kategori->row()->ID_KATEGORI;
			$status = '1';
		}else{
			$id_kategori = '';
			$nama_kategori = '';
			$status = '0';
		}

		echo json_encode([
			'judul' => $nama_kategori,
			'idkategori' => $id_kategori,
			'status' => $status
		]);
	}

}