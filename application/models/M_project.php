<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_project extends CI_Model {
    // ambil id terakhir yang ada di database
    public function get_lastid(){
        $get_data = $this->db->query("SELECT 
        ID_PROJECTS
        FROM nj_project
        ORDER BY ID_PROJECTS DESC
        LIMIT 1");

        if($get_data->num_rows() > 0){
            return $get_data->row()->ID_PROJECTS;
        }else{
            return null;
        }
    }

    
    public function create_project($namaproject, $user, $nama_user){
        $last_id = $this->get_lastid();
        $create_id = $this->create_idproject($last_id);

        $data = array(
            'ID_PROJECTS' => $create_id,
            'NAMA_PROJECT' => $namaproject,
            'ID_USERS' => $user,
            'WAKTU_INSERT' => date('Y-m-d H:i:s'),
            'USER_INSERT' => $nama_user,
            'STATUS_SIMPAN' => 'BARU'
        );

        return $this->db->insert('nj_project', $data);
    }
    // create new id project
    private function create_idproject($last_id){
        // cek idnya ada atau tidak 
        if($last_id){
            $num = (int) substr($last_id, 2);
            $num++;
            $new_id = 'PJ'.str_pad($num, 4, '0', STR_PAD_LEFT);
        }else{
            $new_id = 'PJ0001';
        }

        return $new_id;
    }


    public function create_desc_project(){
        // ambil id project terakhir untuk di input di tabel deskripsi 
        $last_id = $this->get_lastid();
        $create_id = $this->create_iddesc_project($last_id);

        $data = array(
            'ID_DESKRIPSI' =>  $create_id,
            'ID'
        );
    }

    private function create_iddesc_project($last_id){
        if($last_id){
            $num = (int) substr($last_id, 2);
            $num++;
            $new_id = 'DS'.str_pad($num, 4, '0', STR_PAD_LEFT);
        }else{
            $new_id = 'DS0001';
        }

        return $new_id;
    }
}