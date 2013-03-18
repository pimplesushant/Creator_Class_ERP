<?php
class Designation_Model extends CI_Model {
	
	private $tbl_person= 'designation';
	
	public function __construct()
	{
		//$this->load->database();
	}
	
	function list_all(){
		$this->db->order_by('designation_id','asc');
		return $this->db->get($tbl_person);
	}
	
	function count_all(){
		return $this->db->count_all($this->tbl_person);
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('designation_id','asc');
		return $this->db->get($this->tbl_person, $limit, $offset);
	}
	
	function get_by_id($designation_id){
		$this->db->where('designation_id', $designation_id);
		return $this->db->get($this->tbl_person);
	}
	
	function save($person){
		$this->db->insert($this->tbl_person, $person);
		return $this->db->insert_id();
	}
	
	function update($designation_id, $designation){
		$this->db->where('designation_id', $designation_id);
		$this->db->update($this->tbl_person, $designation);
	}
	
	function delete($designation_id){
		$this->db->where('designation_id', $designation_id);
		$this->db->delete($this->tbl_person);
	}
	
	function insertData($designationname, $description)
	{
		
		return $insertQuery = $this->db->query('INSERT INTO designation (designation_name,description) 
			VALUES ("'.$designationname.'","'.$description.'")');
	}
	
	/* function insertData($branchname,$email,$telephone,$mobile,$branchaddress)
	{
		
		return $insertQuery = $this->db->query('INSERT INTO user_master (name,email_id,telephone_no,mobile_no,address) 
			VALUES ("'.$branchname.'","'.$email.'" ,"'.$telephone.'","'.$mobile.'","'.$branchaddress.'")');
	}
	 */
}

?>