<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class add_staff_ctrl extends CI_Controller 
{
	 // num of records per page
	private $limit = 100;
	
	function __construct(){
		
		parent::__construct();
		
		// load library
		$this->load->library(array('table','form_validation'));
		
		// load helper
		$this->load->helper('url');
		
		// load model
		$this->load->model('add_staff_model','',true);
	}
	
	function index($offset = 0)
	{
		// offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		
		$persons = $this->add_staff_model->get_paged_list($this->limit, $offset)->result();
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('person/index/');
 		$config['total_rows'] = $this->add_staff_model->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		// generate table data
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('No', 'Name', 'Gender', 'Date of Birth','Telephone No','mobile No','Email','Address', 'Update','Delete');
		$i = 0 + $offset;
		foreach ($persons as $person){
			$this->table->add_row(++$i, $person->name,$person->gender, date('d-m-Y',strtotime($person->dob)),
			$person->telephone_no,$person->mobile_no,$person->email_id,$person->address,
				
				anchor('add_staff_ctrl/update/'.$person->faculty_id,'update',array('class'=>'update')),
				anchor('add_staff_ctrl/delete/'.$person->faculty_id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this staff?')"))
			);
		}
		$data['table'] = $this->table->generate();
		
		$data['action'] = site_url('add_staff_ctrl/addstaff');
		$data['link_back'] = anchor('add_staff_ctrl/index/','back to list of staff',array('class'=>'back'));
		
		$this->load->view('include/header_admin');
		$this->load->view('add_staff', $data);
		$this->load->view('include/footer');
		//print_r($offset); print total number of record http://localhost/codeigniter/index.php/add_staff_ctrl/index/10
		
		}
	function add()
	{
		// set validation properties
		//$this->_set_fields();
		
		// set common properties
		$data['title'] = 'add new person';
		$data['message'] = '';
		$data['action'] = site_url('add_staff_ctrl/addstaff');
		$data['link_back'] = anchor('add_staff_ctrl/index/','back to list of persons',array('class'=>'back'));
	
		// load view
		$this->load->view('update_staff', $data);
	}
	
	function addstaff()
	{
		//echo "add staff";
		// set common properties
		$data['title'] = 'add new person';
		$data['action'] = site_url('add_staff_ctrl/addstaff');
		$data['link_back'] = anchor('add_staff_ctrl/index/','back to list of persons',array('class'=>'back'));
		
		// set validation properties
		//$this->_set_fields();
		$this->_set_rules();
		
		// run validation
		if ($this->form_validation->run() == FALSE){
		$data['message'] = '';
	
		
		}else{
			// save data
			 $staff= array('name' => $this->input->post('full_name'),
							'designation_id' => $this->input->post('designation_id'),
							'address' => $this->input->post('address'),
							//'email' => $this->input->post('email'),
							'dob' => date('y-m-d', strtotime($this->input->post('dob'))));
			 
			
			 $name = $this->input->post('name');
			 $designation = $this->input->post('designation_id');
			 $address = $this->input->post('address');
			 $email_id = $this->input->post('email');
			 $telephone_no = $this->input->post('telephone_no');
		     $mobile_no = $this->input->post('mobile');  
			
			 $d1 = $this->input->post('d1');
			 $d2 = $this->input->post('d2');
			 $d3 = $this->input->post('d3');
			 $demodate=$d1."-".$d2."-".$d3;
			 $dob = date('Y-m-d', strtotime($demodate));
			 
			 $gender = $this->input->post('gender');
		     $salarytype = $this->input->post('salarytype');
			//echo  $mobile_no ;
			$id = $this->add_staff_model->insertData($name,$designation,$address,$telephone_no,$mobile_no,$email_id,$dob,$gender);
			
			// set form input name="id"
			//$this->validation->id = $id;
			
			 //set user message
			$data['message'] = '<div class="success">add new standard success</div>';
			
			redirect('add_staff_ctrl/index');
		}
		
		
		
	}
	function view($id){
		// set common properties
		$data['title'] = 'staff Details';
		$data['link_back'] = anchor('add_staff_ctrl/index/','Back to list of persons',array('class'=>'back'));
		
		// get person details
		$data['staff'] = $this->add_staff_model->get_by_id($id)->row();
		
		// load view
		$this->load->view('add_staff', $data);
	}
	
	function update($id){
		// set validation propertie
		//$this->_set_fields();
		
		
		// prefill form values
		$staff = $this->add_staff_model->get_by_id($id)->row();
		$this->form_validation->id = $id;
		$this->form_validation->name = $staff->name;
		$this->form_validation->address = $staff->address;
		$this->form_validation->telephone_no = $staff->telephone_no;
		$this->form_validation->mobile_no = $staff->mobile_no;
		$this->form_validation->email_id = $staff->email_id;
		$_POST['gender'] = strtoupper($staff->gender);
		$this->form_validation->dob = date('d-m-Y',strtotime($staff->dob));
		
		// set common properties
		
		$data['title'] = 'Update staff';
		$data['message'] = '';
		$data['action'] = site_url('add_staff_ctrl/updatestaff');
		$data['link_back'] = anchor('add_staff_ctrl/index/','Back to list of persons',array('class'=>'back'));
	
		// load view
		$this->load->view('include/header_admin');
		$this->load->view('update_staff', $data);
		$this->load->view('include/footer');
	}
	
	function updatestaff(){
		// set common properties
		$data['title'] = 'Update staff';
		$data['link_back'] = anchor('add_staff_ctrl/index/','Back to list of persons',array('class'=>'back'));
		
		// set validation properties
		//$this->_set_fields();
		$this->_set_rules();
		
		// run validation
		if ($this->form_validation->run() == FALSE){
			$data['message'] = '';
		}else{
			// save data
			$id = $this->input->post('id');
			$staff = array('name' => $this->input->post('name'),
			'designation_id' => $this->input->post('designation_id'),
			'address' =>$this->input->post('address'),
			'telephone_no' => $this->input->post('telephone_no'),
			'mobile_no' => $this->input->post('mobile_no'),
			'email_id' => $this->input->post('email'),
			'gender' => $this->input->post('gender'),
			'dob' => date('Y-m-d', strtotime($this->input->post('dob'))));
							
			$this->add_staff_model->update($id,$staff);
			
			// set user message
			$data['message'] = '<div class="success">update person success</div>';
			$staff = $this->add_staff_model->get_by_id($id)->row();
			
			$this->form_validation->id = $id;
		$this->form_validation->name = $staff->name;
		$this->form_validation->address = $staff->address;
		$this->form_validation->telephone_no = $staff->telephone_no;
		$this->form_validation->mobile_no = $staff->mobile_no;
		$this->form_validation->email_id = $staff->email_id;
		$_POST['gender'] = strtoupper($staff->gender);
		$this->form_validation->dob = date('d-m-Y',strtotime($staff->dob));
		
		    $data['action'] = site_url('add_staff_ctrl/addstaff');
			//$this->load->view('update_staff', $data);
		}
		
		// load view
		$this->index();
	}
	
	function delete($id){
		// delete person
		$this->add_staff_model->delete($id);
		
		// redirect to person list page
		redirect('add_staff_ctrl/index/','refresh');
	}
	
	
	
	// validation fields
	 /* function _set_fields()
	{
		$fields['id'] = 'id';
		$fields['name'] = 'name';
		$fields['designation_id'] = 'designation_id';
		$fields['dob'] = 'dob';
		
		$this->form_validation->_set_fields($fields);
	}  */
	
	// validation rules
	
	function _set_rules(){
		$config = array(
               array(
                     'field'   => 'name',
                     'label'   => 'FullName',
                     'rules'   => 'required'
                  )/* ,
				   array(
                     'field'   => 'designation_id',
                     'label'   => 'designation_id',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'address',
                     'label'   => 'Address',
                     'rules'   => 'required'
                  ),
				   array(
                     'field'   => 'telephone_no',
                     'label'   => 'telephone_no',
                     'rules'   => 'required|min_length[11]|max_length[13]|integer'
                  ),
               array(
                     'field'   => 'mobile_number',
                     'label'   => 'mobile_number',
                     'rules'   => 'required|min_length[10]|max_length[13]|integer'
                  ) ,   
               array(
                     'field'   => 'email',
                     'label'   => 'Email',
                     'rules'   => 'required'
                  )/* ,
				  array(
                     'field'   => 'gender',
                     'label'   => 'gender',
                     'rules'   => 'required'
                  ),
				   array(
                     'field'   => 'salarytype',
                     'label'   => 'salarytype',
                     'rules'   => 'required'
                  ), */
            );
 $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
$this->form_validation->set_rules($config); 
	}
	
	// date_validation callback
	function valid_date($str)
	{
		if(!preg_match('/^(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-([0-9]{4})$/', $str))
		{
			$this->form_validation->_set_message('valid_date', 'date format is not valid. yyyy-mm-dd');
			return false;
		}
		else
		{
			return true;
		}
	} 
}
?>