<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {
    public function login($username, $password){
        // $this->db->select('*');
        $this->db->where('USERNAME', $username);
        $this->db->where('PASSWORD', md5($password));
        $query = $this->db->get('nj_users');

        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        } 

        
    }
}