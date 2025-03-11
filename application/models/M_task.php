<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_task extends CI_Model {

    // ambil id terakhir dari tabel task 
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
}