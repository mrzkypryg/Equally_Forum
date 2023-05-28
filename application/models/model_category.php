<?php
class Model_category extends CI_Model{
    public function __construct(){
		parent::__construct();
	}


	public function add_category($arr){
		$this->db->insert('category', $arr);
		return $this->db->insert_id();
	}

	public function update_category($arr, $id){
		$this->db->where('id', $id);
		$this->db->update('category', $arr);
	}

	public function remove_category($id){
		$this->db->where('id', $id);
		$this->db->update('category', array('active'=>'NO'));
	}

	public function get_category(){
		$this->db->where('active', 'YES');
		$output = $this->db->get('category');
		if($outp = $output->result()){
			return $outp;
		}
	}

	public function single_category($id){
		$this->db->where('id', $id);
		$output = $this->db->get('category');
		if($outp = $output->result()){
			foreach($outp as $op){
				return $op;
			}
		}
	}
	public function total_post_by_cat($cat_id){
		$this->db->where('active', 'YES');
   		$this->db->where('cat_ref', $cat_id);
		$output = $this->db->get('posts')->num_rows();
		return $output;
	}

	public function url_check($url){
		$output = $this->db->get_where('category', array('url' => $url));
		if($outp = $output->result()){
			return 'YES';
		}
	}

	public function update_url($id, $url){
		$this->db->where('id', $id);
		$this->db->update('category', array('url'=>$url));
	}
	
  	public function get_id_by_url($url){
		$output = $this->db->get_where('category', array('url'=>$url));
		if($outp = $output->result()){
			foreach($outp as $op){
			return $op;
			}
		}
	}
}
?>
