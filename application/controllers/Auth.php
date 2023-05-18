<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
        appLoginCheck(FALSE);
        $data = array();
        $data['link'] = 'auth';
		getMainContent('pages/auth', $data);
	}

    public function login()
    {
        $data = array();
        $data['username'] = $_POST['username'];
        $data['password'] = md5($_POST['password']);

        $check_username = $this->users_model->getUser(array("username"=>$data['username']));
        if($check_username){
            $result = $this->users_model->getUser($data);
            if(count($result) > 0){
                $this->session->zelda_user_data = $result[0];
                $this->session->zelda_user_id = $result[0]->user_id;

                if($result[0]->role_id == 1){
                    redirect(base_url('admin'));
                } else {
                    redirect(base_url(''));
                }
            } else {
                _alertPopup('Auth info is incorrect.', 'error');
                redirect(base_url('auth'));
            }
        } else {
            _alertPopup('Account is not exist.', 'error');
            redirect(base_url('auth'));
        }
    }

    public function register()
    {
        $data = array();
        $data['username'] = $_POST['username'];
        $data['email'] = $_POST['email'];
        $data['password'] = md5($_POST['password']);
        $data['pwd_plain'] = $_POST['password'];

        $check_username = $this->users_model->getUser(array("username"=>$data['username']));
        if(!$check_username){
            $result = $this->users_model->save($data);
            if($result){
                _alertPopup('Your account created successfully.', 'success');
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

    public function logout(){
        appLogout();
    }
}
