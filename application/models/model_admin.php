<?php
class Model_admin extends CI_Model{

    public function __construct(){
		parent::__construct();
	}

 	public function add_admin($arr){
        $this->db->insert('admin', $arr);
        $this->db->insert_id();
    }

    public function update_admin($arr, $id){
        $this->db->where('id', $id);
        $this->db->update('admin', $arr);
    }

    public function remove_admin($id){
        $this->db->where('id', $id);
        $this->db->update('admin', array('active'=>'NO'));
    }

    public function get_admin(){
        $output = $this->db->get_where('admin', array('active'=>'YES'));
        if($outp = $output->result()){
            return $outp;
        }
    } 

    public function single_admin(){
      
        $output = $this->db->get('admin');
        $arr = array();
        if($outp = $output->result()){
            foreach($outp as $op){
               $arr['name'] = $op->name;
               $arr['nick_admin'] = $op->nick_admin;
               $arr['email'] = $op->email;
               $arr['mobile_no'] = $op->mobile_no;
               return $arr;
            }
        }
    }
    public function admin_pswd(){
        $output = $this->db->get('admin');
        $arr = array();
        if($outp = $output->result()){
            foreach($outp as $op){
              return $op;
            }
        }
    }

    public function usernameCheck($id, $name){
        $this->db->where('id !=', $id);
        $this->db->where('username', $name);
        $output = $this->db->get('admin');
         if($outp = $output->result()){
            return 'err';
         }else{
            return 'ok';
         }
    }

    public function updatePassword($arr){
        $this->db->update('admin', $arr);
    }

    public function checkLogin($name){
        $this->db->where('username', $name);
        $output = $this->db->get('admin');
         if($outp = $output->result()){
            foreach($outp as $op){
                return $op;
            }
         }else{
            return 'err';
         }
    }
}
?>