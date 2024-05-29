<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

  function __construct(){
    parent::__construct();
    check_not_login();
    $this->load->model(['report_model', 'item_model', 'category_model', 'sale_model']);
  }

  public function index(){
    // $data['data'] = $this->item_model->tampil_barang;
    $this->template->load('template', 'report/laporan_data');
  }

  public function stock_report(){
    $data['categories']=$this->category_model->get()->result();
    // $data['items']=$this->item_model->get();
		$this->load->view('report/stock_report', $data);
  }
  
  public function sale_report(){
    $data['sale'] = $this->sale_model->get_sale()->result();
    $data['grandtotal'] = $this->sale_model->get_grandtotal();
		$this->load->view('report/sale_report', $data);
  }





}

