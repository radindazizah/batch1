<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootcamp06 extends CI_Controller {

	function __construct() 
	{
		parent::__construct($securePage=false);
		$this->load->model('Bootcamp06_model');
		
		
	}

	public function index()
	{
		$data['user']=$this->input->get_post('id');

		$this->load->view('Bootcamp06_view',$data);
		
	}

	public function getListData(){
		$data = $this->Bootcamp06_model->getListData();
		echo $data;
	}
	
	
}