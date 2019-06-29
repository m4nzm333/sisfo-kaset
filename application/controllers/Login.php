<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('is_logged') == true){
			redirect('admin');
		}
		$this->load->view('login');
	}
	public function masuk()
	{
		$this->load->model('UserModel');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		if($this->UserModel->auth_user_login($username, $password) == true){
			$data = $this->UserModel->get_user_by_username($username);
			$data['is_logged'] = true;
			$this->session->set_userdata($data);
			$this->session->set_flashdata('success', 'Selamat Datang.');
			redirect('admin');
		} else {
			$this->session->set_flashdata('error', 'Password salah atau username tidak ditemukan.');
			redirect('login');
		}
	}
	public function keluar()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('info', 'Masuk untuk melanjutkan');
		redirect('Beranda');
	}
}
