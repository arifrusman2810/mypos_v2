<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

  function __construct(){
    parent::__construct();
    check_not_login();
    check_admin();
    $this->load->model('user_model');
    $this->load->library('form_validation');
  }

  public function index(){
    $data['users'] = $this->user_model->get();
		$this->template->load('template', 'user/user_data', $data);
	}

  public function add(){
    $this->form_validation->set_rules('name', 'Nama', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
    $this->form_validation->set_rules('passconf', 'Konfirmasi password', 'required|matches[password]',
      array('matches' => '%s tidak sesuai dengan password')
    );
    $this->form_validation->set_rules('level', 'Level', 'required');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
    $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
    $this->form_validation->set_message('is_unique', '{field} sudah digunakan, silahkan ganti');

    if($this->form_validation->run() == FALSE){
      $this->template->load('template', 'user/user_form_add');
    }
    else{
      $post = $this->input->post(null, TRUE);
      $this->user_model->add($post);
      if($this->db->affected_rows() > 0){
        echo "<script>alert('Data berhasil disimpan');</script>";
      }
      echo "<script>window.location='". site_url('user') ."';</script>";
    }
  }

  public function edit($id){
    if($id == 1){
      echo "<script>alert('Data tidak ditemukan!');</script>";
      echo "<script>window.location='". site_url('user') ."';</script>";
    }
    $this->form_validation->set_rules('name', 'Nama', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
    if($this->input->post('password')){
      $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
      $this->form_validation->set_rules('passconf', 'Konfirmasi password', 'matches[password]',
        array('matches' => '%s tidak sesuai dengan password')
      );
    }
    if($this->input->post('passconf')){
      $this->form_validation->set_rules('passconf', 'Konfirmasi password', 'matches[password]',
        array('matches' => '%s tidak sesuai dengan password')
      );
    }

    $this->form_validation->set_rules('level', 'Level', 'required');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
    $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
    // $this->form_validation->set_message('is_unique', '{field} sudah digunakan, silahkan ganti');

    if($this->form_validation->run() == FALSE){
      $query = $this->user_model->get($id);
      if($query->num_rows() > 0){
        $data['user'] = $query->row();
        $this->template->load('template', 'user/user_form_edit', $data);
      }
      else{
        echo "<script>alert('Data tidak ditemukan!');</script>";
        echo "<script>window.location='". site_url('user') ."';</script>";
      }
    }
    else{
      $post = $this->input->post(null, TRUE);
      $this->user_model->edit($post);
      if($this->db->affected_rows() > 0){
        echo "<script>alert('Data berhasil disimpan');</script>";
      }
      echo "<script>window.location='". site_url('user') ."';</script>";
    }
  }

  public function delete(){
    $id = $this->input->post('user_id');
    if($id == 1){
      echo "<script>alert('Data tidak ditemukan!');</script>";
      echo "<script>window.location='". site_url('user') ."';</script>";
    }
    $this->user_model->delete($id);

    if($this->db->affected_rows() > 0){
      echo "<script>alert('Data berhasil dihapus');</script>";
    }
    echo "<script>window.location='". site_url('user') ."';</script>";
  }

  function username_check(){
    $post = $this->input->post(null, TRUE);
    $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");

    if($query->num_rows() > 0){
      $this->form_validation->set_message('username_check', '{field} ini sudah dipakai, silakan ganti');
      return FALSE;
    }
    else{
      return TRUE;
    }
  }



}