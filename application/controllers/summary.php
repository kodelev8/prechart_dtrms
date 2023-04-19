
<?php
/**
 * -------------------------------------------------------------------
 * Index Controller
 * -------------------------------------------------------------------
 * Maps to the following URL
 * http://localhost/dtr
 * Author: Emerson Tiamzon
 */
class summary extends Secure_Controller
{
	/**
	 * Constructor
	 */
	function __construct()
    {
        parent::__construct();
        $this->load->model( array( 'mindex_summary') ); 
        $this->load->helper('array');   
    }

    /**
     * Function Index
     * This function will load the header, body and footer of the form page
     */
   
    function index()
    {

    	$btn_submit = $this->input->post('btn_submit');
    	$sel_name = substr($this->input->post('emp_no'),2);
    	$sel_empno = substr($this->input->post('emp_no'),0,2);
  		$sel_month = $this->input->post('month');
  		$sel_year = $this->input->post('year');
  		$sel_month_to = "";
  		$month = date ('m');
  		$year = date ('Y');
  		$cutoffdate = 0;
  		if($sel_name==""){
  			$sel_name = "Randy Adanza";
  			$sel_month = date ('m');
  			$sel_year = date ('Y');
  			$sel_empno= "03";
  		}
  		else{
  			
  		}

		if($btn_submit)
 		{
  			$dtr_emp_rec = $this->mindex_summary->dtr_emp_rec($sel_name, $cutoffdate, $sel_month, $sel_year);
  			$dtr_emp_header = $this->mindex_summary->dtr_emp_header($sel_name, $cutoffdate, $sel_month, $sel_year);
  			$dtr_emp_getleave = $this->mindex_summary->dtr_emp_getleave();
		}
 		else
  		{
  			$dtr_emp_rec = $this->mindex_summary->dtr_emp_rec($sel_name, $cutoffdate, $sel_month, $sel_year);
  			$dtr_emp_header = $this->mindex_summary->dtr_emp_header($sel_name, $cutoffdate, $sel_month, $sel_year);
  			$dtr_emp_getleave = $this->mindex_summary->dtr_emp_getleave();
  		}
  		$data['check_last_post'] = $this->mindex_summary->check_last_post_leave($sel_name,$sel_month,$sel_year);
  		$data['check_post'] = $this->mindex_summary->check_current_post_leave($sel_name,$sel_month,$sel_year);
  		$data['dtr_emp_getleave'] = $dtr_emp_getleave;
    	$data['get_all_users'] = $this->mindex_summary->get_all_users();
    	$data['dtr_emp_rec'] = $dtr_emp_rec;
    	$data['dtr_emp_header'] = $dtr_emp_header;
    	$data['sel_name'] = $sel_name;
    	$data['year'] = $sel_year;
    	$data['month'] = $sel_month;
    	$data['mos'] = date('m');
    	$data['yr'] = date('Y');
    	$data['status'] = '';
    	$data['sel_empno'] = $sel_empno;
    	
		$this->load->view('layouts/header', $data);
		$this->load->view('admin/view_dtr', $data);   
		$this->load->view('layouts/footer');	
	}
	function post_dtr()
	{
		$post_name =  $this->input->post('post_name');
		$post_month =  $this->input->post('post_month');
		$post_year =  $this->input->post('post_year');
		$data['success']= "";
		$data['btn_action'] = 0;
		$data['post_GetEmpLeaveAvailable']= $this->mindex_summary->post_GetEmpLeaveAvailable($post_name,$post_month,$post_year);
		$data['post_GetCurrentLeaveAvailable']= $this->mindex_summary->dtr_emp_getleave();
		$data['post_name']= $post_name;
		$data['post_month'] = $post_month;
		$data['post_year'] =$post_year;
		$this->load->view('layouts/header', $data);
		$this->load->view('admin/view_post_dtr', $data);
		$this->load->view('layouts/footer');		
	}
	function posted_dtr()
	{
		$post_name= $this->session->userdata('post_name');
		$post_month= $this->session->userdata('post_month');
		$post_year=  $this->session->userdata('post_year');
		$this->mindex_summary->post_InsertCurrentLeaveAvailable();
		$data['success']= '<div class="alert alert-success" style="width:550px;"> <a class="close" data-dismiss="alert">&times;</a> Employee Leave Posted</div>';
		$data['btn_action'] = 1;
		$data['post_GetEmpLeaveAvailable']= $this->mindex_summary->post_GetEmpLeaveAvailable($post_name,$post_month,$post_year);
		$data['post_GetCurrentLeaveAvailable']=$this->mindex_summary->dtr_emp_getleave();
		$data['post_name']= $post_name;
		$data['post_month'] = $post_month;
		$data['post_year'] =$post_year;
		$this->load->view('layouts/header', $data);
		$this->load->view('admin/view_post_dtr', $data);
		$this->load->view('layouts/footer');
	}
}
/**
* END Controller class
* End of file index.php
* Location: ..\application\controllers\index.php
*/
