<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class User_model extends CI_Model {
    
    public function create($formArray) {
        $this->db->insert('pengguna', $formArray);
    }

    public function getByUsername($username) {
    
        $this->db->where('nama_p', $username);
        $mainuser = $this->db->get('pengguna')->row_array();
        return $mainuser;
    }

    public function getUsers() {
        $result = $this->db->get('pengguna')->result_array();
        return $result;
    }

    public function getUser($id) {
        $this->db->where('id_p', $id);
        $user = $this->db->get('pengguna')->row_array();
        return $user;
    }

    public function update($id, $formArray) {
        $this->db->where('id_p',$id);
        $this->db->update('pengguna', $formArray);
    }

    public function delete($id) {
        $this->db->where('id_p',$id);
        $this->db->delete('pengguna');
    }

    public function countUser() {
        $query = $this->db->get('pengguna');
        return $query->num_rows();
    }

}
