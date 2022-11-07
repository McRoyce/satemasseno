<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Menu_model extends CI_Model {
    
    public function create($formArray) {
        $this->db->insert('paket_menu', $formArray);
    }

    public function getMenu() {
        $result = $this->db->get('paket_menu')->result_array();
        return $result;
    }

    public function getSingleDish($id) {
        $this->db->where('id_pm', $id);
        $dish = $this->db->get('paket_menu')->row_array();
        return $dish;
    }

    public function update($id, $formArray) {
        $this->db->where('id_pm', $id);
        $this->db->update('paket_menu', $formArray);
    } 

    public function delete($id) {
        $this->db->where('id_pm',$id);
        $this->db->delete('paket_menu');
    }

    public function countDish() {
        $query = $this->db->get('paket_menu');
        return $query->num_rows();
    }

    public function countReady() {
        $this->db->where('stok', 'Tersedia');
        $query = $this->db->get('paket_menu');
        return $query->num_rows();
    }

    public function countSoldout() {
        $this->db->where('stok', 'Habis');
        $query = $this->db->get('paket_menu');
        return $query->num_rows();
    }

    public function getDishesh($id) {
        $this->db->where('id_cr', $id);
        $dish = $this->db->get('paket_menu')->result_array();
        return $dish;
    }
}
