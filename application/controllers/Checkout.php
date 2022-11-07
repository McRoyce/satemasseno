<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Checkout extends CI_Controller {

    function __construct() {
        parent::__construct();

        $user = $this->session->userdata('user');
            if(empty($user)) {
                $this->session->set_flashdata('msg', 'Sesi anda telah berakhir');
                redirect(base_url().'login/');
            }
        
        $this->load->helper('date');
        $this->load->library('form_validation');
        $this->load->library('cart');
        $this->load->model('Order_model');
        $this->load->model('User_model');
        $this->controller = 'checkout';
    }

    public function index() {
       $loggedUser = $this->session->userdata('user');
       $u_id = $loggedUser['id_p'];
       $user = $this->User_model->getUser($u_id);

        if($this->cart->total_items() <= 0) {
            redirect(base_url().'restaurant');
        }
            $submit = $this->input->post('placeholder');
            $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
            $this->form_validation->set_rules('address', 'Address','trim|required');
            $this->form_validation->set_rules('phone', 'Phone','trim|required');

            if($this->form_validation->run() == true) { 
                $formArray['alamat'] = $this->input->post('address');
                $formArray['telepon'] = $this->input->post('phone');

                //insert data into customer table and get last inserted custid
                $this->User_model->update($u_id,$formArray);
                $order = $this->placeOrder($u_id);

                if($order) {
                    $this->session->set_flashdata('success_msg', 'Pesanan akan kami proses, silahkan lakukan pembayaran');
                       redirect(base_url().'orders');
                } else {
                     $data['error_msg'] = "Anda tidak dapat memesan, silahkan coba kembali";
                }
            }

        $data['user'] = $user;
        $data['cartItems'] = $this->cart->contents();
        $this->load->view('pengguna/body/header',$data);
        $this->load->view('pengguna/checkout',$data);
        $this->load->view('pengguna/body/footer',$data);
    }

    public function placeOrder($u_Id) {  
        $cartItems = $this->cart->contents();
        $i = 0;
        foreach($cartItems as $item) {
            $orderData[$i]['id_p'] = $u_Id;
            $orderData[$i]['id_pm'] = $item['id'];
            $orderData[$i]['nama_pm'] = $item['name'];
            $orderData[$i]['id_cr'] = $item['r_id'];
            $orderData[$i]['deskripsi'] = $item['desc'];
            $orderData[$i]['jumlah'] = $item['qty'];
            $orderData[$i]['harga'] = $item['subtotal']+$item['delivery'];
            $orderData[$i]['date'] = date('Y-m-d H:i:s', now());
            $orderData[$i]['success-date'] = date('Y-m-d H:i:s', now());
            $orderData[$i]['pembayaran'] = $this->input->post('payment');
            $orderData[$i]['catatan'] = $this->input->post('note');
            $orderData[$i]['acara'] = $this->input->post('dating');

            $i++;
        }

        if(!empty($orderData)) {    
                    
        $insertOrder = $this->Order_model->insertOrder($orderData);
            if($insertOrder) {
                $this->cart->destroy();
                //return order id
                return $insertOrder;
            }
        }   
    return false;

    }
}