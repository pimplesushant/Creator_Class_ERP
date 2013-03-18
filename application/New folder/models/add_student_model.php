<?php
class Add_Student_Model extends CI_Model {
	var $reg_no='';
	var $app_no='';
	var $date='';
	var $standard_name='name';
	var $standard_id='standard_id';
	var $name = '';
	var $gender = '';
	var $dob='';
	var $mothertongue='';
	var $email_id = '';
	var $address='';
	var $mobile_no= '';
	var $telephone_no='';
	var $school='';
	
	
	
	
	private $tbl_standard= 'standard';
	
	public function __construct()
	{
	
		
	}
	function getstandard()
		{
		  
		  $this->db->from($this->tbl_standard);
    $this->db->order_by('standard_id');
    $result = $this->db->get();
    $return = array();
    if($result->num_rows() > 0){
            $return[''] = 'please select';
        foreach($result->result_array() as $row){
            $return[$row['standard_id']] = $row['name'];
        }
    }
    return $return;
		  
		  
		  
		  
		  /*$this->db->select('standard_id,name');
		  
		 
		 return $records=$this->db->get('standard');
		  $data=array();
		  foreach($records->result() as $row)
		  {
		   
		   $data[] = $row->standard_id;
		   $data[] = $row->name;
			
		  }
		  return ($data); */
		}
 
	/* function getstandardId()
		{
		  $this->db->select('standard_id');
		  
		 
		 $records=$this->db->get('standard');
		  $data=array();
		  foreach($records->result() as $row)
		  {
		   $data[$row->standard_id] = $row->standard_id;
		  		
		  }
		  return ($data);
		} */
 
	
	function insertStudentData($reg_no,$app_no,$date,$standard,$branch_id,$name,$gender,$dob,$mothertongue,$email_id,$address,$mobile_no,$telephone_no,$school,$file_path)
	{
		
		$insertQuery = $this->db->query('INSERT INTO student (reg_no,app_no,registration_date,standard_id,branch_id,full_name,gender,dob,mothertongue,email_id,address,mobile_no,telephone_no,school,image) 
						VALUES ("'.$reg_no.'","'.$app_no.'","'.$date.'","'.$standard.'","'.$branch_id.'","'.$name.'","'. $gender .'","'.$dob.'","'.$mothertongue.'","'.$email_id.'","'.$address.'","'.$mobile_no.'","'.$telephone_no.'","'.$school.'","'.$file_path.'")');
		$id = mysql_insert_id();
			//return TRUE;
			
			
	}
	
	
	
}
?>