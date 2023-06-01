<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('model_forum');
		$this->load->model('model_user');
		$this->title = 'Equally';
		$uid = $this->session->userdata('uid');
		if(!empty($uid)){
			$this->single = $this->model_user->single_user($uid);
		}
    }

	public function index($ofset = 0){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'page/';
		$this->config->load('pagination');
		$this->pagination->initialize($config);
		$output = $this->model_forum->get_topics($config['per_page'], $ofset);
		$data['posts'] = $this->get_topics($output);
		$data['main_content'] ='pages/index';
    	$this->load->view('template', $data);
	}
	
	public function single_topic($url){
		$id = $this->model_forum->topics_id($url);
		$this->post_id = $id;
		$this->model_forum->add_views_topic($this->post_id);
		$data['single'] = $this->user_topics($id);
		$uid = $this->session->userdata('uid');
		if($uid == $data['single']['user_id']){
			$data['edit'] = 1;
		}else{
			$data['edit'] = 0;
		}
		$data['main_content'] ='pages/topics_user';
		$this->load->view('template', $data);
	}

	public function new_topic(){
		$uid = $this->session->userdata('uid');
		if(!empty($uid)){
			$data['main_content'] ='pages/new_topics';
			$this->load->view('template', $data);
		}else{
			header('Location:'.base_url().'pages/error');
		}
	}

	public function error(){
		$data['main_content'] ='pages/error';
		$this->load->view('template', $data);
	}

	public function get_topics($data){
		$parr = array(); $carr = array();
		$this->load->model('model_forum');
		if(!empty($data)){
			foreach($data as $rr){
				$carr['id'] = $rr->id;
				$carr['title'] = $rr->title;
				$carr['description'] = $rr->description;
				$carr['url'] = $rr->url;
				$carr['count'] = $rr->count;
				$single = $this->model_user->single_user($rr->user_id);
				$carr['user_id'] = $rr->user_id;
				$carr['user_url'] = $single->url;
				$carr['date_post'] = $rr->date_post;
				array_push($parr, $carr);
			}
			return $parr;
		}
	}

	public function user_topics($id){
		$this->load->model('model_user');
		$data = array();
		$obj = json_decode(file_get_contents('php://input', true));
		$output = $this->model_forum->user_topics($id);
		if(!empty($output)){
				$data['id'] = $output->id;
				$data['title'] = $output->title;
				$data['description'] = $output->description;
				$data['url'] = $output->url;
				$data['user_id'] = $output->user_id;
				$data['date_post'] = $output->date_post;
				$data['count'] = $output->count;
				$single = $this->model_user->single_user($output->user_id);
				$data['name'] = $single->name;
				$data['user_url'] = $single->url;
				return $data;
		}
	}
	
}
