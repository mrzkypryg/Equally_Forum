<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {
	public function __construct(){
        parent::__construct();
		   $this->load->model('model_posting');
		   $this->load->model('model_category');
    }

	public function add_posts(){
		$arr = array();
		$uid = $this->session->userdata('uid');
		$this->load->helper('typography');
		$text = $this->input->post('description');
		$arr['title'] = $this->input->post('title');
		$arr['description'] =  $text;
		$arr['user_ref'] = $uid;
		$arr['cat_ref'] = $this->input->post('cat_ref');
		$id = $this->model_posting->add_posts($arr);
		$url = $this->create_url($id, $arr['title']);
		header('Location:'.base_url().'post/'.$url);
	}
	public function create_url($id, $name){
			$to_low = strtolower($name);
			$string = str_replace(' ','-',$to_low);
			$url = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
			$output = $this->model_posting->url_check($url);
			if($output == 'YES'){
					$unic_string = date('y-m-d:H:m:s');
					$url = $url.'-'.$unic_string;
			}
			$this->model_posting->update_url($id, $url);
			return $url;
	}
	public function image_upload(){
		$config['upload_path'] = './upload/post';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('file')){
				echo 'error';
		}else{
			$data =  $this->upload->data();
		echo base_url().'upload/post/'.$data['file_name'];
		}
	}

	public function update_posts(){
		$arr = array();
		$this->load->helper('typography');
		$uid = $this->session->userdata('uid');
		$text = $this->input->post('description');
		$arr['title'] = $this->input->post('title');
		$arr['description'] =  $text;
		$arr['cat_ref'] = $this->input->post('cat_ref');
		$post_id = $this->input->post('pid');
		$single = $this->model_posting->single_posts($post_id);
		if($single->user_ref == $uid){
			$this->model_posting->update_posts($arr, $post_id);
			header('Location:'.base_url().'post/'.$single->url);
		}else{
			header('Location:'.base_url().'404');
		}
		
	}

	public function remove_posts(){
		$obj = json_decode(file_get_contents('php://input', true));
		$post_id = $obj->id;
		$this->model_posting->remove_posts($post_id);
	}

	public function restore_posts(){
		$obj = json_decode(file_get_contents('php://input', true));
		$post_id = $obj->id;
		$this->model_posting->restore_posts($post_id);
	}

	public function get_posts(){
		$parr = array(); 
		$this->load->model('model_posting');
		$this->load->model('model_user');
		$output = $this->model_posting->getPostAll();
		$co = 0;
		if(!empty($output)){
			foreach($output as $rr){
				$co++;
				$url = base_url().'post/'.$rr->url;
				$edit ="<button onclick='removeTable($rr->id)' class='btn btn-xs btn-danger'> <i class='fas fa-times'></i> </button>";
				$edit .="<a href='$url' target='_blank' class='btn btn-xs btn-primary'> <i class='fas fa-info'></i> </a>";
				$single = $this->model_user->single_user($rr->user_ref);
				$replay_count = $this->model_posting->get_count_reply($rr->id);
				$view_count = $rr->count;
				$carr = array($co, $rr->title, $single->name, $replay_count, $view_count, $edit);
				array_push($parr, $carr);
				
			}
			echo json_encode($parr);
		}
	}
	public function removeTags($text){
		$bt = str_replace("&nbsp;","",$text);
		return 	strip_tags($text);
	}
	public function get_posts_by_cat(){
		$parr = array(); $carr = array();
		$this->load->model('model_posting');
		$cat_id = 1;
		$output = $this->model_posting->get_posts_by_cat($cat_id);
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

	public function single_posts(){
		$obj = json_decode(file_get_contents('php://input', true));
		$output = $this->model_posting->single_posts($obj->id);
		if(!empty($output)){
			echo json_encode($output);
		}
	}

	public function add_replay(){
		$obj = json_decode(file_get_contents('php://input', true));
		$uid = $this->session->userdata('uid');
		$arr = array();
		$arr['user_ref'] = $uid;
		$arr['post_ref'] = $obj->pid;
		$arr['replay'] = $obj->text;
		$this->model_posting->add_reply($arr);

		$this->load->model('model_notification');
		$this->load->model('model_posting');
		$this->load->model('model_user');
		$arr_n = array();
		$single_post =  $this->model_posting->single_posts($obj->pid);
		$single_user = $this->model_user->single_user($uid);
		$arr_n['icon'] = '<i class="fas fa-retweet"></i>';
		$arr_n['text'] = $single_user->name.' add reply to your post';
		$arr_n['user_ref'] =  $single_post->user_ref;
		$this->model_notification->add_notification($arr_n);
		$message = $arr_n['text'];
		$reciver = $this->model_user->single_user($single_post->user_ref);
	}

	public function update_replay(){
		$obj = json_decode(file_get_contents('php://input', true));
		$arr = array();
		$id = $obj->id;
		$arr['replay'] = $obj->text;
		$this->load->model('model_posting');
		$this->model_posting->update_reply($arr, $id);
	}

	public function remove_replay(){
		$obj = json_decode(file_get_contents('php://input', true));
		$this->load->model('model_posting');
		$id = $obj->id;
		$this->model_posting->remove_reply($id);
	}

	public function get_replay(){
		$obj = json_decode(file_get_contents('php://input', true));
		$parr = array(); $carr = array();
		$this->load->model('model_posting');
		$post_id = $obj->id;
		$output = $this->model_posting->get_reply($post_id);
		$user_id = $this->session->userdata('uid');
		if(!empty($output)){
			foreach($output as $rr){
				$carr['id'] = $rr->id;
				$carr['user_ref'] = $rr->user_ref;
				$carr['post_ref'] = $rr->post_ref;
				$carr['replay'] = $rr->replay;
				$carr['time'] = $rr->time;
				$this->load->model('model_user');
				$single = $this->model_user->single_user($rr->user_ref);
				if(!empty($single)){
					$carr['name'] = $single->name;
					$carr['lik_count'] = $this->model_posting->get_count_love($rr->id);
					$carr['is'] = $this->model_posting->confirm_user_love($user_id, $rr->id);
					if($rr->user_ref == $user_id){
						$carr['edit'] = 1;
					}else{
						$carr['edit'] = 0;
					}
					
					array_push($parr, $carr);
				}
				
			}
			echo json_encode($parr);
		}
	}
	public function add_replay_like(){
		$obj = json_decode(file_get_contents('php://input', true));
		$uid = $this->session->userdata('uid');
		$user_id = $uid; $replay_id = $obj->rid; $post_id = $obj->pid;
		$this->model_posting->add_reply_love($user_id, $replay_id, $post_id);

		$this->load->model('model_notification');
		$this->load->model('model_posting');
		$this->load->model('model_user');
		$arr_n = array();
		$single_reply =  $this->model_posting->single_reply($obj->rid);
		$replay_user = $this->model_user->single_user($single_reply->user_ref);
		$like_user = $this->model_user->single_user($uid);

		$arr_n['icon'] = '<i class="far fa-heart"></i>';
		$arr_n['text'] = $like_user->name.' like your replay';
		$arr_n['user_ref'] =  $replay_user->id;
		$this->model_notification->add_notification($arr_n);
		$message = $arr_n['text'];

	}
	public function remove_replay_like(){
		$obj = json_decode(file_get_contents('php://input', true));
		$uid = $this->session->userdata('uid');
		$user_id = $uid; $replay_id = $obj->rid; $post_id = $obj->pid;
		$this->model_posting->remove_reply_love($user_id, $replay_id, $post_id);
	}
	public function is_user_like(){
		$user_id = 2; $replay_id = 1;
		$output = $this->model_posting->confirm_user_love($user_id, $replay_id);
	}
	public function get_replay_count(){
		$post_id = 5;
		$output = $this->model_posting->get_count_reply($post_id);
		echo $output;
	}
	public function get_like_count($replay_id){
		$output = $this->model_posting->get_count_love($replay_id);
		echo $output;
	}
	public function get_related_post(){
		$parr = array(); $carr = array();
		$cat_id = 1; $post_id = 4;
		$output = $this->model_posting->get_related_post($cat_id, $post_id);
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
	public function get_my_like(){
		$parr = array(); $carr = array();
		$this->load->model('model_posting');
		$output = $this->model_posting->get_top_posts();
		if(!empty($output)){
			foreach($output as $rr){
				$carr['id'] = $rr->id;
				$carr['title'] = $rr->title;
				$carr['description'] = $this->removeTags($rr->description);
				$carr['image'] = $rr->image;
				$carr['url'] = $rr->url;
				$carr['replay_count'] = $this->model_posting->get_count_reply($rr->id);
				$carr['count'] = $rr->count;
				$carr['user_ref'] = $rr->user_ref;
				$carr['created_on'] = $rr->created_on;
				array_push($parr, $carr);
			}
			return $parr;
		}
	}
	public function search_post(){
		$parr = array(); $carr = array();
		$obj = json_decode(file_get_contents('php://input', true));
		$output = $this->model_posting->search_post($obj->sk);
		if(!empty($output)){
			foreach($output as $rr){
				$carr['id'] = $rr->id;
				$carr['title'] = $rr->title;
				$carr['description'] = $this->removeTags($rr->description);
				$carr['url'] = base_url().'post/'.$rr->url;
				$carr['user_ref'] = $rr->user_ref;
				$carr['created_on'] = $rr->created_on;
				array_push($parr, $carr);
			}
			echo json_encode($parr);
		}
	}
	public function get_top_posts(){
		$parr = array(); $carr = array();
		$this->load->model('model_posting');
		$output = $this->model_posting->get_top_posts();
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
	public function get_trash_posts(){
		$parr = array(); 
		$this->load->model('model_posting');
		$this->load->model('model_user');
		$output = $this->model_posting->get_trash_posts();
		$co = 0;
		if(!empty($output)){
			foreach($output as $rr){
				$co++;
				$url = base_url().'post/'.$rr->url;
				$edit ="<button onclick='restorePost($rr->id)' class='btn btn-xs btn-danger'> <i class='fas fa-sync-alt'></i> </button>";
				$edit .="<a target='_blank' href='$url' class='btn btn-xs btn-primary'> <i class='fas fa-info'></i> </a>";
				$single = $this->model_user->single_user($rr->user_ref);
				$replay_count = $this->model_posting->get_count_reply($rr->id);
				$view_count = $rr->count;
				$carr = array($co, $rr->title, $single->name, $replay_count, $view_count, $edit);
				array_push($parr, $carr);
				
			}
			echo json_encode($parr);
		}
	}
}
