<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	function __construct(){
    parent::__construct();
    check_not_login();
    $this->load->model('supplier_model');
  }

	public function index()
	{
		$data['suppliers'] = $this->supplier_model->get();
		$this->template->load('template', 'supplier/supplier_data', $data);
	}

	
	public function add(){
		$supplier = new stdClass();
		$supplier->supplier_id = null;
		$supplier->name = null;
		$supplier->phone = null;
		$supplier->address = null;
		$supplier->description = null;
		
		$data = array(
			'page' => 'add',
			'row'  => $supplier
		);
		$this->template->load('template', 'supplier/supplier_form', $data);
	}
	
	public function edit($id){
		$query = $this->supplier_model->get($id);

		if($query->num_rows() > 0){
			$supplier = $query->row();
			$data = array(
				'page' => 'edit',
				'row'  => $supplier
			);
			$this->template->load('template', 'supplier/supplier_form', $data);
		}
		else{
			echo "<script>alert('Data tidak ditemukan!');</script>";
				echo "<script>window.location='". site_url('supplier') ."';</script>";
		}
	}
	
	public function process(){
		$post = $this->input->post(null, TRUE);
		
		if(isset($_POST['add'])){
			$this->supplier_model->add($post);
		}
		else if(isset($_POST['edit'])){
			$this->supplier_model->edit($post);
		}
		
		if($this->db->affected_rows() > 0){
			echo "<script>alert('Data berhasil ditambah');</script>";
    }
    echo "<script>window.location='". site_url('supplier') ."';</script>";
	}
	
	public function delete($id){
		$this->supplier_model->delete($id);
		$error = $this->db->error();

		if($error['code'] != 0){
			echo "<script>alert('Data tidak dapat dihapus (sudah digunakan di tabel lain)!');</script>";
		}
	
		if($this->db->affected_rows() > 0){
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='". site_url('supplier') ."';</script>";
	}

	
}
