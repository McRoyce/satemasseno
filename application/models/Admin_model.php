<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Admin_model extends CI_Model {

    public function create($formArray) {
        $this->db->insert('admin', $formArray);
    }
    
    public function getByUsername($username) {

        $this->db->where('nama_a', $username);
        $admin = $this->db->get('admin')->row_array();
        return $admin;
    }

    public function getAdmins() {
        $result = $this->db->get('admin')->result_array();
        return $result;
    }

    public function getAdmin($id) {
        $this->db->where('id_a', $id);
        $admin = $this->db->get('admin')->row_array();
        return $admin;
    }

    public function update($id, $formArray) {
        $this->db->where('id_a',$id);
        $this->db->update('admin', $formArray);
    }

    public function delete($id) {
        $this->db->where('id_a',$id);
        $this->db->delete('admin');
    }

    public function countAdmin() {
        $query = $this->db->get('admin');
        return $query->num_rows();
    }
    
    public function getAllOrders() {
        $this->db->order_by('id_t','DESC');
        $this->db->select('id_t, nama_pm, jumlah, harga, status, date, nama_p, alamat');
        $this->db->from('transaksi');
        $this->db->join('pengguna', 'pengguna.id_p = transaksi.id_p');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getResReport() {
        $this->db->group_by('t.id_cr');
        $this->db->select('t.id_cr, nama_cr, harga, success-date');
        $this->db->select_sum('harga');
        $this->db->from('transaksi as t');
        $this->db->join('cabang_resto as r', 'r.id_cr = t.id_cr');
        $result = $this->db->get()->result();
        return $result;
    }

    public function dishReport() {
        $query = $this->db->query('SELECT id_cr, id_pm, nama_pm,
        SUM(jumlah) AS qty
        FROM transaksi
        GROUP BY id_pm
        ORDER BY SUM(jumlah) DESC');
        return $query->result();
    }

    public function mostOrderdDishes() {
        $sql = 'SELECT u.id_cr, r.nama_cr, u.harga, u.nama_pm, 
        MAX(u.jmlah) AS quantity, 
        SUM(harga) AS total
        FROM transaksi AS u
        INNER JOIN cabang_resto as r
        ON u.id_r = r.id_r
        GROUP BY u.id_r';

        $query = $this->db->query($sql);
        return $query->result();
    }
}
