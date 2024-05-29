<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_model extends CI_Model{

  public function invoice_no(){
    $query = $this->db->query("SELECT MAX(MID(invoice,9,4)) AS invoice_no FROM t_sale WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d') ");

    if($query->num_rows() > 0){
      $row = $query->row();
      $n = ((int)$row->invoice_no) + 1;
      $no = sprintf("%'. 04d", $n);
    }
    else{
      $no = '0001';
    }

    $invoice = "MP".date('ymd').$no;
    return $invoice;
  }


  public function get_cart(){
    $this->db->select('*, p_item.name as item_name, t_cart.price as cart_price');
    $this->db->from('t_cart');
    $this->db->join('p_item', 'p_item.item_id = t_cart.item_id');
    $this->db->where('status', '1');
    $this->db->where('user_id', $this->session->userdata('user_id'));
    $query = $this->db->get();
    return $query;
  }


  public function add_cart($post){
    $query = $this->db->query("SELECT MAX(cart_id) AS cart_no FROM t_cart");
    if($query->num_rows() > 0){
      $row = $query->row();
      $cart_no = ((int)$row->cart_no) + 1;
    }
    else{
      $cart_no = "1";
    }

    $params = array(
      'cart_id' => $cart_no,
      'item_id' => $post['item_id'],
      'price' => $post['price'],
      'qty' => $post['qty'],
      'discount_item' => $post['discount_item'],
      'total' => ($post['price'] - $post['discount_item']) * $post['qty'],
      'user_id' => $this->session->userdata('user_id')
    );
    $this->db->insert('t_cart', $params);
  }


  public function update_cart_qty($post){
    $user_id = $this->session->userdata('user_id');
    $sql = "UPDATE t_cart SET 
      discount_item = '$post[discount_item]',
      qty = qty + '$post[qty]',
      total = (price - discount_item) * qty
      WHERE item_id = '$post[item_id]' AND status = '1' AND user_id = '$user_id'"
    ;
    $this->db->query($sql);
  }


  public function del_cart($id){
    $this->db->where('cart_id', $id);
    $this->db->delete('t_cart');
  }


  public function edit_cart($post){
    $params = array(
      'price' => $post['price'],
      'qty' => $post['qty'],
      'discount_item' => $post['discount'],
      'total' => $post['total'],
    );
    $this->db->where('cart_id', $post['cart-id']);
    $this->db->update('t_cart', $params);
  }


  public function add_sale($post){
    $params = array(
      'invoice' => $this->invoice_no(),
      'customer_name' => $post['customer'],
      'total_price' => $post['subtotal'],
      'discount' => $post['discount'],
      'final_price' => $post['grandtotal'],
      'cash' => $post['cash'],
      'remaining' => $post['change'],
      'note' => $post['note'],
      'date' => $post['date'],
      'user_id' => $this->session->userdata('user_id')
    );
    $this->db->insert('t_sale', $params);
    return $this->db->insert_id();
  }

  function add_sale_detail($params){
    $this->db->insert_batch('t_sale_detail', $params);
  }


  public function get_sale($id = null){
    $this->db->select('*, user.name as user_name, t_sale.created as sale_created');
    $this->db->from('t_sale');
    $this->db->join('user', 't_sale.user_id = user.user_id');

    if($id != null){
      $this->db->where('sale_id', $id);
    }
    $this->db->order_by('date', 'desc');
    $query = $this->db->get();
    return $query;
  }

  
  public function get_sale_report($id = null){
    $this->db->select('*, user.name as user_name, t_sale.created as sale_created, t_sale_detail.total as total_detail, t_sale_detail.qty as qty, t_sale_detail.item_id as item_id, t_sale_detail.price as detail_price, t_sale_detail.discount_item as discount_item');
    $this->db->from('t_sale');
    $this->db->join('user', 't_sale.user_id = user.user_id');
    $this->db->join('t_sale_detail', 't_sale_detail.sale_id = t_sale.sale_id', 'right');

    if($id != null){
      $this->db->where('sale_id', $id);
    }
    $this->db->order_by('date', 'desc');
    $query = $this->db->get();
    return $query;
  }


  public function get_sale_pagination($limit = null, $start = null){
    $this->db->select('*, user.username as user_name, t_sale.created as sale_created');
    $this->db->from('t_sale');
    $this->db->join('user', 't_sale.user_id = user.user_id');
    $this->db->order_by('date', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query;
  }


  public function get_sale_detail($sale_id = null){
    $this->db->from('t_sale_detail');
    $this->db->join('p_item', 't_sale_detail.item_id = p_item.item_id');

    if($sale_id != null){
      $this->db->where('t_sale_detail.sale_id', $sale_id);
    }
    $query = $this->db->get();
    return $query;
  }


  public function get_subtotal(){
    $this->db->select('SUM(total) as total');
    $this->db->from('t_cart');
    $this->db->where('user_id', $this->session->userdata('user_id'));
    $this->db->where('status', "1");
    return $this->db->get()->row()->total;
  }

  
  public function get_grandtotal(){
    $this->db->select('SUM(final_price) as grandtotal');
    $this->db->from('t_sale');
    return $this->db->get()->row()->grandtotal;
  }


  public function del_sale($id){
    $this->db->where('sale_id', $id);
    $this->db->delete('t_sale');
  }
  
  public function del_sale_detail($id){
    $this->db->where('sale_id', $id);
    $this->db->delete('t_sale_detail');
  }


}