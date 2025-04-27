<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {
    public function login($username, $password){
        
        $this->db->where('USERNAME', $username);
        $query = $this->db->get('nj_users');

        if ($query->num_rows() > 0) {
            $user = $query->row();
    
            // Verifikasi password menggunakan password_verify
            if (password_verify($password, $user->PASSWORD)) {
                return $user;
            } else {
                return false; // Password salah
            }
        } else {
            return false; // Username tidak ditemukan
        }

        
    }
}