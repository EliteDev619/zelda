<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
        appLoginCheck(TRUE);
        appAdminCheck(TRUE);

		$data = array();
        $data['link'] = 'admin';

        $data['users'] = $this->users_model->getUser();
        getMainContent('pages/admin/user/index', $data);
	}

    public function add(){

        appLoginCheck(TRUE);
        appAdminCheck(TRUE);

		getMainContent('pages/admin/user/add', []);
    }

    public function save()
    {
        $data = array();
        $data = $_POST;
        $data['password'] = md5($_POST['pwd_plain']);
        $data['last_freebet_update'] = date('Y-m-d');

        $check_username = $this->users_model->getUser(array("username"=>$data['username']));
        if(!$check_username){
            $result = $this->users_model->save($data);
            if($result){
                _alertPopup('Account created successfully.', 'success');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                _alertPopup('Register failed due to some issue.', 'warning');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            _alertPopup('Username already exist.', 'error');
            redirect($_SERVER['HTTP_REFERER']);
        }   

    }

    public function edit($id){
        appLoginCheck(TRUE);
        appAdminCheck(TRUE);

		$data = array();
		$data['user'] = $this->users_model->getUser(array('id'=>$id));

		getMainContent('pages/admin/user/edit', $data);
    }
    
    public function update($id)
    {
        $data = array();
        $data = $_POST;
        
        $result = $this->users_model->update($data, $id);
        if($result){
            _alertPopup('User updated successfully.', 'success');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            _alertPopup('Updating User failed due to some issue.', 'warning');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function updatePassword(){
        $data = array();
        $data = $_POST;

        $user_data = $this->session->zelda_user_data;
        
        if($data['c_pwd'] != $user_data->pwd_plain){
            _alertPopup('Current password is incorrect.', 'error');
            redirect(base_url('profile'));
        } else {
            $temp_data = array();
            $temp_data['password'] = md5($data['n_pwd']);
            $temp_data['pwd_plain'] = $data['n_pwd'];
            $user_id = $user_data->user_id;
            $result = $this->users_model->update($temp_data, $user_id);
            if($result){
                _alertPopup('Your account password updated successfully.', 'success');
                redirect(base_url('profile'));
            } else {
                _alertPopup('Updating failed due to some issue.', 'warning');
                redirect(base_url('profile'));
            }
        }
    }

    public function delete($id)
    {
        $result = $this->users_model->delete($id);
        if($result){
            _alertPopup('User deleted successfully.', 'success');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            _alertPopup('User deleted failed.', 'warning');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
