<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function index()
	{
    $this->load->model('KasetModel');
    $data['kaset'] = $this->KasetModel->get_kaset_all();
		$this->load->view('beranda', $data);
	}
}
