<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enroll_student_ctrl extends Main_Controller 
{
  
			function __construct()
				{
					
					parent::__construct();
					
					$this->load->helper(array('form', 'url'));
					$this->load->library('session');
					$this->load->library('form_validation');

					$this->load->model('enroll_student_model','',TRUE);
					
				}
			  public function index()
				{
				 
					$data['regno']=$this->enroll_student_model->getRegNo();
					$data['appno']=$this->enroll_student_model->getAppNo();
					$data['name']=$this->enroll_student_model->getStandard();
					$data['batch_name']=$this->enroll_student_model->getbatch();
					$data['full_name']=$this->enroll_student_model->getstudent();
					$data['action']=site_url('enroll_student_ctrl/authenticate');
					$this->load->view('include/header_admin');
				 
					$this->load->view('enroll_student',$data);
					
					$this->load->view('include/footer');
				}


			public function authenticate()
			{
				
				$reg_no=$this->input->post('regno');
				$app_no=$this->input->post('appno');
				$batch_id=$this->input->post('batch');
				$standard_id=$this->input->post('standard');
				
				$student_id=$this->input->post('student');
				
				$result= $this->enroll_student_model->checkauth($reg_no,$app_no,$student_id,$standard_id);
				
				//print_r ($result);
				$data['action']=$result;
				if($result==TRUE)
				{
						
						/* echo "REG NO " ,$reg_no;
						echo "APP NO", $app_no;
						echo "batch",$batch_id;
						echo "STUD_ID " ,$student_id; */
						/* $newdata = array(
						'student_id'  => '$student_id',
						'branch_id'     => 'branch_id@some-site.com'
						); */

						//$this->session->set_userdata($newdata);


						//$this->session->set_userdata('student_id', $student_id);
						
						//$this->session->set_userdata($newdata);
						/*
						$this->session->set_userdata('student_lastname', 'tekale');
						$test = $this->session->userdata('student_id');
						$test = $this->session->userdata('student_lastname');
						echo $test;
						$SESSION[batch_id]=$batch_id;
						$SESSION[student_id]=$student_id*/
						//$this->session->set_userdata('branch', '1');
						$branch_id=$this->session->userdata('branch');
						//if($branch_id)echo 'hello',$branch_id;
						
						 $id = $this->enroll_student_model->insertStudentData($batch_id,$student_id,$branch_id);
						$data1['action']= site_url('add_guardiandetail_ctrl/add_guardiandetail');
						$this->load->view('include/header_admin');
						$this->load->view('add_guardiandetail',$data1);
					    $this->load->view('include/footer'); 
						
			
						}
						else
						{
							echo"enter a valid reg no";
						}
				}
			    
			  
				
				

			/* function _set_rules()
			{
				$config=array(
				array('field'   => 'reg_no',
						 'label'   => 'Registration No.',
						 'rules'   => 'required'
					  ),
					  array('field'   => 'app_no',
						 'label'   => 'Application No.',
						 'rules'   => 'required'
					  ),);
				  
			}  */
			  
}


?>


