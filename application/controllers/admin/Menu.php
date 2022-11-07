<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Menu extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if(empty($admin)) {
            $this->session->set_flashdata('msg', 'Sesi anda telah berakhir');
            redirect(base_url().'admin/login/index');
        }
        $this->load->helper('url');
    }

    public function index() {
        $this->load->model('Menu_model');
        $dishesh = $this->Menu_model->getMenu();
        $data['dishesh'] = $dishesh;
        $this->load->view('admin/body/header');
        $this->load->view('admin/paketmenu/daftar', $data);
        $this->load->view('admin/body/footer');
    }

    public function create_menu(){

        $this->load->helper('common_helper');
        $this->load->model('Store_model');
        $store = $this->Store_model->getStores();

        $config['upload_path']          = './public/uploads/dishesh/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        $this->load->model('Menu_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('name', 'Dish name','trim|required');
        $this->form_validation->set_rules('about', 'About','trim|required');
        $this->form_validation->set_rules('price', 'Price','trim|required');
        $this->form_validation->set_rules('rname', 'Restaurant name','trim|required');
        $this->form_validation->set_rules('stock', 'Stock','trim|required');
        $this->form_validation->set_rules('delivery', 'Delivery','trim|required');

        if($this->form_validation->run() == true) {

            if(!empty($_FILES['image']['name'])){

                if($this->upload->do_upload('image')) {

                    $data = $this->upload->data();

                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,300);

                    $formArray['foto'] = $data['file_name'];
                    $formArray['nama_pm'] = $this->input->post('name');
                    $formArray['deskripsi'] = $this->input->post('about');
                    $formArray['harga'] = $this->input->post('price');
                    $formArray['id_cr'] = $this->input->post('rname');
                    $formArray['stok'] = $this->input->post('stock');
                    $formArray['ongkir'] = $this->input->post('delivery');
        
                    $this->Menu_model->create($formArray);
        
                    $this->session->set_flashdata('dish_success', 'Menu berhasil dibuat');
                    redirect(base_url(). 'admin/menu/index');

                } else {

                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error; 
                    $data['stores']= $store;
                    $this->load->view('admin/body/header');
                    $this->load->view('admin/paketmenu/buat', $data);
                    $this->load->view('admin/body/footer');
                }

            } else {

                $formArray['nama_pm'] = $this->input->post('name');
                $formArray['deskripsi'] = $this->input->post('about');
                $formArray['harga'] = $this->input->post('price');
                $formArray['id_cr'] = $this->input->post('rname');
                $formArray['stok'] = $this->input->post('stock');
                $formArray['ongkir'] = $this->input->post('delivery');
    
                $this->Menu_model->create($formArray);
                
                $this->session->set_flashdata('dish_success', 'Menu berhasil dibuat');
                redirect(base_url(). 'admin/menu/index');
            }

        } else {
            $store_data['stores']= $store;
            $this->load->view('admin/body/header');
            $this->load->view('admin/paketmenu/buat', $store_data);
            $this->load->view('admin/body/footer');
        }
        
    }

    public function edit($id) {
        $this->load->model('Menu_model');
        $dish = $this->Menu_model->getSingleDish($id);

        $this->load->model('Store_model');
        $store = $this->Store_model->getStores();
        
        if(empty($dish)) {

            $this->session->set_flashdata('error', 'Menu tidak ada');
            redirect(base_url(). 'admin/menu/index');
        }

        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/dishesh/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['x_axis'] = 100;
        $config['y_axis'] = 100;

        $this->load->library('upload', $config);

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('name', 'Dish name','trim|required');
        $this->form_validation->set_rules('about', 'About','trim|required');
        $this->form_validation->set_rules('price', 'Price','trim|required');
        $this->form_validation->set_rules('rname', 'Restaurant name','trim|required');
        $this->form_validation->set_rules('stock', 'Stock','trim|required');
        $this->form_validation->set_rules('delivery', 'Delivery','trim|required');

        if($this->form_validation->run() == true) {

            if(!empty($_FILES['image']['name'])){

                if($this->upload->do_upload('image')) {

                    $data = $this->upload->data();

                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,300);

                    $formArray['foto'] = $data['file_name'];
                    $formArray['nama_pm'] = $this->input->post('name');
                    $formArray['deskripsi'] = $this->input->post('about');
                    $formArray['harga'] = $this->input->post('price');
                    $formArray['id_cr'] = $this->input->post('rname');
                    $formArray['stok'] = $this->input->post('stock');
                    $formArray['ongkir'] = $this->input->post('delivery');
        
                    $this->Menu_model->update($id, $formArray);

                    if (file_exists('./public/uploads/dishesh/'.$dish['foto'])) {
                        unlink('./public/uploads/dishesh/'.$dish['foto']);
                    }

                    if(file_exists('./public/uploads/dishesh/thumb/'.$dish['foto'])) {
                        unlink('./public/uploads/dishesh/thumb/'.$dish['foto']);
                    }
        
                    $this->session->set_flashdata('dish_success', 'Menu berhasil diubah');
                    redirect(base_url(). 'admin/menu/index');

                } else {

                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error;
                    $data['dish'] = $dish;
                    $data['stores'] = $store;
                    $this->load->view('admin/body/header');
                    $this->load->view('admin/paketmenu/ubah', $data);
                    $this->load->view('admin/body/footer');
                }

            } else {

                $formArray['nama_pm'] = $this->input->post('name');
                $formArray['deskripsi'] = $this->input->post('about');
                $formArray['harga'] = $this->input->post('price');
                $formArray['id_cr'] = $this->input->post('rname');
                $formArray['stok'] = $this->input->post('stock');
                $formArray['ongkir'] = $this->input->post('delivery');
    
                $this->Menu_model->update($id, $formArray);
    
                $this->session->set_flashdata('dish_success', 'Menu berhasil diubah');
                redirect(base_url(). 'admin/menu/index');
            }

        } else {
            $data['dish'] = $dish;
            $data['stores'] = $store;
            $this->load->view('admin/body/header');
            $this->load->view('admin/paketmenu/ubah', $data);
            $this->load->view('admin/body/footer');
        }

    }
    public function delete($id){

        $this->load->model('Menu_model');
        $dish = $this->Menu_model->getSingleDish($id);

        if(empty($dish)) {
            $this->session->set_flashdata('error', 'Menu tidak ada');
            redirect(base_url().'admin/menu');
        }

        if (file_exists('./public/uploads/dishesh/'.$dish['foto'])) {
            unlink('./public/uploads/dishesh/'.$dish['foto']);
        }

        if(file_exists('./public/uploads/dishesh/thumb/'.$dish['foto'])) {
            unlink('./public/uploads/dishesh/thumb/'.$dish['foto']);
        }

        $this->Menu_model->delete($id);

        $this->session->set_flashdata('dish_success', 'Menu berhasil dihapus');
        redirect(base_url().'admin/menu/index');

    }
}