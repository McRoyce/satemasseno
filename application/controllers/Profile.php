<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct(){
        parent::__construct();

        $user = $this->session->userdata('user');
            if(empty($user)) {
                $this->session->set_flashdata('msg', 'Sesi anda telah berakhir');
                redirect(base_url().'login/');
            }
            
        $this->load->model('User_model');
    }

    public function index() {
        $loggedUser = $this->session->userdata('user');
        $id = $loggedUser['id_p'];
        $user = $this->User_model->getUser($id);
        $data['user'] = $user;
        $this->load->view('pengguna/body/header');
        $this->load->view('pengguna/profil/profil', $data);
        $this->load->view('pengguna/body/footer');
    }

    public function edit($id) {
        $this->load->model('User_model');
        $user = $this->User_model->getUser($id);

        if(empty($user)) {
            $this->session->set_flashdata('error', 'Akun tidak ada');
            redirect(base_url().'profile');
        }

        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/users/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('username', 'Username','trim|required');
        $this->form_validation->set_rules('firstname', 'First Name','trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name','trim|required');
        $this->form_validation->set_rules('email', 'Email','trim|required');
        $this->form_validation->set_rules('phone', 'Phone','trim|required');
        $this->form_validation->set_rules('address', 'Address','trim|required');

        if($this->form_validation->run() == true) { 

            if(!empty($_FILES['image']['name'])){

                if($this->upload->do_upload('image')) {

                    $data = $this->upload->data();

                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,300);

                    $formArray['foto'] = $data['file_name'];
                    $formArray['nama_p'] = $this->input->post('username');
                    $formArray['nama_d'] = $this->input->post('firstname');
                    $formArray['nama_b'] = $this->input->post('lastname');
                    $formArray['email'] = $this->input->post('email');
                    $formArray['telepon'] = $this->input->post('phone');
                    $formArray['alamat'] = $this->input->post('address');

                    if (file_exists('./public/uploads/users/'.$user['foto'])) {
                    unlink('./public/uploads/users/'.$user['foto']);
                    }
    
                    if(file_exists('./public/uploads/users/thumb/'.$user['foto'])) {
                    unlink('./public/uploads/users/thumb/'.$user['foto']);
                    }

                    $this->User_model->update($id,$formArray);

                    $this->session->set_flashdata('success', 'Profil berhasil diubah');
                    redirect(base_url(). 'profile/index');

                } else {

                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error;
                    $data['user'] = $user; 
                    $this->load->view('pengguna/body/header');
                    $this->load->view('pengguna/profil/ubahprofil', $data);
                    $this->load->view('pengguna/body/footer');
                }

            } else {

                $formArray['nama_p'] = $this->input->post('username');
                $formArray['nama_d'] = $this->input->post('firstname');
                $formArray['nama_b'] = $this->input->post('lastname');
                $formArray['email'] = $this->input->post('email');
                $formArray['telepon'] = $this->input->post('phone');
                $formArray['alamat'] = $this->input->post('address');

                $this->User_model->update($id,$formArray);

                $this->session->set_flashdata('success', 'Profil berhasil diubah');
                redirect(base_url(). 'profile/index');
            }

        } else {

            $data['user'] = $user; 
            $this->load->view('pengguna/body/header');
            $this->load->view('pengguna/profil/ubahprofil', $data);
            $this->load->view('pengguna/body/footer');
        }
    }
 
    public function editPassword($id) {
        $user = $this->User_model->getUser($id);

        if(empty($user)) {
            $this->session->set_flashdata('error', 'Pengguna tidak ditemukan');
            redirect(base_url().'profile');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('cPassword', 'Current password','trim|required');
        $this->form_validation->set_rules('nPassword', 'New password','trim|required');
        $this->form_validation->set_rules('nRPassword', 'New password','trim|required');

        if($this->form_validation->run() == true) { 
            $cPassword = $this->input->post('cPassword');
            $nPassword = $this->input->post('nPassword');
            $nRPassword = $this->input->post('nRPassword');
            if(password_verify($cPassword, $user['sandi']) == true) {
                if($nPassword != $nRPassword) {
                    $this->session->set_flashdata('pwd_error', 'Kata sandi baru tidak cocok');
                    redirect(base_url(). 'profile/index');
                }else {
                    $formArray['sandi'] = password_hash($this->input->post('nPassword'), PASSWORD_DEFAULT);

                    $this->User_model->update($id,$formArray);
                    $this->session->set_flashdata('pwd_success', 'Kata sandi berhasil diubah');
                    redirect(base_url(). 'profile/index');
                }
            }else {
                $this->session->set_flashdata('pwd_error', 'Kata sandi lama salah');
                redirect(base_url(). 'profile/index');
            }
        }else {
            $data['user'] = $user; 
            $this->load->view('pengguna/body/header');
            $this->load->view('pengguna/profil/ubahsandi', $data);
            $this->load->view('pengguna/body/footer');
        }
    }
}