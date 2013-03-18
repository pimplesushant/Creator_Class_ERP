<?php if (!defined('BASEPATH')) die();
  class Batch_Controller extends CI_Controller 
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
		$this->load->model('batch_model','',TRUE);
	}
 public function index()
	{
	
	$this->load->view('include/header_superadmin');
	 $this->load->view('login_home');
 }
 
 /* function add(){
		// set common properties
		$data['title'] = 'Add new batch';
		$data['batch'] = site_url('batch_controller/addbatch');
		$data['link_back'] = anchor('add_batch/login/','Back to batch List',array('class'=>'back'));
		
		// set validation properties
		//$this->_set_fields();
		//$this->_set_rules();
	// load view
		$this->load->view('add_batch', $data);	
 } */
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
		$this->table->set_heading('No', 'Name','Update','Delete');
		$i = 0 + $offset;
		foreach ($persons as $batch)
		{
		 $this->table->add_row(++$i, $batch->name,  
				
				anchor('batch_controller/update/'.$batch->batch_id,'Update',array('class'=>'update')),
				anchor('batch_controller/delete/'.$batch->batch_id,'Delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this Batch?')"))
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
		$this->view_batch();
		} else
		{
			// save data
			
		
			
			$person = array('name' => $this->input->post('batch_name'));
							
							
			//print_r($person);			
						
			

			
			$this->batch_model->save($person);
			
			// set form input name="id"
			//$this->validation->id = $id;
			
			// set user message
			
	
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
		$data['title'] = 'UpdateBatch';
      //$data['message'] = '';
		$data['action'] = site_url('batch_controller/updateBatch');
		$data['link_back'] = anchor('batch_controller/view_batch/','Back to batch List',array('class'=>'back'));
	
		// load view
			$data['batch']=site_url('batch_controller/addbatch');
			$this->load->view('include/header_admin');
			$this->load->view('batch_update', $data);
	        $this->load->view('include/footer');
		
		
	}
	
	function updateBatch()
	{
		$id = $this->input->post('batch_id');
		// set validation properties
		$this->_set_rules();
		
		
		// set common properties
		$data['title'] = 'Update Batch';
		$data['action'] = site_url('batch_controller/updateBatch');
		$data['link_back'] = anchor('batch_controller/view_batch/','Back to Batch List',array('class'=>'back'));
		
		
		// run validation
		if ($this->form_validation->run() == FALSE){
		$this->session->set_flashdata('msg','<div class="alert alert-block alert-error"><h3>Can\'t Update Record..!</h3>Insufficient Input for Update</div>');
		redirect('batch_controller/update/'.$id);
		}else{
			// save data
			$id = $this->input->post('batch_id');
			$person = array('name' => $this->input->post('batch_name'));
			
			
						
			$this->batch_model->update($id,$person);
			
			// set user message
			//$data['message'] = '<div class="success">update Batch success</div>';
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
				 'rules'   => 'required|min_length[2]'
			  )
		   
         );
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');		 		 
		$this->form_validation->set_rules($config_rules);
	}
	}
 ?>
 