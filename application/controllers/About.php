<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	public function index()
	{
		$this->load->model('Menu_model');
		$dish = $this->Menu_model->getMenu();
		$data['dishesh'] = $dish;
		$this->load->view('pengguna/body/header');
		$this->load->view('pengguna/tentang');
		$this->load->view('pengguna/body/footer');
	}
}