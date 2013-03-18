<?php
class Add_standard_model extends CI_Model {
	var $std_name= '';
	
	private $tbl_standard= 'standard';
	
	public function __construct()
	{
	
		//$this->load->database();
	}
	function count_all(){
		return $this->db->count_all($this->tbl_standard);
	}
	
	 function save($standard){
		$this->db->insert($this->tbl_standard, $standard);
		return $this->db->insert_id();
	} 
	
	 function get_paged_list($limit = 10, $offset = 0){

		$this->db->order_by('standard_id','asc');
		return $this->db->get($this->tbl_standard, $limit, $offset);
	}  
	 
	function get_by_id($id){
	echo "id";
		$this->db->where('standard_id', $id);
		return $this->db->get($this->tbl_standard);
	}
	
	
	
	/* function checkValidation()
	{
		$query = $this->db->query('select * from standard.standard where std_name = "'.$this->std_name.'"');
		if($query->num_rows() == 1)
		{
			return true;
		}
		else 
		{
			return false;
		} 
	} */
	
	function insertData($std_name,$subject)
	{
		echo "in model";
		$insertQuery = $this->db->query('INSERT INTO standard (std_name,subject),
			VALUES ("'.$std_name.'","'.$subject.'")');
			
			$id = mysql_insert_id();
			
			
			
	}
	 /* //delete person by id
	function delete($id){
		$this->db->where('standard_id', $id);
		$this->db->delete($this->tbl_standard);
		
	}
	// update person by id
	function update($id,$standard){
		$this->db->where('standard_id',$id);
		$this->db->update($this->tbl_standard,$standard);
	} */
}
?>