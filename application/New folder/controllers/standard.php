<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Standard extends CI_Controller 
{
	 // num of records per page
	private $limit = 5;
	
	function __construct(){
		
		parent::__construct();
		
		// load library
		$this->load->library(array('table','form_validation'));
		
		// load helper
		$this->load->helper('url');
		
		// load model
		$this->load->model('add_standard_model','',true);
	}
	
	function index($offset =0)
	{
		// offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		
		$persons= $this->add_standard_model->get_paged_list($this->limit, $offset)->result();
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('person/index/');
 		$config['total_rows'] = $this->add_standard_model->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		// generate table data
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('No', 'Name','Subject','View','Update','Delete');
		$i = 0 + $offset;
		foreach ($persons as $person){
			$this->table->add_row(++$i,$person->name,
			    anchor('standard/view/'.$person->standard_id,'view',array('class'=>'view')).' '.
				anchor('standard/update/'.$person->standard_id,'update',array('class'=>'update')).' '.
				anchor('sandard/delete/'.$person->standard_id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this person?')"))
			);
		}
		$data['table'] = $this->table->generate();
		
		$data['action'] = site_url('standard/addstandard');
		$data['link_back'] = anchor('standard/index/','back to list of standard',array('class'=>'back'));
		
		$this->load->view('include/header2');
		$this->load->view('add_standard', $data);
		$this->load->view('include/footer');
		//print_r($offset); print total number of record http://localhost/codeigniter/index.php/staff/index/10
		
		} 
		
		
		
	function add()
	{
		// set validation properties
		$this->_set_fields();
		
		// set common properties
		$data['title'] = 'add new standard';
		$data['message'] = '';
		$data['action'] = site_url('standard/addstandard');
		$data['link_back'] = anchor('standard/index/','back to list of persons',array('class'=>'back'));
	
		// load view
		$this->load->view('stan_update', $data);
	}
	function addstandard()
	{
		echo "add standard";
		// set common properties
		$data['title'] = 'add new standard';
		$data['action'] = site_url('standard/addstandard');
		$data['link_back'] = anchor('standard/index/','back to list of standard',array('class'=>'back'));
		
		// set validation properties
		//$this->_set_fields();
		$this->_set_rules();
		
		// run validation
		if ($this->form_validation->run() == FALSE){
		$data['message'] = '';
		}else{
			// save data
			 echo $standard= array('std_name' => $this->input->post('std_name'),
							       'sub' => $this->input->post('sub'));
								   
			 echo  $std_name = $this->input->post('std_name'); 
			       $sub = $this->input->post('sub');
			
			$id = $this->add_standard_model->insertData($std_name,$subject); 
			// set form input std_name="id"
			//$this->validation->id = $id;
			
			// set user message
			$data['message'] = '<div class="success">add new person success</div>';
			
			redirect('standard/index');
		}
		}
    function view($id){
		// set common properties
		$data['title'] = 'standard Details';
		$data['link_back'] = anchor('standard/index/','Back to list of persons',array('class'=>'back'));
		
		// get person details
		$data['standard'] = $this->add_standard_model->get_by_id($id)->row();
		
		// load view
		$this->load->view('add_standard', $data);
	}
	  /* function update($id){
		// set validation propertie
		//$this->_set_fields();
		
		
		// prefill form values
		$staff = $this->add_standard_model->get_by_id($id)->row();
		$this->form_validation->id = $id;
		$this->form_validation->std_name = $standard->std_name;
		$this->form_validation->subject = $standard->subject;
		
		// set common properties
		
		$data['title'] = 'Update standard';
		$data['message'] = '';
		$data['action'] = site_url('standard/updatestandard');
		$data['link_back'] = anchor('standard/index/','Back to list of persons',array('class'=>'back'));
	
		// load view
		$this->load->view('include/header');
		$this->load->view('stan_update', $data);
		$this->load->view('include/footer');
	}
	function updatestandard(){
		// set common properties
		$data['title'] = 'Update standard';
		$data['link_back'] = anchor('standard/index/','Back to list of persons',array('class'=>'back'));
		
		// set validation properties
		//$this->_set_fields();
		$this->_set_rules();
		
		// run validation
		if ($this->form_validation->run() == FALSE){
			$data['message'] = '';
		}else{
			// save data
			$id = $this->input->post('id');
			$standard = array('std_name' => $this->input->post('std_name'),
							'subject' => $this->input->post('subject'));
			$this->add_standard_model->update($id,$standard);
			
			//set user message
			$data['message'] = '<div class="success">update person success</div>';
			
			$standard = $this->add_standard_model->get_by_id($id)->row();
			$this->form_validation->id = $id;
		    $this->form_validation->std_name = $standard->std_name;
			$this->form_validation->subject = $standard->subject;
		
		
		
		    $data['action'] = site_url('standard/addstandard*');
			$this->load->view('stan_update', $data);
		}
		
		
		
	}
	
	function delete($id){
		// delete person
		$this->add_standard_model->delete($id);
		
		// redirect to person list page
		redirect('standard/index/','refresh');
	}
	
	 */
	// validation fields
	 function _set_fields()
	{
		$fields['id'] = 'id';
		$fields['std_name'] = 'std_name';
		
		$this->form_validation->_set_fields($fields);
	} 
	
	// validation rules
	
	function _set_rules(){
		$config = array(
               array(
                     'field'   => 'std_name',
                     'label'   => 'std_name',
                     'rules'   => 'required'
                
                  ),
				  
            array(
                     'field'   => 'subject',
                     'label'   => 'subject',
                     'rules'   => 'required'
                
                  )
				  );
 
$this->form_validation->set_rules($config); 
	}
	 
}
?>