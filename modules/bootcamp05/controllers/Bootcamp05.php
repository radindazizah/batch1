<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootcamp05 extends CI_Controller {

	function __construct() 
	{
		parent::__construct($securePage=false);
		$this->load->model('Bootcamp05_model');
		
		
	}

	public function index()
	{
		$data['user']=$this->input->get_post('id');

		$this->load->view('Bootcamp05_view',$data);
		
	}

	public function getListData(){
		$data = $this->Bootcamp05_model->getListData();
		echo $data;
	}
	
	public function AddData(){
		$this->Bootcamp05_model->save();
		redirect('Bootcamp05/?id=bagas');
	}
	
}