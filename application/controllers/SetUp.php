<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SetUp extends CI_Controller {

	
	public function index()
	{       
		$this->load->view('Templates/stylesheets');
                $this->load->view('Templates/navigation');
                $this->load->view('SetUp/content');
                $this->load->view('Templates/scripts');
	}
}
