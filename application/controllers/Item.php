<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	function __construct(){
    parent::__construct();
    check_not_login();
    $this->load->model(['item_model', 'category_model', 'unit_model']);
  }

	function get_ajax(){
		$list = $this->item_model->get_datatables();
		$data = array();
		$no = @$_POST['start'];
		foreach($list as $item){
			$no++;
			$row = array();
			$row[] = $no.".";
			$row[] = $item->barcode.'<br><a href="'.site_url('item/barcode_qrcode/'.$item->item_id).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
			$row[] = $item->name;
			$row[] = $item->category_name;
			$row[] = $item->unit_name;
			$row[] = 'Rp.'.number_format($item->price,'0', ',', '.'). ',-';
			$row[] = $item->stock;
			$row[] = $item->image != null ? '<img src="'.base_url('uploads/products/'.$item->image).'" class="img" style="width:100px">' : null;
			// add html for action
			$row[] = '<a href="'.site_url('item/edit/'.$item->item_id).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
			<a href="'.site_url('item/del/'.$item->item_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->item_model->count_all(),
			"recordsFiltered" => $this->item_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}
	

	public function index()
	{
		$data['items'] = $this->item_model->get();
		$this->template->load('template', 'product/item/item_data', $data);
	}

	
	public function add(){
		$item = new stdClass();
		$item->item_id = null;
		$item->barcode = null;
		$item->name = null;
		$item->price = null;
		$item->category_id = null;

    $categories = $this->category_model->get()->result();

    $query_units = $this->unit_model->get()->result();
    $units[null] = '-- Pilih --';
    foreach($query_units as $unit){
      $units[$unit->unit_id] = $unit->name;
    }
		
		$data = array(
			'page' => 'add',
			'row'  => $item,
      'categories' => $categories,
      'units' => $units,
      'selected_unit' => null
		);
		$this->template->load('template', 'product/item/item_form', $data);
	}
	
	public function edit($id){
		$query = $this->item_model->get($id);

		if($query->num_rows() > 0){
			$item = $query->row();
			$categories = $this->category_model->get()->result();

			$query_units = $this->unit_model->get()->result();
			$units[null] = '-- Pilih --';
			foreach($query_units as $unit){
				$units[$unit->unit_id] = $unit->name;
			}
			
			$data = array(
				'page' => 'edit',
				'row'  => $item,
				'categories' => $categories,
				'units' => $units,
				'selected_unit' => $item->unit_id
			);
			$this->template->load('template', 'product/item/item_form', $data);
		}
		else{
			echo "<script>alert('Data tidak ditemukan!');</script>";
      echo "<script>window.location='". site_url('item') ."';</script>";
		}
	}
	
	public function process(){
		$config['upload_path']   = './uploads/products/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size']      = 2048;
		$config['file_name']     = 'item'.date('ymd'). '-'. substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		
		if(isset($_POST['add'])){
			if($this->item_model->check_barcode($post['barcode'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain");
				redirect('item/add');
			}
			else{
				if($_FILES['image']['name'] != null){
					if($this->upload->do_upload('image')){
						$post['image'] = $this->upload->data('file_name');
						$this->item_model->add($post);

						if($this->db->affected_rows() > 0){
							$this->session->set_flashdata('message', 'Data berhasil disimpan');
						}
						redirect('item');
					}
					else{
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('item/add');
					}
				}
				else{
					$post['image'] = null;
					$this->item_model->add($post);

					if($this->db->affected_rows() > 0){
						$this->session->set_flashdata('message', 'Data berhasil disimpan');
					}
					redirect('item');
				}
			}
		}
		else if(isset($_POST['edit'])){
			if($this->item_model->check_barcode($post['barcode'], $post['item_id'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain");
				redirect('item/edit/'. $post['item_id']);
			}
			else{
				if($_FILES['image']['name'] != null){
					if($this->upload->do_upload('image')){

						$item = $this->item_model->get($post['item_id'])->row();
						if($item->image != null){
							$target_file = './uploads/products/'. $item->image;
							unlink($target_file);
						}

						$post['image'] = $this->upload->data('file_name');
						$this->item_model->edit($post);

						if($this->db->affected_rows() > 0){
							$this->session->set_flashdata('message', 'Data berhasil disimpan');
						}
						redirect('item');
					}
					else{
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('item/add');
					}
				}
				else{
					$post['image'] = null;
					$this->item_model->edit($post);

					if($this->db->affected_rows() > 0){
						$this->session->set_flashdata('message', 'Data berhasil disimpan');
					}
					redirect('item');
				}
			}
		}
	}
	
	public function delete($id){
		$item = $this->item_model->get($id)->row();

		if($item->image != null){
			$target_file = './uploads/products/'. $item->image;
			unlink($target_file);
		}
		$this->item_model->delete($id);
	
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('message', 'Data berhasil dihapus');
		}
		redirect('item');
	}

	public function barcode_qrcode($id){
		$data['items'] = $this->item_model->get($id)->row();
		$this->template->load('template', 'product/item/barcode_qrcode', $data);
	}

	public function barcode_print($id){
		$data['items'] = $this->item_model->get($id)->row();
		
		// filename dari pdf ketika didownload
		$file_pdf = 'barcode-'.$data['items']->barcode;
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "portrait";
			
		$html = $this->load->view('product/item/barcode_print',$data, true);	    
			
		// run dompdf
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

	public function qrcode_print($id){
		$data['items'] = $this->item_model->get($id)->row();
		
		// filename dari pdf ketika didownload
		$file_pdf = 'qrcode-'.$data['items']->barcode;
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "portrait";
			
		$html = $this->load->view('product/item/qrcode_print',$data, true);	    
			
		// run dompdf
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

	
}
