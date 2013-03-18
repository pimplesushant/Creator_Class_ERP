<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Add_Guardiandetail_Ctrl extends Main_Controller {
  
  function __construct()
	{
		
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->library('form_validation');

        $this->load->model('add_guardiandetail_model','',TRUE);
	}


  /*  public function index()
	{
      $data['action']= site_url('add_guardiandetail_ctrl/add_guardiandetail');
      $this->load->view('include/header1');
	  $this->load->view('add_guardiandetail',$data);
	  $this->load->view('include/footer');
	}  */
	  
	
	function add_guardiandetail()
	{
		
		//$this->_set_fields();
		$this->_set_rules();
		
		
		// run validation
		if ($this->form_validation->run() == TRUE)
		{
				echo "valid false";
		
				$data['action']= site_url('add_guardiandetail_ctrl/add_guardiandetail');
				$this->load->view('include/header1');
				
				$enroll_id = $this->session->userdata('enroll_id');
				echo $enroll_id;
				//$this->load->view('add_guardiandetail',$data);
				$this->load->view('include/footer');
		}
		else
		{
			echo "valid true";
			
			$guardian_name= $this->input->get('guardian_name');
			$address = $this->input->get('address');
			
			$email_id = $this->input->get('email_id');
			
			$mobile_no = $this->input->get('mobile_no');  
			$telephone_no = $this->input->get('telephone_no');
			$relation=$this->input->get('relation'); 
			echo $address;
			$id1 = $this->add_guardiandetail_model->insertGuardianData($guardian_name,$address,$email_id,$mobile_no,$telephone_no,$relation);
			
			
			
		}
   
	}
   
  /*  function _set_fields()
	{
		
		
		$fields['guardian_name'] = 'guardian_name';
		$felds['email_id'] = 'email_id';
		$fields['address'] = 'address';
		$fields['mobile_no'] = 'mobile_no';
		$fields['telephomne_no'] = 'telephone_no';
		
		
		
		$this->form_validation->_set_fields($fields);
	}  */
	
	// validation rules
	
	function _set_rules()
	{
		$config = array(
					array(
                     'field'   => 'guardian_name',
                     'label'   => 'Guardian_Name',
                     'rules'   => 'required'
                  ),
				   array(
                     'field'   => 'address',
                     'label'   => 'Guardian Address',
                     'rules'   => 'required'
                  ),
				  
				  array(
                     'field'   => 'email_id',
                     'label'   => 'Email',
                     'rules'   => 'required'
                  ),
				  
				  array(
                     'field'   => 'mobile_no',
                     'label'   => 'Mobile_no',
                     'rules'   => 'required'
                  ),
				 
               array(
                     'field'   => 'telephone_no',
                     'label'   => 'Telephone_no',
                     'rules'   => 'required'
                  )
            );

		$this->form_validation->set_rules($config); 
	}
	
	

}
?>


