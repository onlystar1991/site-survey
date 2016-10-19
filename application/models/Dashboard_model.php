<?php

class Dashboard_model extends CI_Model {
	

	
	public function get_sites($user){
		
		
		$this->db->where("su_userid", $user);
		$this->db->join("sites","su_siteid = si_siteid");
		$result = $this->db->get("site_user");

		if($result->num_rows() > 1){
			return $result->result();
		} elseif($result->num_rows() == 1){
			$row = $result->row();
			redirect("site/".$row->si_siteid);
			die;
		} else {
			redirect("dashboard/add_site");
			die;
		}
		
	}
	
	public function count_links($siteid) {
		
		$this->db->where("sl_siteid", $siteid);
		$result = $this->db->get("site_link");
		
		return $result->num_rows();
	}
	
	public function count_domains($siteid) {
		$this->db->where("sl_siteid", $siteid);
		$this->db->join("links", "sl_linkid = li_id");
		$this->db->group_by("li_tld");
		$result = $this->db->get("site_link");
		
		return $result->num_rows();
	}
}