<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		

	}
	public function index()
	{
		
		$this->load->view('header2');
		$this->load->view('portfolio');
		$this->load->view('footer2');
	}
}
