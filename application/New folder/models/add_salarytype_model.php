_<?php
class Add_salarytype_model extends CI_Model {
	var $salary= '';
	var $amt='';
	private $tbl_salary= '';
	
	public function __construct()
	{
	
		//$this->load->database();
	}
	
	/* function save($staff){
		$this->db->insert($this->tbl_faculty, $staff);
		return $this->db->insert_id();
	} */
	
	function checkValidation()
	{
		$query = $this->db->query('select * from salary.salary where salary = "'.$this->salary.'"and amt="'.$this->amt.'"');
		if($query->num_rows() == 1)
		{
			return true;
		}
		else 
		{
			return false;
		}
	} 
	
	function insertData($salary,$amt)
	{
		echo "in model";
		$insertQuery = $this->db->query('INSERT INTO salary (salary,amt) 
			VALUES ("'.$salary.'","'.$amt.'")');
			
			$id = mysql_insert_id();
			
			
			//return $insertQuery = $this->db->query('INSERT INTO user_master (faculty_id,email_id) VALUES ("'.$id.'","'.$email_id.'")');
			
			
			
			//return $insertQuery = $this->db->query('INSERT INTO demoapp (name, designation,address,telephoneno,mobileno,email,dob,gender,salarytype) 
			//VALUES ("'.$name.'","'.$designation.'","'.$address.'","'.$this->telephoneno.'","'.$this->mobileno.'", "'.$this->email.'","'.$this->dob.'","'.$this->gender.'","'.$this->salarytype.'")');
	}
}
?>