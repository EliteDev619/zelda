<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data = array();
        $data['link'] = 'home';

		$data['events'] = $this->events_model->getEvent();
		// var_dump(date('m-d-Y'));
		// var_dump(date("h:i:sa"));
		// var_dump(time());
		// echo '----------------';
		// echo $data['events'][0]->event_deadline;
		// var_dump(strtotime($data['events'][0]->event_deadline));
		// die();
        $data['server_time'] = time();
		getMainContent('pages/dashboard', $data);
	}
}
