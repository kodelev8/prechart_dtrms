<?php
/**
 * -------------------------------------------------------------------
 * Index Controller
 * -------------------------------------------------------------------
 * Maps to the following URL
 * http://localhost/dtr
 * Author: Emerson Tiamzon
 */
class index extends CI_Controller
{
	/**
	 * Constructor
	 */
	function __construct()
    {
        parent::__construct();
        $this->load->model( array( 'mindex') );
        
    }

    /**
     * Function Index
     * This function will load the header, body and footer of the form page
     */
   
    function index()
    {
    	$emp_required = '0';
    	$login = $this->input->post('login');
    	$lunchout = $this->input->post('lunchout');
    	$lunchin = $this->input->post('lunchin');
    	$logout = $this->input->post('logout');
    	
    	$option_name = $this->input->post('option_name');
    	$emp_no = $this->input->post('emp_no');
    	$post_option_name ='';
    	$nrf = '';
    	$datetime = '';
    	$option = $this->input->post('option'); ;
    	$warning_remarks = '';
    	$check_option_name = '';
    	$dtr_id = '';
    	$dtr_emp_no = '';
    	
    	date_default_timezone_set('Asia/Taipei');  
		$date = '';

    	$emp = '';
    	$date = '';
    	$get_emp_info = '';
    	$save_emp_info = '';
    	$datetime = '';
    	
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('emp_no',			'', 				'trim|xss_clean|prep_for_form|required');
    	
    	if ($this->form_validation->run() != FALSE)
        {
	        if($emp_no == '')
			{
	    		$date = '';
	    		$time = '';
	    		$get_emp_info = '';
	    		$show_emp_info = '';
	    	}
	    	else
	    	{
	    		$show_emp_info = $this->mindex->show_emp_info($emp_no);
				$checkremarks = $this->mindex->check_dual_remarks($option_name,$emp_no);
				$dtr_id = "";
				foreach ($checkremarks as $row):
						$check_option_name = $row->option_name;
						$dtr_id = $row->id;
						$dtr_emp_no = $row->emp_no;
				endforeach;
	    		if(count($show_emp_info) > 0)
	    		{
	    			if($check_option_name == $option_name)
	    			{
	    				$warning_remarks = "$('#myModal').modal('show');";
	    				$get_emp_info= '';	    				
	    			}
	    			else 
	    			{
	    				$get_emp_info = $this->mindex->get_emp_info($emp_no);
	    				$datetime = date('Y-d-m H:i:s');
	    				$date = date('Y-m-d H:i:s ');
	    				$email_name = $get_emp_info->first_name .' '.$get_emp_info->last_name;
	    				$email_address = $get_emp_info->email_address;
				    	$this->mindex->save_emp_info($get_emp_info->user_id, $get_emp_info->emp_no, $date, $option, $option_name, $datetime);
						$this->mindex->send_email($email_name,$option_name,$date,$email_address);
						$post_option_name = $option_name;
						$option = 0;
	    			}
	    		}	
	    		else
	    		{
	    			$emp = '';
	    			$get_emp_info = '';
	    			$nrf = 'true';
	    			$date = '';
	    		}
	    	}
        }
        
    	$data['dtr_emp_no'] = $dtr_emp_no;
    	$data['dtr_id'] = $dtr_id;
    	$data['post_option_name'] = $post_option_name;
    	$data['warning_remarks'] = $warning_remarks;
    	$data['get_emp_info'] = $get_emp_info;
    	$data['option_name'] = $option_name;
    	$data['datetime'] = $datetime;
    	$data['date'] = $date;
		$data['option'] = $option;
		$data['nrf'] = $nrf;
		
		$this->load->view('index_page/index', $data); 
	}
	
	function overwrite()
	{
		$emp_required = '0';
    	$login = $this->input->post('login');
    	$lunchout = $this->input->post('lunchout');
    	$lunchin = $this->input->post('lunchin');
    	$logout = $this->input->post('logout');
    	
    	$option_name = $this->input->post('option_name');
    	$emp_no = $this->input->post('emp_no');
    	$post_option_name ='';
    	$nrf = '';
    	$datetime = '';
    	$option = $this->input->post('option'); ;
    	$warning_remarks = '';
    	$check_option_name = '';
    	$dtr_id = '';
    	$dtr_emp_no = '';
    	
    	date_default_timezone_set('Asia/Taipei');  
		$date = '';

    	$emp = '';
    	$date = '';
    	$get_emp_info = '';
    	$save_emp_info = '';
    	$datetime = '';
    	
		
    	$emp_no = $this->input->post('dtr_emp_no');
		$get_emp_info = $this->mindex->get_emp_info($emp_no);
		$email_name = $get_emp_info->first_name .' '.$get_emp_info->last_name;
		$email_address = $get_emp_info->email_address;
		$datetime = date('Y-d-m H:i:s');
		$date = date('Y-m-d H:i:s ');
    	$dtr_id_update = $this->input->post('dtr_id');
    	$dtr_option_name_update = $this->input->post('option');
    	$post_option_name = $dtr_option_name_update;
    	$this->mindex->dtr_update($dtr_id_update,$dtr_option_name_update); 
    	$this->mindex->send_email($email_name,$post_option_name,$date,$email_address);
    	$option = 0;
    	
    	$data['dtr_emp_no'] = $dtr_emp_no;
    	$data['dtr_id'] = $dtr_id;
    	$data['post_option_name'] = $post_option_name;
    	$data['warning_remarks'] = $warning_remarks;
    	$data['get_emp_info'] = $get_emp_info;
    	$data['option_name'] = $option_name;
    	$data['datetime'] = $datetime;
    	$data['date'] = $date;
		$data['option'] = $option;
		$data['nrf'] = $nrf;
		
		$this->load->view('index_page/index', $data); 
	}
}
/**
* END Controller class
* End of file index.php
* Location: ..\application\controllers\index.php
*/