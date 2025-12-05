<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		

	}
	public function index()
	{
		
		$this->load->view('header2');
		$this->load->view('transfer');
		$this->load->view('footer2');
	}
}
