<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
				if($this->session->userdata('is_logged') == false){
					$this->session->set_flashdata('error', 'Masuk untuk melanjutkan.');
					redirect('login');
				}
    }

	public function index()
	{
		$this->load->view('home');
	}
	public function transaksi()
	{
		$this->load->model('TransaksiModel');
		$this->load->model('OrderModel');
		$data2['transaksi'] = [];
		$data = $this->TransaksiModel->get_all_transaksi();
		foreach ($data as $row) {
			$row['total'] = $this->OrderModel->get_order_total_by_id_transaksi($row['id_transaksi']);
			$data2['transaksi'][] = $row;
		}
		// echo json_encode($data2);
		$this->load->view('transaksi', $data2);
	}
	public function transaksi_detail($id)
	{
		$data['id'] = $id;
		$this->load->view('transaksi_detail', $data);
	}
	public function hapus_transaksi($id_transaksi)
	{
		$this->load->model('TransaksiModel');
		$this->load->model('OrderModel');
		$this->load->model('KasetModel');

		$order = $this->OrderModel->get_order_by_id_transaksi($id_transaksi);
		foreach ($order as $row) {
			$kaset = $this->KasetModel->get_kaset_by_id($row['id_kaset']);
			$kaset['stok'] = $kaset['stok'] + $row['jumlah'];
			$this->KasetModel->update_kaset_by_id($row['id_kaset'], $kaset);
			$this->OrderModel->delete_order_by_id($row['id_order']);
		}
		if($this->TransaksiModel->delete_transaksi_by_id($id_transaksi) == true){
			$this->session->set_flashdata('success', 'Transaksi berhasil dihapus.');
			redirect('admin/transaksi');
		} else {
			$this->session->set_flashdata('error', 'Transaksi tidak dapat dihapus.');
			redirect('admin/transaksi');
		}

	}

	// Transkasi
	public function tambah_transaksi($id_transaksi = null)
	{
		$this->load->model('TransaksiModel');
		$this->load->model('OrderModel');
		$this->load->model('KasetModel');
		$data['kaset'] = $this->KasetModel->get_kaset_by_stock_not_zero();
		if($id_transaksi == null){
			$data_insert['kasir'] = 1;																		 // TODO: GANTI INI JADI ID SESSION
			$data_insert['pembeli'] = $this->input->post('inputNamaPembeli');
			$id_transaksi = $this->TransaksiModel->insert_transaksi($data_insert);
			redirect('admin/tambah_transaksi/'.$id_transaksi);
		}
		$data['transaksi'] = $this->TransaksiModel->get_transaksi_by_id($id_transaksi);
		$data['order'] = $this->OrderModel->get_order_by_id_transaksi($id_transaksi);
		$this->load->view('tambah_transaksi', $data);
	}
	public function tambah_order($id_transaksi)
	{
		$this->load->model('OrderModel');
		$this->load->model('KasetModel');

		$data['id_transaksi'] = $id_transaksi;
		$data['id_kaset'] = $this->input->post('inputKodeKaset');
		$data['jumlah'] = $this->input->post('inputJumlahKaset');

		if ($this->KasetModel->get_checked_stock($data['id_kaset'], $data['jumlah']) == true) {
			if ($this->OrderModel->insert_order($data) == true) {
				$data2 = $this->KasetModel->get_kaset_by_id($data['id_kaset']);
				$data2['stok'] = $data2['stok'] - $data['jumlah'];
				$data2 = $this->KasetModel->update_kaset_by_id($data['id_kaset'], $data2);
				$this->session->set_flashdata('success', 'Kaset telah ditambahkan.');
			} else {
				$this->session->set_flashdata('error', 'Kaset tidak dapat ditambahkan.');
			}
		} else {
			$this->session->set_flashdata('error', 'Stok kaset tidak memadai.');
		}
		redirect('admin/tambah_transaksi/'.$id_transaksi);
	}
	public function hapus_order($id_transaksi, $id_order)
	{
		$this->load->model('KasetModel');
		$this->load->model('OrderModel');

		$order = $this->OrderModel->get_order_by_id($id_order);
		$kaset = $this->KasetModel->get_kaset_by_id($order['id_kaset']);
		$this->OrderModel->delete_order_by_id($id_order);
		$kaset['stok'] = $kaset['stok'] + $order['jumlah'];
		$this->KasetModel->update_kaset_by_id($kaset['id_kaset'], $kaset);
		$this->session->set_flashdata('success', 'Order kaset telah dihapus.');
		redirect('admin/tambah_transaksi/'.$id_transaksi);
	}

	// KASET
	public function kaset()
	{
		$this->load->model('KasetModel');
		$data['kaset'] = $this->KasetModel->get_kaset_all();
		$this->load->view('kaset', $data);
	}
	public function tambah_kaset()
	{
		$this->load->model('KasetModel');
		$data['kode'] = $this->input->post('inputKodeKaset');
		$data['judul'] = $this->input->post('inputJudulKaset');
		$data['jenis'] = $this->input->post('inputJenisKaset');
		$data['stok'] = $this->input->post('inputStok');
		$data['harga'] = $this->input->post('inputharga');
		if($this->KasetModel->insert_kaset($data)){
			$this->session->set_flashdata('success', '1 kaset ditambakan');
		};
		redirect('admin/kaset');
	}
	public function get_kaset_by_id($id_kaset)
	{
		$this->load->model('KasetModel');
		$data = $this->KasetModel->get_kaset_by_id($id_kaset);
		echo json_encode($data);
	}
	public function edit_kaset($id_kaset)
	{
		$this->load->model('KasetModel');
		$data['kode'] = $this->input->post('inputKodeKasetEdit');
		$data['judul'] = $this->input->post('inputJudulKasetEdit');
		$data['jenis'] = $this->input->post('inputJenisKasetEdit');
		$data['stok'] = $this->input->post('inputStokEdit');
		$data['harga'] = $this->input->post('inputhargaEdit');
		if($this->KasetModel->update_kaset_by_id($id_kaset, $data)){
			$this->session->set_flashdata('success', '1 data kaset telah diubah.');
		};
		redirect('admin/kaset');
	}
	public function hapus_kaset($id_kaset)
	{
		$this->load->model('KasetModel');
		if($this->KasetModel->delete_kaset_by_id($id_kaset)){
			$this->session->set_flashdata('success', '1 kaset dihapus.');
		};
		redirect('admin/kaset');
	}
}
