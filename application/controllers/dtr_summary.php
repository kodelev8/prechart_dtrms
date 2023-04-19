
<?php
/**
 * -------------------------------------------------------------------
 * Index Controller
 * -------------------------------------------------------------------
 * Maps to the following URL
 * http://localhost/dtr
 * Author: Emerson Tiamzon
 */
class dtr_summary extends CI_Controller
{
	/**
	 * Constructor
	 */
	function __construct()
    {
        parent::__construct();
        $this->load->model( array( 'mindex_summary') );    
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
  		$cutoffdate = 0;
  		if($sel_name==""){
  			$sel_name = "Randy Adanza";
  			$sel_month = date ('m');
  			$sel_year = date ('Y');
  			$sel_empno= "03";
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
  	
    	$data['get_all_users'] = $this->mindex_summary->get_all_users();
    	$data['dtr_emp_getleave'] = $dtr_emp_getleave;
    	$data['dtr_emp_header'] = $dtr_emp_header;
    	$data['dtr_emp_rec'] = $dtr_emp_rec;
    	$data['sel_name'] = $sel_name;
    	$data['year'] = $sel_year;
    	$data['month'] = $sel_month;
    	$data['mos'] = date('m');
    	$data['yr'] = date('Y');
    	$data['status'] = '';
    	$data['sel_empno'] = $sel_empno;
    	
		$this->load->view('index_page/view_dtr', $data);   
	}
}
/**
* END Controller class
* End of file index.php
* Location: ..\application\controllers\index.php
*/
