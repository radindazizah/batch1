<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() 
	{
		parent::__construct($securePage=false);
	
		
		
	}

	public function index()
	{

		$this->load->view('Main_view');
		
	}

	
	
}