<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiModel extends CI_Model {
	public function insert_transaksi($data){
		$this->db->insert('transaksi', $data);
		return $this->db->insert_id();
	}
	public function get_transaksi_by_id($id_transaksi)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		return $this->db->get('transaksi')->row_array();
	}
	public function get_all_transaksi()
	{
		$this->db->select('id_transaksi, pembeli, user.id_user, user.nama, waktu_beli');
		$this->db->join('user', 'user.id_user = transaksi.kasir', 'left');
		return $this->db->get('transaksi')->result_array();
	}
	public function delete_transaksi_by_id($id_transaksi)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->delete('transaksi');
		return $this->db->affected_rows();
	}
}
