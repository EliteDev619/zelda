<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data = array();
        $data['link'] = 'home';

		$data['events'] = $this->events_model->getEvent();
        $data['server_time'] = time();

		$data['betted_event'] = $this->getBettedEvent($this->bets_model->getEvents($this->session->zelda_user_id));

		getMainContent('pages/dashboard', $data);
	}

	public function add($event_id)
    {
        $data = array();
        $data['link'] = 'home';

        if(!$this->session->zelda_user_id){
            _alertPopup('Please login to bet.', 'info');
            redirect($_SERVER['HTTP_REFERER']);
        }

        if($this->session->zelda_user_data->freebet <= 0){
            _alertPopup('No enough freebet.', 'error');
            redirect($_SERVER['HTTP_REFERER']);
        }

		$user_id = $this->session->zelda_user_id;

		$save_data = array();
		$save_data['event_id'] = $event_id;
		$save_data['user_id'] = $user_id;
		$result = $this->bets_model->save($save_data);
		if($result){
			$user_data = $this->users_model->getUser(array('id'=>$user_id));
			$this->users_model->update(array('freebet'=>$user_data->freebet - 1),$user_id);
			
			_alertPopup('Bet successfully.', 'success');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			_alertPopup('Bet failed.', 'warning');
			redirect($_SERVER['HTTP_REFERER']);
		}
    }

	private function getBettedEvent($data){
		$return_data = array();
		foreach ($data as $key => $value) {
			array_push($return_data, $value->event_id);
		}

		return $return_data;
	}
}
