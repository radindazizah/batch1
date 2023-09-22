<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bootcamp03_model extends CI_Model
{
    public function rules()
    {
        return [
            [
                'field' => 'nik',
                'label' => 'Nik',
                'rules' => 'required|max_length[36]'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|max_length[100]'
            ],
            [
                'field' => 'tempat_lahir',
                'label' => 'Tempat Lahir',
                'rules' => 'required'
            ],
            [
                'field' => 'tanggal_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'required'
            ],
            [
                'field' => 'alamat',
                'label' => 'alamat',
                'rules' => 'required|max_length[100]'
            ],
            [
                'field' => 'telp',
                'label' => 'telp',
                'rules' => 'required|max_length[15]'
            ],
            [
                'field' => 'jabatan',
                'label' => 'jabatan',
                'rules' => 'required'
            ],
        ];
    }

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
        $user = $this->input->get_post('id');
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
            'created_by' => $user,
            'created_time' => $created_time,
        );
        
        $query = $this->db->get_where('karyawan', array('nik' => $data['nik']));

        if ($query->num_rows() > 0) {
            echo "<script> alert('NIK SUDAH DIGUNAKAN'); </script>";
            redirect(base_url() . 'index.php/bootcamp03/?id=' . $data['created_by']);
        } else {
            return $this->db->insert('karyawan', $data);
        }
    }

    public function nikCheck() {
        $nik = $this->input->get_post('nik');
        $query = $this->db->get_where('karyawan', array('nik' => $nik));
        
        if($query->num_rows()>0){
			$data=array('status'=>'success','message'=>'NIK ' .$nik. ' sudah tersedia / dipakai');
		}else{
			$data=array('status'=>'error','message'=>'NIK' .$nik. 'tidak ditemukan');
		}

        return json_encode($data);
    }

    public function editKaryawan($nik) {
        $this->db->where('nik', $nik);
        $query = $this->db->get('karyawan');

        if($query->num_rows()>0){
			$val=array();
			foreach($query->result_array() as $row){
				$val[]=$row;
			}
			$data=array('status'=>'success','message'=>'data sudah tersedia','data'=>$val);
		}else{
			$data=array('status'=>'error','message'=>'data tidak ditemukan');
		}

        return json_encode($data);

        // if($query->num_rows()>0){
		// 	$data=array('status'=>'success','message'=>'Data ada dalam database', 'name' => $this->$query->name);
		// }else{
		// 	$data=array('status'=>'error','message'=>'Data tidak ditemukan dalam database');
		// }

        // if($query->num_rows()>0){
		// 	$data=array('status'=>'success','message'=>'Data ada dalam database', 'name' => $query->name);
		// }else{
		// 	$data=array('status'=>'error','message'=>'Data tidak ditemukan dalam database');
		// }

        // if($query){
        //     $data['fname'] = $result->first_name;
        //     $data['lname'] = $result->last_name;
        //     $this->load->view('members', $data);
        // }
    }

    public function delKaryawan($where)
    {
        $this->db->delete('karyawan', $where);
    }
}
