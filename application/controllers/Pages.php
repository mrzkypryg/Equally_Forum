<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('model_category');
		$this->load->model('model_posting');
		$this->load->model('model_user');
		$this->load->model('model_admin');
		$this->title = 'Equally';
		$uid = $this->session->userdata('uid');
		if(!empty($uid)){
			$this->single = $this->model_user->single_user($uid);
			$this->single->image = $this->model_user->check_profile_picture($this->single->image);
			
		}
		$this->page_detail = $this->model_admin->single_admin();
	
		
    }
	public function index($ofset = 0){
		$this->load->library('pagination');
		$this->load->model('model_updatedata');
		$config['base_url'] = base_url().'page/';
		$config['total_rows'] = $this->model_updatedata->get_total_post();
		$config['per_page'] = $setting->pp;
		$this->config->load('pagination');
		$this->pagination->initialize($config);
		$output = $this->model_posting->get_posts($config['per_page'], $ofset);
		$data['category'] = $this->get_category();
		$data['posts'] = $this->get_posts($output);
		$top_res = $this->model_posting->get_top_posts();
		$data['top_post'] = $this->get_posts($top_res);
		$data['main_content'] ='pages/index';
    	$this->load->view('template', $data);
	}
	
	public function user_profile($url){
		$single = $this->model_user->get_id_by_url($url);
		$uid = $this->session->userdata('uid');
		if($single['id'] == $uid){
			header('Location:'.base_url().'users/dashboard');
		}else{
			if(!empty($single)){
				$data['category'] = $this->get_category();
				$output = $this->model_user->get_my_post($single['id'], 30);
				$data['posts'] = $this->get_posts($output);
				$data['single'] = $single;
				$data['post_count'] = $this->model_user->my_post_count($single['id']);
				$data['replay_count'] = $this->model_user->my_reply_count($single['id']);
				$data['main_content'] ='pages/view_profile';
				$this->load->view('template', $data);
			}else{
				header('Location:'.base_url().'404');
			}
		}
		
		
	}
	public function single_post($url){
		$this->vue = array('vue/forum_posts_vue.js');
		$id = $this->model_posting->get_id_by_url($url);
		$this->post_id = $id;
		$this->model_posting->add_view_count($this->post_id);
		$data['single'] = $this->single_posts($id);
		$data['category'] = $this->get_category();
		$top_res = $this->model_posting->get_top_posts();
		$data['top_post'] = $this->get_posts($top_res);
		$uid = $this->session->userdata('uid');
		if($uid == $data['single']['user_ref']){
			$data['edit'] = 1;
		}else{
			$data['edit'] = 0;
		}
		$data['main_content'] ='pages/posts_user';
		$this->load->view('template', $data);
		

	}
	public function post_by_category($url, $off=0){	
		$data['single'] = $this->model_category->get_id_by_url($url);
		$this->load->library('pagination');
		if(!empty($data['single'])){
			$this->cat_id = $data['single']->id;
			$this->load->model('model_updatedata');
			$config['base_url'] = base_url().'forum-topic/'.$data['single']->url;
			$config['total_rows'] = $this->model_updatedata->get_total_post_bu_category($this->cat_id);
			$config['per_page'] = $setting->pp;
			$this->config->load('pagination');
			$this->pagination->initialize($config);
			$post = $this->model_posting->get_posts_by_cat($this->cat_id, $config['per_page'], $off);
			$data['category'] = $this->get_category();
			$top_res = $this->model_posting->get_top_posts();
			$data['top_post'] = $this->get_posts($top_res);
			$data['posts'] = $this->get_posts($post);
			$data['main_content'] ='pages/post_by_category';
		    $this->load->view('template', $data);
		}
	}
	public function new_post(){
		$this->vue = array('vue/forum_posts_vue.js');
		$this->load->model('model_category');
		$data['category'] = $this->model_category->get_category();
		$uid = $this->session->userdata('uid');
		if(!empty($uid)){
			$data['main_content'] ='pages/post_new';
			$this->load->view('template', $data);
		}else{
			header('Location:'.base_url().'pages/error');
		}
	}

	public function verification(){
		$t_uid = $this->session->userdata('t_uid');
		$this->vue = array('vue/forum_posts_vue.js');
		$this->load->model('model_category');
		$single = $this->model_user->single_user($t_uid);
		$data['email'] = $single->email_address;
		$data['category'] = $this->model_category->get_category();
		$data['main_content'] ='pages/verification';
		$this->load->view('template', $data);
	}

	public function verified(){
		$this->vue = array('vue/forum_posts_vue.js');
		$this->load->model('model_category');
		$data['category'] = $this->model_category->get_category();
		$data['main_content'] ='pages/verified';
		$this->load->view('template', $data);
	}
	public function forgetPassword(){
		$data['main_content'] ='pages/forgetPassword';
		$this->load->view('template', $data);
	}
	public function reset_password(){
		$data['main_content'] ='pages/reset_password';
		$this->load->view('template', $data);
	}
	public function login(){
		$this->vue = array('vue/update_vue.js');
		$this->page = 'login';
		$data['main_content'] ='pages/login';
		$this->load->view('template', $data);
	}
	public function error(){
		$data['main_content'] ='pages/error';
		$this->load->view('template', $data);
	}

	public function get_category(){
		$parr = array(); $carr = array();
		$this->load->model('model_category');
		$output = $this->model_category->get_category();
		if(!empty($output)){
			foreach($output as $rr){
				$carr['id'] = $rr->id;
				$carr['name'] = $rr->name;
				$carr['url'] = base_url().'forum-topic/'.$rr->url;
				$carr['post'] = $this->model_category->total_post_by_cat($rr->id);
				array_push($parr, $carr);
			}
			return $parr;
		}
	}
	public function get_posts($arr){
		$parr = array(); $carr = array();
		$this->load->model('model_posting');
		if(!empty($arr)){
			foreach($arr as $rr){
				$carr['id'] = $rr->id;
				$carr['title'] = $rr->title;
				$carr['description'] = $this->removeTags($rr->description);
				$carr['url'] = $rr->url;
				$carr['replay_count'] = $this->model_posting->get_count_reply($rr->id);
				$carr['count'] = $rr->count;
				$single = $this->model_user->single_user($rr->user_ref);
				$carr['user_ref'] = $rr->user_ref;
				$carr['user_url'] = $single->url;
				$carr['user_image'] = $this->model_user->check_profile_picture($single->image);
				$carr['created_on'] = $rr->created_on;
				array_push($parr, $carr);
			}
			return $parr;
		}
	}
	public function removeTags($text){
		$bt = str_replace("&nbsp;","",$text);
		return 	strip_tags($bt);
	}
	public function single_posts($id){
		$this->load->model('model_user');
		$arr = array();
		$obj = json_decode(file_get_contents('php://input', true));
		$output = $this->model_posting->single_posts($id);
		if(!empty($output)){
				$arr['id'] = $output->id;
				$arr['title'] = $output->title;
				$arr['description'] = $output->description;
				$arr['url'] = $output->url;
				$arr['user_ref'] = $output->user_ref;
				$arr['created_on'] = $output->created_on;
				$arr['count'] = $output->count;
				$single = $this->model_user->single_user($output->user_ref);
				$arr['name'] = $single->name;
				$arr['user_url'] = $single->url;
				$arr['user_image'] = $this->model_user->check_profile_picture($single->image);
				$arr['desig'] = $single->designation;
				$arr['replay_count'] = $this->model_posting->get_count_reply($output->id);
				return $arr;
		}
	}
	
}
