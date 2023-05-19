<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function index()
	{
        appLoginCheck(TRUE);
        appAdminCheck(TRUE);

		$data = array();
        $data['link'] = 'admin';

		$data['events'] = $this->events_model->getEvent();
        getMainContent('pages/admin/event/index', $data);
	}

    public function add(){
        appLoginCheck(TRUE);
        appAdminCheck(TRUE);

		getMainContent('pages/admin/event/add', []);
    }

    public function save()
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

    public function edit($id){
        appLoginCheck(TRUE);
        appAdminCheck(TRUE);
        
		$data = array();
		$data['event'] = $this->events_model->getEvent(array('id'=>$id));

		getMainContent('pages/admin/event/edit', $data);
    }

    public function update($id)
    {
        $data = array();
        $data = $_POST;
        
        $result = $this->events_model->update($data, $id);
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
