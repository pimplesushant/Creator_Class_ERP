<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Assign_Standard_Batch_Ctrl extends Main_Controller 
{
  function __construct()
	{ 
		
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->library('form_validation');

        $this->load->model('assign_standard_batch_model','',TRUE);
	}

	public function index()
	{
		
	  $data['standard_name']=$this->assign_standard_batch_model->getstandard();
	  $data['batch_name']=$this->assign_standard_batch_model->getbatch();
	  
	  
	  /*print_r($data['standard_no']);
	  print_r($data['standard_name']);
	  	  print_r($data['batch_name']);*/
      $data['action']= site_url('assign_standard_batch_ctrl/assign_standard_batch');
      $this->load->view('include/header_admin');
	 $this->load->view('assign_standard_batch',$data);
	  $this->load->view('include/footer');
	} 
	  
	function assign_standard_batch()
	{
		
		//$this->_set_fields();
		$this->_set_rules();		
		
		// run validation
		if ($this->form_validation->run() == FALSE)
		{
		
		 $standard_no=$this->input->post('std');
			$batch_no[]=$this->input->post('bat');
			
		 $data['batch_no']=$this->input->post('bat');
		 
		
			print_r($data['batch_no']);
			foreach ($data['batch_no'] as $batch_no)
			{
			$id = $this->assign_standard_batch_model->insertData($standard_no,$batch_no);
			}
			echo "One batch IS ADDED To Standard.";
			
				
		}
		else
		{
			
			
			$data['standard_name']=$this->assign_standard_batch_model->getstandard();
				$data['batch_name']=$this->assign_standard_batch_model->getbatch();
	  
				$data['action']= site_url('assign_standard_batch_ctrl/assign_standard_batch');
				$this->load->view('include/header_admin');
				$this->load->view('assign_standard_batch',$data);
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
                     'field'   => 'batch_name',
                     'label'   => 'batch_name',
                     'rules'   => 'required'
                  )
            );
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules($config); 
	} 
	
	

}
?>
   
   
   
    
   
   

