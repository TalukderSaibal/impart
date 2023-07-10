<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{

	public $input,$product;

	public function __construct(){
		parent::__construct();
		$this->load->model('product');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function blog(){
		echo 'This is your first blog	';
	}
}
