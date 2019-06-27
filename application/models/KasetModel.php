<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KasetModel extends CI_Model {
	public function get_kaset_all()
  {
    return $this->db->get('kaset')->result_array();
  }
  public function insert_kaset($data)
  {
    $this->db->insert('kaset', $data);
    return $this->db->insert_id();
  }
  public function get_kaset_by_stock_not_zero()
  {
    $this->db->where('id_kaset > 0');
    return $this->db->get('kaset')->result_array();
  }
  public function get_kaset_by_id($id_kaset)
  {
    $this->db->where('id_kaset', $id_kaset);
    return $this->db->get('kaset')->row_array();
  }
  public function update_kaset_by_id($id_kaset, $data)
  {
    $this->db->where('id_kaset', $id_kaset);
    $this->db->update('kaset', $data);
    return $this->db->affected_rows();
  }
  public function delete_kaset_by_id($id_kaset)
  {
    $this->db->where('id_kaset', $id_kaset);
    $this->db->delete('kaset');
    return $this->db->affected_rows();
  }
	public function get_checked_stock($id_kaset, $stok)
	{
		$this->db->where('id_kaset', $id_kaset);
		$data = $this->db->get('kaset')->row_array();
		if($data['stok'] >= $stok){
			return true;
		} else {
			return false;
		}
	}
}
