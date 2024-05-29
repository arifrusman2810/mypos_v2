<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model{

  public function get_category(){
    $query = $this->db->query("SELECT category_id, `name`, p_item.name AS item_name, p_item.stock AS item_stock FROM p_category JOIN p_item ON p_item.category_id = p_category.category_id GROUP BY p_category.category_id, item_name");
		return $query;
  }


  public function get_stock_barang(){
    $this->db->select('p_category.*, p_item.name as nama_item, p_item.stock as stock_item');
    $this->db->from('p_category');
    $this->db->join('p_item', 'p_item.category_id = p_category.category_id');
    $this->db->group_by('category_id, nama_barang');
    $query = $this->db->get();
    return $query;
  }


}