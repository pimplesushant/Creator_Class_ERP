<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Assign_Faculty_Subject_Ctrl extends Main_Controller 
{
  function __construct()
	{ 
		
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->library('form_validation');

        $this->load->model('assign_faculty_subject_model','',TRUE);
	}

	public function index()
	{
	  $data['faculty_name']=$this->assign_faculty_subject_model->getfaculty();
	  $data['subject_name']=$this->assign_faculty_subject_model->getsubject();
	  
	  
	  /*print_r($data['faculty_no']);
	  print_r($data['faculty_name']);
	  	  print_r($data['subject_name']);*/
      $data['action']= site_url('assign_faculty_subject_ctrl/assign_faculty_subject');
      $this->load->view('include/header_admin');
	 $this->load->view('assign_faculty_subject',$data);
	  $this->load->view('include/footer');
	} 
	  
	function assign_faculty_subject()
	{
		
		//$this->_set_fields();
		$this->_set_rules();		
		
		// run validation
		if ($this->form_validation->run() == FALSE)
		{
		
		 $faculty_no=$this->input->post('fac');
			$subject_no[]=$this->input->post('sub');
			
		 $data['subject_no']=$this->input->post('sub');
		 
		
			print_r($data['subject_no']);
			foreach ($data['subject_no'] as $subject_no)
			{
			$id = $this->assign_faculty_subject_model->insertData($faculty_no,$subject_no);
			}
			echo "One Subject IS ADDED To faculty.";
			
				
		}
		else
		{
			
			
			$data['faculty_name']=$this->assign_faculty_subject_model->getfaculty();
				$data['subject_name']=$this->assign_faculty_subject_model->getsubject();
	  
				$data['action']= site_url('assign_faculty_subject_ctrl/assign_faculty_subject');
				$this->load->view('include/header_admin');
				$this->load->view('assign_faculty_subject',$data);
				$this->load->view('include/footer');
			
			
		}
   
	}

	
	 function _set_rules()
	{
		$config = array(
					
				   array(
                     'field'   => 'faculty_name',
                     'label'   => 'faculty_name',
                     'rules'   => 'required'
                  ),
				  array(
                     'field'   => 'subject_name',
                     'label'   => 'subject_name',
                     'rules'   => 'required'
                  )
            );
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules($config); 
	} 
	
	

}
?>
   
   
   
    
   
   

