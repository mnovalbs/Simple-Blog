<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function index()
	{
		var_dump($this->data);
		$this->load->view('welcome_message');
	}

}
