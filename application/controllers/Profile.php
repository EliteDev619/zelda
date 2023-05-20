<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
        appLoginCheck(TRUE);
		$data = array();
        $data['link'] = 'profile';

		$user_id = $this->session->zelda_user_id;
		$data['user'] = $this->users_model->getUser(array('id'=>$user_id));

		getMainContent('pages/profile', $data);
	}
}
