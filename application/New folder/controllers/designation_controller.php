<?php if (!defined('BASEPATH')) die();
class Designation_Controller extends CI_Controller 
{
   private $limit=20;
   
	function __construct(){
		parent::__construct();
		
		// load library
		$this->load->library(array('table','form_validation'));
		$this->load->library('table');
		
		// load helper
		$this->load->helper('url');
		
		// load model
		$this->load->model('designation_model','',TRUE);
	}
 public function index($offset=0)
	{
	
	$this->load->view('include/header_superadmin');
	 $this->load->view('login');
 }
 function add(){
		// set common properties
		$data['title'] = 'Add new person';
		$data['designation'] = site_url('designation_controller/addPerson');
		$data['link_back'] = anchor('add_designation/login/','Back to Designation List',array('class'=>'back'));
		
		// set validation properties
		//$this->_set_fields();
		//$this->_set_rules();
	// load view
		$this->load->view('add_designation', $data);	
 }
 
 public function view_designation()
 {
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		// load data
		$persons = $this->designation_model->get_paged_list($this->limit, $offset)->result();
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('designation_controller/login/');
 		$config['total_rows'] = $this->designation_model->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('No', 'Designation_Name','Description','Action','');
		$i = 0 + $offset;
		foreach ($persons as $designation)
		{
		 $this->table->add_row(++$i, $designation->designation_name, $designation->description, 
				
				anchor('designation_controller/update/'.$designation->designation_id,'update',array('class'=>'update')).' ' .
				anchor('designation_controller/delete/'.$designation->designation_id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this person?')"))
			); 
	}
 
    $data['table'] = $this->table->generate();
	$data['designation']=site_url('designation_controller/adddesignation');
	$this->load->view('include/header_admin');
	$this->load->view('add_designation',$data);
	$this->load->view('include/footer');
	
 }
 
 function adddesignation()
	{

      $this->_set_rules();
		
		// run validation
		if ($this->form_validation->run() == FALSE){
		$data['designation']=site_url('designation_controller/adddesignation');
		$this->load->view('include/header_admin');
		$this->load->view('add_designation',$data);
		$this->load->view('include/footer');
		} else
		{
			// save data
			
			//echo"False";
			
			$person = array('designation_name' => $this->input->post('designation_name'),
							'description' => $this->input->post('description'));
							
							
			//print_r($person);			
						
			

			
			$this->designation_model->save($person);
			
			// set form input name="id"
			//$this->validation->id = $id;
			
			// set user message
			/* $data['message'] = '<div class="success">add new person success</div>';
			
			$data['designation']=site_url('designation_controller/adddesignation');
	        $this->load->view('include/admin_header');
	        $this->load->view('add_designation',$data);
	        $this->load->view('include/footer'); */
	
		$this->view_designation();
		
		}
		
		// load view
		}
		
		function update($id){
		// set validation properties
		//$this->_set_fields();
		
		// prefill form values
		 //$data['designation_id'] = $this->designation_model->get_by_id($id)->row();
		  $data['row'] = $this->designation_model->get_by_id($id)->result();
		
		
		
		
		// set common properties
		$data['title'] = 'Update person';
		$data['message'] = '';
		$data['action'] = site_url('designation_controller/updatePerson');
		$data['link_back'] = anchor('designation_controller/view_designation/','Back to designation List',array('class'=>'back'));
	
		// load view
			$data['designation']=site_url('designation_controller/adddesignation');
			$this->load->view('include/header_admin');
			$this->load->view('designation_update', $data);
	//$this->load->view('include/footer');
		
		
	}
	
	function updatePerson(){
		
		// set validation properties
		$this->_set_rules();
		
		
		// set common properties
		$data['title'] = 'Update person';
		$data['action'] = site_url('designation_controller/updatePerson');
		$data['link_back'] = anchor('designation_controller/view_designation/','Back to designation List',array('class'=>'back'));
		
		
		// run validation
		if ($this->form_validation->run() == FALSE){
			$data['message'] = '';
		}else{
			// save data
			$id = $this->input->post('designation_id');
			$person = array('designation_name' => $this->input->post('designation_name'),
							'description' => $this->input->post('description'));
			
			
						
			$this->designation_model->update($id,$person);
			
			// set user message
			$data['message'] = '<div class="success">update person success</div>';
		$data['row'] = $this->designation_model->get_by_id($id)->result();		

		}
		
		$this->view_designation(); 
		
		
		
		// load view
	}
	
	function delete($designation_id){
		// delete person
		$this->designation_model->delete($designation_id);
		
		// redirect to person list page
		redirect('designation_controller/view_designation','refresh');
	}
	function _set_rules()
	{
		$config_rules = array(
		   array(
				 'field'   => 'designation_name',
				 'label'   => 'Designation Name',
				 'rules'   => 'required'
			  ),
			  array(
				 'field'   => 'description',
				 'label'   => 'Description',
				 'rules'   => 'required'
			  )
		   
         );		
		$this->form_validation->set_rules($config_rules);
	}
	
}
?>
 