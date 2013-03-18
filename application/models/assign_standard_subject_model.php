<?php
class Assign_Standard_Subject_Model extends CI_Model 
{
	
	var $standard_name='name';
	var $standard_id='standard_id';
	private $tbl_standard= 'standard';
	var $subject_name='name';
	var $subject_id='subject';
	private $tbl_subject= 'subject';
	
	public function __construct()
	{
	
		
	}
	function getstandard()
		{
		  
		    $this->db->from($this->tbl_standard);
			$this->db->order_by('standard_id');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0){
			
            $return[''] = 'please select';
			foreach($result->result_array() as $row)
			{
            $return[$row['standard_id']] = $row['name'];
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
  
		  
	function insertData($standard,$subject)
		{
			
			$insertQuery = $this->db->query('INSERT INTO standard_subject (standard_id,subject_id) VALUES ("'.$standard.'","'.$subject.'")');
			$id = mysql_insert_id();
				//return TRUE;
		}
	
	
	
}
?>