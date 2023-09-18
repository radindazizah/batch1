<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bootcamp03_model extends CI_Model
{
    public function getKaryawan()
    {
        return $this->db->get('karyawan')->result_array();
    }
}
