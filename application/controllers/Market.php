<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Market extends CI_Controller {

	public function index()
	{
		$data = array();
        $data['link'] = 'market';

		getMainContent('pages/market', $data);
	}
}