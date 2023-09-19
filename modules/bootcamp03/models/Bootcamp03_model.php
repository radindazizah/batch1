<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bootcamp03_model extends CI_Model
{
    public function getKaryawan()
    {
        $userid = $this->input->get_post('id', true);
        $result = $this->db->get_where('karyawan', array('created_by' => $userid))->result_array();

        return json_encode($result);
    }

    public function addKaryawan()
    {
        $nik = $this->input->get_post('nik');
        $nama = $this->input->get_post('nama');
        $tempat_lahir = $this->input->get_post('tempat_lahir');
        $tanggal_lahir = $this->input->get_post('tanggal_lahir');
        $alamat = $this->input->get_post('alamat');
        $telp = $this->input->get_post('telp');
        $jabatan = $this->input->get_post('jabatan');
        $created_by = $this->input->get_post('id');
        $created_time = date("Y-m-d h:i:s");

        // mendapatkan usia karyawan berdasarkan interval tanggal lahir dan current date
        $birth_date = date_create($tanggal_lahir);
        $current_date = date_create(date("Y-m-d"));
        $interval = date_diff($birth_date, $current_date);
        $umur = $interval->format('%y'); // value usia

        $data = array(
            'nik' => $nik,
            'nama' => $nama,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'umur' => $umur,
            'alamat' => $alamat,
            'telp' => $telp,
            'jabatan' => $jabatan,
            'created_by' => $created_by,
            'created_time' => $created_time,
        );

        return $this->db->insert('karyawan', $data);
    }
}
