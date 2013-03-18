<?php
class LoginModel extends CI_Model 
{
	
	var $password = '';
	var $email_id = '';
	
	public function __construct()
	{
		//$this->load->database();
	}
	
	function checkauth()
	{
	//echo "in model";
	$query = $this->db->query('select * from class_erp.login where email_id="'.$this->email_id .'"and password = "'.$this->password.'"');
	if($query->num_rows() == 1)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
}
	/* echo $this->email_id;
	echo $this->password;
		
		
		
		 $ptr=mysql_fetch_array($query);
		
		echo $ptr['user_type']; 
		
	 if($query->num_rows() == 1)
		return true;
			
			
	 if($ptr['user_type']=='1')
	{	
		session_start();
		 $_SESSION['email_id']=$ptr['email_id'];
		 $_SESSION['user_type']=$ptr['user_type'];
		 
		header("location:Adminview.php");
	}
	else if($ptr['user_type']=='2')
	{
			session_start();	
		$_SESSION['email_id']=$ptr['email_id'];
		 $_SESSION['user_type']=$ptr['user_type'];
		header("location:welcome_view.php");
	}
	else if($ptr['user_type']=='3')
	{
			session_start();	
		$_SESSION['email_id']=$ptr['email_id'];
		 $_SESSION['user_type']=$ptr['user_type'];
		header("location:studentview.php");
	}
	else if($ptr['user_type']=='4')
	{
			session_start();	
		$_SESSION['email_id']=$ptr['email_id'];
		 $_SESSION['user_type']=$ptr['user_type'];
		header("location:guardianview.php");
	}
	
	else
	{ session_start();
		$_SESSION["message"] = "Please Enter Valid Email Id And Password";
		header("location:login_home.php");
	}
	
		
		else 
		return false;
			 
		 
	 
	
	}
}*/
?>