<?php
class Remark extends CI_Controller {

	public function index()
	{
		echo 'dispaying list of remarks';
	}
	
	public function view($record_type, $record_id)
	{
		echo 'viewing record ' . $record_id . ' for ' . $record_type;
	}
	
	public function add($record_type)
	{
		echo 'adding new ' . $record_type . ' record ';
	}
	
	public function delete($record_type, $record_id)
	{
		echo 'delete record ' . $record_id . ' for ' . $record_type;
	}
	
	public function edit($record_type, $record_id)
	{
		echo 'edit record ' . $record_id . ' for ' . $record_type;
	}
}
?>