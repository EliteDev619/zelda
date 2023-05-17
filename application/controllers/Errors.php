<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $data = array();
        $this->load->view('errors/html/error_404');
    }
    
    public function error404() {
        $data = array();
        $this->load->view('errors/html/error_404');
    }
}