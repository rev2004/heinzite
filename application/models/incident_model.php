<?php
class Incident_model extends CI_Model{

	protected $table_name;
	
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'incident_log_base';
	}

	function add($data)
	{
		$this->db->insert($this->table_name, $data); 
	}
	
	function get_all_incidents()
	{
		$query = $this->db->get($this->table_name);
		if($query->num_rows()>0){
			// return result set as an associative array
			return $query->result_array();
		}
	}
	
	function get_incidents_where($field,$param)
	{
		$this->db->where($field,$param);
		$query = $this->db->get($this->table_name);
		// return result set as an associative array
		return $query->result_array();
	}
	
	function get_num_incidents()
	{
		return $this->db->count_all($this->table_name);
	}
	
	function get_last_ten_incidents()
	{
	  $query = $this->db->get($this->table_name, 10);
	  return $query->result();
	}
}
?>