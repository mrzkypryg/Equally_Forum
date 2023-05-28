<?php
class Model_notification extends CI_Model{
    
	//User 
	public function add_notification($arr){
		$this->db->insert('notification', $arr);
		$this->db->insert_id();
	}

	public function remove_notification($id){
		$this->db->where('id', $id);
		$this->db->update('notification', array('active'=>'NO'));
	}

	public function get_notification($uid){
		$this->db->where('active', 'YES');
		$this->db->where('user_ref', $uid);
		$output = $this->db->get('notification');
		if($outp = $output->result()){
			return $outp;
		}
	}

	//Admin
	public function add_admin_notification($arr){
		$this->db->insert('admin_notification', $arr);
		$this->db->insert_id();
	}

	public function remove_admin_notification($id){
		$this->db->where('id', $id);
		$this->db->delete('admin_notification');
	}

	public function get_admin_notification(){
		$this->db->where('active', 'YES');
		$output = $this->db->get('admin_notification');
		if($outp = $output->result()){
			return $outp;
		}
	}
	public function clear_all_notiy($uid){
		$this->db->where('user_ref', $uid);
		$this->db->delete('notification');
	}
 	
}
?>