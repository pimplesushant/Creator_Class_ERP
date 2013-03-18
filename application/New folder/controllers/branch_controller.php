<?php if (!defined('BASEPATH')) die();
class Branch_Controller extends CI_Controller 
{
	private $limit=20;
	
	function __construct(){
		parent::__construct();
		
		// load library
		$this->load->library(array('table','form_validation'));
			//$this->load->library('table');

		// load helper
		$this->load->helper('url');
		
		// load model
		$this->load->model('branch_model','',TRUE);
	}
 public function index($offset=0)
	{
	
		
	$this->load->view('include/header_superadmin');
	 $this->load->view('login');
     // generate table data
		
 }
 
 function add(){
		// set common properties
		$data['title'] = 'Add new person';
		$data['branch'] = site_url('branch_controller/addPerson');
		$data['link_back'] = anchor('add_branch/login/','Back to list of persons',array('class'=>'back'));
		
		// set validation properties
		//$this->_set_fields();
		//$this->_set_rules();
	// load view
		$this->load->view('add_branch', $data);	
 }
 	
 
  function view_branch()
 {
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		// load data
		$persons = $this->branch_model->get_paged_list($this->limit, $offset)->result();
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('branch_controller/index/');
 		$config['total_rows'] = $this->branch_model->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('No', 'Name', 'E-mail', 'Telephone No.', 'Mobile No.', 'Address','Action','');
		$i = 0 + $offset;
		foreach ($persons as $branch){
		 $this->table->add_row(++$i, $branch->name, $branch->email_id, $branch->telephone_no, $branch->mobile_no, $branch->address,
				
				anchor('branch_controller/update/'.$branch->branch_id,'update',array('class'=>'update','onclick')).' ' .
				anchor('branch_controller/delete/'.$branch->branch_id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this person?')"))
			); 
	}
	$data['table'] = $this->table->generate();
	$data['branch']=site_url('branch_controller/addbranch');
	$this->load->view('include/header_admin');
	$this->load->view('add_branch',$data);
	$this->load->view('include/footer');
 }
 
 function addbranch(){

     $this->_set_rules();
		
		// run validation
		if ($this->form_validation->run() == FALSE){
			$data['branch']=site_url('branch_controller/addbranch');
			$this->load->view('include/header_admin');
			$this->load->view('add_branch',$data);
			$this->load->view('include/footer');
		}else{
			// save data
			
			//echo"False";
			
			$person = array('name' => $this->input->post('branch_name'),
							'email_id' => $this->input->post('email_id'),
							
							'telephone_no' => $this->input->post('telephone_number'),
							'mobile_no' => $this->input->post('mobile_no'),
							'address' => $this->input->post('branch_address'));
							
							
			//print_r($person);			
						
			/*$name = $this->input->post('branch_name');
            $email_id = $this->input->post('email');
			$telephone_no = $this->input->post('telphone_no');
            $mobile_no = $this->input->post('mobile_no');
            $address = $this->input->post('branch_address');*/

			
			$this->branch_model->save($person);
			
			// set form input name="id"
			//$this->validation->id = $id;
			
			// set user message
			$this->view_branch();
	
		
		
		}
		
		// load view
		}

	function update($id){
		// set validation properties
		//$this->_set_fields();
		
		// prefill form values
		 //$data['branch_id'] = $this->branch_model->get_by_id($id)->row();
		  $data['row'] = $this->branch_model->get_by_id($id)->result();
		//$this->validation->id = $id;
		//$this->validation->name = $person->name;
		//$this->validation->email_id = $person->email_id;
		
		//$this->validation->mobile_no = $person->mobile_no;
		
		
		
		// set common properties
		$data['title'] = 'Update person';
		$data['message'] = '';
		$data['action'] = site_url('branch_controller/updatePerson');
		$data['link_back'] = anchor('branch_controller/view_branch/','Back to Branch List',array('class'=>'back'));
	
		// load view
	$data['branch']=site_url('branch_controller/addbranch');
	$this->load->view('include/header_admin');
	$this->load->view('update2', $data);
	//$this->load->view('include/footer');
		
		
	}
	
	function updatePerson(){
		
		// set validation properties
		$this->_set_rules();
		
		
		// set common properties
		$data['title'] = 'Update person';
		$data['action'] = site_url('branch_controller/updatePerson');
		$data['link_back'] = anchor('branch_controller/view_branch/','Back to list of persons',array('class'=>'back'));
		
		
		// run validation
		if ($this->form_validation->run() == FALSE){
			$data['message'] = '';
		}else{
			// save data
			$id = $this->input->post('branch_id');
			$person = array('name' => $this->input->post('branch_name'),
							'email_id' => $this->input->post('email_id'),
							'telephone_no' => $this->input->post('telephone_number'),
							'mobile_no' => $this->input->post('mobile_no'),
							'address' => $this->input->post('branch_address')
							);
			
			
						
			$this->branch_model->update($id,$person);
			
			// set user message
			$data['message'] = '<div class="success">update person success</div>';
		$data['row'] = $this->branch_model->get_by_id($id)->result();		

		}
		
		$this->view_branch(); 
		
		
		
		// load view
	}
	
	
	
	function delete($branch_id){
		// delete person
		$this->branch_model->delete($branch_id);
		
		// redirect to person list page
		redirect('branch_controller/view_branch','refresh');
	}
	
	function _set_rules()
	{
		$config_rules = array(
		   array(
				 'field'   => 'branch_name',
				 'label'   => 'Branch Name',
				 'rules'   => 'required'
			  ),
		   array(
				 'field'   => 'mobile_no',
				 'label'   => 'Mobile No',
				 'rules'   => 'required'
			  ),
			 array(
				 'field'   => 'email_id',
				 'label'   => 'E-Mail',
				 'rules'   => 'required|valid_email'
			  ),
			   array(
				 'field'   => 'telephone_number',
				 'label'   => 'Telephone No',
				 'rules'   => 'required'
			  ),
			   array(
				 'field'   => 'branch_address',
				 'label'   => 'Branch Address',
				 'rules'   => 'required'
			  )
         );		
		$this->form_validation->set_rules($config_rules);
	}
	}
 ?>
 
	