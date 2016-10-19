<?php

class General_model extends CI_Model {
	

	
	public function add_user($data) {
		$this->db->insert('users', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;		
	}
	
	public function user_id(){
		
		$this->db->where("us_username", $this->session->userdata("username"));
		$this->db->where("us_email", $this->session->userdata("email"));
		$this->db->where("us_password", $this->session->userdata("password"));
		$result = $this->db->get("users");
		if($result->num_rows()){
			return $result->row();
		} else {
			return FALSE;
		}
	}
	
	public function log_in($email, $password){
		

		$this->db->where("us_email", $email);
		$this->db->where("us_password", $password);
		$result = $this->db->get("users");
		if($result->num_rows()){
			return $result->row();
		} else {
			return FALSE;
		}
	}
	
	public function add_site($user){
		
		$site = array("si_site" => $this->input->post('site'));
		$this->db->insert("sites", $site);
		$siteid = $this->db->insert_id();
		
		$su = array("su_siteid" => $siteid, "su_userid" => $user);
		$this->db->insert("site_user", $su);
		
		return $siteid;
		
		
	}
}