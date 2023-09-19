<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bootcamp03_model extends CI_Model
{
    public function getKaryawan()
    {
        $userid = $this->input->get_post('id', true);
        $result = $this->db->get_where('karyawan', array('created_by' => $userid))->result_array();

        return json_encode($result);
    }
}
