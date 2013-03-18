<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_salarytype_ctrl extends CI_Controller 
{
	function __construct(){
		
		parent::__construct();
		
		  // load library
		$this->load->library(array('table','form_validation'));
		
		// load helper
		$this->load->helper('url');
		
		// load model
		$this->load->model('add_salarytype_model','',TRUE);
	}
	
 	public function index()
	{
		$info['action']= site_url('add_salarytype_ctrl/registration');
		$this->load->view('include/header');
		$this->load->view('add_salarytype', $info);
		$this->load->view('include/footer');
		
	}
		
	function registration()
	{
		echo "in method";
		$this->_set_register_rules();
		$this->add_standard_model->name = $this->input->post('name');
		
		
		$info['registration'] = site_url('add_salarytype/registration');
		$info['loginaction'] = site_url ('login/authonticate');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('add_salarytype', $info);
		}
		else
		{
			$result = $this->Add_salarytype_model->insertData();
			if($result)
			{	
				$this->load->view('add_salarytype', $info);
			}
			else {
				$this->form_validation->set_message('Please enter correct username and password');
				$this->load->view('add_salarytype', $info);
			}
		}
	}
	
	function _set_register_rules()
	{
		$config_rules = array(
		   array(
				 'field'   => 'name',
				 'label'   => 'name',
				 'rules'   => 'required|min_length[3]|max_length[10]'
			  ),
			  
		   array(
				 'field'   => 'amt',
				 'label'   => 'Amt',
				 'rules'   => 'required'
			  ),
				  
				  
         );		
		$this->form_validation->set_rules($config_rules);
	}
		
}
?>