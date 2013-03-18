<?php
class Bank_Model extends CI_Model {
	
	private $tbl_person= 'bank_master';
	
	public function __construct()
	{
		//$this->load->database();
	}
	
	function list_all(){
		$this->db->order_by('bank_id','asc');
		return $this->db->get($tbl_person);
	}
	
	function count_all(){
		return $this->db->count_all($this->tbl_person);
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('bank_id','asc');
		return $this->db->get($this->tbl_person, $limit, $offset);
	}
	
	function get_by_id($bank_id){
		$this->db->where('bank_id', $bank_id);
		return $this->db->get($this->tbl_person);
	}
	
	function save($person){
		$this->db->insert($this->tbl_person, $person);
		return $this->db->insert_id();
	}
	
	function update($bank_id, $person){
		$this->db->where('bank_id', $bank_id);
		$this->db->update($this->tbl_person, $person);
	}
	
	function delete($bank_id){
		$this->db->where('bank_id', $bank_id);
		$this->db->delete($this->tbl_person);
	}
	
	
	function insertData($bank_name,$bank_address,$account_number,$ifsc,$micr)
	{
		$data = array(
               'bank_name' => $bank_name,
               'bank_address' => $bank_address,
               'account_number' => $account_number,
				'ifsc' => $ifsc,
               'micr' => $micr      
            );
		return $this->db->insert('bank_master', $data);
		
		//return $insertQuery = $this->db->query('INSERT INTO bank_master (bank_name,bank_address,account_number,ifsc,micr) 
			//VALUES ("'.$bank_name.'","'.$bank_address.'","'.$account_number.'","'.$ifsc.'","'.$micr.'")');
	}
	
	/* function insertData($branchname,$email,$telephone,$mobile,$branchaddress)
	{
		
		return $insertQuery = $this->db->query('INSERT INTO user_master (name,email_id,telephone_no,mobile_no,address) 
			VALUES ("'.$branchname.'","'.$email.'" ,"'.$telephone.'","'.$mobile.'","'.$branchaddress.'")');
	}
	 */
}

?>