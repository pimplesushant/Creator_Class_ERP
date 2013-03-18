<?php if (!defined('BASEPATH')) die();
class Home extends Main_Controller {

function __construct()
    {
        parent::__construct();
 
    }

   public function index()
	{
		$this->load->view('include/header_usermasterlogin');
		$this->load->view('home');
		$this->load->view('include/footer');
	}
	
	function about_us()
    {
		$this->load->view('include/header_usermasterlogin');
		$this->load->view('about_us'); 
		$this->load->view('include/footer');		
    }
	
	function contact_us()
    {
		$this->load->view('include/header_usermasterlogin');
		$this->load->view('contact_us'); 
		$this->load->view('include/footer');		
    }
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
