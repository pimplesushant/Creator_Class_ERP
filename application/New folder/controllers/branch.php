<?php if (!defined('BASEPATH')) die();
<?php if (!defined('BASEPATH')) die();
class Branch  extends CI_Controller 
{function __construct(){
		parent::__construct();
		
		// load library
		$this->load->library(array('table','form_validation','email'));
		
		// load helper
		$this->load->helper('url');
		
		// load model
		$this->load->model('branch','',TRUE);
	}
 public function index()
	{
	$info['branch']=site_url('branch/addbranch');
	$this->load->view('include/header');
      $this->load->view('add_branch');
	  $this->load->view('include/footer');
 }
 }
 function addbranch()
	{
		$this->_set_branch_rules();
		$this->LoginModel->branchname = $this->input->post('branch_name');
		$this->LoginModel->branchaddress = $this->input->post('branch_address');
		$this->LoginModel->telephone = $this->input->post('telephone_number');
		$this->LoginModel->mobile = $this->input->post('mobile');
		$this->LoginModel->email = $this->input->post('email_id');
		
		$info['branch'] = site_url('branch/addbranch');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('add_branch', $info);
		}
		else
		{
			$result = $this->LoginModel->insertData();
			if($result)
			{	
				echo("Welcome...!");
			}
			/*else {
				$this->form_validation->set_message('Please enter correct username and password');
				$this->load->view('RegisterView', $info);
			}*/
		}
	}
	function _set_branch_rules()
	{
		$config_rules = array(
		   array(
				 'field'   => 'branch_name',
				 'label'   => 'name',
				 'rules'   => 'required|min_length[3]|max_length[10]'
			  ),
		   array(
				 'field'   => 'mobile',
				 'label'   => 'mobile',
				 'rules'   => 'required|valid_email'
			  ),
			array(
				 'field'   => 'email_id',
				 'label'   => 'email',
				 'rules'   => 'required|matches[passwordsignup_confirm]'
			  ),
			
         );		
		$this->form_validation->set_rules($config_rules);
	}
 ?>
 
	