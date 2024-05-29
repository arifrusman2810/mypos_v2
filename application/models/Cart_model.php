<?php

class Cart_model extends CI_Model{

  public function get_item($item_id){
    $this->db->select('*');
    $this->db->from('t_cart');
    $this->db->where('item_id', $item_id);
    $this->db->where('user_id', $this->session->userdata('user_id'));
    $this->db->where('status', "1");
    $query = $this->db->get();
    return $query;
  }

  public function update_all_cart(){
    $user_id = $this->session->userdata('user_id');
    $params = array(
      'status' => "0",
    );
    $this->db->where('user_id', $user_id);
    $this->db->update('t_cart', $params);
    return true;
  }

  public function get_total($sale_id){
    $this->db->select('SUM(total) as total_price');
    $this->db->from('t_sale_detail');
    $this->db->where('sale_id', $sale_id);
    return $this->db->get()->row()->total_price;
  }



}