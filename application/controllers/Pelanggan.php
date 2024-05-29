<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct(){
    parent::__construct();
    check_not_login();
    $this->load->model('customer_model');
  }

	public function index()
	{
		$data['customers'] = $this->customer_model->get();
		$this->template->load('template', 'customer/customer_data', $data);
	}

	
	public function add(){
		$customer = new stdClass();
		$customer->customer_id = null;
		$customer->name = null;
		$customer->gender = null;
		$customer->phone = null;
		$customer->address = null;
		
		$data = array(
			'page' => 'add',
			'row'  => $customer
		);
		$this->template->load('template', 'customer/customer_form', $data);
	}
	
	public function edit($id){
		$query = $this->customer_model->get($id);

		if($query->num_rows() > 0){
			$customer = $query->row();
			$data = array(
				'page' => 'edit',
				'row'  => $customer
			);
			$this->template->load('template', 'customer/customer_form', $data);
		}
		else{
			echo "<script>alert('Data tidak ditemukan!');</script>";
      echo "<script>window.location='". site_url('customer') ."';</script>";
		}
	}
	
	public function process(){
		$post = $this->input->post(null, TRUE);
		
		if(isset($_POST['add'])){
			$this->customer_model->add($post);
		}
		else if(isset($_POST['edit'])){
			$this->customer_model->edit($post);
		}
		
		if($this->db->affected_rows() > 0){
			echo "<script>alert('Data berhasil ditambah');</script>";
    }
    echo "<script>window.location='". site_url('customer') ."';</script>";
	}
	
	public function delete($id){
		$this->customer_model->delete($id);
	
		if($this->db->affected_rows() > 0){
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='". site_url('customer') ."';</script>";
	}

	
}
