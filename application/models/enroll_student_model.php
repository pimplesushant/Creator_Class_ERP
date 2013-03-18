<?php
class Enroll_Student_Model extends CI_Model 
{
	private $tbl_batch= 'batch';
	var $batch='batch';
	var $name='name';
	var $batch_id='batch_id';
	var $student_id='student_id';
	var $standard_id='satndard_id';	
		
		public function __construct()
		{
		
			
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
		 function checkauth($student_id,$standard_id)
		{	
			$sql = "SELECT * FROM student WHERE student_id='$student_id' and standard_id='$standard_id' ";
			$query = $this->db->query($sql);
			
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
	