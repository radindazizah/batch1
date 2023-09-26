<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootcamp09 extends CI_Controller {

	function __construct() 
	{
		parent::__construct($securePage=false);
		$this->load->model('Bootcamp09_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		
	}

	public function index()
	{
		$data['user']=$this->input->get_post('id');

		$this->load->view('Bootcamp09_view',$data);
		
	}
	
	public function tambah_Karyawan()
	{
		if ($this->input->post('submit')==true) {
		$data = $this->Bootcamp09_model->tambah_Karyawan();
		echo $data;
		}
	}

	public function tambah_User()
	{
		if ($this->input->post('submitUser')==true) {
		$data = $this->Bootcamp09_model->tambah_User();
		echo $data;
		}
	}

	public function getListData(){
		
		$data = $this->Bootcamp09_model->getListData();
		echo $data;
	}
	
	public function ajaxform()
	{
		$data['user']=$this->input->get_post('id');
		$this->load->view('Ajaxform_view',$data);
		
	}
	
	function checkdata(){
		echo $this->Bootcamp09_model->checkdata();
	}
}