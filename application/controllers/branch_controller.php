<?php if (!defined('BASEPATH')) die();
class Branch_Controller extends CI_Controller 
{
	private $limit=20;
	
	function __construct(){
		parent::__construct();
		
		// load library
		$this->load->library(array('table','form_validation','session'));
		$this->load->library('table');

		// load helper
		$this->load->helper('form','url');
		
		// load model
		$this->load->model('branch_model','',TRUE);
	}
 public function index($offset=0)
	{
	
		
	$this->load->view('include/header_superadmin');
	 $this->load->view('login_home');
     // generate table data
		
 }
 
 function add(){
		// set common properties
		$data['title'] = 'Add new Branch';
		$data['branch'] = site_url('branch_controller/addBranch');
		$data['link_back'] = anchor('add_branch/login/','Back to list of Branch',array('class'=>'back'));
		
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
		$this->table->set_heading('No', 'Name', 'E-mail', 'Telephone No.', 'Mobile No.', 'Address','Update','Delete');
		$i = 0 + $offset;
		foreach ($persons as $branch){
		 $this->table->add_row(++$i, $branch->name, $branch->email_id, $branch->telephone_no, $branch->mobile_no, $branch->address,
				
				anchor('branch_controller/update/'.$branch->branch_id,'Update',array('class'=>'update','onclick')),
				anchor('branch_controller/delete/'.$branch->branch_id,'Delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this Branch?')"))
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
		$this->view_branch();	
			
	
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
		$data['title'] = 'Update Branch';
		//$data['message'] = '';
		$data['action'] = site_url('branch_controller/updateBranch');
		$data['link_back'] = anchor('branch_controller/view_branch/','Back to Branch List',array('class'=>'back'));
	
		// load view
	$data['branch']=site_url('branch_controller/addbranch');
	$this->load->view('include/header_admin');
	$this->load->view('update_branch', $data);
	$this->load->view('include/footer');
		
		
	}
	
	function updateBranch(){
		$id = $this->input->post('branch_id');
		// set validation properties
		$this->_set_rules();
		
		
		// set common properties
		$data['title'] = 'Update Branch';
		$data['action'] = site_url('branch_controller/updateBranch');
		$data['link_back'] = anchor('branch_controller/view_branch/','Back to list of Branch',array('class'=>'back'));
		
		
		// run validation
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg','<div class="alert alert-block alert-error"><h3>Can\'t Update Record..!</h3>Insufficient Input for Update</div>');
			
			redirect('branch_controller/update/'.$id);
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
			//$data['message'] = '<div class="success">update Branch success</div>';
		$data['row'] = $this->branch_model->get_by_id($id)->result();		
        $this->view_branch(); 
		}
		
		
		
		
		
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
				 'rules'   => 'required|min_length[3]'
			  ),
		   array(
				 'field'   => 'mobile_no',
				 'label'   => 'Mobile No',
				 'rules'   => 'required|min_length[10]|max_length[13]|integer'
			  ),
			 array(
				 'field'   => 'email_id',
				 'label'   => 'E-Mail',
				 'rules'   => 'required|valid_email'
			  ),
			   array(
				 'field'   => 'telephone_number',
				 'label'   => 'Telephone No',
				 'rules'   => 'integer'
			  ),
			  
			   array(
				 'field'   => 'branch_address',
				 'label'   => 'Branch Address',
				 'rules'   => 'required|min_length[2]'
			  )
         );
       $this->form_validation->set_error_delimiters('<span class="error">', '</span>');		 
		$this->form_validation->set_rules($config_rules);
	}
	}
 ?>
 
	