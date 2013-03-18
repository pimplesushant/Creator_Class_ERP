<?php
class Batch_Model extends CI_Model {
	
	private $tbl_person= 'batch';
	
	public function __construct()
	{
		//$this->load->database();
	}
	
	function list_all(){
		$this->db->order_by('batch_id','asc');
		return $this->db->get($tbl_person);
	}
	
	function count_all(){
		return $this->db->count_all($this->tbl_person);
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('batch_id','asc');
		return $this->db->get($this->tbl_person, $limit, $offset);
	}
	
	function get_by_id($batch_id){
		$this->db->where('batch_id', $batch_id);
		return $this->db->get($this->tbl_person);
	}
	
	function save($person){
		$this->db->insert($this->tbl_person, $person);
		return $this->db->insert_id();
	}
	
	function update($batch_id, $batch){
		$this->db->where('batch_id', $batch_id);
		$this->db->update($this->tbl_person, $batch);
	}
	
	function delete($batch_id){
		$this->db->where('batch_id', $batch_id);
		$this->db->delete($this->tbl_person);
	}
	
	
	function insertData($batchname, $standard)
	{
		
		return $insertQuery = $this->db->query('INSERT INTO batch (name,standard_id) 
			VALUES ("'.$batchname.'","'.$standard.'")');
	}
	
	/* function insertData($branchname,$email,$telephone,$mobile,$branchaddress)
	{
		
		return $insertQuery = $this->db->query('INSERT INTO user_master (name,email_id,telephone_no,mobile_no,address) 
			VALUES ("'.$branchname.'","'.$email.'" ,"'.$telephone.'","'.$mobile.'","'.$branchaddress.'")');
	}
	 */
}

?>