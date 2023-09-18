<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootcamp04 extends CI_Controller {

	public function index()
	{
        $data['user']=$this->input->get_post('id');
        
		$this->load->view('Bootcamp04_view',$data);
	}
}