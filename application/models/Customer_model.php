<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model{

  public function get($id = null){
    $this->db->select('*');
    $this->db->from('customer');
    if($id != null){
      $this->db->where('customer_id', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post){
    $params = array(
      'name'    => $post['name'],
      'gender'  => $post['gender'],
      'phone'   => $post['phone'],
      'address' => $post['address'],
    );

    $this->db->insert('customer', $params);
  }

  public function edit($post){
    $id = $post['customer_id'];
    $params = array(
      'name'    => $post['name'],
      'gender'  => $post['gender'],
      'phone'   => $post['phone'],
      'address' => $post['address'],
      'updated' => date('Y-m-d H:i:s')
    );
    $this->db->where('customer_id', $id);
    $this->db->update('customer', $params);
  }

  public function delete($id){
    $this->db->where('customer_id', $id);
    $this->db->delete('customer');
  }


}