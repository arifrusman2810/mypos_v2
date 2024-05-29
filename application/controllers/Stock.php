<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	function __construct(){
    parent::__construct();
    check_not_login();
    $this->load->model(['item_model', 'supplier_model', 'stock_model']);
  }

  // ====================================================================================
  // Funtion Untuk Stock In
  // ====================================================================================

  public function stock_in_data(){
    $data['stocks'] = $this->stock_model->get_stock_in()->result();
    $this->template->load('template', 'transaction/stock_in/stock_in_data', $data);
  }
  
  public function stock_in_add(){
    $items = $this->item_model->get()->result();
    $suppliers = $this->supplier_model->get()->result();
    $data = [
      'items' => $items,
      'suppliers' => $suppliers
    ];
    $this->template->load('template', 'transaction/stock_in/stock_in_form', $data);
  }

  public function process(){
    if(isset($_POST['in_add'])){
      $post = $this->input->post(null, TRUE);
      $this->stock_model->add_stock_in($post);
      $this->item_model->update_stock_in($post);

      if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('message', 'Data stock_in berhasil disimpan');
      }
      redirect('stock/in');
    }
  }

  public function stock_in_delete(){
    $stock_id = $this->uri->segment(4);
    $item_id  = $this->uri->segment(5);
    $qty      = $this->stock_model->get($stock_id)->row()->qty;
    $data = [
      'qty'     => $qty,
      'item_id' => $item_id
    ];

    $this->item_model->update_stock_out($data);
    $this->stock_model->delete($stock_id);

    if($this->db->affected_rows() > 0){
      $this->session->set_flashdata('message', 'Data stock_in berhasil dihapus');
    }
    redirect('stock/in');
  }

  // ====================================================================================
  // Funtion Untuk Stock Out
  // ====================================================================================

  public function stock_out_data(){
    $data['stocks'] = $this->stock_model->get_stock_out()->result();
    $this->template->load('template', 'transaction/stock_out/stock_out_data', $data);
  }

  public function stock_out_add(){
    $items = $this->item_model->get()->result();
    $suppliers = $this->supplier_model->get()->result();
    $data = [
      'items' => $items,
      'suppliers' => $suppliers
    ];
    $this->template->load('template', 'transaction/stock_out/stock_out_form', $data);
  }

  public function process_out(){
    if(isset($_POST['out_add'])){
      $post = $this->input->post(null, TRUE);

      $item_id = $post['item_id'];
      $stock   = $this->item_model->get($item_id)->row()->stock;

      if($post['qty'] > $stock){
        $this->session->set_flashdata('message', 'Qty melebihi stock barang!');
        redirect('stock/out/add');
      }

      $this->stock_model->add_stock_out($post);
      $this->item_model->update_stock_out($post);


      if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('message', 'Data stock out berhasil disimpan');
      }
      redirect('stock/out');
    }
  }

  public function stock_out_delete(){
    $stock_id = $this->uri->segment(4);
    $item_id  = $this->uri->segment(5);
    $qty      = $this->stock_model->get($stock_id)->row()->qty;
    $data = [
      'qty'     => $qty,
      'item_id' => $item_id
    ];

    $this->item_model->update_stock_in($data);
    $this->stock_model->delete($stock_id);

    if($this->db->affected_rows() > 0){
      $this->session->set_flashdata('message', 'Data stock_in berhasil dihapus');
    }
    redirect('stock/out');
  }


}