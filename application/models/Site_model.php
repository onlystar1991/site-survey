<?php

class Site_model extends CI_Model {
	
	public function check_site_user($user, $site){
		
		$this->db->where("su_userid", $user);
		$this->db->where("su_siteid", $site);
		$this->db->join("sites", "su_siteid = si_siteid");
		$result = $this->db->get("site_user");
		if($result->num_rows()){
			return $result->row();
		} else {
			redirect("dashboard");
		}
	}
	

}