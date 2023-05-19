<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
        appLoginCheck(TRUE);
        appAdminCheck(TRUE);
        
		$data = array();
        $data['link'] = 'admin';

        $data['events'] = $this->events_model->getEvent();
        $data['users'] = $this->users_model->getUser();
        getMainContent('pages/event/index', $data);
	}
}
