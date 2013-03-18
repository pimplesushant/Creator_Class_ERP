<?php
class Class_model extends CI_Model {
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
		$data = array(
               'class_name' => $this->class_name,
               'mobile_no' => $this->mobile,
               'telephone_no' => $this->telephone_number,
			   'address' => $this->address,
               'image' => $filepath			   
            );
		$this->db->insert('class', $data);
		//$insertQuery = $this->db->query('INSERT INTO class_erp.class (class_name, mobile_no, telephone_no, address, image) VALUES ("'.$this->class_name.'", "'.$this->mobile.'","'.$this->telephone_number.'","'.$this->address.'","'.$filepath.'")');
		return $class_id=mysql_insert_id();
	}
	
	function insertAdminMaster($class_id,$user_type)
	{
		$data = array(
               'class_id' => $class_id,
               'email_id' => $this->email_id,
               'user_type' => $user_type  
            );
		return $this->db->insert('admin_master', $data);
		
		//return $insertQuery = $this->db->query('INSERT INTO class_erp.admin_master (class_id, email_id, user_type) VALUES ("'.$class_id.'", "'.$this->email_id.'","'.$user_type.'")');
	}
	
	// Retrieve one class record
  function getClass($class_id)
  {
    return $this->db->get_where('class', array('class_id'=> $class_id));
  }
  
  function getClassStatus($class_id)
  {
	$this->db->select('status');
	//$this->db->from('class');
	return $query = $this->db->get_where('class',array('class_id'=> $class_id));
  }
  
  function setClassStatus($class_id,$status)
  {
	$data = array(
               'status' => $status	   
            );
	$this->db->where('class_id', $class_id);
	return $this->db->update('class', $data); 
	
	//return $this->db->query('UPDATE class SET status = "'.$status.'" WHERE class_id="'.$class_id.'"');
  }
  
  function getAdminMaster($class_id)
  {
    return $this->db->get_where('admin_master', array('class_id'=> $class_id));
  }
  
  // Update one class record
  function updateClass($class_id, $filepath)
  {
		$data = array(
               'class_name' => $this->class_name,
               'mobile_no' => $this->mobile,
               'telephone_no' => $this->telephone_number,
			   'address' => $this->address,
               'image' => $filepath
            );
		$this->db->where('class_id', $class_id);
		return $this->db->update('class', $data); 
		
		//return $this->db->query('UPDATE class SET class_name = "'.$this->class_name.'", mobile_no = "'.$this->mobile.'", telephone_no = "'.$this->telephone_number.'", address = "'.$this->address.'", image = "'.$filepath.'" WHERE class_id="'.$class_id.'"');
  }
  
  function updateAdminMaster($class_id)
  {
        $data = array(
               'email_id' => $this->email_id	   
            );
		$this->db->where('class_id', $class_id);
		return $this->db->update('admin_master', $data);
		
		//return $this->db->query('UPDATE admin_master SET email_id = "'.$this->email_id.'" WHERE class_id="'.$class_id.'"');
  }
  
  function dalete_image($primary_key)
  {
		$this->db->where('class_id',$primary_key);
		return $user = $this->db->get('class')->row();
  }
}

?>