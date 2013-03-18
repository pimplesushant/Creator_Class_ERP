<?php if (!defined('BASEPATH')) die();
class Bank_Controller extends CI_Controller 
{
	private $limit=20;
	
	function __construct(){
		parent::__construct();
		
		// load library
		$this->load->library(array('table','form_validation','session'));
		$this->load->library('table');
		$this->load->library('grocery_CRUD');

		// load helper
		$this->load->helper('form','url');
		
		// load model
		$this->load->model('bank_model','',TRUE);
	}
	
	public function index($offset=0)
	{
	
		
	$this->load->view('include/header_superadmin');
	 $this->load->view('login_home');
     // generate table data
		
 }
 function add(){
		// set common properties
		$data['title'] = 'Add new Bank';
		$data['bank'] = site_url('bank_controller/addBank');
		$data['link_back'] = anchor('add_bank_account/login/','Back to list of Bank',array('class'=>'back'));
		
		// set validation properties
		//$this->_set_fields();
		//$this->_set_rules();
	// load view
		$this->load->view('add_bank_account', $data);	
 }
 	 
	 function view_bank()
 {
		$data['bank']=site_url('bank_controller/addbank');
		$this->load->view('include/header_admin');
		$this->load->view('add_bank_account',$data);
		$this->load->view('include/footer');
 }
 
 function addbank(){

     $this->_set_rules();
	 
	 $person = array('bank_name' => $this->input->post('bank_name'),
							'bank_address' => $this->input->post('bank_address'),
							'account_number' => $this->input->post('account_number'),
							'ifsc' => $this->input->post('ifsc'),
							'micr' => $this->input->post('micr'));
							
		// run validation
		if ($this->form_validation->run() == FALSE){
		$this->view_bank();		
		}else{
			$result=$this->bank_model->save($person);
			if($result)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success">Bank Account Added Successfully</div>');
			}
			redirect('bank_controller/view_bank');
		}
		
		// load view
		}
		
		function show_all_accounts()
    {
  //$class_id=;
  $crud = new grocery_CRUD();
  //$crud->set_theme('datatables');
  //$crud->where('class_id',$class_id);
        $crud->set_table('bank_master');
  //$crud->change_field_type('status', 'true_false');
  //$crud->callback_column('status',array($this,'color'));
  $crud->columns('bank_id','bank_name','bank_address','account_number','ifsc','micr');
  $crud->display_as('bank_name','Bank Name')
    ->display_as('bank_address','Bank Address')
    ->display_as('account_number','Account Number')
    ->display_as('ifsc','<abbr title="The Indian Financial System Code">IFS Code</abbr>')
    ->display_as('micr','<abbr title="Magnetic Ink Character Recognition Code">MICR Code</abbr>');
  $crud->set_subject('Bank Account');
  $crud->unset_edit();
  $crud->unset_add();
  $crud->add_action('Update', '', 'bank_controller/update','edit-icon');
  //$crud->add_action('Block', '', 'class_controller/block_user','block-icon');
  //$crud->callback_before_delete(array($this,'delete_image_before_delete'));
  //$crud->required_fields('class_name','mobile_no','telephone_no','address');
  //$crud->set_field_upload('image','assets/uploads/files');
        $output = $crud->render();
        $this->_example_output($output);        
    }
	
	function _example_output($output = null)
    {
	  $this->load->view('include/header_bootstrap');
	  $this->load->view('grid_bank_template',$output); 
	  $this->load->view('include/footer');  
    }

		function update($id){
		
		$data['row'] = $this->bank_model->get_by_id($id)->result();
	
		// load view
			$data['bank']=site_url('bank_controller/addbank');
			$this->load->view('include/header_admin');
			$this->load->view('bank_update', $data);
			$this->load->view('include/footer');
				
		
	}
	
	function updateBank(){
		$id = $this->input->post('bank_id');
		// set validation properties
		$this->_set_rules();
		
		$person = array('bank_name' => $this->input->post('bank_name'),
							'bank_address' => $this->input->post('bank_address'),
							'account_number' => $this->input->post('account_number'),
							'ifsc' => $this->input->post('ifsc'),
							'micr' => $this->input->post('micr')
							);
		
		// run validation
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg','<div class="alert alert-block alert-error"><h3>Can\'t Update Record..!</h3>Insufficient Input for Update</div>');
			redirect('bank_controller/update/'.$id);
		}else{
			// save data
			//$id = $this->input->post('bank_id');						
			$this->bank_model->update($id,$person);	
        redirect('bank_controller/show_all_accounts') ;
		}
	}
	
	function delete($bank_id){
		// delete person
		$this->bank_model->delete($bank_id);
		
		// redirect to person list page
		redirect('bank_controller/view_bank','refresh');
	}
	
	function _set_rules()
	{
		$config_rules = array(
		   array(
				 'field'   => 'bank_name',
				 'label'   => 'Bank Name',
				 'rules'   => 'required|min_length[3]'
			  ),
		   array(
				 'field'   => 'bank_address',
				 'label'   => 'Address',
				 'rules'   => 'required|min_length[3]'
			  ),
			 array(
				 'field'   => 'account_number',
				 'label'   => 'Account No',
				 'rules'   => 'required|min_length[11]|max_length[20]|integer'
			  ),
			   array(
				 'field'   => 'ifsc',
				 'label'   => 'IFS Code',
				 'rules'   => 'required|exact_length[11]|alpha_numeric'
			  ),
			   array(
				 'field'   => 'micr',
				 'label'   => 'MICR Code',
				 'rules'   => 'required|exact_length[9]|integer'
			  )
         );
       $this->form_validation->set_error_delimiters('<span class="error">', '</span>');		 
		$this->form_validation->set_rules($config_rules);
	}
	}
 ?>
 
	
	