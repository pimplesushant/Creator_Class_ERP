<?php if (!defined('BASEPATH')) die();
class Frontpage extends Main_Controller {

   public function index()
	{
      
	  
     $this->load->view('include/header');
	  
	  $this->load->view('login_home');
	  
	  
/*	  $this->load->view('add_student');
	  $this->load->view('class');
	  $this->load->view('coursetype');
	  $this->load->view('addstd');
	  $this->load->view('batch');
	   $this->load->view('subject');
	  
	  $this->load->view('enroll_student');
	  $this->load->view('gardiandetail');
	  
     
	  
	  $this->load->view('add_staff');
	  $this->load->view('add_designation');
	  $this->load->view('salarytype');
	 
	   $this->load->view('add_branch');
	  
  */    $this->load->view('include/footer');
	}
   
}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
