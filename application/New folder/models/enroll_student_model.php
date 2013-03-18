<?php
class Enroll_Student_Model extends CI_Model 
{
	
		private $tbl_student='student';
		private $tbl_batch= 'batch';
		var $reg_no='reg_no';
		var $app_no='app_no';
		var $batch='batch';
		var $full_name='full_name';
		
		
		var $student_id='student_id';
			/* var $academic_year='academic_year';*/
	
	
		public function __construct()
		{
		
			
		}
	
		function getRegNo()
		{
		  $this->db->select('reg_no');
		  
		 
		  $records=$this->db->get('student');
		 
		  $data=array();
		  foreach($records->result() as $row)
		  {
		   $data[$row->reg_no] = $row->reg_no;
			
		  }
		  return ($data);
		}
		
		function getAppNo()
		{
		  $this->db->select('app_no');
		  
		 
		  $records=$this->db->get('student');
		 
		  $data=array();
		  foreach($records->result() as $row)
		  {
		   $data[$row->app_no] = $row->app_no;
			
		  }
		  return ($data);
		}
		function getbatch()
		{
		  
			$this->db->from($this->tbl_batch);
			$this->db->order_by('batch_id');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0)
			{
					$return[''] = 'please select';
				foreach($result->result_array() as $row)
				{
					$return[$row['batch_id']] = $row['name'];
				}
			}
			return $return;
		}
		 function getstudent()
		{
		  
				  $this->db->from($this->tbl_student);
			$this->db->order_by('student_id');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0)
			{
					$return[''] = 'please select';
				foreach($result->result_array() as $row)
				{
					$return[$row['student_id']] = $row['full_name'];
				}
			}
			return $return;
		}
	     function checkauth($reg_no,$app_no,$student_id)
		{	
			//echo "in model";
			$sql = "SELECT * FROM student WHERE reg_no='$reg_no' and app_no='$app_no'and student_id='$student_id' ";
			$query = $this->db->query($sql);
			//print_r ($query);
			return $query->result();
		} 
		
		function insertStudentData($batch_id,$student_id,$branch_id)
		{
		
			$insertQuery = $this->db->query('INSERT INTO enrolled (batch_id,student_id,branch_id) 
							VALUES ("'.$batch_id.'","'.$student_id.'","'.$branch_id.'")');
			$id = mysql_insert_id();
			$student_id = $this->session->userdata('student_id');
			$sql="SELECT enroll_id FROM enrolled WHERE student_id='$student_id'";
			
			$selectQuery=$this->db->query($sql);
			$this->session->userdata('enroll_id');
			//return TRUE;
		} 
		
}