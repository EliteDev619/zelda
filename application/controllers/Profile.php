<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
        appLoginCheck(TRUE);
		$data = array();
        $data['link'] = 'profile';

		$data['user'] = $this->users_model->getUser(array('id'=>$this->session->zelda_user_id));

		$last_freebet_update = new DateTime($data['user']->last_freebet_update);
		$today = new DateTime(date('Y-m-d'));
		$interval = $today->diff($last_freebet_update);

		if($interval->days > 0){
			$temp_data = array();
			$temp_data['last_freebet_update'] = date('Y-m-d');
			$temp_data['freebet'] = $data['user']->freebet + $interval->days;
			$this->users_model->update($temp_data, $this->session->zelda_user_id);
			$data['user']->freebet = $temp_data['freebet'];
		}
		
		getMainContent('pages/profile', $data);
	}
}
