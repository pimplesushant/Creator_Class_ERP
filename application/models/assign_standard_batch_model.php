<?php
class Assign_Standard_Batch_Model extends CI_Model 
{
	
	var $standard_name='name';
	var $standard_id='standard_id';
	private $tbl_standard= 'standard';
	var $batch_name='name';
	var $batch_id='batch';
	private $tbl_batch= 'batch';
	
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
	function getbatch()
		{
		  
			$this->db->from($this->tbl_batch);
			$this->db->order_by('batch_id');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0){
			$return[''] = 'please select';
			foreach($result->result_array() as $row)
			{
			$return[$row['batch_id']] = $row['name'];
			}
			  return $return;
		  
			
		}}
  
		  
	function insertData($standard,$batch)
		{
			
			$insertQuery = $this->db->query('INSERT INTO standard_batch (standard_id,batch_id) VALUES ("'.$standard.'","'.$batch.'")');
			$id = mysql_insert_id();
				//return TRUE;
		}
	
	
	
}
?>