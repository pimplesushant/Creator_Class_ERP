<?php if (!defined('BASEPATH')) die();
  class Batch_Controller extends CI_Controller 
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
		$this->load->model('batch_model','',TRUE);
	}
 public function index()
	{
	
	$this->load->view('include/header_superadmin');
	 $this->load->view('login');
 }
 
 function add(){
		// set common properties
		$data['title'] = 'Add new person';
		$data['batch'] = site_url('batch_controller/addPerson');
		$data['link_back'] = anchor('add_batch/login/','Back to batch List',array('class'=>'back'));
		
		// set validation properties
		//$this->_set_fields();
		//$this->_set_rules();
	// load view
		$this->load->view('add_batch', $data);	
 }
 public function view_batch()
 {
   $uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		// load data
		$persons = $this->batch_model->get_paged_list($this->limit, $offset)->result();
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('batch_controller/login/');
 		$config['total_rows'] = $this->batch_model->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('No', 'Name','Action','');
		$i = 0 + $offset;
		foreach ($persons as $batch)
		{
		 $this->table->add_row(++$i, $batch->name,  
				
				anchor('batch_controller/update/'.$batch->batch_id,'update',array('class'=>'update')).' ' .
				anchor('batch_controller/delete/'.$batch->batch_id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this person?')"))
			); 
	} 
 
  $data['table'] = $this->table->generate();
	$data['batch']=site_url('batch_controller/addbatch');
	$this->load->view('include/header_admin');
	$this->load->view('add_batch',$data);
	$this->load->view('include/footer');
	
 }
 
 function addbatch()
	{
		
		 $this->_set_rules();
		
		// run validation
		if ($this->form_validation->run() == FALSE){
		$data['batch']=site_url('batch_controller/addbatch');
		$this->load->view('include/header_admin');
		$this->load->view('add_batch',$data);
		$this->load->view('include/footer');
		} else
		{
			// save data
			
			//echo"False";
			
			$person = array('name' => $this->input->post('batch_name'),
							'standard_id' => $this->input->post('standard'));
							
							
			//print_r($person);			
						
			

			
			$this->batch_model->save($person);
			
			// set form input name="id"
			//$this->validation->id = $id;
			
			// set user message
			/* $data['message'] = '<div class="success">add new person success</div>';
			
			$data['batch']=site_url('batch_controller/addbatch');
	        $this->load->view('include/admin_header');
	        $this->load->view('add_batch',$data);
	        $this->load->view('include/footer'); */
	
		$this->view_batch();
		
		}
		
		// load view
	}
	
	function update($id)
	{
		// set validation properties
		//$this->_set_fields();
		
		// prefill form values
		 //$data['batch_id'] = $this->batch_model->get_by_id($id)->row();
		  $data['row'] = $this->batch_model->get_by_id($id)->result();
		
		
		
		
		// set common properties
		$data['title'] = 'Update person';
		$data['message'] = '';
		$data['action'] = site_url('batch_controller/updatePerson');
		$data['link_back'] = anchor('batch_controller/view_batch/','Back to batch List',array('class'=>'back'));
	
		// load view
			$data['batch']=site_url('batch_controller/addbatch');
			$this->load->view('include/header_admin');
			$this->load->view('batch_update', $data);
	//$this->load->view('include/footer');
		
		
	}
	
	function updatePerson()
	{
		
		// set validation properties
		$this->_set_rules();
		
		
		// set common properties
		$data['title'] = 'Update person';
		$data['action'] = site_url('batch_controller/updatePerson');
		$data['link_back'] = anchor('batch_controller/view_batch/','Back to Batch List',array('class'=>'back'));
		
		
		// run validation
		if ($this->form_validation->run() == FALSE){
			$data['message'] = '';
		}else{
			// save data
			$id = $this->input->post('batch_id');
			$person = array('name' => $this->input->post('batch_name'));
			
			
						
			$this->batch_model->update($id,$person);
			
			// set user message
			$data['message'] = '<div class="success">update person success</div>';
		$data['row'] = $this->batch_model->get_by_id($id)->result();		

		}
		
		$this->view_batch(); 
		
		
		
		// load view
	}
	
	function delete($batch_id){
		// delete person
		$this->batch_model->delete($batch_id);
		
		// redirect to person list page
		redirect('batch_controller/view_batch','refresh');
	}
	function _set_rules()
	{
		$config_rules = array(
		   array(
				 'field'   => 'batch_name',
				 'label'   => 'Batch Name',
				 'rules'   => 'required'
			  ),
		   array(
				 'field'   => 'standard',
				 'label'   => 'Assign Standard',
				 'rules'   => 'required'
			  ) 
		   
         );		
		$this->form_validation->set_rules($config_rules);
	}
	}
 ?>
 