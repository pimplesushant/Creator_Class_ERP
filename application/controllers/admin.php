<?php if (!defined('BASEPATH')) die();
class Admin extends Main_Controller {

function __construct()
    {
        parent::__construct();
 
    }

   public function index()
	{
		$this->load->view('include/header_adminmasterlogin');
		$this->load->view('login_home'); 
		$this->load->view('include/footer');		
	}
	
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
