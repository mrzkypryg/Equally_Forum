<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {
	public function __construct(){
        parent::__construct();
		   $this->load->model('model_forum');
    }

	public function add_topic(){
		$data = array();
		$uid = $this->session->userdata('uid');
		$this->load->helper('typography');
		$data['title'] = $this->input->post('title');
		$data['description'] =  $this->input->post('description');
		$data['user_id'] = $uid;
		$id = $this->model_forum->add_topic($data);
		$url = $this->create_url($id, $data['title']);
		header('Location:'.base_url().'topic/'.$url);
	}
	
	public function create_url($id, $name){
			$to_low = strtolower($name);
			$string = str_replace(' ','-',$to_low);
			$url = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
			$output = $this->model_forum->url_check($url);
			if($output == 'YES'){
					$unic_string = date('y-m-d:H:m:s');
					$url = $url.'-'.$unic_string;
			}
			$this->model_forum->update_url($id, $url);
			return $url;
	}

	public function update_topics(){
		$data = array();
		$this->load->helper('typography');
		$uid = $this->session->userdata('uid');
		$data['title'] = $this->input->post('title');
		$data['description'] = $this->input->post('description');
		$id = $this->input->post('post_id');
		$single = $this->model_forum->user_topics($id);
		if($single->user_id == $uid){
			$this->model_forum->update_topics($data, $id);
			header('Location:'.base_url().'topic/'.$single->url);
		}else{
			header('Location:'.base_url().'404');
		}
		
	}

	public function user_topics(){
		$obj = json_decode(file_get_contents('php://input', true));
		$output = $this->model_forum->user_topics($obj->id);
		if(!empty($output)){
			echo json_encode($output);
		}
	}

	public function search_topic(){
		$search= array(); 
		$result = array();
		$obj = json_decode(file_get_contents('php://input', true));
		$output = $this->model_forum->search_topic($obj->keyTopic);
		if(!empty($output)){
			foreach($output as $res){
				$result['id'] = $res->id;
				$result['title'] = $res->title;
				$result['description'] = $res->description;
				$result['url'] = base_url().'topic/'.$res->url;
				$result['user_id'] = $res->user_id;
				$result['date_post'] = $res->date_post;
				array_push($search, $result);
			}
			echo json_encode($search);
		}
	}
}
