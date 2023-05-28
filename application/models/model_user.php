<?php
class Model_user extends CI_Model{
    public function __construct(){
		parent::__construct();
	}

	public function add_new_user($arr){
		$this->db->insert('users', $arr);
		return $this->db->insert_id();
	}

	public function update_all_user($arr, $id){
		$this->db->where('id', $id);
		$this->db->update('users', $arr);
	}

	public function update_url($id, $url){
		$this->db->where('id', $id);
		$this->db->update('users', array('url'=>$url));
	}

	public function remove_user($id){
		$this->db->where('id', $id);
		$this->db->update('users', array('active'=>'NO'));
	}

	public function restore_user($id){
		$this->db->where('id', $id);
		$this->db->update('users', array('active'=>'YES'));
	}

	public function get_users(){
		$this->db->where('active', 'YES');
		$output = $this->db->get('users');
		if($outp = $output->result()){
			return $outp;
		}
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

	public function check_profile_picture($logo){
        if(!empty($logo)){
            if(file_exists('upload/users/'.$logo)){
                    return  $logo;
            }else{ return  'dummy.png'; }
        }else{ return "dummy.png"; }
	}
	
	public function delete_users($id){
		$this->db->where('id', $id);
		$this->db->delete('users');
	}

	public function login_check($email, $activaton){
		if($activaton == 1){
			$output = $this->db->get_where('users', array('email_address' => $email,'verify'=>1));
		}else{
			$output = $this->db->get_where('users', array('email_address' => $email));
		}
		
		if($outp = $output->result()){
			foreach($outp as $op){
				return $op;
			}
		}else{
			return 'err';
		}
	}
	
	public function get_removed_users(){
		$this->db->where('active', 'NO');
		$output = $this->db->get('users');
		if($outp = $output->result()){
			return $outp;
		}
	}

	public function get_my_post($uid, $limit){
		$this->db->limit($limit);
		$this->db->order_by('id', 'desc');
		$output = $this->db->get_where('posts', array('user_ref' => $uid,'active'=>'YES'));
		if($outp = $output->result()){
			return $outp;
		}
	}
	public function get_my_reply($uid, $limit){
		$this->db->limit($limit);
		$this->db->order_by('id', 'desc');
		$output = $this->db->get_where('reply', array('user_ref' => $uid));
		if($outp = $output->result()){
			return $outp;
		}
	}
	public function get_my_log($uid){
		$output = $this->db->get_where('visitors', array('visitor' => $uid));
		if($outp = $output->result()){
			return $outp;
		}
	}
	public function get_my_like($uid){
		$output = $this->db->get_where('reply_like', array('user_ref' => $uid));
		if($outp = $output->result()){
			return $outp;
		}
	}
	public function my_post_count($id){
		$output = $this->db->get_where('posts', array('user_ref'=>$id))->num_rows();
		return $output;
	}
	public function my_reply_count($id){
		$output = $this->db->get_where('reply', array('user_ref'=>$id))->num_rows();
		return $output;
	}
	public function my_like_count($id){
		$output = $this->db->get_where('reply_like', array('user_ref'=>$id))->num_rows();
		return $output;
	}
	public function get_id_by_url($url){
		$arr = array();
		$output = $this->db->get_where('users', array('url' => $url));
		if($outp = $output->result()){
			foreach($outp as $op){
				$arr['id'] = $op->id;
				$arr['name'] = $op->name;
				$arr['email_address'] = $op->email_address;
				$arr['nickname'] = $op->designation;
				$arr['image'] = $this->check_profile_picture($op->image);
			}
		}	
		return $arr;	
	}
	public function url_check($url){
		$output = $this->db->get_where('users', array('url' => $url));
		if($outp = $output->result()){
			return 'YES';
		}
	}
  	public function is_exist($email){
  		$output = $this->db->get_where('users', array('email_address' => $email,'verify'=>1));
  		if($outp = $output->result()){
  			return 'yes';
  		}else{
  			return 'no';
  		}
  	}
}
?>
