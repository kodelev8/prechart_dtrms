<?php
/**
 * -------------------------------------------------------------------
 * Index Controller
 * -------------------------------------------------------------------
 * Maps to the following URL
 * http://localhost/dtr
 * Author: Emerson Tiamzon
 */
class holiday extends Secure_Controller
{
	/**
	 * Constructor
	 */
	function __construct()
    {
        parent::__construct();
        $this->load->model( array( 'mindex_holiday','mglobal') );    
    }

    /**
     * Function Index
     * This function will load the header, body and footer of the form page
     */
   
    function index($hday_row = 0)
    {
    	$row= $this->mindex_holiday->count_holiday();
    	$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/holiday/index/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$hday_row = $hday_row + $config['per_page'];	
		$this->pagination->initialize($config); 

		$data['links']= $this->pagination->create_links();
    	$data['success'] = "";
		$data['record'] = "";
		$data['search'] = "";
    	$data['holiday'] = $this->mindex_holiday->view_holiday($hday_row);
    	$this->load->view('layouts/header');
		$this->load->view('admin/view_holiday',$data);
		$this->load->view('layouts/footer');
	}
	function add_holiday()
	{
		$this->load->model( array( 'mindex_holiday') ); 
		$hday_remarks = $this->input->post('hday_remarks');
		$hday_date = $this->input->post('hday_date');
		$hday_type = $this->input->post('hday_type');
		$add = $this->input->post('btn-add');
	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	    $this->form_validation->set_rules('hday_remarks',		'Remarks' ,	'required');
	    $this->form_validation->set_rules('hday_date',    		'Date',		'required');
	    $data['record'] = array(
	        	'hday_name'   		=> $this->input->post('hday_name'),
		        'hday_date'   		=> $this->input->post('hday_date'),      
	        );
		if($add)
		{	
			if ($this->form_validation->run() == false)
			{
		        $data['success']="";
		        $data['holiday_type'] = $this->mindex_holiday->get_holiday_type();
		        $this->load->view('layouts/header');
				$this->load->view('admin/add_holiday', $data);
				$this->load->view('layouts/footer'); 
			}
			else
			{
				$this->mindex_holiday->add_holiday($hday_date, $hday_type, $hday_date, $hday_remarks);
				redirect('holiday/added_holiday/');	
			}	
		}
		else 
		{
			$data['holiday_type'] = $this->mindex_holiday->get_holiday_type();
			$data['success'] ="";
    		$data['record'] = "";
		    $this->load->view('layouts/header');
			$this->load->view('admin/add_holiday', $data);
			$this->load->view('layouts/footer');	
		}
	}
	function added_holiday($hday_row = 0)
	{
		$row = $this->mindex_holiday->count_holiday();
    	$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/holiday/index/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$hday_row = $hday_row + $config['per_page'];	
		$this->pagination->initialize($config); 

		$data['links']= $this->pagination->create_links();
		$data['success'] = '<div class="alert alert-success"> <a class="close" data-dismiss="alert">&times;</a> Holiday Added Success</div> ';
		$data['record']= "";
		$data['search'] = "";
		$data['holiday'] = $this->mindex_holiday->view_holiday($hday_row);
		$data['holiday_type'] = $this->mindex_holiday->get_holiday_type();
		$this->load->view('layouts/header');
		$this->load->view('admin/view_holiday',$data); 
		$this->load->view('layouts/footer');	
	}
	function update_holiday($hday_id = 0)
	{
		$data['hday_id'] = $hday_id;
		$this->load->model( array( 'mindex_holiday') ); 
		$hday_remarks = $this->input->post('hday_remarks');
		$hday_date = $this->input->post('hday_date');
		$hday_type = $this->input->post('hday_type');
		$update_holiday = $this->mindex_holiday->view_update_holiday($hday_id);
		$hday_row = $update_holiday->row;
		$data['holiday']= $this->mindex_holiday->view_update_holiday($hday_id);
		$data['holiday_type']	= $this->mindex_holiday->get_holiday_type();
		$data['record'] = array(
	        	'hday_remarks'   		=> $update_holiday->hday_remarks,
		        'hday_date'   			=> date("Y-m-d H:i:s", strtotime($update_holiday->hday_date)),
				'hday_type'   			=> $update_holiday->hday_type,  );
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	    $this->form_validation->set_rules('hday_remarks',	'Remarks',	'required');
		$this->form_validation->set_rules('hday_date',    	'Date',		'required');
	      
			
			if ($this->form_validation->run() == false)
	        {
	        	$this->session->set_flashdata('error', 'error_message');
	        }
	        else
	        {
	        	$this->mindex_holiday->update_holiday($hday_date, $hday_type, $hday_date, $hday_remarks,$hday_id);
	        	redirect('holiday/view_holiday_updated/'.$hday_row);
	        }
    	$data['success']= "";
		$this->load->view('layouts/header');
		$this->load->view('admin/update_holiday',$data); 
		$this->load->view('layouts/footer');
	}
	function view_holiday_updated($hday_row=0)
	{
		$row= $this->mindex_holiday->count_holiday();
    	$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/holiday/index/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$hday_row = $hday_row;
		$this->pagination->initialize($config); 

		$data['links']= $this->pagination->create_links();
		$data['success'] = '<div class="alert alert-success"> <a class="close" data-dismiss="alert">&times;</a> Holiday Updated Success</div> ';
		$data['record']= "";
		$data['search'] = "";
		$data['holiday'] = $this->mindex_holiday->view_holiday_after_updated($hday_row);
		$this->load->view('layouts/header');
		$this->load->view('admin/view_holiday', $data);
		$this->load->view('layouts/footer');
	}
	function delete_holiday($hday_id = 0)
	{
		$this->mindex_holiday->delete_holiday($hday_id);
	    redirect('holiday/view_holiday_deleted/');
	}
	function view_holiday_deleted()
	{
		$row= $this->mindex_holiday->count_holiday();
    	$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/holiday/index/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$this->pagination->initialize($config); 

		$data['links']= $this->pagination->create_links();
		$data['success'] = '<div class="alert alert-success"> <a class="close" data-dismiss="alert">&times;</a> Holiday Deleted Success</div> ';
		$data['record']= "";
		$data['holiday'] = $this->mindex_holiday->view_holiday();
		$this->load->view('layouts/header');
		$this->load->view('admin/view_holiday', $data);
		$this->load->view('layouts/footer');
	}
	function search_holiday()
	{
		$search = $this->input->post('search');
		$this->session->set_userdata('search', $search);
		if($search =="")
		{
			redirect('holiday/index/');
		}
		else
		{
			redirect('holiday/searched_holiday/');
		}
	}
	
	function searched_holiday($hday_row = 0)
	{
		$search = $this->session->userdata('search');;
		$row = $this->mindex_holiday->count_search_holiday($search);
	    $this->load->library('pagination');
		$config['base_url'] = base_url('index.php/holiday/searched_holiday/');
		$config['total_rows'] = $row->row;
		$config['per_page'] = 15; 
		$hday_row = $hday_row + $config['per_page'];
		$this->pagination->initialize($config); 
	
		$data['links']= $this->pagination->create_links();
		$search = $this->session->userdata('search');
		$data['record'] = "";
		$data['success']="";
		$data['holiday'] = $this->mindex_holiday->search_holiday($search,$hday_row);
		$this->load->view('layouts/header');
		$this->load->view('admin/view_holiday', $data);
		$this->load->view('layouts/footer');
	}
}
/**
* END Controller class
* End of file index.php
* Location: ..\application\controllers\index.php
*/
