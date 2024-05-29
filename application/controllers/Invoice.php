<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

  function __construct(){
    parent::__construct();
    check_not_login();
    $this->load->model(['sale_model', 'cart_model']);
  }

  public function index(){
    $data['sales'] = $this->sale_model->get_sale()->result();
    $this->template->load('template', 'report/invoice/invoice_data', $data);
  }

  public function print($sale_id){
    $data['sale'] = $this->sale_model->get_sale($sale_id)->row_array();
		$data['total_price'] = $this->cart_model->get_total($sale_id);
		$this->load->view('transaction/sale/cetak', $data);
  }

  public function delete($id){
    $this->sale_model->del_sale($id);
    $this->sale_model->del_sale_detail($id);
	
		if($this->db->affected_rows() > 0){
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
    echo "<script>window.location='". site_url('invoice') ."';</script>";
		// redirect('invoice');
  }




}
