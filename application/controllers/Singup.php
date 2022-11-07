<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Singup extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }


    public function index() {
        $this->load->view('pengguna/daftar');
    }

    public function create_user() {

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
        $this->form_validation->set_rules('password', 'Password','trim|required');
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
                    $formArray['sandi'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                    $formArray['telepon'] = $this->input->post('phone');
                    $formArray['alamat'] = $this->input->post('address');

                    $this->User_model->create($formArray);

                    $this->session->set_flashdata("success", "Akun telah dibuat, silakan masuk");
                    redirect(base_url().'login/index');

                } else {

                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error; 
                    $this->load->view('pengguna/daftar');
                }

            } else {

                $formArray['nama_p'] = $this->input->post('username');
                $formArray['nama_d'] = $this->input->post('firstname');
                $formArray['nama_b'] = $this->input->post('lastname');
                $formArray['email'] = $this->input->post('email');
                $formArray['sandi'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $formArray['telepon'] = $this->input->post('phone');
                $formArray['alamat'] = $this->input->post('address');

                $this->User_model->create($formArray);

                $this->session->set_flashdata("success", "Akun telah dibuat, silakan masuk");
                redirect(base_url().'login/index');
            }

        } else {

            $this->load->view('pengguna/daftar');
        }
    }
}