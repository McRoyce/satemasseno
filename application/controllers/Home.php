<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->view('pengguna/body/header');
		$this->load->view('pengguna/beranda');
		$this->load->view('pengguna/body/footer');
	}
}
