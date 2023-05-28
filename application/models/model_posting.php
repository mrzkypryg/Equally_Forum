<?php
class Model_posting extends CI_Model{
    public function __construct(){
		parent::__construct();
	}

	//Create Post, Reply, Love, etc..
	public function add_posts($arr){
		$this->db->insert('posts', $arr);
		return $this->db->insert_id();
	}

	public function add_reply($arr){
		$this->db->insert('reply', $arr);
		$this->db->insert_id();
	}

	public function add_reply_love($user_id, $replay_id, $post_id){
		$output = $this->db->get_where('reply_like', array('user_ref'=>$user_id,'replay_ref'=>$replay_id));
		if(!$r = $output->result()){
			$this->db->insert('reply_like', array('user_ref'=>$user_id,'replay_ref'=>$replay_id,'post_ref' => $post_id));
		}
	}

	public function add_view_count($pid){
		$this->db->where('id', $pid);
		$this->db->set('count', 'count+1', FALSE);
		$this->db->update('posts');
	}

	//Read Post, etc..
	public function get_posts($limit, $ofset){
		$this->db->where('active', 'YES');
		$this->db->order_by('id', 'desc');
		$this->db->limit($limit, $ofset);
		$output = $this->db->get('posts');
		if($r = $output->result()){
			return $r;
		}
	}
	
	public function get_reply($id){
		$this->db->where('active', 'YES');
		$this->db->where('post_ref', $id);
		$output = $this->db->get('reply');
		if($r = $output->result()){
			return $r;
		}
	}
	
	public function getPostAll(){
		$this->db->where('active', 'YES');
		$output = $this->db->get('posts');
		if($r = $output->result()){
			return $r;
		}
	}

	public function get_trash_posts(){
		$this->db->where('active', 'NO');
		$output = $this->db->get('posts');
		if($r = $output->result()){
			return $r;
		}
	}

	public function get_posts_by_cat($cat_id, $limit, $ofset){
		$this->db->where('active', 'YES');
		$this->db->limit($limit, $ofset);
		$this->db->where('cat_ref', $cat_id);
		$output = $this->db->get('posts');
		if($r = $output->result()){
			return $r;
		}
	}

	public function single_posts($id){
		$this->db->where('id', $id);
		$output = $this->db->get('posts');
		if($r = $output->result()){
			foreach($r as $rr){
				return $rr;
			}
		}
	}

	public function confirm_user_love($user_id, $replay_id){
		$output = $this->db->get_where('reply_like', array('user_ref'=>$user_id,'replay_ref'=>$replay_id));
		if($r = $output->result()){
			return 'yes';
		}else{
			return 'no';
		}
	}

	public function get_count_reply($post){
		$this->db->where('active', 'YES');
		$this->db->where('post_ref', $post);
		$output = $this->db->get('reply')->num_rows();
		return $output;
	}
	
	public function get_count_love($id){
		$output = $this->db->get_where('reply_like', array('replay_ref'=>$id))->num_rows();
		return $output;
	}

	public function get_related_post($cat_id, $post_id){
		$this->db->where('active', 'YES');
		$this->db->where('cat_ref', $cat_id);
		$this->db->where('id !=', $post_id);
		$output = $this->db->get('posts');
		if($r = $output->result()){
			return $r;
		}
	}

	public function get_id_by_url($url){
		$output = $this->db->get_where('posts', array('url'=>$url));
		if($r = $output->result()){
			foreach($r as $rr){
				return $rr->id;
			}
		}
	}

	public function url_check($url){
		$output = $this->db->get_where('posts', array('url' => $url));
		if($r = $output->result()){
			return 'YES';
		}
	  }

	public function search_post($sky){
		$this->db->like('title', $sky);
		$output = $this->db->get('posts');
		if($r = $output->result()){
				return $r;
		}
	}
	
	public function get_top_posts(){
		$this->db->where('active', 'YES');
		$this->db->order_by('count','desc');
		$this->db->limit(9);
		$output = $this->db->get('posts');
		if($r = $output->result()){
			return $r;
		}
	}

	public function single_reply($id){
		$output = $this->db->get_where('reply', array('id' => $id));	
		if($r = $output->result()){
		  foreach($r as $rr){
			   return $rr;
		   }
	  	}	
  	}


	//Update Post & URL, Reply, etc..
	public function update_posts($arr, $id){
		$this->db->where('id', $id);
		$this->db->update('posts', $arr);
	}

	public function update_url($id, $url){
		$this->db->where('id', $id);
		$this->db->update('posts', array('url'=>$url));
	}

	public function update_reply($arr, $id){
		$this->db->where('id', $id);
		$this->db->update('reply', $arr);
	}

	//Delete and Un-delete Post, Reply, etc..
	public function remove_posts($id){
		$this->db->where('id', $id);
		$this->db->update('posts', array('active'=>'NO'));
	}

	public function restore_posts($id){
		$this->db->where('id', $id);
		$this->db->update('posts', array('active'=>'YES'));
	}

	public function remove_reply($id){
		$this->db->where('id', $id);
		$this->db->update('reply', array('active'=>'NO'));
	}

	public function remove_reply_love($user_id, $replay_id, $post_id){
		$this->db->where('user_ref', $user_id);
		$this->db->where('replay_ref', $replay_id);
		$this->db->delete('reply_like');
	}

}
?>
