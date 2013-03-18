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
				 $data['batch_name']=$this->enroll_student_model->getbatch();
				$data['action']=site_url('enroll_student_ctrl/authenticate');
				$this->load->view('include/header_admin');
				 $this->load->view('enroll_student',$data);
				$this->load->view('include/footer');
				}

				public function authenticate()
				{
				
					
					$batch_id=$this->input->post('batch');
					$standard_id=$this->input->post('courses');
					$student_id=$this->input->post('stages');
					
					$result= $this->enroll_student_model->checkauth($student_id,$standard_id);
					//print_r ($result);
					$data['action']=$result;
					if($result==TRUE)
					{
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
				}   */
			  
}


?>


