<?php
class Add_subject_model extends CI_Model {
	var $name = '';
	private $tbl_subject= 'subject';
	
	public function __construct()
	{
	
		//$this->load->database();
	}
	
	 function save($add_subject_ctrl){
		$this->db->insert($this->tbl_subject, $add_subject_ctrl);
		return $this->db->insert_id();
	} 
	
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('subject_id','asc');
		return $this->db->get($this->tbl_subject, $limit, $offset);
	}
	 function count_all(){
		return $this->db->count_all($this->tbl_subject);
	}
	
     function get_by_id($id){
	    echo "id";
		$this->db->where('subject_id', $id);
		return $this->db->get($this->tbl_subject);
	}
	
	function insertData($branch_id,$name)
	{
		
		$insertQuery = $this->db->query('INSERT INTO subject (branch_id,name) VALUES ("'.$branch_id.'","'.$name.'")');
			
			$id = mysql_insert_id();
			//return $insertQuery = $this->db->query('INSERT INTO standard (branch_id,name) VALUES ("'.$branch_id.'","'.$name.'")');
			
			
	}
	//delete person by id
	function delete($id){
		$this->db->where('branch_id', $id);
		$this->db->delete($this->tbl_subject);
		
	}
	// update person by id
	function update($id,$add_subject_ctrl){
		$this->db->where('branch_id',$id);
		$this->db->update($this->tbl_subject,$add_subject_ctrl);
	} 
	}
	?>