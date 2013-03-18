<?php if (!defined('BASEPATH')) die();
class Subject_Controller extends CI_Controller 
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
		$this->load->model('subject_model','',TRUE);
		
}
public function index()
	{
	
	$this->load->view('include/header_superadmin');
	 $this->load->view('login_home');
 }
 
 function add(){
		// set common properties
		$data['title'] = 'Add new subject';
		$data['subject'] = site_url('subject_controller/addsubject');
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
		$config['base_url'] = site_url('subject_controller/login_home/');
 		$config['total_rows'] = $this->subject_model->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('No', 'Subject_Name','Update','Delete');
		$i = 0 + $offset;
		foreach ($persons as $subject)
		{
		 $this->table->add_row(++$i, $subject->name,  
				
				anchor('subject_controller/update/'.$subject->subject_id,'Update',array('class'=>'update')),
				anchor('subject_controller/delete/'.$subject->subject_id,'Delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this subject?')"))
			); 
	} 
 
  $data['table'] = $this->table->generate();
	$data['subject']=site_url('subject_controller/addsubject');
	$this->load->view('include/header_admin');
	$this->load->view('add_subject',$data);
	$this->load->view('include/footer');
	
 }
  
  function addsubject()
	{
		
		 $this->_set_rules();
		
		// run validation
		if ($this->form_validation->run() == FALSE){
		
			$this->view_subject();
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
		$data['title'] = 'Update Subject';
		;
		//$data['message'] = '';
		$data['action'] = site_url('subject_controller/updateSubject');
		$data['link_back'] = anchor('subject_controller/view_subject/','Back to subject List',array('class'=>'back'));
	
		// load view
			$data['subject']=site_url('subject_controller/addsubject');
			$this->load->view('include/header_admin');
			$this->load->view('subject_update', $data);
	        $this->load->view('include/footer');
		
		
	}
	function updateSubject(){
		$id = $this->input->post('subject_id');
		// set validation properties
		$this->_set_rules();
		
		
		// set common properties
		$data['title'] = 'Update Subject';
		$data['action'] = site_url('subject_controller/updateSubject');
		$data['link_back'] = anchor('subject_controller/view_subject/','Back to Subject List',array('class'=>'back'));
		
		
		// run validation
		if ($this->form_validation->run() == FALSE){
		$this->session->set_flashdata('msg','<div class="alert alert-block alert-error"><h3>Can\'t Update Record..!</h3>Insufficient Input for Update</div>');
			//$data['message'] = '';
			redirect('subject_controller/update/'.$id);
		}else{
			// save data
			$id = $this->input->post('subject_id');
			$person = array('name' => $this->input->post('sub_name'));
			
			
						
			$this->subject_model->update($id,$person);
			
			// set user message
			//$data['message'] = '<div class="success">update Subject success</div>';
		$data['row'] = $this->subject_model->get_by_id($id)->result();		

		}
		
		$this->view_subject(); 
		
		
		
		// load view
	}
	
	
	function delete($subject_id){
		// delete person
		$this->subject_model->delete($subject_id);
		
		// redirect to person list page
		redirect('subject_controller/view_subject','refresh');
	}
	function _set_rules()
	{
		$config_rules = array(
		   array(
				 'field'   => 'sub_name',
				 'label'   => 'Subject Name ',
				 'rules'   => 'required|min_length[3]'
			  )
		   
		   
         );	
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');		 		 
		$this->form_validation->set_rules($config_rules);
	}
}
?>