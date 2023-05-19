<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxCall extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function getEvent(){
        $condition['id'] = $this->input->post('id');
        $result = $this->events_model->getEvent($condition);
        if($result) {
            echo json_encode(array('success'=>true, 'data'=>$result));
        } else {
            echo json_encode(array('success'=>false));
        }
    }
}