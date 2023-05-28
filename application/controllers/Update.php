<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class update extends CI_Controller {
	public function __construct(){
        parent::__construct();
       	$this->load->model('model_updatedata');         
    }

	public function index()
	{
		echo '';
	}

	public function get_common_count()
	{
		$arr = array();
		$arr['user_count'] =  $this->model_updatedata->get_total_user();
		$arr['cat_count'] =  $this->model_updatedata->get_total_category();
		$arr['post_count'] =  $this->model_updatedata->get_total_post();
		$arr['replay_count'] =  $this->model_updatedata->get_total_replies();
		echo json_encode($arr);
	}
	
	public function get_latest_post(){
		$parr = array(); $carr = array();
		$output = $this->model_updatedata->get_latest_post();
		if(!empty($output)){
			foreach($output as $rr){
				$carr['id'] = $rr->id;
				$carr['title'] = $rr->title;
				$carr['description'] = $rr->description;
				$carr['image'] = $rr->image;
				$carr['user_ref'] = $rr->user_ref;
				$carr['created_on'] = $rr->created_on;
				array_push($parr, $carr);
			}
			echo json_encode($parr);
		}
	}

	public function get_last_week_post(){
		$lablearr = array(); $valarr = array();
		$this->load->model('model_updatedata');
		$dat = date('Y-m-d');

		$fdat = date( "Y-m-d", strtotime( "$dat -6 day" ) );
		array_push($lablearr, $fdat);
		$val = $this->model_updatedata->get_date_post($fdat);
		array_push($valarr, $val);

		$fdat = date( "Y-m-d", strtotime( "$dat -5 day" ) );
		array_push($lablearr, $fdat);
		$val = $this->model_updatedata->get_date_post($fdat);
		array_push($valarr, $val);

		$fdat = date( "Y-m-d", strtotime( "$dat -4 day" ) );
		array_push($lablearr, $fdat);
		$val = $this->model_updatedata->get_date_post($fdat);
		array_push($valarr, $val);

		$fdat = date( "Y-m-d", strtotime( "$dat -3 day" ) );
		array_push($lablearr, $fdat);
		$val = $this->model_updatedata->get_date_post($fdat);
		array_push($valarr, $val);

		$fdat = date( "Y-m-d", strtotime( "$dat -2 day" ) );
		array_push($lablearr, $fdat);
		$val = $this->model_updatedata->get_date_post($fdat);
		array_push($valarr, $val);

		$fdat = date( "Y-m-d", strtotime( "$dat -1 day" ) );
		array_push($lablearr, $fdat);
		$val = $this->model_updatedata->get_date_post($fdat);
		array_push($valarr, $val);

		array_push($lablearr, $dat);
		$val = $this->model_updatedata->get_date_post($dat);
		array_push($valarr, $val);

		$new_arr = array('label' => $lablearr, 'val' => $valarr);
		echo json_encode($new_arr);
	}
	
	public function get_post_by_cat(){
		$labelarr = array(); $valarr = array();
		$this->load->model('model_category');
		$output = $this->model_category->get_category();
		if(!empty($output)){
			foreach($output as $rr){
				$label = $rr->name;
				$post = $this->model_category->total_post_by_cat($rr->id);
				array_push($labelarr, $label);
				array_push($valarr, $post);
			}
			$new_arr = array('label' => $labelarr, 'val' => $valarr);
			echo json_encode($new_arr);
		}
	}
}
