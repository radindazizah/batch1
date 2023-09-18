<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootcamp04 extends CI_Controller {

	function __construct() 
	{
		parent::__construct($securePage=false);
		$this->load->model('Bootcamp04_model');
		
		
	}

	public function index() {
        // Get user ID from the request
        $user_id = $this->input->get_post('id');

        // Prepare data for the view
        $data['user'] = $user_id;

        // Load the view
        $this->load->view('Bootcamp04_view', $data);
    }

	public function getListData(){
		$data = $this->Bootcamp04_model->getListData();
		echo $data;
		
	}
	
	
}