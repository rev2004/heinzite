<?php
class Department_model extends CI_Model{

	protected $table_name;
	
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'departments';
	}

	function add($data)
	{
		$this->db->insert($this->table_name, $data); 
	}
	
	function delete($id)
    {
        $query = $this->db->get_where($this->table_name, array('department_id'=>$id));  
 
        if ($query->num_rows()==0) {
            return false;
        }
        else {
            $this->db->delete($this->table_name, array('department_id' => $id)); 
            return true;
        }    
    }
	
	function get($id) 
    {
        $query = $this->db->get_where($this->table_name, array('department_id'=>$id));  
        if ($query->num_rows()==0) {
            return false;
        }
        $result = $query->result();
        return $result[0];
    }
	
	function get_all()
	{
		$query = $this->db->get($this->table_name);
		if($query->num_rows()>0){
			// return result set as an associative array
			return $query->result_array();
		}
	}
	
	function get_where($field,$param)
	{
		$this->db->where($field,$param);
		$query = $this->db->get($this->table_name);
		// return result set as an associative array
		return $query->result_array();
	}
	
	function get_num_records()
	{
		return $this->db->count_all($this->table_name);
	}
	
	function get_last_ten_records()
	{
	  $query = $this->db->get($this->table_name, 10);
	  return $query->result();
	}
}
?>