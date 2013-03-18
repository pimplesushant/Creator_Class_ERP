<?php
class AddClassModel extends CI_Model {
	var $classid = '';
	var $class_name = '';
	var $mobile = '';
	var $telephone_number = '';
	var $address = '';
	var $image= '';
	var $email_id = '';
	//var $password = '';
	
	
	
	
	
	public function __construct()
	{
		
	}
	
	function insertClass($filepath)
	{
		$insertQuery = $this->db->query('INSERT INTO class_erp.class (class_name, mobile_no, telephone_no, address, image) VALUES ("'.$this->class_name.'", "'.$this->mobile.'","'.$this->telephone_number.'","'.$this->address.'","'.$filepath.'")');
		return $class_id=mysql_insert_id();
	}
	
	function insertAdminMaster($class_id,$user_type)
	{
		return $insertQuery = $this->db->query('INSERT INTO class_erp.admin_master (class_id, email_id, user_type) VALUES ("'.$class_id.'", "'.$this->email_id.'","'.$user_type.'")');
	}
	
	// Retrieve one class record
  function getClass($class_id)
  {
    return $this->db->get_where('class', array('class_id'=> $class_id));
  }
  
  function getAdminMaster($class_id)
  {
    return $this->db->get_where('admin_master', array('class_id'=> $class_id));
  }
  
  // Update one class record
  function updateClass($class_id, $filepath)
  {
        $this->db->query('UPDATE class SET class_name = "'.$this->class_name.'", mobile_no = "'.$this->mobile.'", telephone_no = "'.$this->telephone_number.'", address = "'.$this->address.'", image = "'.$filepath.'" WHERE class_id="'.$class_id.'"');
  }
  
  function updateAdminMaster($class_id)
  {
        $this->db->query('UPDATE admin_master SET email_id = "'.$this->email_id.'" WHERE class_id="'.$class_id.'"');

  }
  
  function uploadfile()
	{
		echo "in model function";
		
		$dt=date("Y-m-d");
		return $insertQuery = $this->db->query('INSERT INTO online_es.upload (file_name,link) 
			VALUES ("'.$file_name.'","'.$file_path.'")');
	}
}

?>