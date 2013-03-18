<?php if (!defined('BASEPATH')) die();
class Designation_Controller extends CI_Controller 
{
   private $limit=20;
   
	function __construct(){
		parent::__construct();
		
		// load library
		$this->load->library(array('table','form_validation' ,'session'));
		$this->load->library('table');
		
		// load helper
		$this->load->helper('form','url');
		
		// load model
		$this->load->model('designation_model','',TRUE);
	}
 public function index($offset=0)
	{
	
	$this->load->view('include/header_superadmin');
	 $this->load->view('login_home');
 }
 function add(){
		// set common properties
		$data['title'] = 'Add new designation';
		$data['designation'] = site_url('designation_controller/adddesignation');
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
		$config['base_url'] = site_url('designation_controller/login_home/');
 		$config['total_rows'] = $this->designation_model->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('No', 'Designation_Name','Description','Update','Delete');
		$i = 0 + $offset;
		foreach ($persons as $designation)
		{
		 $this->table->add_row(++$i, $designation->designation_name, $designation->description, 
				
				anchor('designation_controller/update/'.$designation->designation_id,'Update',array('class'=>'update')),
				anchor('designation_controller/delete/'.$designation->designation_id,'Delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this Designation?')"))
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
		//$data['designation']=site_url('designation_controller/adddesignation');
		//redirect('designation_controller/view_designation');
		$this->view_designation();
	
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
			
		$this->view_designation();
		
		}
		
		// load view
		}
		
    function update($id){
		// set validation properties
		//$this->_set_fields();
		
		// prefill form values
		 
		  $data['row'] = $this->designation_model->get_by_id($id)->result();
		
		
		
		
		// set common properties
				$data['title'] = 'Update Designation';
				//$data['message'] = '';
				$data['action'] = site_url('designation_controller/updateDesignation');
				$data['link_back'] = anchor('designation_controller/view_designation/','Back to designation List',array('class'=>'back'));
			
		// load view
				$data['designation']=site_url('designation_controller/adddesignation');
				$this->load->view('include/header_admin');
				$this->load->view('designation_update', $data);
				$this->load->view('include/footer');
		
		
	}
	
	function updateDesignation(){
		$id = $this->input->post('designation_id');
		// set validation properties
		$this->_set_rules();
		
		
		// set common properties
		$data['title'] = 'Update Designation';
		$data['action'] = site_url('designation_controller/updateDesignation');
		$data['link_back'] = anchor('designation_controller/view_designation/','Back to designation List',array('class'=>'back'));
		
		
		// run validation
		if ($this->form_validation->run() == FALSE){
		$this->session->set_flashdata('msg','<div class="alert alert-block alert-error"><h3>Can\'t Update Record..!</h3>Insufficient Input for Update</div>');
			
			
		redirect('designation_controller/update/'.$id);
		}else{
			// save data
			$id = $this->input->post('designation_id');
			$person = array('designation_name' => $this->input->post('designation_name'),
							'description' => $this->input->post('description'));
			
			
						
			$this->designation_model->update($id,$person);
			
			// set user message
			//$data['message'] = '<div class="success">update Designation success</div>';
		$data['row'] = $this->designation_model->get_by_id($id)->result();		

		}
		
		 
	
		
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
				 'rules'   => 'required|min_length[3]'
			  ),
			  array(
				 'field'   => 'description',
				 'label'   => 'Description',
				 'rules'   => 'required|min_length[3]'
			  
			  )
		   
         );
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');		 		 
		$this->form_validation->set_rules($config_rules);
	}
	
}
?>
 