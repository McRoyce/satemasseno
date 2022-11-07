<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Category_model extends CI_Model {
    
    public function create_cat($cat) {
        $this->db->insert('kategori', $cat);
    }

    public function getCategory() {
        $cats_result = $this->db->get('kategori')->result_array();
        return $cats_result;
    }

    public function getCat($id) {
        $this->db->where('id_k', $id);
        $cat = $this->db->get('kategori')->row_array();
        return $cat;
    }

    public function countCategory() {
        $query = $this->db->get('kategori');
        return $query->num_rows();
    }

    public function update($id, $cat) {
        $this->db->where('id_k', $id);
        $this->db->update('kategori', $cat);
    }

    public function delete($id) {
        $this->db->where('id_k', $id);
        $this->db->delete('kategori');
    }

}
