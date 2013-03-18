<?php
class Assign_Faculty_Subject_Model extends CI_Model 
{
	
	var $faculty_name='name';
	var $faculty_id='faculty_id';
	private $tbl_faculty= 'faculty';
	var $subject_name='name';
	var $subject_id='subject';
	private $tbl_subject= 'subject';
	
	public function __construct()
	{
	
		
	}
	function getfaculty()
		{
		  
		    $this->db->from($this->tbl_faculty);
			$this->db->order_by('faculty_id');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0){
			
            $return[''] = 'please select';
			foreach($result->result_array() as $row)
			{
            $return[$row['faculty_id']] = $row['name'];
			}
			
			
			return $return;
			}
		}
	function getsubject()
		{
		  
			$this->db->from($this->tbl_subject);
			$this->db->order_by('subject_id');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0){
			$return[''] = 'please select';
			foreach($result->result_array() as $row)
			{
			$return[$row['subject_id']] = $row['name'];
			}
			  return $return;
		  
			
		}}
  
		  
	function insertData($faculty,$subject)
		{
			
			$insertQuery = $this->db->query('INSERT INTO faculty_subject (faculty_id,subject_id) VALUES ("'.$faculty.'","'.$subject.'")');
			$id = mysql_insert_id();
				//return TRUE;
		}
	
	
	
}
?>