<?php if (!defined('BASEPATH')) die();
class Subject_ctrl extends CI_Controller 
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
		$this->load->model('subject_model','',TRUE);
		
}
public function index()
	{
	
	$this->load->view('include/header_superadmin');
	 $this->load->view('login');
 }
 
 function add(){
		// set common properties
		$data['title'] = 'Add new person';
		$data['subject'] = site_url('subject_ctrl/addPerson');
		$data['link_back'] = anchor('subject/login/','Back to batch List',array('class'=>'back'));
		
		// set validation properties
		//$this->_set_fields();
		//$this->_set_rules();
	// load view
		$this->load->view('add_subject', $data);	
 }
public function view_subject()
 {
   $uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		// load data
		$persons = $this->subject_model->get_paged_list($this->limit, $offset)->result();
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('subject_ctrl/login/');
 		$config['total_rows'] = $this->subject_model->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('No', 'Subject_Name','Action','');
		$i = 0 + $offset;
		foreach ($persons as $subject)
		{
		 $this->table->add_row(++$i, $subject->name,  
				
				anchor('subject_ctrl/update/'.$subject->subject_id,'update',array('class'=>'update')).' ' .
				anchor('subject_ctrl/delete/'.$subject->subject_id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this person?')"))
			); 
	} 
 
  $data['table'] = $this->table->generate();
	$data['subject']=site_url('subject_ctrl/addsubject');
	$this->load->view('include/header_admin');
	$this->load->view('add_subject',$data);
	$this->load->view('include/footer');
	
 }
 function addsubject()
	{
		
		 $this->_set_rules();
		
		// run validation
		if ($this->form_validation->run() == FALSE){
		$data['subject']=site_url('subject_ctrl/addsubject');
		$this->load->view('include/header_admin');
		$this->load->view('add_subject',$data);
		$this->load->view('include/footer');
		} else
		{
			// save data
			
			//echo"False";
			
			$person = array('name' => $this->input->post('sub_name'));
							
							
			//print_r($person);			
						
			

			
			$this->subject_model->save($person);
			
			// set form input name="id"
			//$this->validation->id = $id;
			
			// set user message
			/* $data['message'] = '<div class="success">add new person success</div>';
			
			$data['batch']=site_url('batch_controller/addbatch');
	        $this->load->view('include/admin_header');
	        $this->load->view('add_batch',$data);
	        $this->load->view('include/footer'); */
	
		$this->view_subject();
		
		}
		
		// load view
	}
	
 function update($id)
	{
		// set validation properties
		//$this->_set_fields();
		
		// prefill form values
		 //$data['batch_id'] = $this->batch_model->get_by_id($id)->row();
		  $data['row'] = $this->subject_model->get_by_id($id)->result();
		
		
		
		
		// set common properties
		$data['title'] = 'Update person';
		$data['message'] = '';
		$data['action'] = site_url('subject_ctrl/updatePerson');
		$data['link_back'] = anchor('subject_ctrl/view_subject/','Back to subject List',array('class'=>'back'));
	
		// load view
			$data['subject']=site_url('subject_ctrl/addsubject');
			$this->load->view('include/header_admin');
			$this->load->view('sub_update', $data);
	//$this->load->view('include/footer');
		
		
	}
	function updatePerson()
	{
		
		// set validation properties
		$this->_set_rules();
		
		
		// set common properties
		$data['title'] = 'Update person';
		$data['action'] = site_url('subject_ctrl/updatePerson');
		$data['link_back'] = anchor('subject_ctrl/view_subject/','Back to Batch List',array('class'=>'back'));
		
		
		// run validation
		if ($this->form_validation->run() == FALSE){
			$data['message'] = '';
		}else{
			// save data
			$id = $this->input->post('subject_id');
			$person = array('name' => $this->input->post('sub_name'));
			
			
						
			$this->batch_model->update($id,$person);
			
			// set user message
			$data['message'] = '<div class="success">update person success</div>';
		$data['row'] = $this->subject_model->get_by_id($id)->result();		

		}
		
		$this->view_subject(); 
		
		
		
		// load view
	}
	
	function delete($subject_id){
		// delete person
		$this->subject_model->delete($subject_id);
		
		// redirect to person list page
		redirect('subject_ctrl/view_subject','refresh');
	}
	function _set_rules()
	{
		$config_rules = array(
		   array(
				 'field'   => 'sub_name',
				 'label'   => 'Subject Name ',
				 'rules'   => 'required'
			  )
		   
		   
         );		
		$this->form_validation->set_rules($config_rules);
	}
}
?>