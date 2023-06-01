<?php
class Model_user extends CI_Model{
    public function __construct(){
		parent::__construct();
	}

	public function sign_up($data){
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}

	public function update_all_user($data, $id){
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}

	public function update_url($id, $url){
		$this->db->where('id', $id);
		$this->db->update('users', array('url'=>$url));
	}

	public function check_email($table,$where){
		return $this->db->get_where($table,$where);
	}

	public function single_user($id){
		$this->db->where('id', $id);
		$output = $this->db->get('users');
		if($outp = $output->result()){
			foreach($outp as $op){
				return $op;
			}
		}
	}
	
	public function delete_users($id){
		$this->db->where('id', $id);
		$this->db->delete('users');
	}

	public function login_validation($email){
		$output = $this->db->get_where('users', array('email_address' => $email));
		if($outp = $output->result()){
			foreach($outp as $op){
				return $op;
			}
		}else{
			return 'err';
		}
	}

	public function url_check($url){
		$output = $this->db->get_where('users', array('url' => $url));
		if($outp = $output->result()){
			return 'YES';
		}
	}
}
?>
