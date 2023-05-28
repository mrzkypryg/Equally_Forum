<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_admin');
        $this->page_detail = $this->model_admin->single_admin();
    }

    public function index()
    {
        $this->vue = array('vue/admin_vue.js');
        $data['main_content'] = 'admin/dashboard/index';
        $this->load->view('admin/template', $data);
    }

    public function category()
    {
        $this->vue = array('vue/admin_category_vue.js');
        $data['main_content'] = 'admin/posts_category/index';
        $this->load->view('admin/template', $data);
    }

    public function list_posts()
    {
        $this->vue = array('vue/admin_posts_vue.js');
        $data['main_content'] = 'admin/forum_posts/index';
        $this->load->view('admin/template', $data);
    }

    public function list_users()
    {
        $this->vue = array('vue/admin_users_vue.js');
        $data['main_content'] = 'admin/list_users/index';
        $this->load->view('admin/template', $data);
    }

    public function removed_users()
    {
        $this->vue = array('vue/removed_users_vue.js');
        $data['main_content'] = 'admin/removed/removed_users';
        $this->load->view('admin/template', $data);
    }

    public function removed_posts()
    {
        $this->vue = array('vue/removed_post_vue.js');
        $data['main_content'] = 'admin/removed/removed_posts';
        $this->load->view('admin/template', $data);
    }

    public function admin_settings()
    {
        $this->vue = array('vue/admin_settings_vue.js');
        $data['main_content'] = 'admin/settings/index';
        $this->load->view('admin/template', $data);
    }

    public function password_setings()
    {
        $this->vue = array('vue/admin_settings_vue.js');
        $data['main_content'] = 'admin/settings/password_setings';
        $this->load->view('admin/template', $data);
    }

    public function login($err = 0)
    {
        $this->err = $err;
        $this->load->view('admin/page_login');
    }

    public function log_out()
    {
        $this->session->sess_destroy();
        header('Location:' . base_url() . 'admin');
    }

    public function logincheck()
    {
        $this->load->model('model_admin');
        $name = $this->input->post('name');
        $pswd = $this->input->post('password');
        $this->load->library('encryption');
        $rr = $this->model_admin->checkLogin($name);
        if ($rr == 'err') {
            header('location:' . base_url() . 'admin/login/err');
        } else {
            $dec = $this->encryption->decrypt($rr->pswd);
            if ($pswd == $dec) {
                $this->session->set_userdata('admin', $rr->id);
                header('location:' . base_url() . 'admin');
            } else {
                header('location:' . base_url() . 'admin/login/err');
            }
        }
    }

    public function changePassword()
    {
        $this->load->model('model_admin');
		$this->load->library('encryption');
		$obj = json_decode(file_get_contents('php://input', true));
		$new_password = $obj->pswd;
		$old_password = $obj->old;
        $output = $this->model_admin->admin_pswd();
		$decrypt = $this->encryption->decrypt($output->password);
		if($decrypt == $old_password){
            $arr['password'] = $this->encryption->encrypt($new_pswd);
            $this->model_admin->updatePassword($arr);
			echo 'success';
		}else{
			echo 'error';
		}
    }

    public function change_password_val()
    {
        $new_pswd = $this->input->post(password);
        $this->load->model('model_admin');
        $this->load->library('encryption');
        $arr[password] = $this->encryption->encrypt($new_pswd);
        $auth = $this->session->userdata('auth');
        if ($auth == 5) {
            $this->model_admin->updatePassword($arr);
            header('Location:' . base_url() . 'admin/login');
        } else {
            header('Location:' . base_url() . '404');
        }
    }

    public function getPassword()
    {
        $arr = array();
        $this->load->library('encryption');
        $this->load->model('model_admin');
        $admin_id = $this->session->userdata('admin');
        $output = $this->model_admin->single_admin($admin_id);
        if (!empty($output)) {
            $arr['id'] = $output->id;
            $arr['username'] = $output->username;
            if (!empty($output->pswd)) {
                $dec = $this->encryption->decrypt($output->pswd);
                $arr[password] = $dec;
            } else {
                $arr[password] = '';
            }
            echo json_encode($arr);
        }
    }

    public function getSingle()
    {
        $arr = array();
        $this->load->model('model_admin');
        $uid = $this->session->userdata('uid');
        $output = $this->model_admin->single_users($uid);
        if (!empty($output)) {
            $arr['id'] = $output->id;
            $arr['name'] = $output->name;
            $arr['mobile'] = $output->mobile;
            $arr['email'] = $output->email;
            $arr['role'] = $output->role;
            $arr['address'] = $output->address;
            echo json_encode($arr);
        }
    }
    
    public function updatedetails()
    {
        $admin = $this->session->userdata('admin');
        $arr = array();
        $arr['name'] = $this->input->post('app-name');
        $arr['nick_admin'] = $this->input->post('app-title');
        $arr['email'] = $this->input->post('email-address');
        $arr['mobile_no'] = $this->input->post('mobile-no');
        $this->load->model('model_admin');
        $this->model_admin->update_admin($arr, $admin);
        header('location:' . base_url() . 'admin/admin_settings');
    }
}
