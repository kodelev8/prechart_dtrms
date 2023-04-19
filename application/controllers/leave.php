<?php
/**
 * -------------------------------------------------------------------
 * Index Controller
 * -------------------------------------------------------------------
 * Maps to the following URL
 * http://localhost/dtr
 * Author: Emerson Tiamzon
 */
class leave extends Secure_Controller
{
	/**
	 * Constructor
	 */
	function __construct()
    {
        parent::__construct();
        $this->load->model( array( 'mindex_leave','mglobal') );    
    }

    /**
     * Function Index
     * This function will load the header, body and footer of the form page
     */
   
    function index($leave_row = 0)
    {
    	$row= $this->mindex_leave->count_leave();
    	$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/leave/index/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$leave_row = $leave_row+$config['per_page'];	
		$this->pagination->initialize($config); 

		$data['links']= $this->pagination->create_links();
    	$data['success'] ="";
    	$data['record'] = "";
    	$data['emp_leave'] = $this->mindex_leave->employee_leave();
    	$data['leave'] = $this->mindex_leave->view_leave($leave_row);
    	$this->load->view('layouts/header');
		$this->load->view('admin/view_leave', $data);
		$this->load->view('layouts/footer');
	}
	function add_leave()
	{
		$add =  $this->input->post('btn-add');
		$leave_reason = $this->input->post('leave_reason');
		$leave_date = $this->input->post('leave_date');
		$leave_type = $this->input->post('leave_type');
		$leave_emp_no =  $this->input->post('leave_emp_no');
		$emp_id =  $this->mindex_leave->get_user_id($leave_emp_no);
		$leave_emp_id = $emp_id;
		if($add)
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
	    	$this->form_validation->set_rules('leave_reason',		'Reason' ,		'required');
	        $this->form_validation->set_rules('leave_date',    		'Date',			'required');
	        $this->form_validation->set_rules('leave_type', 		'Leave Type',	'required');
	        $data['record'] = array(
	        	'leave_reason'  => $this->input->post('leave_reason'),
		        'leave_date'   	=> date("d-m-Y H:i:s", strtotime($this->input->post('leave_date'))), 
	        	'leave_type'   	=> $this->input->post('leave_type'));
	        if ($this->form_validation->run() == false)
	        {
	        		$data['success']='';
	        		$data['get_leave_type'] =  $this->mindex_leave->get_leave_type();
					$data['emp_leave'] = $this->mindex_leave->employee_leave();
	        		$this->load->view('layouts/header');
			    	$this->load->view('admin/add_leave', $data);
			    	$this->load->view('layouts/footer');
	        	 
	        }
	        else
	        {
	        		$this->mindex_leave->add_leave($leave_reason,$leave_type,$leave_date,$leave_emp_no,$leave_emp_id);
					redirect('leave/added_leave/');
	        }
    	}
    	else 
    	{
    		$data['record'] = "";
			$data['success']="";
			$data['get_leave_type'] =  $this->mindex_leave->get_leave_type();
			$data['emp_leave'] = $this->mindex_leave->employee_leave();
	    	$this->load->view('layouts/header');
			$this->load->view('admin/add_leave', $data);
			$this->load->view('layouts/footer');
    	}
	}
	function added_leave($leave_row = 0)
	{
		$row= $this->mindex_leave->count_leave();
    	$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/leave/index/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$leave_row = $leave_row+$config['per_page'];	
		$this->pagination->initialize($config); 

		$data['links']= $this->pagination->create_links();
	    $data['success'] = '<div class="alert alert-success"> <a class="close" data-dismiss="alert">&times;</a> Holiday Added</div> ';
	    $data['record']= '';
 		$data['emp_leave'] = $this->mindex_leave->employee_leave();
    	$data['leave'] = $this->mindex_leave->view_leave($leave_row);
    	$this->load->view('layouts/header');
		$this->load->view('admin/view_leave', $data);
		$this->load->view('layouts/footer');
		
	}
	function leave_delete($leave_row = 0)
	{
		$this->mindex_leave->delete_leave($leave_row);
		redirect('leave/leave_deleted/');
	}
	function leave_deleted($leave_row = 0)
	{
		$row= $this->mindex_leave->count_leave();
    	$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/leave/index/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$leave_row = $leave_row+$config['per_page'];	
		$this->pagination->initialize($config); 

		$data['links']= $this->pagination->create_links();
    	$data['success'] ='<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a> Leave Deleted Success</div>';
    	$data['record'] = "";
    	$data['emp_leave'] = $this->mindex_leave->employee_leave();
    	$data['leave'] = $this->mindex_leave->view_leave($leave_row);
    	$this->load->view('layouts/header');
		$this->load->view('admin/view_leave', $data);
		$this->load->view('layouts/footer');
	}
	
	function update_leave($leave_id = 0)
	{		
		$data['leave_id'] = $leave_id;
		$data['success']='';
		$leave_reason = $this->input->post('leave_reason');
		$leave_date = $this->input->post('leave_date');
		$leave_type = $this->input->post('leave_type');
		$this->load->model( array( 'mindex_leave') );
		$leave = $this->mindex_leave->view_update_leave($leave_id);	
		$leave_row = $leave->row;
		$data['record'] = array(
				'leave_id' 				=> $leave->leave_id,
				'leave_emp_name' 		=> $leave->leave_emp_name,
	        	'leave_reason'   		=> $leave->leave_reason,
		        'leave_date'   			=> date("d-m-Y H:i:s", strtotime($leave->leave_date)), 
	        	'leave_type'   			=> $leave->leave_type,);	
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	    $this->form_validation->set_rules('leave_reason',	'Reason',		'required');
		$this->form_validation->set_rules('leave_date',    	'Date',			'required');
		$this->form_validation->set_rules('leave_type', 	'Leave Type',	'required');
		if ($this->form_validation->run() == false)
	        {
	        	$this->session->set_flashdata('error', 'error_message');
	        }
	        else
	        {
	        	$this->mindex_leave->update_leave($leave_date,$leave_type ,$leave_reason,$leave_id);
	        	redirect('leave/view_leave_updated/'.$leave_row);
	        }
	        
    	$this->load->view('layouts/header',$data);
		$this->load->view('admin/update_leave',$data); 
		$this->load->view('layouts/footer');        
    	
	}
	function view_leave_updated($leave_row = 0)
	{
		$row= $this->mindex_leave->count_leave();
		$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/leave/index/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$leave_row = $leave_row;
		$this->pagination->initialize($config); 
		
		$data['links']= $this->pagination->create_links();
		$data['success'] = '<div class="alert alert-success"> <a class="close" data-dismiss="alert">&times;</a> Leave Updated Success</div> ';
		$data['record'] = '';
		$data['emp_leave'] = $this->mindex_leave->employee_leave();
    	$data['leave'] = $this->mindex_leave->view_leave_after_updated($leave_row);
    	$this->load->view('layouts/header');
		$this->load->view('admin/view_leave', $data);
		$this->load->view('layouts/footer'); 
	}
	function search_leave()
	{
		$search = $this->input->post('search');
		$this->session->set_userdata('search', $search);
		if($search =="")
		{
			redirect('leave/index/');
		}
		else
		{
			redirect('leave/searched_leave/');
		}
	}
	function searched_leave($search = 0,$leave_row = 0)
	{
		$search = $this->session->userdata('search');
		$row= $this->mindex_leave->search_count_leave($search);
		$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/leave/searched_leave/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$leave_row = $leave_row + $config['per_page'];	
		$this->pagination->initialize($config); 
		$data['leave'] = $this->mindex_leave->search_leave($search,$leave_row);
		$data['links']= $this->pagination->create_links();			
		$data['record'] = '';
		$data['success']='';
		$this->load->view('layouts/header');
		$this->load->view('admin/view_leave', $data);
		$this->load->view('layouts/footer');
	}
}



/**
* END Controller class
* End of file index.php
* Location: ..\application\controllers\index.php
*/
