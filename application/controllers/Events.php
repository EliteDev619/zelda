<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function index()
	{
        appLoginCheck(TRUE);
        appAdminCheck(TRUE);
		$data = array();
        $data['link'] = 'profile';

		$data['user'] = $this->users_model->getUser(array('id'=>$this->session->zelda_user_id));
		getMainContent('pages/profile', $data);
	}

    public function add()
    {
        $data = array();
        $data = $_POST;
        
        $result = $this->events_model->save($data);
        if($result){
            _alertPopup('Event created successfully.', 'success');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            _alertPopup('Creating event failed due to some issue.', 'warning');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function delete($id)
    {
        $result = $this->events_model->delete($id);
        if($result){
            _alertPopup('Event deleted successfully.', 'success');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            _alertPopup('Event deleted failed.', 'warning');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
