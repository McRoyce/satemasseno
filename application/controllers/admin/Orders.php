<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Orders extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if(empty($admin)) {
            $this->session->set_flashdata('msg', 'Sesi anda telah berakhir');
            redirect(base_url().'admin/login/index');
        }
        $this->load->helper('date');
        $this->load->model('Order_model');
        $this->load->model('User_model');
    }

    public function index() {
        $order = $this->Order_model->getAllOrders();
        $data['orders'] = $order;
        $this->load->view('admin/body/header');
        $this->load->view('admin/pesanan/daftar', $data);
        $this->load->view('admin/body/footer');
    }

    public function processOrder($id) {
        $order = $this->Order_model->getOrderByUser($id);
        $data['order'] = $order;

        $this->load->view('admin/body/header');
        $this->load->view('admin/pesanan/proses', $data);
        $this->load->view('admin/body/footer');
    }

    public function updateOrder($id) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('status','Status', 'trim|required');

        if($this->form_validation->run() == true) {

            $order['status'] = $this->input->post('status');
            $order['resi'] = $this->input->post('receipt');
            $orderData['success-date'] = date('Y-m-d H:i:s', now());
            $this->Order_model->update($id, $order);
            
            $this->session->set_flashdata('success', 'Pesanan berhasil diproses');
            redirect(base_url().'admin/orders/index');

        } else {
            $order = $this->Order_model->getAllOrders();
            $data['orders'] = $order;
            $this->load->view('admin/body/header');
            $this->load->view('admin/pesanan/daftar', $data);
            $this->load->view('admin/body/footer');
        }
    }

    public function deleteOrder($id) {
        $order = $this->Order_model->getAllOrders();
        $data['orders'] = $order;


        if(empty($order)) {
            $this->session->set_flashdata('error', 'Pesanan tidak ada');
            redirect(base_url().'admin/orders/index');
        }

        $this->Order_model->deleteOrder($id);

        $this->session->set_flashdata('success', 'Pesanan berhasil dihapus');
        redirect(base_url().'admin/orders/index');
    }

}