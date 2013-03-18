<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_Model extends CI_Model 
{
	public function __construct()
	{
		 parent::__construct();
	}
	
	function checkauth($email_id,$password)
	{
	
		$query = $this->db->query('select * from class_erp.login where email_id="'.$email_id .'"and password = "'.$password.'"');
		if($query->num_rows() == 1)
			return true;
			else 
			return false;
			
	}
		
	function display($email_id,$password)
	
	{
		//$query = $this->db->query('select * from class_erp.login where email_id="'.$email_id .'"and password = "'.$password.'"');
		$query="SELECT * FROM class_erp.login WHERE email_id='$email_id' and password='$password'";
			$count=	mysql_query($query);
			$ptr=mysql_fetch_array($count);
			$user_type=$ptr['user_type'];
			return $user_type;
		
	}
}	
?>