<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootcamp03 extends CI_Controller {

	// function __construct() 
	// {
	// 	parent::__construct($securePage=false);
	// 	$this->load->model('Bootcamp03_model');
		
		
	// }

	public function index()
	{
		$data['user']=$this->input->get_post('id');

		$this->load->view('Bootcamp03_view',$data);
		
	}

	// public function getListData(){
	// 	$data = $this->Bootcamp01_model->getListData();
	// 	echo $data;
	// }
	
	
}