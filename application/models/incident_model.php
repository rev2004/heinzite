<?php
class Incident_model extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}

	function get_all_incidents(){
		$query=$this->db->get('incident_log_base');
		if($query->num_rows()>0){
			// return result set as an associative array
			return $query->result_array();
		}
	}
	function get_incidents_where($field,$param){
		$this->db->where($field,$param);
		$query=$this->db->get('incident_log_base');
		// return result set as an associative array
		return $query->result_array();
	}
	

	function get_num_incidents(){
		return $this->db->count_all('incident_log_base');
	}
	
	function get_last_ten_incidents()
	{
	  $query = $this->db->get('incident_log_base', 10);
	  return $query->result();
	}
}
?>