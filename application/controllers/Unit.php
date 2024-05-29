<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

	function __construct(){
    parent::__construct();
    check_not_login();
    $this->load->model('unit_model');
  }

	public function index()
	{
		$data['categories'] = $this->unit_model->get();
		$this->template->load('template', 'product/unit/unit_data', $data);
	}

	
	public function add(){
		$unit = new stdClass();
		$unit->unit_id = null;
		$unit->name = null;
		
		$data = array(
			'page' => 'add',
			'row'  => $unit
		);
		$this->template->load('template', 'product/unit/unit_form', $data);
	}
	
	public function edit($id){
		$query = $this->unit_model->get($id);

		if($query->num_rows() > 0){
			$unit = $query->row();
			$data = array(
				'page' => 'edit',
				'row'  => $unit
			);
			$this->template->load('template', 'product/unit/unit_form', $data);
		}
		else{
			echo "<script>alert('Data tidak ditemukan!');</script>";
      echo "<script>window.location='". site_url('unit') ."';</script>";
		}
	}
	
	public function process(){
		$post = $this->input->post(null, TRUE);
		
		if(isset($_POST['add'])){
			$this->unit_model->add($post);
		}
		else if(isset($_POST['edit'])){
			$this->unit_model->edit($post);
		}
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('message', 'Data berhasil disimpan');
    }
    redirect('unit');
	}
	
	public function delete($id){
		$this->unit_model->delete($id);
	
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('message', 'Data berhasil dihapus');
		}
		redirect('unit');
	}

	
}
