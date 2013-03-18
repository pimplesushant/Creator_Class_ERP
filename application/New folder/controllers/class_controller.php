<?php if (!defined('BASEPATH')) die();
class Class_controller extends Main_Controller {

	function __construct()
    {
        parent::__construct();
		//load database
        $this->load->database();
		//load helper
        $this->load->helper(array('form', 'url'));
		//load library
		$this->load->library(array('table','form_validation'));
	    $this->load->library('grocery_CRUD');
		//load model
		$this->load->model('AddClassModel','',TRUE);
    }

	public function index()
	{
		$this->load->view('include/header_bootstrap');
		$this->load->view('add_class'); 
		$this->load->view('include/footer');
	}
	
	function class_add()
	{	
		//set validation rules
		$this->_set_class_rules();
		//pass values by _POST method to Model Variables
		$this->AddClassModel->class_name = $this->input->post('class_name');
		$this->AddClassModel->address = $this->input->post('address');
		$this->AddClassModel->telephone_number = $this->input->post('telephone_no');
		$this->AddClassModel->mobile = $this->input->post('mobile_no');
		$this->AddClassModel->email_id = $this->input->post('email_id');
		//Call function to Upload Image and receive image details
		$filepath=$this->upload_done();
		//Get image full path from received data
		$full_path_to_image=$filepath['full_path'];
		//check if validation is done properly
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('include/header_bootstrap');
			$this->load->view('add_class'); 
			$this->load->view('include/footer');	
		}
		else
		{	
			//insert class details to class table
			$result1 = $this->AddClassModel->insertClass($full_path_to_image);
			$user_type= 1; //superadmin(class) usertype is 1
			//insert superadmin login details to admin master table
			$result = $this->AddClassModel->insertAdminMaster($result1,$user_type);
			if($result)
			{		
				$this->load->view('include/header_bootstrap');
				$this->load->view('add_class'); 
				$this->load->view('include/footer');	
			}
			else 
			{				
				$this->form_validation->set_message('Please enter correct username and password');	
				echo "Failure";
			}
		}
	}
	
	function edit()
	{
		$this->load->helper('form');
		//get class id from URL segment
		$id = $this->uri->segment(3);
		//get data from class by passing id
		$data['row'] = $this->AddClassModel->getClass($id)->result();
		//get data from admin master by passing id
		$data['row1'] = $this->AddClassModel->getAdminMaster($id)->result();
		//set title for edit page
		//$data['title'] = "Creator's Class ERP: Edit Class";
		// set headline for edit page
		$data['headline'] = '<div class="container"> <legend> Edit Class Information </legend>';
		//actual edit view to be included
		$data['include'] = 'class_edit';
		$this->load->view('template', $data);
	}

	function update()
	{
		
		//get class id form form
		$class_id=$this->input->post('class_id');
		//set validation rules
		$this->_set_class_rules();
		//pass values by _POST method to Model Variables
		$this->AddClassModel->class_name = $this->input->post('class_name');
		$this->AddClassModel->address = $this->input->post('address');
		$this->AddClassModel->telephone_number = $this->input->post('telephone_no');
		$this->AddClassModel->mobile = $this->input->post('mobile_no');
		$this->AddClassModel->email_id = $this->input->post('email_id');
		//Call function to Upload Image and receive image details
		$filepath=$this->upload_done();
		//Get image full path from received data
		$full_path_to_image=$filepath['full_path'];
		$this->AddClassModel->updateClass($class_id, $full_path_to_image);
		$this->AddClassModel->updateAdminMaster($class_id);
		redirect('class_controller/show_grid','refresh');
	}
	
	function upload_done() 
	{
		//set configuration for file upload 
		$config['overwrite'] = TRUE;
		$config['encrypt_name'] = FALSE;
		$config['remove_spaces'] = TRUE;
		$config['upload_path'] = 'C:\wamp\www\Creator_Class_ERP\assets\uploads\files'; // use an absolute path
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = '0'; 
		//check if upload directory is available
		if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
		//load library with above configuration
		$this->load->library('upload',$config);
		//upload imagee and get result data or error
		if ( ! $this->upload->do_upload('image') )
		{
			"UPLOAD ERROR ! ".$this->upload->display_errors();
		} 
		else 
		{
			return $this->upload->data();
		}
	}
	
	function _set_class_rules()
	{
		$config_rules = array(
		   array(
				 'field'   => 'class_name',
				 'label'   => 'Class Name',
				 'rules'   => 'required|min_length[3]'
			  ),
			  array(
				 'field'   => 'address',
				 'label'   => 'Address',
				 'rules'   => 'required|min_length[2]'
			  ),
			  array(
				 'field'   => 'telephone_no',
				 'label'   => 'Telephone Number',
				 'rules'   => 'required|min_length[6]|integer'
			  ),
			  array(
				 'field'   => 'mobile_no',
				 'label'   => 'Mobile Number',
				 'rules'   => 'required|min_length[10]|max_length[13]|integer'
			  ),
			  array(
				 'field'   => 'email_id',
				 'label'   => 'Email',
				 'rules'   => 'required|valid_email'
			  )
         );		
		$this->form_validation->set_rules($config_rules);
	}
    

	function show_grid()
    {
		$crud = new grocery_CRUD();
		//$crud->set_theme('datatables');
        $crud->set_table('class');
		$crud->columns('class_id','class_name','mobile_no','telephone_no','address');
		$crud->display_as('class_name','Class Name')
			 ->display_as('mobile_no','Mobile No.')
			 ->display_as('telephone_no','Telephone No')
			 ->display_as('address','Address')
			 ->display_as('class_id','Class ID');
		$crud->set_subject('Class');
		$crud->unset_edit();
		$crud->unset_add();
		$crud->add_action('Update', '', 'class_controller/edit','icon-edit');
		$crud->callback_before_delete(array($this,'delete_image_before_delete'));
		$crud->required_fields('class_name','mobile_no','telephone_no','address');
		$crud->set_field_upload('image','assets/uploads/files');
        $output = $crud->render();
        $this->_example_output($output);        
    }
	
	function delete_image_before_delete($primary_key)
	{
		$this->db->where('class_id',$primary_key);
		$user = $this->db->get('class')->row();
		if(empty($user))
		{
			return false;
		}
		$image=$user->image;
		unlink($image);
		return true;
	}
 
    function _example_output($output = null)
    {
		$this->load->view('include/header_bootstrap');
		$this->load->view('grid_template',$output); 
		$this->load->view('include/footer');		
    }
	
	function view_class_form()
    {
		$this->load->view('include/header_bootstrap');
		$this->load->view('add_class'); 
		$this->load->view('include/footer');		
    }
   
}

/* End of file class_controller.php */
/* Location: ./application/controllers/class_controller.php */
