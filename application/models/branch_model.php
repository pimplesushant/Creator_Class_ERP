<?php
class Branch_Model extends CI_Model {
	
	private $tbl_person= 'branch';
	
	public function __construct()
	{
		//$this->load->database();
	}
	
	function list_all(){
		$this->db->order_by('branch_id','asc');
		return $this->db->get($tbl_person);
	}
	
	function count_all(){
		return $this->db->count_all($this->tbl_person);
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('branch_id','asc');
		return $this->db->get($this->tbl_person, $limit, $offset);
	}
	
	function get_by_id($branch_id){
		$this->db->where('branch_id', $branch_id);
		return $this->db->get($this->tbl_person);
	}
	
	function save($person){
		$this->db->insert($this->tbl_person, $person);
		return $this->db->insert_id();
	}
	
	function update($branch_id, $branch){
		$this->db->where('branch_id', $branch_id);
		$this->db->update($this->tbl_person, $branch);
	}
	
	function delete($branch_id){
		$this->db->where('branch_id', $branch_id);
		$this->db->delete($this->tbl_person);
	}
	
	function insertData($branchname,$email,$telephone,$mobile,$branchaddress)
	{
		
		return $insertQuery = $this->db->query('INSERT INTO branch (name,email_id,telephone_no,mobile_no,address) 
			VALUES ("'.$branchname.'","'.$email_id.'" ,"'.$telephone_number.'","'.$mobile.'","'.$branchaddress.'")');
	}
	
	/*function insertData($email)
	{
		
		return $insertQuery = $this->db->query('INSERT INTO enrolled (email_id,) 
			VALUES ("'.$email.'")');
	}*/
	 
	 
	
}

?>