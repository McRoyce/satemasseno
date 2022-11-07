<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        $this->load->view('pengguna/masuk');
    }

    public function authenticate() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username', 'trim|required');
        $this->form_validation->set_rules('password','Password', 'trim|required');

         if($this->form_validation->run() == true) {
             $username = $this->input->post('username');
             $user = $this->User_model->getByUsername($username);
             if(!empty($user)) {
                $password = $this->input->post('password');
                if( password_verify($password, $user['sandi']) == true) {

                    $userArray['id_p'] = $user['id_p'];
                    $userArray['nama_p'] = $user['nama_p'];
                    $userArray['foto'] = $user['foto'];
                    
                    $this->session->set_userdata('user', $userArray);
                    redirect(base_url().'home/index');
                } else {
                    $this->session->set_flashdata('msg', 'Nama pengguna atau kata sandi salah');
                    redirect(base_url().'login/index');
                }
             } else {
                $this->session->set_flashdata('msg', 'Nama pengguna atau kata sandi salah');
                redirect(base_url().'login/index');
             }
             //success
         } else {
             //Error
            $this->load->view('pengguna/masuk');
         }
    }

    public function logout() {
        $this->session->unset_userdata('user');
        redirect(base_url().'login/index');
    }
}
