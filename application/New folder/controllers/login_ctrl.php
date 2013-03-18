<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Ctrl extends CI_Controller 
{	 
	function __construct()
	{
		
		parent::__construct();
		
		  // load library
		 $this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		// load model
		$this->load->model('login_model','',TRUE);
		
		$this->load->library('table');

 

	}
	
 	public function index()
	{
	
		$info['loginaction']= site_url('login_ctrl/authenticate');
		$this->load->view('include/header_login');
		
		 $this->load->view('login_home',$info);
		$this->load->view('include/footer');
		
		
	}
	
	 public function authenticate()
	{
				//echo "hello";		
		$this->_set_login_rules();
		$email_id=$this->input->post('email_id');
		$password=$this->input->post('password');
		
		$info['loginaction']= site_url('login_ctrl/authenticate');
		

		if ($this->form_validation->run() == FALSE)
		{
			$info['loginaction']= site_url('login_ctrl/authenticate');
			$this->load->view('include/header_superadmin');
			$this->load->view('login_home',$info);
			$this->load->view('include/footer');
		}
		else
		{
			
			$result = $this->login_model->checkauth($email_id,$password);
			
			if($result)
			{	
			$user_type=$this->login_model->display($email_id,$password);
			
				if($user_type==2)
				{
				$this->load->view('include/header1');
				$this->load->view('Adminview');
				$this->load->view('include/footer');
				}
				
				else if($user_type==3)
				{
				$this->load->view('include/header1');
				$this->load->view('Staffview');
				$this->load->view('include/footer');
				}
				
				else if($user_type==4)
				{
				$this->load->view('include/header1');
				$this->load->view('Studentview');
				$this->load->view('include/footer');
				}
				
				else if($user_type==5)
				{
				$this->load->view('include/header1');
				$this->load->view('Guardianview');
				$this->load->view('include/footer');
				}
				
				else
				{
				$this->form_validation->set_message('Please enter correct emailid and password');
				$this->load->view('include/header1');
				$this->load->view('login_home'); 
				$this->load->view('include/footer');
				}

			}
			else 
			{
			$this->form_validation->set_message('All Fields are Mandatory');
			$this->load->view('login_home');
			$this->load->view('include/footer');
			}
		}
	}
	
	
	 function _set_login_rules()
	{
		$config_rules = array(
		   array(
				 'field'   => 'email_id',
				 'label'   => 'email',
				 'rules'   => 'required'
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