<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login(){
		$this->load->view('login');
		check_already_login();
	}

	public function process(){
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])){
			$this->load->model('user_model');
			$query = $this->user_model->login($post);
			if($query->num_rows() > 0){
				$row = $query->row();
				// echo $row->username;
				$params = array(
					'user_id' => $row->user_id,
					'level'   => $row->level
				);

				$this->session->set_userdata($params);
				echo
				"<script>
					alert('Selamat, login berhasil');
					window.location ='" .site_url('dashboard')."';
				</script>";
			}
			else{
				echo
				"<script>
					alert('Gagal login!');
					window.location ='" .site_url('auth/login')."';
				</script>";
			}
		}
	}

	public function logout(){
		$params = array(
			'user_id',
			'level'
		);

		$this->session->unset_userdata($params);
		redirect('auth/login');
	}


}
