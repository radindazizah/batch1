<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootcamp04_model extends CI_Model 
{
    public function getListData()
    {
        $iDisplayStart = $this->input->get_post('page', true);
        $iDisplayLength = $this->input->get_post('rows', true);
        $iSortCol_0 = $this->input->get_post('sidx', true);
        $iSortingCols = $this->input->get_post('sord', true);
        $sSearch = $this->input->get_post('_search', true);
        $sEcho = $this->input->get_post('sEcho', true);
        $userid = $this->input->get_post('id', true);

        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $this->db->limit($this->db->escape_str($iDisplayLength), ($this->db->escape_str($iDisplayStart) - 1) * $this->db->escape_str($iDisplayLength));
        }

        if (isset($iSortCol_0)) {
            $this->db->order_by($iSortCol_0, $iSortingCols);
        }	

        if ($sSearch == 'true') {
            $filter = $this->input->get_post('filters');
            $arr_filter = json_decode($filter);

            $ops = [
                'eq' => '=', 'ne' => '<>', 'lt' => '<', 'le' => '<=',
                'gt' => '>', 'ge' => '>=', 'bw' => 'LIKE', 'bn' => 'NOT LIKE',
                'in' => 'LIKE', 'ni' => 'NOT LIKE', 'ew' => 'LIKE', 'en' => 'NOT LIKE',
                'cn' => 'LIKE', 'rn' => 'RANGE', 'nc' => 'NOT LIKE'
            ];

            foreach ($arr_filter->rules as $key) {
                $field = $key->field == "group_name" ? "b.name" : "a." . $key->field;

                if (in_array($ops[$key->op], ['LIKE', 'NOT LIKE'])) {
                    $this->db->like($field, $key->data);
                } elseif ($ops[$key->op] == "RANGE") {
                    $date = $key->data;
                    $arrDate = explode("-", $date);
                    $this->db->where("date($field) >=", date("Y-m-d", strtotime(trim($arrDate[0]))));
                    $this->db->where("date($field) <=", date("Y-m-d", strtotime(trim($arrDate[1]))));
                } else {
                    $this->db->where("$field {$ops[$key->op]}", $key->data);
                }
            }
        }

        $select = [
            'a.nik', 'a.nama', 'a.tempat_lahir', 'a.tanggal_lahir', 'a.umur',
            'a.alamat', 'a.telp', 'a.jabatan', 'b.full_name', 'a.created_time'
        ];

        $this->db->from('karyawan a');
        $this->db->join('user b', 'a.created_by = b.id');
        $this->db->where('a.created_by', $userid);
        $this->db->select('SQL_CALC_FOUND_ROWS ' . implode(', ', $select), false);

        $rResult = $this->db->get();
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;
        $iTotal = $rResult->num_rows();

        $total_pages = ($iTotal > 0) ? ceil($iFilteredTotal / $iDisplayLength) : 0;

        $output = [
            'page' => $iDisplayStart,
            'total' => $total_pages,
            'records' => $iFilteredTotal,
            'rows' => []
        ];

        foreach ($rResult->result_array() as $aRow) {
            $output['rows'][] = [
                'id' => $aRow['nik'],
                'cell' => $aRow
            ];
        }

        echo json_encode($output);
    }
}
