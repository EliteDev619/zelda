<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
        appLoginCheck(TRUE);
		$data = array();
        $data['link'] = 'profile';
		getMainContent('pages/profile', $data);
	}
}
