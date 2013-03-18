<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_branch_ctrl extends Main_Controller {
  

  public function index()
	{
      
	  
     $this->load->view('include/header2');
	 
	   $this->load->view('add_branch');
	  
    $this->load->view('include/footer');
	}
   
}

