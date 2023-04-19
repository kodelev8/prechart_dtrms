<?php
/**
 * -------------------------------------------------------------------
 * Index Controller
 * -------------------------------------------------------------------
 * Maps to the following URL
 * http://localhost/dtr
 * Author: Emerson Tiamzon
 */
class timesheets extends Secure_Controller
{
	/**
	 * Constructor
	 */
	function __construct()
    {
        parent::__construct();
        $this->load->model( array( 'mindex_timesheets') );    
    }

    /**
     * Function Index
     * This function will load the header, body and footer of the form page
     */
   
    function index($ts_row = 0)
    {
    	$row= $this->mindex_timesheets->count_timesheets();
    	$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/timesheets/index/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$ts_row = $ts_row+$config['per_page'];	
		$this->pagination->initialize($config); 

		$data['links']= $this->pagination->create_links();
    	$data['success'] ="";
    	$data['record'] ="";
    	$data['get_timesheets'] =  $this->mindex_timesheets->view_timesheets($ts_row);
    	$this->load->view('layouts/header');
		$this->load->view('admin/view_timesheets', $data);
		$this->load->view('layouts/footer');
	}
   function delete_timesheets($ts_id = 0)
    {
    	$this->mindex_timesheets->delete_timesheets($ts_id);
		redirect('timesheets/deleted_timesheets');
	}
   function deleted_timesheets($ts_row = 0)
    {
    	$row= $this->mindex_timesheets->count_timesheets();
    	$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/timesheets/index/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$ts_row = $ts_row+$config['per_page'];	
		$this->pagination->initialize($config); 

		$data['links']= $this->pagination->create_links();
    	$data['success'] ='<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a> Daily Time Record Deleted Success</div>';
    	$data['record'] ='';
    	$data['get_timesheets'] =  $this->mindex_timesheets->view_timesheets($ts_row);
    	$this->load->view('layouts/header');
		$this->load->view('admin/view_timesheets', $data);
		$this->load->view('layouts/footer');
	}
	function add_timesheets()
	{
		$ts_add = $this->input->post('btn-add');
		$ts_emp_no = substr($this->input->post('ts_emp_no'),0,2) ;
		$ts_emp_id = substr($this->input->post('ts_emp_no'),2,4);
		$ts_option_name = $this->input->post('ts_option_name');
		$ts_time = $this->input->post('ts_date');
		$ts_option = "";
		if($ts_add)
		{
			if($ts_option_name == 'Log - IN')
			{
				$ts_option = '1';	
			}
			elseif($ts_option_name == 'Log - OUT')
			{
				$ts_option = '2';	
			}
			elseif($ts_option_name == 'Lunch Break - OUT')
			{
				$ts_option = '3';	
			}
			elseif($ts_option_name == 'Lunch Break - IN')
			{
				$ts_option = '4';	
			}
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
		    $this->form_validation->set_rules('ts_date','ts_date','required');
		    $data['record'] = array('ts_date'  => $this->input->post('ts_date'));
		    
			if ($this->form_validation->run() == false)
			{
				$this->session->set_flashdata('error', 'error_message');
		    }
		    else
		    {
				$this->mindex_timesheets->add_timesheets($ts_emp_id,$ts_emp_no,$ts_option,$ts_option_name,$ts_time);
				redirect('timesheets/added_timesheets/');
		    }
		}
		else
		{
			$data['record'] = '';
			$data['get_emp_no'] =  $this->mindex_timesheets->get_employee_no();
			$this->load->view('layouts/header');
			$this->load->view('admin/add_timesheets', $data);
			$this->load->view('layouts/footer');
		}
	}
    function added_timesheets($ts_row = 0)
    {
    	$row= $this->mindex_timesheets->count_timesheets();
    	$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/timesheets/index/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$ts_row = $ts_row+$config['per_page'];	
		$this->pagination->initialize($config); 

		$data['links']= $this->pagination->create_links();
    	$data['success'] ='<div class="alert alert-success"> <a class="close" data-dismiss="alert">&times;</a> Daily Time Record Added </div> ';
    	$data['record'] ='';
    	$data['get_timesheets'] =  $this->mindex_timesheets->view_timesheets($ts_row);
    	$this->load->view('layouts/header');
		$this->load->view('admin/view_timesheets', $data);
		$this->load->view('layouts/footer');
	}
	function search_timesheets()
	{
		$search = $this->input->post('search');
		$this->session->set_userdata('search', $search);
		if($search =="")
		{
			redirect('timesheets/index/');
		}
		else
		{
			redirect('timesheets/searched_timesheets/');
		}
	}
	
	function searched_timesheets($ts_row = 0)
	{
		$search = $this->session->userdata('search');;
		$row = $this->mindex_timesheets->count_search_timesheets($search);
	    $this->load->library('pagination');
		$config['base_url'] = base_url('index.php/timesheets/searched_timesheets/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$ts_row = $ts_row + $config['per_page'];
		$this->pagination->initialize($config); 
	
		$data['links']= $this->pagination->create_links();
		$search = $this->session->userdata('search');
		$data['record'] = "";
		$data['success']="";
		$data['get_timesheets'] = $this->mindex_timesheets->search_timesheets($search,$ts_row);
		$this->load->view('layouts/header');
		$this->load->view('admin/view_timesheets', $data);
		$this->load->view('layouts/footer');
	}
	function update_timesheets($ts_id = 0)
	{
		$ts_option = "";
		$ts_time = $this->input->post('ts_date');
		$ts_option_name = $this->input->post('ts_option_name');
		$get_update_timesheets = $this->mindex_timesheets->get_update_timesheets($ts_id);
		$data['ts_id'] = $ts_id;
    	$data['success'] ="";
    	$data['record'] =array(
	        	'ts_option_name'   		=> $get_update_timesheets[0]->ts_option_name,
		        'ts_date'   			=> $get_update_timesheets[0]->ts_time,
    			'ts_emp_name'			=> $get_update_timesheets[0]->ts_last_name .' ' .$get_update_timesheets[0]->ts_first_name .','    
	     									.$get_update_timesheets[0]->ts_mid_name);
	    $this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('ts_emp_name',	'Employee Name',	'required');
	    $this->form_validation->set_rules('ts_option_name',	'Remarks',			'required');
		$this->form_validation->set_rules('ts_date',    	'Date',				'required');
		
			if($ts_option_name == 'Log - IN' )
			{
				$ts_option = '1';
			}
			elseif($ts_option_name == 'Log - OUT' )
			{
				$ts_option = '2';
			}	
			elseif($ts_option_name == 'Lunch Break - OUT' )
			{
				$ts_option = '3';
			}
			elseif($ts_option_name == 'Lunch Break - IN' )
			{
				$ts_option = '4';
			}						
			if ($this->form_validation->run() == false)
	        {
	        	$this->session->set_flashdata('error', 'error_message');
	        }
	        else
	        {
	        	$this->mindex_timesheets->update_timesheets($ts_option_name,$ts_option, $ts_time,$ts_id);
	        	redirect('timesheets/updated_timesheets/');
	        }
    	$this->load->view('layouts/header');
		$this->load->view('admin/update_timesheets', $data);
		$this->load->view('layouts/footer');
	}
    function updated_timesheets($ts_row = 0)
    {
    	$row= $this->mindex_timesheets->count_timesheets();
    	$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/timesheets/index/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$ts_row = $ts_row+$config['per_page'];	
		$this->pagination->initialize($config); 

		$data['links']= $this->pagination->create_links();
    	$data['success'] ='<div class="alert alert-success"> <a class="close" data-dismiss="alert">&times;</a> Updated </div> ';
    	$data['record'] ="";
    	$data['get_timesheets'] =  $this->mindex_timesheets->view_timesheets($ts_row);
    	$this->load->view('layouts/header');
		$this->load->view('admin/view_timesheets', $data);
		$this->load->view('layouts/footer');
	}
}

/**
* END Controller class
* End of file index.php
* Location: ..\application\controllers\index.php
*/
