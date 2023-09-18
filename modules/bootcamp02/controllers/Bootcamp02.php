<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bootcamp02 extends CI_Controller
{

	function __construct()
	{
		parent::__construct($securePage = false);
		$this->load->model('Bootcamp02_model');
	}

	public function index()
	{
		$data['karyawan'] = $this->Bootcamp02_model->getData();
		$this->load->view('Bootcamp02_view', $data);
	}
}
