<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bootcamp02_model extends CI_Model
{
    public function getData()
    {
        return $this->db->get('karyawan')->result_array();
    }
}
