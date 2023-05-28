<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

	public function __construct(){
        parent::__construct();
       	$this->load->model('model_notification');         
    }

	public function add_notification(){
		$obj = json_decode(file_get_contents('php://input', true));
		$arr = array();
		$uid = $this->session->userdata('uid');
		$arr['user_ref'] = $uid;
		$arr['icon'] = '<i></i>';
		$arr['text'] = 'Demo Text';
		$this->model_notification->add_notification($arr);
	}

	public function remove_notification(){
		$obj = json_decode(file_get_contents('php://input', true));
		$not_id = 3;
		$this->model_notification->remove_notification($not_id);
	}

	public function get_notification(){
		$parr = array(); $carr = array();
		$uid = $this->session->userdata('uid'); 
		$output = $this->model_notification->get_notification($uid);
		if(!empty($output)){
			foreach($output as $rr){
				$carr['id'] = $rr->id;
				$carr['user_ref'] = $rr->user_ref;
				$carr['icon'] = $rr->icon;
				$carr['text'] = $rr->text;
				array_push($parr, $carr);
			}
			echo json_encode($parr);
		}
	}

	public function add_admin_notification(){
		$arr = array();
		$arr['icon'] = '<i></i>';
		$arr['text'] = 'Demo Admin Text';
		$this->model_notification->add_admin_notification($arr);
	}

	public function remove_admin_notification(){
		$obj = json_decode(file_get_contents('php://input', true));
		$not_id = 2;
		$this->model_notification->remove_admin_notification($not_id);
	}

	public function get_admin_notification(){
		$parr = array(); $carr = array();
		$output = $this->model_notification->get_admin_notification();
		if(!empty($output)){
			foreach($output as $rr){
				$carr['id'] = $rr->id;
				$carr['icon'] = $rr->icon;
				$carr['text'] = $rr->text;
				array_push($parr, $carr);
			}
			echo json_encode($parr);
		}
	}

	public function clear_all_notiy(){
		$obj = json_decode(file_get_contents('php://input', true));
		$uid = $this->session->userdata('uid'); 
		$this->model_notification->clear_all_notiy($uid);
	}
	

}
