<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bootcamp03 extends CI_Controller
{

	function __construct()
	{
		parent::__construct($securePage = false);
		$this->load->model('Bootcamp03_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['user'] = $this->input->get_post('id');
		$data['karyawan'] = $this->Bootcamp03_model->getKaryawan();

		$this->load->view('Bootcamp03_view', $data);
	}

	public function getKaryawan()
	{
		$data = $this->Bootcamp03_model->getKaryawan();
		echo $data;
	}

	public function addKaryawan()
	{
		$rules = $this->Bootcamp03_model->rules();
		$data = $this->Bootcamp03_model->addKaryawan();

		$this->form_validation->set_rules($rules);
		
		if ($this->form_validation->run() == FALSE) {
			echo "Form gagal";
			echo validation_errors();
		} else {
			redirect('bootcamp03/?id=' . $data['created_by']);
		}
	}
}
