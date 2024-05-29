<?php

class Fungsi{

  protected $ci;

  function __construct(){
    $this->ci =& get_instance();  
  }

  function user_login(){
    $this->ci->load->model('user_model');
    $user_id = $this->ci->session->userdata('user_id');
    $user_data = $this->ci->user_model->get($user_id)->row();
    return $user_data;
  }

  public function count_item(){
    $this->ci->load->model('item_model');
    return $this->ci->item_model->get()->num_rows();
  }
  
  public function count_supplier(){
    $this->ci->load->model('supplier_model');
    return $this->ci->supplier_model->get()->num_rows();
  }
  
  public function count_customer(){
    $this->ci->load->model('customer_model');
    return $this->ci->customer_model->get()->num_rows();
  }
  
  public function count_user(){
    $this->ci->load->model('user_model');
    return $this->ci->user_model->get()->num_rows();
  }



}