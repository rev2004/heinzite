<?php
class Staff extends CI_Controller {

	// location of the class files.
	private $view_location;
	
    // num of records per page
    private $limit;
	
	// information for the password encryption
	private $SALT_LENGTH;
	private $SALT;
	
    public function __construct()
    {
        parent::__construct();
		$this->view_location = 'staff/';
		// Load the standard c.r.u.d. model and the controller specific one. 
        $this->load->model('CRUD_model', 'CRUD');
		$this->CRUD->set_tablename('staff');
		//$this->load->model('Staff_model');
		$this->SALT_LENGTH = 9;
		$this->limit = 10;
        // load url helper
        $this->load->helper('url');
		// load library
		$this->load->library(array('table','session','form_validation','pagination'));
		//$this->output->enable_profiler(TRUE);
    }
	
	public function index($offset = 0)
	{
		// offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		$config['base_url'] = site_url($this->view_location . 'index');
 		$config['total_rows'] = $this->CRUD->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		
		$data['pagination'] = $this->pagination->create_links();
        $data['flash_message'] = $this->session->flashdata('message');
		$data['number_rows'] = $config['total_rows'];
		//$data['field_names'] = $this->CRUD->get_fields();
		$join = array('role' => 'role.role_id = staff.role_id');
        $data['query'] = $this->CRUD->get_paged_list_with_joins($this->limit, $offset, $join);
		
		$this->load->view($this->view_location . 'index',$data);
	}
	
	public function view($record_type, $record_id)
	{
		$data['record_id'] = $record_id;
		$data['record_type'] = $record_type;

		$this->load->view($this->view_location . 'view', $data);
	} 
	
    public function add()
    {   
 
        // validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
 		$this->form_validation->set_rules('password', 'Password', 'required');
 
        if ($this->form_validation->run())
        {
            $data = array(
                    'first_name'=>$this->input->post('first_name'),
					'last_name'=>$this->input->post('last_name'),
					'middle_name'=>$this->input->post('middle_name'),
					'password_hash'=>$this->__generateHash($this->input->post('password'),$this->SALT),
					'active'=>$this->input->post('active')
                    );
            $this->CRUD->save($data);
 			
			$message = 'Done. You have added staff member ' ;
			$message .= $data['first_name'] . ' ' . $data['last_name'] . '.';
            $this->session->set_flashdata('message', $message );            
            redirect($this->view_location . 'index');
        }
        else
        {
            $this->load->view($this->view_location . 'add');
        }
    }
	
	public function delete($record_type, $record_id)
	{
		$data['record_id'] = $record_id;
		$data['record_type'] = $record_type;
		$this->load->view($this->view_location . 'delete', $data);
	}
	
	public function edit($record_type, $record_id)
	{
		$data['record_id'] = $record_id;
		$data['record_type'] = $record_type;
		$this->load->view($this->view_location . 'edit', $data);
	}
	
	// http://phpsec.org/articles/2005/password-hashing.html
	private function __generateHash($plainText, $salt = null)
	{
	    if ($salt === null)
	    {
	        $salt = substr(md5(uniqid(rand(), true)), 0, $this->SALT_LENGTH);
	    }
	    else
	    {
	        $salt = substr($salt, 0, $this->SALT_LENGTH);
	    }
	
	    return $salt . sha1($salt . $plainText);
	}
}
?>