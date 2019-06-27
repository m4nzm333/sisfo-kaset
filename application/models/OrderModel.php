<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderModel extends CI_Model {
	public function get_order_by_id_transaksi($id_transaksi)
	{
		$this->db->select('id_order,  order.id_kaset, kode, judul, harga, jenis, jumlah,');
		$this->db->where('order.id_transaksi', $id_transaksi);
		$this->db->join('kaset', 'kaset.id_kaset = order.id_kaset', 'left');
		return $this->db->get('order')->result_array();
	}
	public function get_order_by_id($id_order)
	{
		$this->db->where('id_order', $id_order);
		return $this->db->get('order')->row_array();
	}
	public function insert_order($data)
	{
		$this->db->insert('order', $data);
		return $this->db->insert_id();
	}
	public function delete_order_by_id($id_order)
	{
		$this->db->where('id_order', $id_order);
		$this->db->delete('order');
		return $this->db->affected_rows();
	}

	public function get_order_total_by_id_transaksi($id_transaksi)
	{
		$this->db->select('sum(kaset.harga * order.jumlah) as total');
		$this->db->where('order.id_transaksi', $id_transaksi);
		$this->db->join('kaset', 'kaset.id_kaset = order.id_kaset', 'left');
		$data = $this->db->get('order')->row_array();
		return $data['total'];
	}
}
