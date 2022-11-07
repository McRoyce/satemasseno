<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Order_model extends CI_Model {

    public function create($formArray) {
        $this->db->insert('transaksi', $formArray);
    }

    public function getOrders() {
        $this->db->order_by('id_t','DESC');
        $result = $this->db->get('transaksi')->result_array();
        return $result;
    }

    public function getOrder($id) {
        $this->db->where('id_t', $id);
        $result = $this->db->get('transaksi')->row_array();
        $order = $this->db->get('transaksi')->row_array();
        return $result;
    }

    public function getUserOrder($id) {
        $this->db->where('id_p', $id);
        $this->db->order_by('id_t','DESC');
        $result = $this->db->get('transaksi')->result_array();
        $order = $this->db->get('transaksi')->row_array();
        return $result;
    }

    public function update($id, $status) {
        $this->db->where('id_t', $id);
        $this->db->update('transaksi', $status);
    }

    public function pay($id, $formArray) {
        $this->db->where('id_t', $id);
        $this->db->update('transaksi', $formArray);
    } 

    public function deleteOrder($id) {
        $this->db->where('id_t', $id);
        $this->db->delete('transaksi');
    }

    public function insertOrder($orderData) {
        $this->db->insert_batch('transaksi', $orderData);
        return $this->db->insert_id();
    }

    public function countOrders() {
        $query = $this->db->get('transaksi');
        return $query->num_rows();
    }

    public function countPendingOrders() {
        $this->db->where('status', NULL);
        $query = $this->db->get('transaksi');
        return $query->num_rows();
    }

    public function countProcessOrders() {
        $this->db->where('status', 'in process');
        $query = $this->db->get('transaksi');
        return $query->num_rows();
    }

    public function countDeliveringOrders() {
        $this->db->where('status', 'deliver');
        $query = $this->db->get('transaksi');
        return $query->num_rows();
    }

    public function countDeliveredOrders() {
        $this->db->where('status','closed');
        $query = $this->db->get('transaksi');
        return $query->num_rows();
    }

    public function countRejectedOrders() {
        $this->db->where('status','rejected');
        $query = $this->db->get('transaksi');
        return $query->num_rows();
    }

    public function getAllOrders() {
        $this->db->order_by('id_t','DESC');
        $this->db->select('id_t, nama_pm, jumlah, harga, status, date, nama_p, alamat, id_cr, transfer, acara, resi, catatan');
        $this->db->from('transaksi');
        $this->db->join('pengguna', 'pengguna.id_p = transaksi.id_p');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getOrderByUser($id) {
        $this->db->select('id_t, id_cr, id_pm, pengguna.id_p, nama_pm, deskripsi, jumlah, harga, status, nama_d, nama_b, transaksi.date, pengguna.email, pengguna.telepon, success-date, nama_p, alamat, transaksi.transfer, acara, resi, catatan, pembayaran');
        $this->db->from('transaksi');
        $this->db->join('pengguna', 'pengguna.id_p = transaksi.id_p');
        $this->db->where('id_t', $id);
        $result = $this->db->get()->row_array();
        return $result;
    }
}