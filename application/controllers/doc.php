<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Doc extends Secure_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model( array( 'mindex_doc') );  
		$this->load->library('pdf'); // Load library
		$this->pdf->fontpath = 'font/'; // Specify font folder
	}

	public function index()
	{

   		$month_now = date('m');
   		$year_now = date('Y');
		$name =  $this->input->post('name');
		$month =  $this->input->post('month');
		$year =  $this->input->post('year');
		$cutoffdate = "0";
		$emp_no = $this->input->post('emp_no');		
		$dtr_emp_header = $this->mindex_doc->dtr_emp_header($name, $cutoffdate, $month, $year);
		$dtr_emp_rec = $this->mindex_doc->dtr_emp_rec($name, $cutoffdate, $month, $year);
		$dtr_emp_getleave = $this->mindex_doc->dtr_emp_getleave();
		if($name=="")
		{
  			$name = "Randy Adanza";
  			$month = date ('m');
  			$year = date ('Y');
  			$emp_no= "03";
  		}	
		 $this->mindex_doc->print_dtr($dtr_emp_header,$dtr_emp_rec,$dtr_emp_getleave,$cutoffdate,$year,$month,$name) ;
	}
}
?>