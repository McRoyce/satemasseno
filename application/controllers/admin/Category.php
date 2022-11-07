<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if(empty($admin)) {
            $this->session->set_flashdata('msg', 'Sesi anda telah berakhir');
            redirect(base_url().'admin/login/index');
        }
    }

    public function index() {
        $this->load->model('Category_model');
        $cats = $this->Category_model->getCategory();
        $cats_data['cats'] = $cats;
        $this->load->view('admin/body/header');
        $this->load->view('admin/kategori/daftar', $cats_data);
        $this->load->view('admin/body/footer');

    }

    public function create_category(){
        $this->load->model('Category_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('category','Category', 'trim|required');

        if($this->form_validation->run() == true) {
            
            $cat['nama_k'] = $this->input->post('category');
            $this->Category_model->create_cat($cat);
            
            $this->session->set_flashdata('cat_success', 'Kategori berhasil dibuat');
            redirect(base_url().'admin/category/index');
        } else {
            $this->load->view('admin/body/header');
            $this->load->view('admin/kategori/buat');
            $this->load->view('admin/body/footer');
        }
    }

    public function edit($id) {
        
        $this->load->model('Category_model');
        $cat = $this->Category_model->getCat($id);

        if(empty($cat)) {
            $this->session->set_flashdata('error', 'Kategori tidak ditemukan');
            redirect(base_url().'admin/category/index');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('category','Category', 'trim|required');

        if($this->form_validation->run() == true) {

            $cat['nama_k'] = $this->input->post('category');
            $this->Category_model->update($id, $cat);
            
            $this->session->set_flashdata('cat_success', 'Kategori berhasil dibuat');
            redirect(base_url().'admin/category/index');

        } else {
            $data['cat'] = $cat;
            $this->load->view('admin/body/header');
            $this->load->view('admin/kategori/ubah', $data);
            $this->load->view('admin/body/footer');
        }

    }

    public function delete($id) {
        $this->load->model('Category_model');
        $cat = $this->Category_model->getCat($id);

        if(empty($cat)) {
            $this->session->set_flashdata('error', 'Kategori tidak ditemukan');
            redirect(base_url().'admin/category/index');
        }

        $cat = $this->Category_model->delete($id);

        $this->session->set_flashdata('cat_success', 'Kategori berhasil dihapus');
        redirect(base_url().'admin/category/index');
    }
}