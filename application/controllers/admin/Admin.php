<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if(empty($admin)) {
            $this->session->set_flashdata('msg', 'Sesi anda telah berakhir');
            redirect(base_url().'admin/login/index');
        }
    }

    public function index() {
        $this->load->model('Admin_model');
        $admins = $this->Admin_model->getAdmins();
        $data['admins'] = $admins;
        $this->load->view('admin/body/header');
        $this->load->view('admin/admin/daftar', $data);
        $this->load->view('admin/body/footer');
    }
    public function create_admin() {

        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/admins/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('username', 'Username','trim|required');
        $this->form_validation->set_rules('firstname', 'First Name','trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name','trim|required');
        $this->form_validation->set_rules('email', 'Email','trim|required');
        $this->form_validation->set_rules('password', 'Password','trim|required');
        $this->form_validation->set_rules('phone', 'Phone','trim|required');
        $this->form_validation->set_rules('address', 'Address','trim|required');

        if($this->form_validation->run() == true) {

            if(!empty($_FILES['image']['name'])){

                if($this->upload->do_upload('image')) {

                    $data = $this->upload->data();

                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,300);

                    $formArray['foto'] = $data['file_name'];
                    $formArray['nama_a'] = $this->input->post('username');
                    $formArray['nama_d'] = $this->input->post('firstname');
                    $formArray['nama_b'] = $this->input->post('lastname');
                    $formArray['email'] = $this->input->post('email');
                    $formArray['sandi'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                    $formArray['telepon'] = $this->input->post('phone');
                    $formArray['alamat'] = $this->input->post('address');

                    $this->Admin_model->create($formArray);

                    $this->session->set_flashdata('success', 'Admin berhasil dibuat');
                    redirect(base_url(). 'admin/admin/index');

                } else {

                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error; 
                    $this->load->view('admin/body/header');
                    $this->load->view('admin/admin/buat');
                    $this->load->view('admin/body/footer');
                }

            } else {

                $formArray['nama_a'] = $this->input->post('username');
                $formArray['nama_d'] = $this->input->post('firstname');
                $formArray['nama_b'] = $this->input->post('lastname');
                $formArray['email'] = $this->input->post('email');
                $formArray['sandi'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $formArray['telepon'] = $this->input->post('phone');
                $formArray['alamat'] = $this->input->post('address');

                $this->Admin_model->create($formArray);

                $this->session->set_flashdata('success', 'Admin berhasil dibuat');
                redirect(base_url(). 'admin/admin/index');
            }

        } else {

            $this->load->view('admin/body/header');
            $this->load->view('admin/admin/buat');
            $this->load->view('admin/body/footer');
        }
    }

    public function edit($id) {
        $this->load->model('Admin_model');
        $admin = $this->Admin_model->getAdmin($id);

        if(empty($admin)) {
            $this->session->set_flashdata('error', 'Admin tidak ada');
            redirect(base_url().'admin/admin/index');
        }
        
        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/admins/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('username', 'Username','trim|required');
        $this->form_validation->set_rules('firstname', 'First Name','trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name','trim|required');
        $this->form_validation->set_rules('email', 'Email','trim|required');
        $this->form_validation->set_rules('password', 'Password','trim|required');
        $this->form_validation->set_rules('phone', 'Phone','trim|required');
        $this->form_validation->set_rules('address', 'Address','trim|required');

        if($this->form_validation->run() == true) { 

            if(!empty($_FILES['image']['name'])){

                if($this->upload->do_upload('image')) {

                    $data = $this->upload->data();

                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,300);

                    $formArray['foto'] = $data['file_name'];
                    $formArray['nama_a'] = $this->input->post('username');
                    $formArray['nama_d'] = $this->input->post('firstname');
                    $formArray['nama_b'] = $this->input->post('lastname');
                    $formArray['email'] = $this->input->post('email');
                    $formArray['sandi'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                    $formArray['telepon'] = $this->input->post('phone');
                    $formArray['alamat'] = $this->input->post('address');

                    $this->Admin_model->update($id,$formArray);

                    if (file_exists('./public/uploads/admins/'.$admin['foto'])) {
                    unlink('./public/uploads/admins/'.$admin['foto']);
                    }
    
                    if(file_exists('./public/uploads/admins/thumb/'.$admin['foto'])) {
                    unlink('./public/uploads/admins/thumb/'.$admin['foto']);
                    }

                    $this->session->set_flashdata('success', 'Admin berhasil diubah');
                    redirect(base_url(). 'admin/admin/index');

                } else {

                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error;
                    $data['admin'] = $admin;
                    $this->load->view('admin/body/header');
                    $this->load->view('admin/admin/ubah', $data);
                    $this->load->view('admin/body/footer');
                }

            } else {

                $formArray['nama_a'] = $this->input->post('username');
                $formArray['nama_d'] = $this->input->post('firstname');
                $formArray['nama_b'] = $this->input->post('lastname');
                $formArray['email'] = $this->input->post('email');
                $formArray['sandi'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $formArray['telepon'] = $this->input->post('phone');
                $formArray['alamat'] = $this->input->post('address');

                $this->Admin_model->update($id,$formArray);

                $this->session->set_flashdata('success', 'Admin berhasil diubah');
                redirect(base_url(). 'admin/admin/index');
            }

        } else {

            $data['admin'] = $admin;
            $this->load->view('admin/body/header');
            $this->load->view('admin/admin/ubah', $data);
            $this->load->view('admin/body/footer');
        }
    }

    public function delete($id) {
        $this->load->model('Admin_model');
        $admin = $this->Admin_model->getAdmin($id);

        if(empty($admin)) {
            $this->session->set_flashdata('error', 'Admin tidak ada');
            redirect(base_url().'admin/admin/index');
        }

        if (file_exists('./public/uploads/admins/'.$admin['foto'])) {
            unlink('./public/uploads/admins/'.$admin['foto']);
        }

        if(file_exists('./public/uploads/admins/thumb/'.$admin['foto'])) {
            unlink('./public/uploads/admins/thumb/'.$admin['foto']);
        }

        $this->Admin_model->delete($id);

        $this->session->set_flashdata('success', 'Admin berhasil dihapus');
        redirect(base_url().'admin/admin/index');

    }

}