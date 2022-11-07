<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $this->load->view('admin/masuk');
    }

    public function authenticate() {
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
        
        $this->form_validation->set_rules('username','Username', 'trim|required');
        $this->form_validation->set_rules('password','Password', 'trim|required');

         if($this->form_validation->run() == true) {
             $username = $this->input->post('username');
             $admin = $this->Admin_model->getByUsername($username);
             if(!empty($admin)) {
                $password = $this->input->post('password');
                if( password_verify($password, $admin['sandi']) == true) {

                    $adminArray['id_a'] = $admin['id_a'];
                    $adminArray['nama_a'] = $admin['nama_a'];
                    $adminArray['foto'] = $admin['foto'];

                    $this->session->set_userdata('admin', $adminArray);
                    redirect(base_url().'admin/home');
                } else {
                    $this->session->set_flashdata('msg', 'Nama pengguna atau kata sandi salah');
                    redirect(base_url().'admin/login/index');
                }
             } else {
                $this->session->set_flashdata('msg', 'Nama pengguna atau kata sandi salah');
                redirect(base_url().'admin/login/index');
             }
             //success
         } else {
             //Error
            $this->load->view('admin/masuk');
         }
    }

    public function logout() {
        $this->session->unset_userdata('admin');
        redirect(base_url().'admin/login/index');
    }
}