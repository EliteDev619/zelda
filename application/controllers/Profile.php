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

		/////// get days from last update.
		$last_freebet_update = new DateTime($data['user']->last_freebet_update);
		$today = new DateTime(date('Y-m-d'));
		$interval = $today->diff($last_freebet_update);

		if($interval->days > 0){
			$temp_data = array();
			$temp_data['bet_on'] = $data['user']->last_freebet_update;
			$temp_data['user_id'] = $user_id;
			$is_used = $this->bets_model->getBet($temp_data);
			
			var_dump($is_used);
			die();

			$temp_data['last_freebet_update'] = date('Y-m-d');
			$temp_data['freebet'] = $data['user']->freebet + 1;
			$this->users_model->update($temp_data, $user_id);
			$data['user']->freebet = $temp_data['freebet'];
		}
		
		getMainContent('pages/profile', $data);
	}
}
