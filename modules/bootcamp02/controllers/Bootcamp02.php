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
		$user = $this->input->get_post('id');

		// if ($user === 'nico') {
		// 	$data['karyawan'] = $this->Bootcamp02_model->getListData();
		// } else {
		// 	$data['karyawan'] = array();
		// }

		$data['user'] = $user;

		$this->load->view('Bootcamp02_view', $data);
	}

	public function getKaryawan()
	{
		$data = $this->Bootcamp02_model->getListData();
		echo $data;
	}
}
