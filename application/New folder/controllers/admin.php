<?php if (!defined('BASEPATH')) die();
class Admin extends Main_Controller {

function __construct()
    {
        parent::__construct();
		//load database
       // $this->load->database();
		//load helper
        //$this->load->helper('url');
		//load library
      // $this->load->library(array('table','form_validation'));
        //$this->load->library('grocery_CRUD');
		//load model
		//$this->load->model('AddClassModel','',TRUE);
 
    }

   public function index()
	{
		$this->load->view('include/header_adminmasterlogin');
		$this->load->view('login'); 
		$this->load->view('include/footer');		
	}
	
	function about_us()
    {
		$this->load->view('include/header_bootstrap');
		$this->load->view('about_us'); 
		$this->load->view('include/footer');		
    }
    }
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
