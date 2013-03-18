<?php
class Add_staff_model extends CI_Model {
	var $name = '';
	var $designation_id = '';
	var $address='';
	var $telephoneno='';
	var $mobileno= '';
	var $email = '';
	var $dob='';
	var $gender = '';
	var $salarytype='';
	
	private $tbl_faculty= 'faculty';
	
	public function __construct()
	{
	
		//$this->load->database();
	}
	
	function count_all(){
		return $this->db->count_all($this->tbl_faculty);
	}
	
	 function save($staff){
		$this->db->insert($this->tbl_faculty, $staff);
		return $this->db->insert_id();
	} 
	
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('faculty_id','asc');
		return $this->db->get($this->tbl_faculty, $limit, $offset);
	}
	
	function get_by_id($id){
	echo "id";
		$this->db->where('faculty_id', $id);
		return $this->db->get($this->tbl_faculty);
	}
	
	
	function checkValidation()
	{
		$query = $this->db->query('select * from faculty.faculty where name = "'.$this->name.'" and email = "'.$this->email_id.'"');
		if($query->num_rows() == 1)
		{
			return true;
		}
		else 
		{
			return false;
		}
	} 
	
	function insertData($name,$designation_id,$address,$telephone_no,$mobile_no,$email_id,$dob,$gender)
	{
		echo "in model";
		$insertQuery = $this->db->query('INSERT INTO faculty (name, designation_id,address,telephone_no,mobile_no,email_id,dob,gender) 
			VALUES ("'.$name.'","'.$designation_id.'","'.$address.'","'.$telephone_no.'","'.$mobile_no.'","'.$email_id.'","'.$dob.'","'.$gender.'")');
			
			$id = mysql_insert_id();
			
			
			return $insertQuery = $this->db->query('INSERT INTO user_master (faculty_id,email_id) VALUES ("'.$id.'","'.$email_id.'")');
			
			
			
			//return $insertQuery = $this->db->query('INSERT INTO demoapp (name, designation,address,telephoneno,mobileno,email,dob,gender,salarytype) 
			//VALUES ("'.$name.'","'.$designation.'","'.$address.'","'.$this->telephoneno.'","'.$this->mobileno.'", "'.$this->email.'","'.$this->dob.'","'.$this->gender.'","'.$this->salarytype.'")');
	}
	//delete person by id
	function delete($id){
		$this->db->where('faculty_id', $id);
		$this->db->delete($this->tbl_faculty);
		
	}
	// update person by id
	function update($id,$staff){
		$this->db->where('faculty_id',$id);
		$this->db->update($this->tbl_faculty,$staff);
	} 
}
?>