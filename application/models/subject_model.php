<?php
class Subject_Model extends CI_Model {
	
	private $tbl_person= 'subject';
	
	public function __construct()
	{
		//$this->load->database();
	}
	
	function list_all(){
		$this->db->order_by('subject_id','asc');
		return $this->db->get($tbl_person);
	}
	
	function count_all(){
		return $this->db->count_all($this->tbl_person);
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('subject_id','asc');
		return $this->db->get($this->tbl_person, $limit, $offset);
	}
	
	function get_by_id($subject_id){
		$this->db->where('subject_id', $subject_id);
		return $this->db->get($this->tbl_person);
	}
	
	function save($person){
		$this->db->insert($this->tbl_person, $person);
		return $this->db->insert_id();
	}
	
	function update($subject_id, $subject){
		$this->db->where('subject_id', $subject_id);
		$this->db->update($this->tbl_person, $subject);
	}
	
	function delete($subject_id){
		$this->db->where('subject_id', $subject_id);
		$this->db->delete($this->tbl_person);
	}
	
	
	function insertData($subname)
	{
		
		return $insertQuery = $this->db->query('INSERT INTO subject (name) 
			VALUES ("'.$subname.'")');
	}
	
	
}

?>