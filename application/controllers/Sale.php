<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {

	function __construct(){
    parent::__construct();
    check_not_login();
		$this->load->model(['customer_model', 'item_model', 'sale_model', 'cart_model']);
  }

	public function index(){
		$customers = $this->customer_model->get()->result();
		$items = $this->item_model->get()->result();
		$carts = $this->sale_model->get_cart();
		$subtotal = $this->sale_model->get_subtotal();
		$data = [
			'customers' => $customers,
			'carts' => $carts,
			'invoice' => $this->sale_model->invoice_no(),
			'subtotal' => $subtotal,
			'items' => $items
		];
		$this->template->load('template', 'transaction/sale/sale_form', $data);
	}


	function get_item(){
		$barcode = $this->input->post('barcode');
		$item = $this->item_model->get_barcode($barcode)->row();
		if($this->db->affected_rows() > 0){
			$params = array("success" => true, 'item' => $item);
		}
		else{
			$params = array("success" => false);
		}
		echo json_encode($params);
	}


	public function process(){
		$data = $this->input->post(null, TRUE);

		if(isset($_POST['add_cart'])){
			$item_id = $this->input->post('item_id');
			// $check_chart = $this->sale_model->get_cart(['t_cart.item_id' => $item_id])->num_rows();
			$query = $this->cart_model->get_item($item_id)->num_rows();
			if($query > 0){
				$this->sale_model->update_cart_qty($data);
			}
			else{
				$this->sale_model->add_cart($data);
			}

			if($this->db->affected_rows() > 0){
				$params = array("success" => true);
			}
			else{
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if(isset($_POST['edit_cart'])){
			$this->sale_model->edit_cart($data);
			if($this->db->affected_rows() > 0){
				$params = array("success" => true);
			}
			else{
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if(isset($_POST['process_payment'])){
			$sale_id = $this->sale_model->add_sale($data);
			$cart = $this->sale_model->get_cart()->result();
			$row = [];
			foreach($cart as $key => $value){
				array_push($row, array(
						'sale_id' => $sale_id,
						'item_id' => $value->item_id,
						'price' => $value->price,
						'qty' => $value->qty,
						'discount_item' => $value->discount_item,
						'total' => $value->total,
					)
				);
			}
			$this->sale_model->add_sale_detail($row);
			$result = $this->cart_model->update_all_cart();

			if($result){
				$params = array("success" => true, 'sale_id' => $sale_id);
			}
			else{
				$params = array("success" => false);
			}
			echo json_encode($params);

			// if($result){
			// 	echo "<script>alert('Proses berhasil');</script>";
			// 	echo "<script>window.location='". site_url('sale') ."';</script>";
			// }

			

		}
	}


	public function cetak($sale_id){
		$data['sale'] = $this->sale_model->get_sale($sale_id)->row_array();
		$data['total_price'] = $this->cart_model->get_total($sale_id);
		$this->load->view('transaction/sale/cetak', $data);
	}


	public function cart_del($id){
		$this->sale_model->del_cart($id);
		redirect('sale');
	}

	
	public function cart_data(){
		$carts = $this->sale_model->get_cart();
		$data['carts'] = $carts;
		$this->load->view('transaction/sale/cart_data', $data);
	}



}
