<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Add_standard_ctrl extends CI_Controller 
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
				$this->table->set_heading('No', 'Name','Update','Delete');
				$i = 0 + $offset;
				foreach ($persons as $person){
					$this->table->add_row(++$i,$person->name,
						
						anchor('add_standard_ctrl/update/'.$person->standard_id,'update',array('class'=>'update')),
						anchor('add_standard_ctrl/delete/'.$person->standard_id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this standard?')"))
					);
				}
		$data['table'] = $this->table->generate();
		
		$data['action'] = site_url('add_standard_ctrl/addstandard');
		$data['link_back'] = anchor('add_standard_ctrl/index/','back to list of standard',array('class'=>'back'));
		
		$this->load->view('include/header_admin');
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
				$data['action'] = site_url('add_standard_ctrl/addstandard');
				$data['link_back'] = anchor('add_standard_ctrl/index/','back to list of persons',array('class'=>'back'));
			
				// load view
				//$this->load->view('stan_update', $data);
	}
	function addstandard()
	{
				
				// set common properties
				$data['title'] = 'add new standard';
				$data['action'] = site_url('add_standard_ctrl/addstandard');
				$data['link_back'] = anchor('add_standard_ctrl/index/','back to list of standard',array('class'=>'back'));
				
				// set validation properties
				//$this->_set_fields();
				$this->_set_rules();
				
				// run validation
				if ($this->form_validation->run() == FALSE){
				$data['message'] = '';
				}else{
				
					// save data
					 //echo $standard= array('name' => $this->input->post('name'));
										   
										   
					 echo  $name = $this->input->post('name'); 
						   
					
					$id = $this->add_standard_model->insertData($name); 
					// set form input std_name="id"
					//$this->validation->id = $id;
					
					// set user message
					$data['message'] = '<div class="success">add new standard success</div>';
					
					redirect('add_standard_ctrl/index');
	                }
		}
    function view($id)
	{
					// set common properties
					$data['title'] = 'standard Details';
					$data['link_back'] = anchor('add_standard_ctrl/index/','Back to list of standard',array('class'=>'back'));
					
					// get person details
					$data['standard'] = $this->add_standard_model->get_by_id($id)->row();
					
					// load view
					$this->load->view('add_standard', $data);
	}
	function update($id)
	{
				// set validation properties
				//$this->_set_fields();
				
				// prefill form values
				 $standard = $this->add_standard_model->get_by_id($id)->row();
				 $this->form_validation->id = $id;
				 $this->form_validation->name = $standard->name;
				
				
				
				
				// set common properties
				$data['title'] = 'Updatestandard';
				$data['message'] = '';
				$data['action'] = site_url('add_standard_ctrl/updatestandard');
				
				$data['link_back'] = anchor('add_standard_ctrl/index/','Back to  List',array('class'=>'back'));
			
				// load view
					$this->load->view('include/header_admin');
					$this->load->view('stan_update', $data);
					$this->load->view('include/footer');
				
		
	}
	
	function updatestandard()
	{
		
				// set validation properties
				$this->_set_rules();
				
				
				// set common properties
				$data['title'] = 'Update standard';
				$data['link_back'] = anchor('add_standard_ctrl/add_standard/','Back to standard List',array('class'=>'back'));
				
				
				// run validation
				if ($this->form_validation->run() == FALSE){
					$data['message'] = '';
				}else{
					// save data
					
					 $id = $this->input->post('id');
					$standard = array('name' => $this->input->post('name'));
					
					
								
					$this->add_standard_model->update($id,$standard);
					
					// set user message
					$data['message'] = '<div class="success">update Batch success</div>';
					$standard = $this->add_standard_model->get_by_id($id)->row();
					
						$this->form_validation->id = $id;
						$this->form_validation->name = $standard->name;
						
				 $data['action'] = site_url('add_standard_ctrl/addstandard');
				 //$this->load->view('stan_update', $data);
				}
				
				// load view
				$this->index(); 
	}
	
	function delete($id)
	{
			// delete person
			$this->add_standard_model->delete($id);
			
			// redirect to person list page
			redirect('add_standard_ctrl/index','refresh');
	}   
	
	// validation fields
	 function _set_fields()
	{
				//$fields['id'] = 'id';
				$fields['name'] = 'name';
				
				$this->form_validation->_set_fields($fields);
	} 
	
	// validation rules
	
	function _set_rules(){
		$config = array(
               array(
                     'field'   => 'name',
                     'label'   => 'name',
                     'rules'   => 'required'
                
                  )
				  
           
                  );
				 
 
$this->form_validation->set_rules($config); 
	}
	 
}
?>