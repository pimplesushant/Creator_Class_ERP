<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Assign_Standard_Subject_Ctrl extends Main_Controller 
{
  function __construct()
	{ 
		
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->library('form_validation');

        $this->load->model('assign_standard_subject_model','',TRUE);
	}

	public function index()
	{
	  $data['standard_name']=$this->assign_standard_subject_model->getstandard();
	  $data['subject_name']=$this->assign_standard_subject_model->getsubject();
	  
	  
	  /*print_r($data['standard_no']);
	  print_r($data['standard_name']);
	  	  print_r($data['subject_name']);*/
      $data['action']= site_url('assign_standard_subject_ctrl/assign_standard_subject');
      $this->load->view('include/header_admin');
	 $this->load->view('assign_standard_subject',$data);
	  $this->load->view('include/footer');
	} 
	  
	function assign_standard_subject()
	{
		
		//$this->_set_fields();
		$this->_set_rules();		
		
		// run validation
		if ($this->form_validation->run() == FALSE)
		{
		
		 $standard_no=$this->input->post('std');
			$subject_no[]=$this->input->post('sub');
			
		 $data['subject_no']=$this->input->post('sub');
		 
		
			print_r($data['subject_no']);
			foreach ($data['subject_no'] as $subject_no)
			{
			$id = $this->assign_standard_subject_model->insertData($standard_no,$subject_no);
			}
			echo "One Subject IS ADDED To Standard.";
			
				
		}
		else
		{
			
			
			$data['standard_name']=$this->assign_standard_subject_model->getstandard();
				$data['subject_name']=$this->assign_standard_subject_model->getsubject();
	  
				$data['action']= site_url('assign_standard_subject_ctrl/assign_standard_subject');
				$this->load->view('include/header_admin');
				$this->load->view('assign_standard_subject',$data);
				$this->load->view('include/footer');
			
			
		}
   
	}

	
	 function _set_rules()
	{
		$config = array(
					
				   array(
                     'field'   => 'standard_name',
                     'label'   => 'standard_name',
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
   
   
   
    
   
   

