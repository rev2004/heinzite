<?php
class CRUD_model extends CI_Model {

	private $tablename;

	public function __construct()
	{
	    parent::__construct();
	}
	
	// Set the table crud will use.
	function set_tablename($name)
	{
		$this->tablename = $name;
		return true;
	}
	
	// get number of records in database
	function count_all()
	{
		return $this->db->count_all($this->tablename);
	}
	
	function get_fields()
	{
		$query = $this->db->list_fields($this->tablename);
		return $query;
	}
	
	// get results that match passes array of variables.
	function get_where($where_array){
        $query = $this->db->get_where($this->tablename,$where_array);	
        return $query->result();
	}
	
	// get full list with paging
	function get_paged_list($limit = 10, $offset = 0)
	{
		$this->db->order_by($this->tablename . '_id','asc');
		$query = $this->db->get($this->tablename, $limit, $offset);
		return $query->result();
	}
	
	// get full list with paging & joins
	function get_paged_list_with_joins($limit = 10, $offset = 0, $joins, $type = '')
	{
		$this->db->order_by($this->tablename . '_id','asc');
		
		foreach ($joins as $field_name => $join_info) {
			$this->db->join($field_name, $join_info, $type);
		}
		
		$query = $this->db->get($this->tablename, $limit, $offset);
		return $query->result();
	}
	
	// get by id
	function get_by_id($id)
	{
		$this->db->where($this->tablename . '_id', $id);
		$query = $this->db->get($this->tablename);

        if ($query->num_rows()==0) {
            return false;
        }
		
        $result = $query->result();
        return $result[0];
	}
	
	// add new
	function save($data)
	{
		$this->db->insert($this->tablename, $data);
		return $this->db->insert_id();
	}
	
	// update by id
	function update($id, $data)
	{
		$this->db->where($this->tablename . '_id', $id);
		$this->db->update($this->tablename, $data);
	}
	
	// delete by id
	function delete($id)
    {
        $this->db->where($this->tablename . '_id', $id); 
		$query = $this->db->get($this->tablename);
		
        if ($query->num_rows()==0) {
            return false;
        }
        else {
			$this->db->where($this->tablename . '_id', $id);
			$this->db->delete($this->tablename);
            return true;
        }    
    }
}
?>