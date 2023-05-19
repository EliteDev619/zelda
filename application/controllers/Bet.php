<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bet extends CI_Controller {

	public function index()
	{
		$data = array();
        $data['link'] = 'home';

        if(!$this->session->zelda_user_id){
            _alertPopup('Please login to bet.', 'warning');
            redirect($_SERVER['HTTP_REFERER']);
        }

        getMainContent('pages/admin/event/index', $data);
	}
}