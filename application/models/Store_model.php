<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Store_model extends CI_Model {
    
    public function create($formArray) {
        $this->db->insert('cabang_resto', $formArray);
    }

    public function getStores() {
        $result = $this->db->get('cabang_resto')->result_array();
        return $result;
    }

    public function getStore($id) {
        $this->db->where('id_cr', $id);
        $store = $this->db->get('cabang_resto')->row_array();
        return $store;
    }

    public function update($id, $formArray) {
        $this->db->where('id_cr', $id);
        $this->db->update('cabang_resto', $formArray);
    } 

    public function delete($id) {
        $this->db->where('id_cr',$id);
        $this->db->delete('cabang_resto');
    }

    public function countStore() {
        $query = $this->db->get('cabang_resto');
        return $query->num_rows();
    }

    public function countOpen() {
        $this->db->where('status', 'Buka');
        $query = $this->db->get('cabang_resto');
        return $query->num_rows();
    }

    public function countClose() {
        $this->db->where('status', 'Tutup');
        $query = $this->db->get('cabang_resto');
        return $query->num_rows();
    }

    public function getResInfo() {
        $this->db->select('*');
        $this->db->from('cabang_resto');
        $this->db->join('kategori','cabang_resto.id_k = kategori.id_k');
        $result = $this->db->get()->result_array();
        return $result;
    }

}
