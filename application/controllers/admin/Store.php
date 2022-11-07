<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Store extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if(empty($admin)) {
            $this->session->set_flashdata('msg', 'Sesi anda telah berakhir');
            redirect(base_url().'admin/login/index');
        }
    }

    public function index() {
        $this->load->model('Store_model');
        $stores = $this->Store_model->getStores();
        $store_data['stores'] = $stores;
        $this->load->view('admin/body/header');
        $this->load->view('admin/cabangresto/daftar', $store_data);
        $this->load->view('admin/body/footer');
    }

    public function create_restaurant() {

        $this->load->model('Category_model');
        $cat = $this->Category_model->getCategory();

        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/restaurant/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        $this->load->model('Store_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('res_name', 'Restaurant name','trim|required');
        $this->form_validation->set_rules('about', 'About','trim|required');
        $this->form_validation->set_rules('status', 'status','trim|required');
        $this->form_validation->set_rules('c_name', 'category','trim|required');
        $this->form_validation->set_rules('address', 'Address','trim|required');

        if($this->form_validation->run() == true) {


            if(!empty($_FILES['image']['name'])){

                if($this->upload->do_upload('image')) {

                    $data = $this->upload->data();

                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,300);

                    $formArray['foto'] = $data['file_name'];
                    $formArray['nama_cr'] = $this->input->post('res_name');
                    $formArray['tentang'] = $this->input->post('about');
                    $formArray['status'] = $this->input->post('status');
                    $formArray['id_k'] = $this->input->post('c_name');
                    $formArray['alamat'] = $this->input->post('address');
        
                    $this->Store_model->create($formArray);
        
                    $this->session->set_flashdata('res_success', 'Cabang resto berhasil dibuat');
                    redirect(base_url(). 'admin/store/index');

                } else {

                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error;
                    $data['cats'] = $cat;
                    $this->load->view('admin/body/header');
                    $this->load->view('admin/cabangresto/buat', $data);
                    $this->load->view('admin/body/footer');
                }
            } else {

                $formArray['nama_cr'] = $this->input->post('res_name');
                $formArray['tentang'] = $this->input->post('about');
                $formArray['status'] = $this->input->post('status');
                $formArray['id_k'] = $this->input->post('c_name');
                $formArray['alamat'] = $this->input->post('address');
    
                $this->Store_model->create($formArray);
    
                $this->session->set_flashdata('res_success', 'Cabang resto berhasil dibuat');
                redirect(base_url(). 'admin/store/index');
            }

        } else {
            $data['cats'] = $cat;
            $this->load->view('admin/body/header');
            $this->load->view('admin/cabangresto/buat', $data);
            $this->load->view('admin/body/footer');
        }
        
    }

    public function edit($id) {
        $this->load->model('Store_model');
        $store = $this->Store_model->getStore($id);

        $this->load->model('Category_model');
        $cat = $this->Category_model->getCategory();

        if(empty($store)) {
            $this->session->set_flashdata('error', 'Cabang resto tidak ditemukan');
            redirect(base_url().'admin/store/index');
        }

        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/restaurant/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        
        $this->load->library('upload', $config);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('res_name', 'Restaurant name','trim|required');
        $this->form_validation->set_rules('about', 'About','trim|required');
        $this->form_validation->set_rules('status', 'status','trim|required');
        $this->form_validation->set_rules('c_name', 'category','trim|required');
        $this->form_validation->set_rules('address', 'Address','trim|required');

        if($this->form_validation->run() == true) {

            if(!empty($_FILES['image']['name'])){

                if($this->upload->do_upload('image')) {
                    
                    $data = $this->upload->data();

                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,300);

                    $formArray['foto'] = $data['file_name'];
                    $formArray['nama_cr'] = $this->input->post('res_name');
                    $formArray['tentang'] = $this->input->post('about');
                    $formArray['status'] = $this->input->post('status');
                    $formArray['id_k'] = $this->input->post('c_name');
                    $formArray['alamat'] = $this->input->post('address');
        
                    $this->Store_model->update($id, $formArray);

                    if (file_exists('./public/uploads/restaurant/'.$store['foto'])) {
                        unlink('./public/uploads/restaurant/'.$store['foto']);
                    }

                    if(file_exists('./public/uploads/restaurant/thumb/'.$store['foto'])) {
                        unlink('./public/uploads/restaurant/thumb/'.$store['foto']);
                    }

                    $this->session->set_flashdata('res_success', 'Cabang resto berhasil diubah');
                    redirect(base_url(). 'admin/store/index');

                } else {

                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error;
                    $data['store'] = $store;
                    $data['cats'] = $cat;
                    $this->load->view('admin/body/header');
                    $this->load->view('admin/cabangresto/ubah', $data);
                    $this->load->view('admin/body/footer');
                }

                
            } else {

                $formArray['nama_cr'] = $this->input->post('res_name');
                $formArray['tentang'] = $this->input->post('about');
                $formArray['status'] = $this->input->post('status');
                $formArray['id_k'] = $this->input->post('c_name');
                $formArray['alamat'] = $this->input->post('address');
    
                $this->Store_model->update($id ,$formArray);
    
                $this->session->set_flashdata('res_success', 'Cabang resto berhasil diubah');
                redirect(base_url(). 'admin/store/index');
            }


        } else {
            $data['store'] = $store;
            $data['cats'] = $cat;
            $this->load->view('admin/body/header');
            $this->load->view('admin/cabangresto/ubah', $data);
            $this->load->view('admin/body/footer');
        }

    }

    public function delete($id){

        $this->load->model('Store_model');
        $store = $this->Store_model->getStore($id);

        if(empty($store)) {
            $this->session->set_flashdata('error', 'Cabang resto tidak ada');
            redirect(base_url().'admin/store');
        }

        if (file_exists('./public/uploads/restaurant/'.$store['foto'])) {
            unlink('./public/uploads/restaurant/'.$store['foto']);
        }

        if(file_exists('./public/uploads/restaurant/thumb/'.$store['foto'])) {
            unlink('./public/uploads/restaurant/thumb/'.$store['foto']);
        }

        $this->Store_model->delete($id);

        $this->session->set_flashdata('res_success', 'Cabang resto berhasil dihapus');
        redirect(base_url().'admin/store/index');

    }
}