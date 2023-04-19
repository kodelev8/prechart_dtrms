<?php
/**
 * -------------------------------------------------------------------
 * mIndex Model
 * -------------------------------------------------------------------
 * This file is for the sql queries.
 * Author:  
 */
class mindex_summary extends CI_Model
{
	public function __construct()
    {
    	
        parent::__construct();
    }
    
	/**
	 * Function ...
	 * This function ...
	 */
	
 	function get_all_users()
    {
    	$this->dbAll = $this->load->database('default', TRUE);
    	$query = $this->dbAll->query("select [middle name] as midname, [email address] as email,
    	 [users id] as uid,[emp no] as emp_no, [First Name] as first_name, [Last Name] as last_name , 
    	 [position] as position from Users where deleted = 0 and [user name] <> 'admin' order by [last name] asc");
		return $query->result();
    }

   	function dtr_emp_rec($sel_name= '', $cutoffdate = 0, $sel_month = 0, $sel_year = 0)
    {
		$this->dbAll = $this->load->database('default', TRUE);
	  	$query =  $this->dbAll->query("spGetEmpDTR @EMPNAME='$sel_name', @CUTOFFDATE='$cutoffdate', @MONTH='$sel_month',  @YEAR='$sel_year' ");
	 	return $query->result_array();
	}
	function dtr_emp_header($sel_name= '', $cutoffdate = 0, $sel_month = 0, $sel_year = 0)
    {
	  	$this->dbAll = $this->load->database('default', TRUE);
	  	$query =  $this->dbAll->query("spGetEmpHeaderDTR @EMPNAME='$sel_name', @CUTOFFDATE='$cutoffdate', @MONTH='$sel_month',  @YEAR='$sel_year' ");
	 	return $query->result_array();
	}	
 	function dtr_emp_getleave()
    {
	  	$this->dbAll = $this->load->database('default', TRUE);
	  	$query =  $this->dbAll->query("spGetCurrentLeaveAvailable");
	 	return $query->result_array();	
	}
		function post_GetEmpLeaveAvailable($post_name="",$post_month="",$post_year="")
	{
		$this->dbAll = $this->load->database('default', TRUE);
		$query =  $this->dbAll->query("spGetEmpLeaveAvailable @empname='$post_name', @month='$post_month', @year='$post_year'");
		return $query->result_array();
	}
	function post_InsertCurrentLeaveAvailable()
	{
		$this->dbAll = $this->load->database('default', TRUE);
		$query =  $this->dbAll->query("spInsertCurrentLeaveAvailable");
		return $query->result_array();
	}
	function check_current_post_leave($sel_name="",$sel_month="",$sel_year="")
	{
		$this->dbAll = $this->load->database('default', TRUE);
		$query =  $this->dbAll->query("select month from [employee leave available] where MONTH =convert(int,'$sel_month' -1) and YEAR=$sel_year
						and [emp no] = (select [Emp No] from Users where ([First Name] +' '+ [Last Name] = '$sel_name') )");
		return $query->result_array();
	}
	function check_last_post_leave($sel_name="",$sel_month="",$sel_year="")
	{
		$this->dbAll = $this->load->database('default', TRUE);
		$query =  $this->dbAll->query("select month from [employee leave available] where MONTH =$sel_month and YEAR=$sel_year
				and [emp no] = (select [Emp No] from Users where ([First Name] +' '+ [Last Name] = '$sel_name') )");
		return $query->result_array();
	}
	
}