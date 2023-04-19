<?php
/**
 * -------------------------------------------------------------------
 * mIndex Model
 * -------------------------------------------------------------------
 * This file is for the sql queries.
 * Author:  
 */
class mindex_leave extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }
    
	/**
	 * Function ...
	 * This function ...
	 */

	function view_leave($leave_row = 15)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select * from vwLeave where row between $leave_row -14 and $leave_row and deleted = 0 order by leave_date desc");
  		return $query->result();
    }
    function count_leave()
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select COUNT(*) as row from vwLeave where deleted = 0");
  		return $query->row();
    }
    function employee_leave()
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("SELECT [Users ID] as emp_id, [Emp No] as emp_no, [First Name] as first_name, 
  		[Middle Name] as middle_name, [Last Name] as last_name FROM Users where deleted = 0 and [emp no] <> 0 order by [last name] asc");
    	return $query->result();	
    }
    function get_user_id($leave_emp_no = "")
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("SELECT [Users ID] as emp_id FROM Users where [emp no] = '$leave_emp_no'");
    	return $query->row();
    }
	function view_update_leave($leave_id =0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select * from vwLeave where leave_id = $leave_id ");
  		return $query->row();
    }
	function update_leave($leave_date =0,$leave_type = 0 ,$leave_reason = 0,$leave_id= 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("update [employee leave] set [Date]='$leave_date', [leave type]='$leave_type',
  									[reason]='$leave_reason' ,[Changed Date] = getdate() where [leave ID] = $leave_id");
    }
	function view_leave_after_updated($leave_row = 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select * from vwLeave where row between $leave_row  and $leave_row+15 and deleted = 0 order by leave_date desc");
  		return $query->result();
    }
	function delete_leave($leave_id= 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("update [employee leave] set   deleted = 1 , 
  		[Changed Date] = getdate()where [leave ID] = $leave_id");

    }
	function add_leave($leave_reason =0 ,$leave_type= 0 ,$leave_date = 0,$leave_emp_no = 0,$leave_emp_id = 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query( "insert into [employee leave] ([reason] ,[leave type], [date], [emp no],[user id])
					Values( '$leave_reason' ,'$leave_type' ,'$leave_date','$leave_emp_no','$leave_emp_id')");	
    }
	function get_leave_type()
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select [leave type] as leave_type from [employee leave] a group by [leave type]");
  		return $query->result();
    }
	function search_leave($search = 0, $leave_row = 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("SELECT * FROM DBO.FNSEARCHLEAVE('$search') WHERE LEAVEROW BETWEEN $leave_row -15 AND $leave_row");
  		return $query->result();
    }
	function search_count_leave($search = 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("SELECT COUNT(*) AS row FROM DBO.FNSEARCHLEAVE('$search') ");
  		return $query->row();
    }
}