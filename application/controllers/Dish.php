<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Dish extends CI_Controller {

    function __construct(){
        parent::__construct();
        //Load cart libraray
        $this->load->library('cart');
    }

    public function list($id) {
        $this->load->model('Menu_model');
        $dishesh = $this->Menu_model->getDishesh($id);

        $this->load->model('Store_model');
        $res = $this->Store_model->getStore($id);

        $data['dishesh'] = $dishesh;
        $data['res'] = $res;
        $this->load->view('pengguna/body/header');
        $this->load->view('pengguna/paketmenu', $data);
        $this->load->view('pengguna/body/footer');
        $this->cart->destroy();
    }

    public function addToCart($id) {
        $this->load->model('Menu_model');
        $dishesh = $this->Menu_model->getSingleDish($id);
        $data = array (
            'id'    => $dishesh['id_pm'],
            'r_id'  => $dishesh['id_cr'],
            'qty'   =>1,
            'price' => $dishesh['harga'],
            'desc' => $dishesh['deskripsi'],
            'name' => $dishesh['nama_pm'],
            'image' => $dishesh['foto'],
            'delivery' =>$dishesh['ongkir'],
        );
        $this->cart->insert($data);
        redirect(base_url(). 'checkout/index');
    }
}