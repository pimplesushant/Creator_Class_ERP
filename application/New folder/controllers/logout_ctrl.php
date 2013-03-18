
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout_Ctrl extends Main_Controller 
{
  

  public function index()
	{
	
      $this->session->sess_destroy();
	   $info['loginaction']= site_url('login_ctrl/authonticate');
		$this->load->view('include/header_superadmin');
		
		 $this->load->view('login_home',$info);
		$this->load->view('include/footer');
	 /* $this->load->view('include/header2'); 
    $this->load->view('include/footer'); */
	}
   
}


