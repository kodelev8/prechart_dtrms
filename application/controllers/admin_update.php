<?php
/**
 * -------------------------------------------------------------------
 * Index Controller
 * -------------------------------------------------------------------
 * Maps to the following URL
 * http://localhost/dtr
 * Author: Emerson Tiamzon
 */
class admin_update extends Secure_Controller
{
	/**
	 * Constructor
	 */
	function __construct()
    {
        parent::__construct();
		$this->load->model( array( 'mindex') );
		$this->load->model( array( 'mindex_summary') );
		$this->load->model( array( 'mindex_admin') );
		$this->load->library('form_validation');
        //$this->load->model( array( 'mindex') );
        
    }

    /**
     * Function Index
     * This function will load the header, body and footer of the form page
     */
   
    function index()
    {
		$add =  $this->input->post('btn-add');
		$emp_no = $this->input->post('emp_no');
		$emp_last_name = $this->input->post('emp_last_name');
		$emp_first_name = $this->input->post('emp_first_name');
		$emp_mid_name = $this->input->post('emp_mid_name');
		$emp_position = $this->input->post('emp_position');
		$emp_email = $this->input->post('emp_email');
		$emp_username = $this->input->post('emp_username');
		if($add)
		{
		$this->load->library('form_validation');
	    	$this->form_validation->set_rules('emp_no',					'Employee Number', 				'trim|max_length[3]|xss_clean|prep_for_form|numeric|required|numeric|callback_empno_check');
	        $this->form_validation->set_rules('emp_first_name',    		'First Name',				    'trim|max_length[250]|min_length[4]|xss_clean|prep_for_form|required');
	        $this->form_validation->set_rules('emp_mid_name', 			'Middle Name',  				'trim|max_length[250]|min_length[4]|xss_clean|prep_for_form|required');
	        $this->form_validation->set_rules('emp_last_name',			'Last Name',     				'trim|max_length[500]|min_length[4]|xss_clean|prep_for_form|required');
	        $this->form_validation->set_rules('emp_position',			'Position',    					'trim|max_length[250]|min_length[4]|xss_clean|prep_for_form|required');
	        $this->form_validation->set_rules('emp_email',				'Email Address',     			'trim|max_length[250]|min_length[4]|xss_clean|prep_for_form|required|valid_email|callback_email_check');
	        $this->form_validation->set_rules('emp_username',			'Username ',   					'required|callback_username_check');
	        $this->form_validation->set_rules('emp_password',			'Password',     				'trim|max_length[250]|min_length[4]|xss_clean|prep_for_form|required');
	        $this->form_validation->set_rules('emp_confirm_password',   'Confirm Password',     		'trim|min_length[6]|max_length[255]|xss_clean|prep_for_form|required|matches[password]');
	        $data['record'] = array(
		        	'emp_no'   			=> $this->input->post('emp_no'),
			        'emp_first_name'   	=> $this->input->post('emp_first_name'),
			        'emp_mid_name'   	=> $this->input->post('emp_mid_name'),
			        'emp_last_name'   	=> $this->input->post('emp_last_name'),
			        'emp_position'   	=> $this->input->post('emp_position'),
			        'emp_email'   		=> $this->input->post('emp_email'),
			        'emp_username'   	=> $this->input->post('emp_username'),
			        'emp_password'   	=> $this->input->post('emp_password'),  
	        );
			
	        if ($this->form_validation->run() == FALSE)
	        {
	        		//$data['aa'] = count($this->mindex_admin->check_user($username));
	        		$this->session->set_flashdata('error', 'error_message');
	        		$this->load->view('layouts/header');
			    	$this->load->view('admin/add_employee', $data);
			    	$this->load->view('layouts/footer');
	        	
	        }
	        else
	        {
	           	$this->mindex_admin->admin_add($emp_no,$emp_last_name,$emp_first_name,$emp_mid_name,$emp_position,$emp_email);
	            $data['record']= "";
				$data['get_user'] = $this->mindex_admin->get_user_update($emp_no);
    			$this->load->view('layouts/header');
				$this->load->view('admin/view_employee',$data); 
				$this->load->view('layouts/footer');
	        }
    	}
    	else
    	{
    		$data['record'] = "";
    		$this->load->view('layouts/header');
			$this->load->view('admin/add_employee', $data);
			$this->load->view('layouts/footer');
    	}	
    	
    }
	
 public function username_check($emp_username="")
	{
		$test = $this->mindex_admin->check_user($emp_username);
		
		if(count($test) > 0)
		{
			$this->form_validation->set_message('username_check', 'Username already exist!');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
 public function empno_check($emp_no="")
	{
		$test = $this->mindex_admin->check_empno($emp_no);
		
		if(count($test) > 0)
		{
			$this->form_validation->set_message('empno_check', 'Employee Number already exist');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
 public function email_check($emp_email="")
	{
		$test = $this->mindex_admin->check_email($emp_email);
		
		if(count($test) > 0)
		{
			$this->form_validation->set_message('email_check', 'Email Address already exist');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	
}


/**
* END Controller class
* End of file index.php
* Location: ..\application\controllers\index.php
*/
