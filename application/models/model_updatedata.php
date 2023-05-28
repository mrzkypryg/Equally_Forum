<?php
class Model_updatedata extends CI_Model{
    public function __construct(){
		parent::__construct();
	}

	public function get_total_user(){
		$output = $this->db->get('users')->num_rows();
		return $output;
	}

	public function get_total_category(){
		$output = $this->db->get('category')->num_rows();
		return $output;
	}

	public function get_total_post(){
		$this->db->where('active', 'YES');
		$output = $this->db->get('posts')->num_rows();
		return $output;
	}

	public function get_total_post_bu_category($cid){
		$this->db->where('cat_ref', $cid);
		$this->db->where('active', 'YES');
		$output = $this->db->get('posts')->num_rows();
		return $output;
	}

	public function get_latest_post(){
		$this->db->where('active', 'YES');
		$this->db->limit(5);
		$output = $this->db->get('posts');
		if($outp = $output->result()){
			return $outp;
		}
	}

	public function get_total_replies(){
		$this->db->where('active', 'YES');
		$output = $this->db->get('reply')->num_rows();
		return $output;
	}

	public function get_date_post($dat){
		$stdat = $dat.' 00:00:00';
		$endat = $dat.' 23:59:59';
		$this->db->where('created_on >=', $stdat);
		$this->db->where('created_on <=', $endat);
		return $this->db->get('posts')->num_rows();
	}
}
?>