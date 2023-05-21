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

        // var_dump($data);
        // die();
		getMainContent('pages/admin/event/edit', $data);
    }

    public function update($id)
    {
        $data = array();
        $data = $_POST;
        
        if($data['event_result'] != 0){
            $data['status'] = 2;
        }
        
        $result = $this->events_model->update($data, $id);
        if($result){
            
            if($data['event_result'] == 1){
                $point = $this->events_model->getEvent(array('id'=>$id))->event_point;
                
                $bets = $this->bets_model->getBet(array('event_id'=>$id));
                foreach ($bets as $bet) {
                    $user_point = $this->users_model->getUser(array('id'=>$bet->user_id))->point;
                    $this->users_model->update(array('point'=>$user_point+$point), $bet->user_id);
                }
            }

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
