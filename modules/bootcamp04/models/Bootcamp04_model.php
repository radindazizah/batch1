<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootcamp04_model extends CI_Model 
{
    public function rules()
    {
        return [
            ['field' => 'nik', 'label' => 'Nik', 'rules' => 'required|max_length[36]'],
            ['field' => 'nama', 'label' => 'Nama', 'rules' => 'required|max_length[100]'],
            ['field' => 'tempat_lahir', 'label' => 'Tempat Lahir', 'rules' => 'required'],
            ['field' => 'tanggal_lahir', 'label' => 'Tanggal Lahir', 'rules' => 'required'],
            ['field' => 'alamat', 'label' => 'Alamat', 'rules' => 'required|max_length[100]'],
            ['field' => 'telp', 'label' => 'Telp', 'rules' => 'required|max_length[15]'],
            ['field' => 'jabatan', 'label' => 'Jabatan', 'rules' => 'required'],
        ];
    }
    
    public function getListData()
    {
        $userId = $this->input->get_post('id', true);
        $result = $this->db->get_where('karyawan', ['created_by' => $userId])->result_array();

        return json_encode($result);
    }
    
    public function addKaryawan()
    {
        // Collect input data
        $nik = $this->input->get_post('nik');
        $nama = $this->input->get_post('nama');
        $tempat_lahir = $this->input->get_post('tempat_lahir');
        $tanggal_lahir = $this->input->get_post('tanggal_lahir');
        $alamat = $this->input->get_post('alamat');
        $telp = $this->input->get_post('telp');
        $jabatan = $this->input->get_post('jabatan');
        $user = $this->input->get_post('id');
        
        // Calculate employee's age
        $birthDate = date_create($tanggal_lahir);
        $currentDate = date_create(date("Y-m-d"));
        $interval = date_diff($birthDate, $currentDate);
        $umur = $interval->format('%y'); // Age value
        
        // Prepare data for insertion
        $data = [
            'nik' => $nik,
            'nama' => $nama,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'umur' => $umur,
            'alamat' => $alamat,
            'telp' => $telp,
            'jabatan' => $jabatan,
            'created_by' => $user,
            'created_time' => date("Y-m-d H:i:s"), // Use 'H' for 24-hour format
        ];
    
        // Insert data into the 'karyawan' table with error handling
        try {
            $this->db->insert('karyawan', $data);
            return true;
        } catch (Exception $e) {
            // Handle the error (log, return a message, etc.)
            return false;
        }
    }
   
}