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
		$data['user']=$this->Bootcamp08_model->tampil_data()->result();
		$data['user']=$this->input->get_post('id');

		$this->load->view('Bootcamp08_view',$data);
		
	}

	function tambah(){
		$this->load->view('Bootcamp08_view');
	}
	
	function tambah_aksi (){
		$this->Bootcamp08_model->input_data();
		redirect('Bootcamp08/index');
	}

	public function getListData(){
		$data = $this->Bootcamp08_model->getListData();
		echo $data;
	}
}