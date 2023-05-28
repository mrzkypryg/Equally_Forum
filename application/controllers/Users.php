<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct(){
      	parent::__construct();
		  $this->load->model('model_user');
		  $this->load->model('model_admin');
		  $uid = $this->session->userdata('uid');
		  if(!empty($uid)){
			  $this->single = $this->model_user->single_user($uid);
			  $this->single->image = $this->model_user->check_profile_picture($this->single->image);
			  
		  }
		$this->page_detail = $this->model_admin->single_admin();
		$this->title = $this->page_detail['app_title'];
  }

	public function dashboard(){
		$this->vue = array('vue/forum_users_vue.js');
		$data['main_content'] ='users/dashboard';
		$this->load->view('template_after_login', $data);
	}
	public function my_post(){
		$this->vue = array('vue/forum_users_vue.js');
		$data['main_content'] ='users/my_posts';
		$this->load->view('template_after_login', $data);
	}
	public function my_replay(){
		$this->vue = array('vue/forum_users_vue.js');
		$data['main_content'] ='users/my_reply';
		$this->load->view('template_after_login', $data);
	}
	public function settings(){
		$this->vue = array('vue/forum_users_vue.js');
		$data['main_content'] ='users/settings';
		$this->load->view('template_after_login', $data);
	}
	public function edit_post($id){
		$this->vue = array('vue/forum_posts_vue.js');
		$this->load->model('model_category');
		$this->load->model('model_posting');
		$data['category'] = $this->model_category->get_category();
		$data['single'] = $this->model_posting->single_posts($id);
		$uid = $this->session->userdata('uid');
		$data['main_content'] ='pages/post_edit';
		$this->load->view('template', $data);	
	}

	public function add_users(){
			$arr = array();
			$this->load->library('encryption');
			$arr['name'] = $this->input->post('name');
			$arr['nickname'] = $this->input->post('nickname');
			$arr['email_address'] = $this->input->post('email_address');
			$password = $this->input->post('password');
			$arr['password'] = $this->encryption->encrypt($password);
			$arr['role'] = 'user';
			$this->load->model('model_user');
			$id = $this->model_user->add_new_user($arr);
			$this->session->set_userdata('t_uid', $id);
			$this->create_url($id, $arr['name']);
			echo '<script>window.location.href="'.base_url().'pages/verification"</script>';
	}
	
	public function create_url($id, $name){
		$to_low = strtolower($name);
		$string = str_replace(' ','-',$to_low);
		$url = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
		$output = $this->model_user->url_check($url);
		if($output == 'YES'){
				$unic_string = date('y-m-d:H:m:s');
				$url = $url.'-'.$unic_string;
		}
		$this->model_user->update_url($id, $url);
	}

	public function update_users(){
		$obj = json_decode(file_get_contents('php://input', true));
		$arr = array();
		$arr['name'] = $obj->name;
		$arr['mobile_number'] = $obj->mobile;
		$arr['nickname'] = $obj->desig;
		$arr['address'] = $obj->address;
		$id = $this->session->userdata('uid');
		$this->load->model('model_user');
		$this->model_user->update_all_user($arr, $id);
	}

	public function remove_users(){
		$obj = json_decode(file_get_contents('php://input', true));
		$this->load->model('model_user');
		$user_id = $obj->id;
		$this->model_user->remove_user($user_id);
	}

	public function restore_users(){
		$obj = json_decode(file_get_contents('php://input', true));
		$this->load->model('model_user');
		$user_id = $obj->id;
		$this->model_user->restore_user($user_id);
	}

	public function delete_users(){
		$obj = json_decode(file_get_contents('php://input', true));
		$this->load->model('model_user');
		$user_id = $obj->id;
		$this->model_user->delete_users($user_id);
	}

	public function get_users(){
		$parr = array(); $carr = array();
		$this->load->model('model_user');
		$output = $this->model_user->get_users();
		$co = 0;
		if(!empty($output)){
			foreach($output as $rr){
				$co++;
				$url = base_url().'user/'.$rr->url;
				$edit ="<button onclick='removeUser($rr->id)' class='btn btn-xs btn-danger'> <i class='fas fa-times'></i> </button>";
				$edit .="<a target='_blank' href='$url' class='btn btn-xs btn-primary'> <i class='fas fa-info'></i> </a>";
				$post = $this->model_user->my_post_count($rr->id);
				$replay = $this->model_user->my_reply_count($rr->id);
				$carr = array($co, $rr->name, $rr->nickname, $rr->email_address, $post, $replay, $edit);
				array_push($parr, $carr);
			}
			echo json_encode($parr);
		}
	}

	public function user_count(){
			$arr = array();
			$uid = $this->session->userdata('uid');
			$arr['tot_post'] = $this->model_user->my_post_count($uid);
			$arr['tot_replay'] = $this->model_user->my_reply_count($uid);
			$arr['tot_like'] = $this->model_user->my_like_count($uid);
			echo json_encode($arr);
	}

	public function single_users(){
		$obj = json_decode(file_get_contents('php://input', true));
		$this->load->model('model_user');
		$user_id = 3;
		$output = $this->model_user->single_user($user_id);
		if(!empty($output)){
			echo json_encode($output);
		}
	}

	public function single_user_login(){
		$this->load->model('model_user');
		$user_id = $this->session->userdata('uid');
		$output = $this->model_user->single_user($user_id);
		if(!empty($output)){
			echo json_encode($output);
		}
	}

	public function login_check(){
		$obj = json_decode(file_get_contents('php://input', true));
		$this->load->library('encryption');
		$email = $obj->name;
		$password = $obj->pswd;
		$this->load->model('model_user');
		$output = $this->model_user->login_check($email, $setting->activation);
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

	public function change_password(){
		$this->load->model('model_user');
		$this->load->library('encryption');
		$obj = json_decode(file_get_contents('php://input', true));
		$user_id = $this->session->userdata('uid');
		$output = $this->model_user->single_user($user_id);
		$new_password = $obj->pswd;
		$old_password = $obj->old;
		$decrypt = $this->encryption->decrypt($output->password);
		if($decrypt == $old_password){
			$new_ency = $this->encryption->encrypt($new_password);
			$this->model_user->update_all_user(array('password' => $new_ency,'verify' => 1), $user_id);
			echo 'success';
		}else{
			echo 'error';
		}
	}

	public function verify_account($vcode = 'xxx'){
		$output = $this->model_user->verify_account($vcode);
		if($output != 'error'){
			$this->model_user->update_all_user(array('verify' => 1), $output->user_ref);
			$this->model_user->delete_verification_link($output->id);
			$this->session->set_userdata('uid', $output->user_ref);
			header('Location:'.base_url().'pages/verified');
		}else{
			header('Location:'.base_url().'404');
		}
	}

	public function get_trash_users(){
		$parr = array(); $carr = array();
		$output = $this->model_user->get_removed_users();
		$co = 0;
		if(!empty($output)){
			foreach($output as $rr){
				$co++;
				$url = base_url().'user/'.$rr->url;
				$edit ="<button onclick='restoreUser($rr->id)' class='btn btn-xs btn-danger'> <i class='fas fa-sync-alt'></i> Restore </button>";
				$edit .="<a target='_blank' href='$url' class='btn btn-xs btn-primary'> <i class='fas fa-info'></i> </a>";
				$post = $this->model_user->my_post_count($rr->id);
				$replay = $this->model_user->my_reply_count($rr->id);
				$carr = array($co, $rr->name, $rr->nickname, $rr->email_address, $post, $replay, $edit);
				array_push($parr, $carr);
			}
			echo json_encode($parr);
		}
	}

	public function get_my_post(){
		$this->load->model('model_posting');
		$obj = json_decode(file_get_contents('php://input', true));
		$parr = array(); $carr = array();
		$uid = $this->session->userdata('uid');
		$output = $this->model_user->get_my_post($uid, $obj->limit);
		if(!empty($output)){
			foreach($output as $rr){
				$carr['id'] = $rr->id;
				$carr['title'] = $rr->title;
				$carr['description'] = $this->removeTags($rr->description);
				$carr['image'] = $rr->image;
				$carr['user_ref'] = $rr->user_ref;
				$carr['created_on'] = $rr->created_on;
				$carr['url'] = base_url().'post/edit/'.$rr->id;
				$carr['co'] = $this->model_posting->get_count_reply($rr->id);
				$carr['count'] = $rr->count;
				array_push($parr, $carr);
			}
			echo json_encode($parr);
		}
	}

	public function get_my_replay(){
		$obj = json_decode(file_get_contents('php://input', true));
		$this->load->model('model_posting');
		$parr = array(); $carr = array();
		$uid = $this->session->userdata('uid');
		$output = $this->model_user->get_my_reply($uid, $obj->limit);
		if(!empty($output)){
			foreach($output as $rr){
				$single = $this->model_posting->single_posts($rr->post_ref);
				$carr['id'] = $rr->id;
				$carr['title'] = $single->title;
				$carr['description'] = $this->removeTags($single->description);
				$carr['image'] = $single->image;
				$carr['user_ref'] = $single->user_ref;
				$carr['created_on'] = $single->created_on;
				$carr['replay'] = $this->removeTags($rr->replay);
				$carr['like'] = $this->model_posting->get_count_love($rr->id);
				array_push($parr, $carr);
			}
			echo json_encode($parr);
		}
	}

	public function removeTags($text){
		$bt = str_replace("&nbsp;","",$text);
		return 	strip_tags($bt);
	}

	public function get_my_like(){
		$this->load->model('model_posting');
		$parr = array(); $carr = array();
		$uid = $this->session->userdata('uid');
		$output = $this->model_user->get_my_like($uid);
		if(!empty($output)){
			foreach($output as $rr){
				$single = $this->model_posting->single_posts($rr->post_ref);
				$carr['id'] = $rr->id;
				$carr['title'] = $single->title;
				$carr['description'] = $single->description;
				$carr['image'] = $single->image;
				$carr['user_ref'] = $single->user_ref;
				$carr['created_on'] = $single->created_on;
				array_push($parr, $carr);
			}
			echo json_encode($parr);
		}
	}

	public function log_out(){
		$this->session->sess_destroy();
        header('Location:'.base_url());
	}
	
    public function is_exist(){
    	$obj = json_decode(file_get_contents('php://input', true));
    	echo $this->model_user->is_exist($obj->suemail);
    }

}
