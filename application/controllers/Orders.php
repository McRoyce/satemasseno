<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Orders extends CI_Controller {
    function __construct(){
        parent::__construct();

        $user = $this->session->userdata('user');
            if(empty($user)) {
                $this->session->set_flashdata('msg', 'Sesi anda telah berakhir');
                redirect(base_url().'login/');
            }
            $this->load->helper('url');

        $this->load->model('Order_model');
        $this->load->model('Store_model');
        $this->load->model('Menu_model');
    }
    public function index() {
        $this->load->model('Order_model');
        $user = $this->session->userdata('user');
        $order = $this->Order_model->getUserOrder($user['id_p']);
        $data['orders'] = $order;
        $this->load->view('pengguna/body/header');
        $this->load->view('pengguna/pesanan', $data);
        $this->load->view('pengguna/body/footer');
    }

    public function deleteOrder($id) {
        $order = $this->Order_model->getOrder($id);

        if(empty($order)) {
            $this->session->set_flashdata('error_msg', 'Pesanan tidak ditemukan');
            redirect(base_url().'orders');
        }

        $this->Order_model->deleteOrder($id);

        $this->session->set_flashdata('success_msg', 'Pesanan anda berhasil dihapus');
        redirect(base_url().'orders');
    }

    public function updateOrder($id) {
        $order = $this->Order_model->getOrder($id);

        if(empty($order)) {
            $this->session->set_flashdata('error_msg', 'Pesanan tidak ditemukan');
            redirect(base_url().'orders');
        }
        
        $order['status'] = $this->input->post('status');
        $this->Order_model->update($id, $order);

        $this->session->set_flashdata('success_msg', 'Pesanan anda berhasil dibatalkan');
        redirect(base_url().'orders');
    }

    public function detail($id) {
        $order = $this->Order_model->getOrderByUser($id);
        $data['order'] = $order;

        $this->load->view('pengguna/body/header');
        $this->load->view('pengguna/detailpesanan', $data);
        $this->load->view('pengguna/body/footer');
    }

    public function invoice($id) {
        $order = $this->Order_model->getOrderByUser($id);
        $data['order'] = $order;
        $id_p = $order['id_p'];
        $id_cr = $order['id_cr'];
        $id_pm = $order['id_pm'];
        $res = $this->Store_model->getStore($id_cr);
        $data['res'] = $res;
        $dish = $this->Menu_model->getSingleDish($id_pm);
        $data['dish'] = $dish;
    
        $user = $this->session->userdata('user');
        if($id_p == $user['id_p']) {
            if($order['status'] == 'closed') {
                $this->load->view('pengguna/invoice', $data);
            } else {
                $this->session->set_flashdata('error', 'Pesanan anda belum selesai');
                redirect(base_url().'orders');
            }
        } else {
            $this->session->set_flashdata('error', 'Anda mengakses data yang salah');
            redirect(base_url().'orders');
        }        
    }

    public function payment($id) {
        $this->load->model('Order_model');
        $order = $this->Order_model->getOrder($id);

        if(empty($order)) {

            $this->session->set_flashdata('error_msg', 'Pesanan tidak ada');
            redirect(base_url(). 'orders/index');
        }

        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/payment/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

                if($this->upload->do_upload('image')) {

                    $data = $this->upload->data();

                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,300);

                    $formArray['transfer'] = $data['file_name'];

                    $this->Order_model->pay($id, $formArray);

                    if (file_exists('./public/uploads/payment/'.$order['transfer'])) {
                        unlink('./public/uploads/payment/'.$order['transfer']);
                    }
        
                    $this->session->set_flashdata('success_msg', 'Bukti pembayaran berhasil diunggah');
                    redirect(base_url(). 'orders');

                } else {
                    $data['order'] = $order;
                    $this->load->view('pengguna/body/header');
                    $this->load->view('pengguna/pembayaran', $data);
                    $this->load->view('pengguna/body/footer');
                }
        }

}