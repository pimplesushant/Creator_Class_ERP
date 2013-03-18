<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ladd_staff extends CI_Controller 
{	 
	function __construct(){
		
		parent::__construct();
		
		  // load library
		$this->load->library(array('table','form_validation'));
		
		// load helper
		$this->load->helper('url');
		
		// load model
		$this->load->model('Add_staff','',TRUE);
	}
	
 	public function index()
	{
		$info['loginaction']= site_url('login/authonticate');
		$info['registration']= site_url('login/registration');
		$this->load->view('include/header');
		$this->load->view('include/footer');
		$this->load->view('LoginView', $info);
	}
	
	 public function authonticate()
	{
		
		$this->_set_login_rules();
		$this->Add_staff->fullname = $this->input->post('fullname');
		$this->Add_staff->email = $this->input->post('email');
		$info['loginaction']= site_url('login/authonticate');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('LoginView', $info);
		}
		else
		{
			$result = $this->Add_staff->checkValidation();
			
			if($result)
			{	
				$this->load->view('WelcomeView', $info);
			}
			else {
				$this->form_validation->set_message('Please enter correct username and password');
				$this->load->view('LoginView', $info);
			}
		}
	}
	
	function registration()
	{
		$this->_set_register_rules();
		$fullname = $this->input->post('fullname');
		$emailsignup = $this->input->post('emailsignup');
		$info['add_staff']= site_url('add_staff/authonticate');
		$info['registration'] = site_url('login/registration');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('LoginView', $info);
		}
		else
		{
			$result = false;		
			if($result)
			{	
				$this->load->view('Welcome_View', $info);
			}
			else {
				$this->form_validation->set_message('Please enter correct username and password');
				$this->load->view('LoginView', $info);
			}
		}
	}
	
	function _set_login_rules()
	{
		$config_rules = array(
		   array(
				 'field'   => 'username',
				 'label'   => 'Username',
				 'rules'   => 'required|min_length[3]|max_length[10]'
			  ),
		   array(
				 'field'   => 'password',
				 'label'   => 'Password',
				 'rules'   => 'required'
			  )
         );		
		$this->form_validation->set_rules($config_rules);
	}	
}
?>