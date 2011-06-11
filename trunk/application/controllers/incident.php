<?php
class Incident extends CI_Controller {
	
	protected $model_location;
	
	public function __construct()
	{
		parent::__construct();
		// load model for db
		$this->load->model('Incident_model');
		// load url helper
        $this->load->helper('url');
		$this->model_location = 'incident/';
	}
	
	public function index()
	{
		$data['user'] = 'User Name';
		$data['current_date'] = date('l \t\h\e jS \of F Y');
		$data['query'] = $this->Incident_model->get_last_ten_incidents();
		
		$this->load->view($this->model_location . 'index',$data);
	}
	
	public function view($record_type, $record_id)
	{
		$data['record_id'] = $record_id;
		$data['record_type'] = $record_type;

		$this->load->view('incident/view', $data);
	}
	
	public function add($record_type)
	{
       $this->load->library('form_validation');
 
        // validation rules
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'max_length[255]');
 
 
        if ($this->form_validation->run())
        {
            $data = array(
                    'name'=>$this->input->post('title'),
                    'description'=>$this->input->post('description')
                    );
            $this->Todo_model->add($data);
 
            $this->session->set_flashdata('message', 'Done. You have added new task.');            
            redirect('/');
        }
        else
        {
            $this->load->view('incident/add');
        }
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