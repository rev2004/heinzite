<?php
class Incident extends CI_Controller {

	public function index()
	{
		$this->load->model('Incident_model');
		$data['user'] = 'User Name';
		$data['current_date'] = date('l \t\h\e jS \of F Y');
		$data['query'] = $this->Incident_model->get_last_ten_incidents();
		
		$this->load->view('incident/index',$data);
	}
	
	public function view($record_type, $record_id)
	{
		$data['record_id'] = $record_id;
		$data['record_type'] = $record_type;

		$this->load->view('incident/view', $data);
	}
	
	public function add($record_type)
	{
		$data['record_type'] = $record_type;
		$data['form'] = $this->_formBuilder('incident_log_base');
		$this->load->view('incident/add', $data);
	}
	
	public function delete($record_type, $record_id)
	{
		$data['record_id'] = $record_id;
		$data['record_type'] = $record_type;
		$this->load->view('incident/delete', $data);
	}
	
	public function edit($record_type, $record_id)
	{
		$data['record_id'] = $record_id;
		$data['record_type'] = $record_type;
		$this->load->view('incident/edit', $data);
	}

}
?>