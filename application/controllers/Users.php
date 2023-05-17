<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
        appLoginCheck(TRUE);
		$data = array();
		getMainContent('pages/profile', $data);
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
}
