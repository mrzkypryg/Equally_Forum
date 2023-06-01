<?php
class Model_forum extends CI_Model{
    public function __construct(){
		parent::__construct();
	}

	//Create Post
	public function add_topic($data){
		$this->db->insert('topics', $data);
		return $this->db->insert_id();
	}

	public function add_views_topic($pid){
		$this->db->where('id', $pid);
		$this->db->set('count', 'count+1', FALSE);
		$this->db->update('topics');
	}

	//Read Post, etc..
	public function get_topics($limit, $ofset){
		$this->db->where('active', 'YES');
		$this->db->order_by('id', 'desc');
		$this->db->limit($limit, $ofset);
		$output = $this->db->get('topics');
		if($r = $output->result()){
			return $r;
		}
	}

	public function user_topics($id){
		$this->db->where('id', $id);
		$output = $this->db->get('topics');
		if($r = $output->result()){
			foreach($r as $rr){
				return $rr;
			}
		}
	}

	public function topics_id($url){
		$output = $this->db->get_where('topics', array('url'=>$url));
		if($r = $output->result()){
			foreach($r as $rr){
				return $rr->id;
			}
		}
	}

	public function url_check($url){
		$output = $this->db->get_where('topics', array('url' => $url));
		if($r = $output->result()){
			return 'YES';
		}
	  }

	  public function search_topic($keyword){
		$this->db->like('title', $keyword);
		$output = $this->db->get('topics');
		if($eq = $output->result()){
				return $eq;
		}
	}

	//Update Post & URL etc..
	public function update_topics($data, $id){
		$this->db->where('id', $id);
		$this->db->update('topics', $data);
	}

	public function update_url($id, $url){
		$this->db->where('id', $id);
		$this->db->update('topics', array('url'=>$url));
	}
}
?>
