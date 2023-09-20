<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootcamp08 extends CI_Controller {

	function __construct() 
	{
		parent::__construct($securePage=false);
		$this->load->model('Bootcamp08_model');
		
		
	}

	public function index()
	{
		$data['user']=$this->input->get_post('id');

		$this->load->view('Bootcamp08_view',$data);
		
	}

	public function getListData(){
		$data = $this->Bootcamp08_model->getListData();
		echo $data;
	}
	
	
}