<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Add_Student_Ctrl extends Main_Controller 
{
  function __construct()
	{
		
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->library('form_validation');

        $this->load->model('add_student_model','',TRUE);
	}

  public function index()
	{
	  $data['standard_name']=$this->add_student_model->getstandard();
	  //$data['standard_no']=$this->add_student_model->getstandardId();
	  
	  
	  //print_r($data['standard_no']);
	 // print_r($data['standard_name']);
      $data['action']= site_url('add_student_ctrl/addstudent');
      $this->load->view('include/header_admin');
	 $this->load->view('add_student',$data);
	  $this->load->view('include/footer');
	} 
	  
	

	
	function addstudent()
	{
		
		//$this->_set_fields();
		$this->_set_rules();		
		
		// run validation
		if ($this->form_validation->run() == FALSE)
		{
		/* $config['upload_path'] = 'uploads/';
			$config['allowed_types'] = 'pdf|doc|gif|jpg|png'; */
				$data['action']= site_url('add_student_ctrl/addstudent');
				$this->load->view('include/header1');
	  
				$this->load->view('add_student',$data);
				$this->load->view('include/footer');
		}
		else
		{
			$reg_no=$this->input->post('reg_no');
			$app_no=$this->input->post('app_no');
			$date = date('y-m-d', strtotime($this->input->post('date')));
			
			echo $standard_no=$this->input->post('std');
			$name = $this->input->post('name');
	
			$gender = $this->input->post('gender');
			$dob = date('y-m-d', strtotime($this->input->post('dob')));
			$mothertongue = $this->input->post('mothertongue');
			$email_id = $this->input->post('email_id');
			$address = $this->input->post('address');
			$mobile_no = $this->input->post('mobile_no');  
			$telephone_no = $this->input->post('telephone_no');
		    $school=$this->input->post('school'); 
			 $file_path= base_url()."upload/";
			
			$this->session->set_userdata('branch', '1');
			$branch_id=$this->session->userdata('branch');
			echo $branch_id;
			//IT passes student infon..
			$id = $this->add_student_model->insertStudentData($reg_no,$app_no,$date,$standard_no,$branch_id,$name,$gender,$dob,$mothertongue,$email_id,$address,$mobile_no,$telephone_no,$school,$file_path);
			
			echo "One RECORD IS ADDED.";
			
			
		}
   
	}
 /*function _set_fields()
	{
		
		$fields['name'] = 'name';
		$fields['gender'] = 'gender';
		$fields['dob'] = 'dob';
		
		$felds['email_id'] = 'email_id';
		$fields['address'] = 'address';
		$fields['mobile_no'] = 'mobile_no';
		$fields['telephomne_no'] = 'telephone_no';
		$fields['school'] = 'school';
		$fields['guardian_name'] = 'guardian_name';
		$fields['address'] = 'grdaddress';
		$felds['email_id'] = 'grdemail_id';
		$fields['mobile_no'] = 'grdmobile_no';
		$fields['telephomne_no'] = 'grdtelephone_no';
		$this->form_validation->_set_fields($fields);
	} */ 
	
	// validation rules
	
	function _set_rules()
	{
		$config = array(
					array(
                     'field'   => 'reg_no',
                     'label'   => 'Registration No',
                     'rules'   => 'required'
                  ),
				  array(
                     'field'   => 'app_no',
                     'label'   => 'Application No',
                     'rules'   => 'required'
                  ),
				  array(
                     'field'   => 'date',
                     'label'   => 'Current Date',
                     'rules'   => 'required'
                  ),
				  /* array(
                     'field'   => 'standard_name',
                     'label'   => 'standard_name',
                     'rules'   => 'required'
                  ), */
				  array(
                     'field'   => 'gender',
                     'label'   => 'Gender',
                     'rules'   => 'required'
                  ),
				  array(
                     'field'   => 'dob',
                     'label'   => 'DOB',
                     'rules'   => 'required'
                  ),
				  /* array(
                     'field'   => 'mothertongue',
                     'label'   => 'MotherTongue',
                     'rules'   => 'required'
                  ), */
				  array(
                     'field'   => 'email_id',
                     'label'   => 'Email',
                     'rules'   => 'required'
                  ),
				   array(
                     'field'   => 'address',
                     'label'   => 'Address',
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
                  ),   
                array(
                     'field'   => 'school',
                     'label'   => 'School/College',
                     'rules'   => 'required'
                  )
            );

		$this->form_validation->set_rules($config); 
	}
	
	// date_validation callback
	 function valid_date($str)
	{
		if(!preg_match('/^(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-([0-9]{4})$/', $str))
		{
			$this->form_validation->_set_message('valid_date', 'date format is not valid. yyyy-mm-dd');
			return false;
		}
		else
		{
			return true;
		}
	} 
	/* function do_upload()
	{
  
  $config['upload_path'] = 'uploads/';
  $config['allowed_types'] = 'pdf|doc|gif|jpg|png';
  $data['action']=site_url('add_student_ctrl/doupload_auth');
  
  $this->load->view('include/header');
  $this->load->view('add_student', $data);
  $this->load->view('include/footer');
  } 
  function doupload_auth()
 {
  
  if(!file_exists("./upload/".$_FILES["csv"]["name"]))
  {
   if(move_uploaded_file($_FILES["csv"]["tmp_name"],"./upload/".$_FILES["csv"]["name"]))
   {
    echo $_FILES["csv"]["name"];
    echo "File upload sucessfully" ;
    

   }else
   {
    echo "File cann't be upload !";

   }
  }else
   echo "file already exist";
   
   $file_name= $_FILES["csv"]["name"];
   $file_path= base_url()."upload/".$file_name;
   $result = $this->add_student_model->uploadfile($file_path);
  
 
 
 }	
  */
 

}
?>
   
   
   
    
   
   

