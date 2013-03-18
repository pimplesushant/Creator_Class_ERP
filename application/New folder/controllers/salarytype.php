<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Salarytype extends CI_Controller 
{
	 // num of records per page
	 private $limit = 5;
	
	function __construct(){
		
		parent::__construct();
		
		// load library
		$this->load->library(array('table','form_validation'));
		
		// load helper
		$this->load->helper('url');
		
		// load model
		$this->load->model('add_salarytype_model','',true);
	} 
	
	function index()
	{
		
		
		
		$data['action'] = site_url('salarytype/addsalarytype');
		
		
		$this->load->view('include/header');
		
$this->load->view('add_salarytype', $data);
		$this->load->view('include/footer');
		
		}
	 function add()
	{
		// set validation properties
		$this->_set_fields();
		
		// set common properties
		$data['title'] = 'add new salarytype';
		$data['message'] = '';
		$data['action'] = site_url('salarytype/addsalarytype');
		// load view
		$this->load->view('add_salarytype', $data);
	}
	function addsalarytype()
	{
		echo "add standard";
		// set common properties
		$data['title'] = 'add new salarytype';
		$data['action'] = site_url('salarytype/addsalarytype');
		
		
		// set validation properties
		//$this->_set_fields();
		$this->_set_rules();
		
		// run validation
		if ($this->form_validation->run() == FALSE){
			$this->load->view('include/header');
		$this->load->view('add_salarytype', $data);
		$this->load->view('include/footer');
		}else{
			// save data
			 $standard= array('salary' => $this->input->post('salary'),
			 'amt' => $this->input->post('amt'));
							
			  $salary = $this->input->post('salary');
			  $amt = $this->input->post('amt');
			
			
			$id = $this->add_salarytype_model->insertData($salary,$amt); 
			 
			// set form input name="id"
			//$this->validation->id = $id;
			
			// set user message
			$data['message'] = '<div class="success">add new standard success</div>';
			
			$this->load->view('include/header');
			$this->load->view('add_salarytype', $data);
			$this->load->view('include/footer');
		}
		
		// load view
		
	}

	
	
	// validation fields
	 function _set_fields()
	{
		$fields['id'] = 'id';
		$fields['salary'] = 'salary';
		
		$this->form_validation->_set_fields($fields);
	} 
	
	// validation rules
	
	function _set_rules(){
		$config = array(
               array(
                     'field'   => 'salary',
                     'label'   => 'salary',
                     'rules'   => 'required'
                
                  ),
				  array(
				 'field'   => 'amt',
				 'label'   => 'Amt',
				 'rules'   => 'required'
			  ),
				  
            );

$this->form_validation->set_rules($config); 
	}
	 
}
?>