<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct(){
        parent::__construct();
       	$this->load->model('model_category');
    }


	public function add_category(){
		$obj = json_decode(file_get_contents('php://input', true));
		$arr = array();
		$arr['name'] =  $obj->name;
		$id = $this->model_category->add_category($arr);
		$this->create_url($id, $obj->name);
	}

	public function update_category(){
		$obj = json_decode(file_get_contents('php://input', true));
		$arr = array();
		$arr['name'] = $obj->name;
		$id = $obj->id;
		$this->load->model('model_category');
		$this->model_category->update_category($arr, $id);
	}


	public function remove_category(){
		$obj = json_decode(file_get_contents('php://input', true));
		$this->load->model('model_category');
		$this->model_category->remove_category($obj->id);
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
			echo json_encode($parr);
		}
	}

	public function single_category(){
		$obj = json_decode(file_get_contents('php://input', true));
		$this->load->model('model_category');
		$output = $this->model_category->single_category($obj->id);
		if(!empty($output)){
			echo json_encode($output);
		}
	}
	public function create_url($id, $name){
			$to_low = strtolower($name);
			$string = str_replace(' ','-',$to_low);
			$url = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
			$output = $this->model_category->url_check($url);
			if($output == 'YES'){
					$unic_string = date('y-m-d:H:m:s');
					$url = $url.'-'.$unic_string;
			}
			$this->model_category->update_url($id, $url);
	}

}
