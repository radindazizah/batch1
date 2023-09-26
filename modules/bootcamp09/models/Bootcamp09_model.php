<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bootcamp09_model extends CI_Model 
{

    function getListData(){
		
		$iDisplayStart = $this->input->get_post('page', true);
        $iDisplayLength = $this->input->get_post('rows', true);
        $iSortCol_0 = $this->input->get_post('sidx', true);
        $iSortingCols = $this->input->get_post('sord', true);
        $sSearch = $this->input->get_post('_search', true);
        $sEcho = $this->input->get_post('sEcho', true);
		
		$userid = $this->input->get_post('id', true);
		
		// Paging
		if(isset($iDisplayStart) && $iDisplayLength != '-1')
		{
			$this->db->limit($this->db->escape_str($iDisplayLength), ($this->db->escape_str($iDisplayStart)-1) * $this->db->escape_str($iDisplayLength));
		}
		
		if(isset($iSortCol_0))
		{
			$this->db->order_by($iSortCol_0, $iSortingCols);
		}	

		if ($sSearch == 'true')
		{
			$filter = $this->input->get_post('filters');
			$arr_filter = json_decode($filter);
            $ops = array(
            'eq'=>'=', //equal
            'ne'=>'<>',//not equal
            'lt'=>'<', //less than
            'le'=>'<=',//less than or equal
            'gt'=>'>', //greater than
            'ge'=>'>=',//greater than or equal
            'bw'=>'LIKE', //begins with
            'bn'=>'NOT LIKE', //doesn't begin with
            'in'=>'LIKE', //is in
            'ni'=>'NOT LIKE', //is not in
            'ew'=>'LIKE', //ends with
            'en'=>'NOT LIKE', //doesn't end with
            'cn'=>'LIKE', // contains
            'rn'=>'RANGE', // contains
            'nc'=>'NOT LIKE'  //doesn't contain
            );
			
			
			foreach($arr_filter->rules as $key){
				if($ops[$key->op] == "LIKE" || $ops[$key->op] == "NOT LIKE"){
					$this->db->where(($key->field=="group_name"?"b.name":"a.".$key->field).' '.$ops[$key->op].' "%'.$key->data.'%"');
				}else if($ops[$key->op] == "RANGE"){
					$date = $key->data;
					$arrDate = explode("-", $date);
					$this->db->where("date(b.created_time) >=", date("Y-m-d", strtotime(trim($arrDate[0]))));
					$this->db->where("date(b.created_time) <=", date("Y-m-d", strtotime(trim($arrDate[1]))));
				}else{
					$this->db->where($key->field.' '.$ops[$key->op].' "'.$key->data.'"');
				}
				
			}
        }
		
		$select = array('a.nik','a.nama','a.tempat_lahir','a.tanggal_lahir','a.umur','a.alamat','a.telp','a.jabatan','b.full_name',
						'a.created_time');
		$this->db->from('karyawan a');
		$this->db->join('user b','a.created_by=b.id');
		$this->db->where('a.created_by',$userid);	
				
		$this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $select)), false);
		
	    $rResult = $this->db->get();
        // Data set length after filtering
		
		//echo $this->db->last_query();
        $this->db->select('FOUND_ROWS() AS found_rows');
		
        $iFilteredTotal = $this->db->get()->row()->found_rows;
        // Total data set length	
		$iTotal = $rResult->num_rows();
        if( $iTotal > 0 ) {
            $total_pages = ceil($iFilteredTotal/$iDisplayLength);
        } else {
            $total_pages = 0;
        }
		
        // Output
		$output = array();

		$list = array();
        foreach($rResult->result_array() as $aRow)
        {
			$list[] = array(
						"id" => $aRow['nik'], 
						"cell" => $aRow
					);
        }		
        $output = array(
            'page' => $iDisplayStart,
            'total' => $total_pages,
            'rows' => $list,
			'records' => $iFilteredTotal
        );	
		
        echo json_encode($output); 
		
	}
	
	function tambah_Karyawan()
    {
        $data = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'umur' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
            'jabatan' => $this->input->post('jabatan'),
            'created_by' => $this->input->post('created_by'),
			'created_time' => $this->input->post('created_time'),
        );

        $this->db->insert('karyawan', $data);

		echo 'Data berhasil disimpan';
    }

	function tambah_User()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'namaUser' => $this->input->post('namaUser'),
        );

        $this->db->insert('user', $data);

		echo 'Data berhasil disimpan';
    }

	function checkdata(){
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->where('nik',$this->input->post('nik'));
		$result=$this->db->get();
		//echo $this->db->last_query();
		
		if($result->num_rows()>0){
			$val=array();
			foreach($result->result_array() as $row){
				$val[]=$row;
			}
			$data=array('status'=>'success','message'=>'data sudah tersedia','data'=>$val);
		}else{
			$data=array('status'=>'error','message'=>'data tidak ditemukan');
		}
		
		return json_encode($data);
	}


}	