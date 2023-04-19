<?php
/**
 * -------------------------------------------------------------------
 * mIndex Model
 * -------------------------------------------------------------------
 * This file is for the sql queries.
 * Author:  
 */
class mindex_timesheets extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }
    
	/**
	 * Function ...
	 * This function ...
	 */
    
	function view_timesheets($ts_row = 15)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select top 15 * from vwTimesheets where row between $ts_row -14 and $ts_row  order by ts_time desc");
    	return $query->result();	
    }
	function count_timesheets()
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select count(*) as row from vwTimesheets");
    	return $query->row();	
    }
	function delete_timesheets($ts_id = 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("update [daily time record] set deleted = 1, [changed date] = getdate() where id = $ts_id");
    
    }
    function get_employee_no()
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select  * from vwEmployee");
    	return $query->result();	
    }
    function add_timesheets($ts_emp_id = "",$ts_emp_no = "",$ts_option = "",$ts_option_name="",$ts_time = "")
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("INSERT INTO [Daily Time Record] ([User ID],[Emp No] ,[Option],[Option Name],[Deleted],Time)
     								VALUES($ts_emp_id,'$ts_emp_no',$ts_option,'$ts_option_name',0 ,convert(datetime,'$ts_time'))");	
    }
	function search_timesheets($search = 0,$ts_row = 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select * from fnsearchtimesheets('$search')where ts_row between $ts_row -15 and $ts_row");
  		return $query->result();
    }
	function count_search_timesheets($search = 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select count(*) as row from fnsearchtimesheets('$search')");
  		return $query->row();
    }
    function get_update_timesheets($ts_id = 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select * from vwTimesheets where ts_id = $ts_id");
  		return $query->result();
    }
    function update_timesheets($ts_option_name = 0,$ts_option = 0, $ts_time = 0, $ts_id = 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("update [daily time record] set [option name] = '$ts_option_name' ,[option] = $ts_option, time = '$ts_time', [changed date]= getdate() where id = $ts_id");
    }
}