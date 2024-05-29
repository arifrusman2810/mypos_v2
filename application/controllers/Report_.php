<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

  function __construct(){
    parent::__construct();
    check_not_login();
    $this->load->model(['sale_model', 'stock_model']);
  }

  // Menggunakan pagination server side
  // public function sale(){
  //   $this->load->library('pagination');

  //   $config['base_url'] = site_url('report/sale');
  //   $config['total_rows'] = $this->sale_model->get_sale_pagination()->num_rows();
  //   $config['per_page'] = 5;
  //   $config['uri_segment'] = 3;
  //   $config['first_link'] = 'First';
  //   $config['last_link'] = 'Last';
  //   $config['next_link'] = 'Next';
  //   $config['prev_link'] = 'Prev';
  //   $config['num_tag_open'] = '<li>';
  //   $config['num_tag_close'] = '</li>';
  //   $config['cur_tag_open'] = '<li class="active"><a>';
  //   $config['cur_tag_close'] = '</a></li>';
  //   $config['next_tag_open'] = '<li>';
  //   $config['next_tag_close'] = '</li>';
  //   $config['prev_tag_open'] = '<li>';
  //   $config['prev_tag_close'] = '</li>';
  //   $config['first_tag_open'] = '<li>';
  //   $config['first_tag_close'] = '</li>';
  //   $config['last_tag_open'] = '<li>';
  //   $config['last_tag_close'] = '</li>';

  //   $this->pagination->initialize($config);

  //   $data['pagination'] = $this->pagination->create_links();
  //   $data['sales'] = $this->sale_model->get_sale_pagination($config['per_page'], $this->uri->segment(3))->result();
  //   $this->template->load('template', 'report/sales_report', $data);
  // }

  // Menggunakan pagination client side
  public function sale(){
    $data['sales'] = $this->sale_model->get_sale()->result();
    $this->template->load('template', 'report/sales_report', $data);
  }

  public function sale_product($sale_id = null){
    $detail = $this->sale_model->get_sale_detail($sale_id)->result();
    echo json_encode($detail);
  }


  // =================================================================
  // Report Stock
  // =================================================================
  public function stock(){
    $data['stocks'] = $this->stock_model->get_stock()->result();
    $this->template->load('template', 'report/stock_report', $data);
  }



}
