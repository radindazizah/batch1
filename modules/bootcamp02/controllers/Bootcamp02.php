<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootcamp02 extends CI_Controller {

	// function __construct() 
	// {
	// 	parent::__construct($securePage=false);
	// 	$this->load->model('Bootcamp02_model');
		
		
	// }

	public function index()
	{
		$data['user']=$this->input->get_post('id');

		$this->load->view('Bootcamp02_view',$data);
		
	}

	// public function getListData(){
	// 	$data = $this->Bootcamp02_model->getListData();
	// 	echo $data;
	// }
	
	
}