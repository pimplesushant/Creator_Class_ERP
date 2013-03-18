<?php
class Add_Guardiandetail_Model extends CI_Model {
	
	var $guardian_name='';
	var $address='';
    var $email_id='';
	var $mobile_no='';
	var $telephone_no='';
	var $relation='';
	
	
	public function __construct()
	{
	
		
	}
	
		
	function insertGuardianData($guardian_name,$address,$email_id,$mobile_no,$telephone_no,$relation)
	{
		
		$insertQuery = $this->db->query('INSERT INTO guardian (guardian_name,address,email_id,mobile_no,telephone_no,relation) 
						VALUES ("'.$guardian_name.'","'.$address.'","'.$email_id.'","'.$mobile_no.'","'.$telephone_no.'","'.$relation.'")');
		$id1 = mysql_insert_id();
		
	}
}
?>