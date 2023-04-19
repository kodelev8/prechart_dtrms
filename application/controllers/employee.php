<?php
//we need to call PHP's session object to access it through CI
/**
 * -------------------------------------------------------------------
 * Index Controller
 * -------------------------------------------------------------------
 * Maps to the following URL
 * http://localhost/dtr
 * Author: Emerson Tiamzon
 */
class employee extends Secure_Controller
{
	/**
	 * Constructor
	 */
	function __construct()
    {
        parent::__construct();
		$this->load->model( array( 'mindex','mindex_employee') );
		$this->load->library('form_validation');
    }

    /**
     * Function Index
     * This function will load the header, body and footer of the form page
     */
   
    function index($emp_row = 0)
    {
    	$row= $this->mindex_employee->count_employee();
    	$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/employee/index/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$emp_row = $emp_row + $config['per_page'];	
		$this->pagination->initialize($config); 

		$data['links']= $this->pagination->create_links();
		$data['success']="";
		$data['record'] = "";
		$data['employee_view'] = $this->mindex_employee->employee_view($emp_row);
		$data['emp_no'] = "";
		$this->load->view('layouts/header',$data);
		$this->load->view('admin/view_employee',$data); 
		$this->load->view('layouts/footer');	
    }	
	function employee_search()
    {	
		$search = $this->input->post('search');
		$this->session->set_userdata('search', $search);
		if($search =="")
		{
				redirect('employee/index');
		}
		else
		{
				redirect('employee/employee_searched');
		}
	}
	function employee_searched($emp_row =0)
	{
		$search = $this->session->userdata('search');;
		$row = $this->mindex_employee->employee_count_search($search);
		$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/employee/employee_searched/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$emp_row = $emp_row + $config['per_page'];
		$this->pagination->initialize($config); 
		
		$data['links']= $this->pagination->create_links();
		$search = $this->session->userdata('search');
		$data['success']="";
		$data['record'] = "";
		$data['employee_view'] = $this->mindex_employee->employee_search($search,$emp_row);
		$this->load->view('layouts/header',$data);
		$this->load->view('admin/view_employee',$data); 
		$this->load->view('layouts/footer');
	}
	function employee_delete($emp_no = 0)
	{
		 $this->mindex_employee->employee_delete($emp_no);
		 redirect('employee/employee_deleted/');
	}
	function employee_deleted($emp_row = 0)
	{
    	$row= $this->mindex_employee->count_employee();
    	$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/employee/index/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$emp_row = $emp_row + $config['per_page'];	
		$this->pagination->initialize($config); 

		$data['links']= $this->pagination->create_links();
	 	$data['success']="";
		$data['record'] = "";
		$data['employee_view'] = $this->mindex_employee->employee_view($emp_row);
		$data['success']='<div class="alert alert-success"> <a class="close" data-dismiss="alert">&times;</a> Employee Deleted Success</div> ';
		$data['record'] = "deleted";
		$data['employee_view'] = $this->mindex_employee->employee_view();
		$this->load->view('layouts/header',$data);
		$this->load->view('admin/view_employee',$data); 
		$this->load->view('layouts/footer');
	}
	function employee_update($emp_no = 0)
	{  
		$this->load->model( array( 'mindex_employee') );
		$data['emp_no'] = $emp_no;
		$data['record'] = '';
		$data['success'] = '';
   		$get_user = $this->mindex_employee->get_user_update($emp_no);
		$emp_last_name = $this->input->post('emp_last_name');
		$emp_first_name = $this->input->post('emp_first_name');
		$emp_mid_name = $this->input->post('emp_mid_name');
		$emp_position = $this->input->post('emp_position');
		$emp_email = $this->input->post('emp_email');
   		
   		$data['record'] = array(
	        'emp_no'   			=> $get_user[0]->emp_no,
	        'emp_first_name'   	=> $get_user[0]->emp_first_name,
	        'emp_mid_name'   	=> $get_user[0]->emp_mid_name,
	        'emp_last_name'   	=> $get_user[0]->emp_last_name,
	        'emp_position'   	=> $get_user[0]->emp_position,
	        'emp_email'   		=> $get_user[0]->emp_email,
        );
			$this->load->library('form_validation');
	        $this->form_validation->set_rules('emp_first_name',    	'First Name',		'required|alpha');
	        $this->form_validation->set_rules('emp_mid_name', 		'Middle Name',  	'required|alpha');
	        $this->form_validation->set_rules('emp_last_name',		'Last Name',  		'required|alpha');
	        $this->form_validation->set_rules('emp_position',		'Position', 		'required');
	        $this->form_validation->set_rules('emp_email',			'Email Address', 	'required|valid_email');
	    
			if ($this->form_validation->run() == false)
	        {
	        	$this->session->set_flashdata('error', 'error_message');
	        }
	        else
	        {
	        	$this->mindex_employee->employee_update($emp_no,$emp_last_name,$emp_first_name,$emp_mid_name,$emp_position,$emp_email);
				redirect('employee/employee_updated');
	        }
    	$this->load->view('layouts/header',$data);
		$this->load->view('admin/update_employee',$data); 
		$this->load->view('layouts/footer');
	}
	function employee_updated($emp_row = 0)
	{
    	$row= $this->mindex_employee->count_employee();
    	$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/employee/index/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$emp_row = $emp_row + $config['per_page'];	
		$this->pagination->initialize($config); 

		$data['links']= $this->pagination->create_links();
		$data['success']="";
		$data['record'] = "";
		$data['employee_view'] = $this->mindex_employee->employee_view($emp_row);
		$data['success'] = '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a> Employee Updated Success</div> ';		
		$data['record'] = '';
		$data['employee_view'] = $this->mindex_employee->employee_view();
    	$this->load->view('layouts/header',$data);
		$this->load->view('admin/view_employee',$data); 
		$this->load->view('layouts/footer');
	}
	function employee_add()
	{
		$add =  $this->input->post('btn-add');
		$emp_no = $this->input->post('emp_no');
		$emp_last_name = $this->input->post('emp_last_name');
		$emp_first_name = $this->input->post('emp_first_name');
		$emp_mid_name = $this->input->post('emp_mid_name');
		$emp_position = $this->input->post('emp_position');
		$emp_email = $this->input->post('emp_email');
		$emp_username = $this->input->post('emp_username');
		$emp_password = $this->input->post('emp_password');
		$get_emp_no = $this->mindex_employee->get_emp_no();
		
		if($add)
		{
			$data['record'] = array('emp_no' => 'cxzcxz');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
	    	$this->form_validation->set_rules('emp_no',					'Employee Number' ,	'required|numeric|callback_empno_check');
	        $this->form_validation->set_rules('emp_first_name',  		'First Name',		'required|alpha');
	        $this->form_validation->set_rules('emp_mid_name', 			'Middle Name',		'required|alpha');
	        $this->form_validation->set_rules('emp_last_name',			'Last Name',  		'required|alpha');
	        $this->form_validation->set_rules('emp_position',			'Position', 		'required');
	        $this->form_validation->set_rules('emp_email',				'Email Address',	'required|valid_email|callback_email_check');
	        $this->form_validation->set_rules('emp_username',			'Username ',		'required|alpha_numeric|callback_username_check');
	        $this->form_validation->set_rules('emp_password',			'Password', 		'required');
	        $this->form_validation->set_rules('emp_confirm_password',	'Confirm Password',	'required|matches[emp_password]');
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
			
	        if ($this->form_validation->run() == false)
	        {
	        		$data['success']="";
	        		$this->session->userdata('logged_in');
	        		$session_data = $this->session->userdata('logged_in');
	        		$data['username'] = $session_data['username'];
	        		$this->load->view('layouts/header',$data);
			    	$this->load->view('admin/add_employee', $data);
			    	$this->load->view('layouts/footer');
	        }
	        else
	        {
	        	$this->mindex_employee->employee_add($emp_no, $emp_username, $emp_password, $emp_last_name, $emp_first_name, $emp_mid_name, $emp_position, $emp_email);
				redirect('employee/employee_added');
	        }
    	}
		else 
		{
		$data['success'] = "";
		$data['record'] = array('emp_no'=> $get_emp_no->emp_no + 1);
    	$this->load->view('layouts/header');
		$this->load->view('admin/add_employee',$data); 
		$this->load->view('layouts/footer');
		}
	}
	function employee_added($emp_row = 0)
	{
    	$row= $this->mindex_employee->count_employee();
    	$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/employee/index/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$emp_row = $emp_row + $config['per_page'];	
		$this->pagination->initialize($config); 

		$data['links']= $this->pagination->create_links();
		$data['success']="";
		$data['record'] = "";
		$data['employee_view'] = $this->mindex_employee->employee_view($emp_row);
		$data['success'] = '<div class="alert alert-success"> <a class="close" data-dismiss="alert">&times;</a> Registration Success</div> ';
		$data['record'] = '';
		$data['employee_view'] = $this->mindex_employee->employee_view();
    	$this->load->view('layouts/header',$data);
		$this->load->view('admin/view_employee',$data); 
		$this->load->view('layouts/footer');
	}
	public function username_check($emp_username="")
	{
		$test = $this->mindex_employee->check_user($emp_username);
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
		$test = $this->mindex_employee->check_empno($emp_no);
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
		$test = $this->mindex_employee->check_email($emp_email);
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
