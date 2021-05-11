<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	 public function __construct() {
        parent::__construct();
        //$this->load->model('M_adminHome');
    }
    public function test(){
    	echo 'in controller';exit;
    }
}