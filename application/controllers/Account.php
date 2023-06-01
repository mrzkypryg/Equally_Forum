<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	public function __construct(){
      	parent::__construct();
		  $this->load->model('model_user');
		  $uid = $this->session->userdata('uid');
		  if(!empty($uid)){
			  $this->single = $this->model_user->single_user($uid);
		  }
		$this->title = $this->page_detail['app_title'];
  }
	
	public function edit_post($id){
		$this->load->model('model_forum');
		$data['single'] = $this->model_forum->user_topics($id);
		$uid = $this->session->userdata('uid');
		$data['main_content'] ='pages/edit_topics';
		$this->load->view('template', $data);	
	}

	public function sign_up(){
			$data = array();
			$this->load->library('encryption');
			$data['name'] = $this->input->post('name');
			$data['nickname'] = $this->input->post('nickname');
			$data['email_address'] = $this->input->post('email_address');
			$password = $this->input->post('password');
			$data['password'] = $this->encryption->encrypt($password);
			$data['role'] = 'user';
			$this->load->model('model_user');
			$email = $this->input->post('email_address');
			$where = array (
				'email_address' => $email
			);
			$validate_email = $this->model_user->check_email('users', $where)->num_rows();
			if ($validate_email > 0){
				echo '<script>alert("Email already registered!"); window.location.href="'.base_url().'";</script>';
			}
			else {
				$id = $this->model_user->sign_up($data);
				$this->session->set_userdata('t_uid', $id);
				echo '<script>alert("Akun berhasil didaftarkan, silahkan login :D!"); window.location.href="'.base_url().'";</script>';
			}
	}

	public function login_validation(){
		$obj = json_decode(file_get_contents('php://input', true));
		$this->load->library('encryption');
		$email = $obj->name;
		$password = $obj->pswd;
		$this->load->model('model_user');
		$output = $this->model_user->login_validation($email);
		if($output == 'err'){
			echo 'error';
		}else{
			 $decode = $this->encryption->decrypt($output->password);
			if($decode == $password){
				$this->session->set_userdata('uid', $output->id);
				echo 'success';
			}else{
				echo 'error';
			}
		}
	}

	public function log_out(){
		$this->session->sess_destroy();
        header('Location:'.base_url());
	}

}
