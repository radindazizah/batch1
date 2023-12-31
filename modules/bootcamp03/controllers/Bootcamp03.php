<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bootcamp03 extends CI_Controller
{
	function __construct()
	{
		parent::__construct($securePage = false);
		$this->load->model('Bootcamp03_model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$data['user'] = $this->input->get_post('id');
		$data['karyawan'] = $this->Bootcamp03_model->getKaryawan();


		$this->session->set_userdata('user_session', $data['user']);
		$this->load->view('Bootcamp03_view', $data);
	}

	public function getKaryawan()
	{
		$data = $this->Bootcamp03_model->getKaryawan();
		echo $data;
	}

	public function addKaryawan()
	{
		$data['user'] = $this->session->userdata('user_session');

		// form validation
		$rules = $this->Bootcamp03_model->rules();
		$this->form_validation->set_rules($rules);

		// changing delimiters globally for adding styles
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Bootcamp03_view', $data);
		} else {
			echo $this->Bootcamp03_model->addKaryawan();
		}
	}

	public function nikCheck()
	{
		echo $this->Bootcamp03_model->nikCheck();
	}

	public function editKaryawan($nik) {
		echo $this->Bootcamp03_model->editKaryawan($nik);
	}

	public function saveKaryawan() {

		echo $this->Bootcamp03_model->saveKaryawan();
	}

	public function delKaryawan($nik)
	{
		$where = array('nik' => $nik);
		echo $this->Bootcamp03_model->delKaryawan($where);
	}
}
