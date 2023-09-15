<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main_model extends CI_Model 
{

    function getRedy(){
		$this->db->select("*");
		$this->db->from("wa_bucket_history");
		$this->db->where("status","ready");
		$data_redy = $this->db->get()->num_rows();
        
        return $data_redy;
	}

	function getPending(){
		$this->db->select("*");
		$this->db->from("wa_bucket_history");
		$this->db->where("status","pending");
		$data_pending = $this->db->get()->num_rows();
        
        return $data_pending;
	}

	function getSent(){
		$this->db->select("*");
		$this->db->from("wa_bucket_history");
		$this->db->where("status","sent");
		$data_sent = $this->db->get()->num_rows();
        
        return $data_sent;
	}

	function getread(){
		$this->db->select("*");
		$this->db->from("wa_bucket_history");
		$this->db->where("status","read");
		$data_sent = $this->db->get()->num_rows();
        
        return $data_sent;
	}

	function getreject(){
		$this->db->select("*");
		$this->db->from("wa_bucket_history");
		$this->db->where("status","reject");
		$data_reject = $this->db->get()->num_rows();
        
        return $data_reject;
	
	}

	function addData()
	{
		$date_created = date('Y-m-d H:i:s');
		$user_id = $this->common->encrypt_decrypt('decrypt', $this->session->userdata('USER_ID'));
		$first_name = $this->input->post('first_name'); 
		$last_name = $this->input->post('last_name'); 
		$mobile_phone = $this->input->post('mobile_phone'); 
		$alternative_email = $this->input->post('alternative_email'); 
		$referral_code = $this->input->post('referral_code');
		$address = $this->input->post('address');

		if($referral_code == ''){
			$referral_code = NULL;
		}
		
		//UPDATE DATA PROFILE
		$data_profile = array(
			'email_address' => $alternative_email,
			'first_name' => $first_name,
			'last_name' => $last_name,
			'mobile_phone' => $mobile_phone,
			'referral_id' => $referral_code,
			'updated_time' => $date_created,
			'level_status' => 'VERIFICATION'
		);
		$this->db->where("id",$user_id);
		$this->db->update('user_profile', $data_profile);
		
		//ADD PROFILE DETAIL
		$grade = $this->input->post('grade');  
		$major = $this->input->post('major'); 
		$institution = $this->input->post('institution'); 

		$data_profile_detail = array(
			'id' => UUID(false),
			'user_id' => $user_id,
			'mailing_address' => $address,
			'edu_grade' => $grade,
			'edu_major' => $major,
			'edu_institution' => $institution,
			'created_time' => $date_created,
			'updated_time' => $date_created,
		);
		$this->db->insert('user_profile_detail', $data_profile_detail);

		// ADD USER SKILL
		$slider = $this->input->post('range_slider_201'); 
		$jml_skill = $this->input->post('jml_skill'); 
		$other_skill = $this->input->post('other_skill'); 

		for($i=1; $i<=$jml_skill; $i++){
			$skill_id = '20'.$i;
			$skill_point= $this->input->post('range_slider_'.$skill_id);
			$skill_desc= $this->input->post('skill_desc_'.$skill_id); 

			$data_profile_detail = array(
				'id' => UUID(false),
				'user_id' => $user_id,
				'skill_name' => $skill_desc,
				'skill_point' => $skill_point,
				'created_time' => $date_created,
				'updated_time' => $date_created,
			);
			$this->db->insert('user_skill', $data_profile_detail);
			
		}

		if($other_skill != "" || $other_skill != NULL){
			$data_profile_detail = array(
				'id' => UUID(false),
				'user_id' => $user_id,
				'skill_name' => "other",
				'skill_point' => $other_skill,
				'created_time' => $date_created,
				'updated_time' => $date_created,
			);
			$this->db->insert('user_skill', $data_profile_detail);
		}
		
		$data=array('token'=>$this->security->get_csrf_hash(),'status'=>true,'message'=>'berhasil','data'=>'');

		echo json_encode($data);
	}

	function addEmailOutBound()
	{
		$date_created = date('Y-m-d H:i:s');
		$user_id = $this->common->encrypt_decrypt('decrypt', $this->session->userdata('USER_ID'));
		// $email_address = $this->input->post('id-signup-email');
		$first_name = $this->input->post('first_name'); 
		$last_name = $this->input->post('last_name'); 
		$mobile_phone = $this->input->post('mobile_phone'); 
		$alternative_email = $this->input->post('alternative_email'); 
		$referral_code = $this->input->post('referral_code');
		$address = $this->input->post('address');

		$message = "";
		$message .= "<html>
						<body>
							<p>Hai ".$first_name." ".$last_name."!</p>
							<br>
							<p>Data anda sedang dilakukan validasi,</p>
							<p>Mohon cek email anda secara berkala.</p>
							<br>
							<p>Terimakasih,</p>
							<p>eCentrix Academy</p>
						<body> 
					</html>";

		//INSERT DATA EMAIL OUTBOUND a
		$data_e_out = array(
			'subject' => 'Hi '.$first_name." ".$last_name.'!',
			'to_address' => $user_id,
			// 'message' => 'Anda telah melakukkan registrasi silahkan klik link di bawah ini untuk login. '.site_url().'/register/?auth='.$this->common->encrypt_decrypt('encrypt', $email_address.'|'.$date_created),
			'message' => $message,
			'created_by' => $user_id,
			'created_time' => $date_created,
			'module' => 'NOREPLY'
		);
		$this->db->set('id', 'REPLACE(UUID(),"-","")', FALSE);
		$this->db->insert('email_outbound', $data_e_out);


		$data=array('token'=>$this->security->get_csrf_hash(),'status'=>true,'message'=>'berhasil','data'=>'');

		echo json_encode($data);
	}

	function uploadFile(){
		$user_id = $this->common->encrypt_decrypt('decrypt', $this->session->userdata('USER_ID'));
		$certificate_length = $this->input->post('length_myDropzone_certificate'); 

		$path = 'uploads/'.$user_id;   //2

		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}

		if (!empty($_FILES['myDropzone_ijazah'])) {
			
			$tempFile = $_FILES['myDropzone_ijazah']['tmp_name'];          //3             
				
			move_uploaded_file($_FILES["myDropzone_ijazah"]["tmp_name"], $path.'/'.$_FILES["myDropzone_ijazah"]["name"]);
				
			$data_profile = array(
				// 'id' => $user_id,
				'path_edu_certificate' =>$_FILES["myDropzone_ijazah"]["name"],
			);
			$this->db->where("user_id",$user_id);
			$this->db->update('user_profile_detail', $data_profile);
			
		}

		if (!empty($_FILES['myDropzone_transcript'])) {
			
			$tempFile = $_FILES['myDropzone_transcript']['tmp_name'];          //3             
				
			move_uploaded_file($_FILES["myDropzone_transcript"]["tmp_name"], $path.'/'.$_FILES["myDropzone_transcript"]["name"]);
				
			$data_profile = array(
				// 'id' => $user_id,
				'path_edu_transcript' =>$_FILES["myDropzone_transcript"]["name"],
			);
			$this->db->where("user_id",$user_id);
			$this->db->update('user_profile_detail', $data_profile);
			
		}

		if (!empty($_FILES['myDropzone_cv'])) {
			
			$tempFile = $_FILES['myDropzone_cv']['tmp_name'];          //3             
				
			move_uploaded_file($_FILES["myDropzone_cv"]["tmp_name"], $path.'/'.$_FILES["myDropzone_cv"]["name"]);
				
			$data_profile = array(
				// 'id' => $user_id,
				'path_cv' =>$_FILES["myDropzone_cv"]["name"],
			);
			$this->db->where("user_id",$user_id);
			$this->db->update('user_profile_detail', $data_profile);
			
		}

		for($i=0; $i<$certificate_length; $i++){
			if (!empty($_FILES['myDropzone_certificate_'.$i])) {
			
				$tempFile = $_FILES['myDropzone_certificate_'.$i]['tmp_name'];          //3             
					
				move_uploaded_file($_FILES['myDropzone_certificate_'.$i]["tmp_name"], $path.'/'.$_FILES['myDropzone_certificate_'.$i]["name"]);
					
				$data_profile = array(
					// 'id' => $user_id,
					'path_certificate'.($i+1) =>$_FILES['myDropzone_certificate_'.$i]["name"],
				);
				$this->db->where("user_id",$user_id);
				$this->db->update('user_profile_detail', $data_profile);
				
			}
		}

		$data=array('token'=>$this->security->get_csrf_hash(),'status'=>true,'message'=>'berhasil','data'=>'');

		echo json_encode($data);
	}


}	