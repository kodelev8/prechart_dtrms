<?php
/**
 * -------------------------------------------------------------------
 * mIndex Model
 * -------------------------------------------------------------------
 * This file is for the sql queries.
 * Author:  
 */
class mindex_employee extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }
    
	/**
	 * Function ...
	 * This function ...
	 */
	function get_emp_no()
	{
		$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select top 1 [emp no] as emp_no from Users order by [Emp No] desc"); 	
  		return $query->row();		
	}
	function employee_view($emp_row = 15)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
    	$query = $this->dbAll->query("select * from vwEmployee where row between $emp_row - 14 and $emp_row ");
		return $query->result();
    }
	function count_employee()
    {
    	$this->dbAll = $this->load->database('default', TRUE);
    	$query = $this->dbAll->query("select count(emp_no) as row from vwEmployee");
		return $query->row();
    }
	function employee_delete($emp_no = 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("update [users] set [deleted] = 1 where [emp no] ='$emp_no'");
    }
    function get_user_update($emp_no = 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select * from vwEmployee where emp_no ='$emp_no'");
 	 	 		 	
  		return $query->result();
    } 
	function employee_update($emp_no=0,$emp_last_name="",$emp_first_name="",$emp_mid_name="",$emp_position="",$emp_email="")
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("update [users] set [Emp no] = '$emp_no',  [Last Name]='$emp_last_name', [First Name]='$emp_first_name', [Middle Name ]='$emp_mid_name' , 
  		[Position] = '$emp_position', [Email Address]='$emp_email' where [emp no] ='$emp_no'");
    }    
	function employee_add($emp_no="", $emp_username ="", $emp_password="", $emp_lastname="", $emp_first_name="", $emp_mid_name="", $emp_position="", $emp_email="")
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("insert into [users] ( [Emp no],[user name], [user password], [Last Name],[First Name],[Middle Name ], 
  		[Position],[Email Address]) Values('$emp_no','$emp_username', '$emp_password','$emp_lastname','$emp_first_name','$emp_mid_name','$emp_position', '$emp_email')");
    }
    function check_empno($emp_no = 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select [Emp no] as emp_no from [users] where [deleted] = '0' and [emp no] ='$emp_no'");
  		return $query->result();
    } 
     function check_user($emp_username )
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select [user name] from [users] where [deleted] = '0' and [user name] ='$emp_username'");	
  		return $query->result();
    } 
     function check_email($emp_email)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select [email address] from [users] where [deleted] = '0' and [email address] ='$emp_email'");
  		return $query->result();
    }   
    function employee_search($search ="",$emp_row = 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select * from fnSearchEmployee('$search')where emp_row between $emp_row -14 and $emp_row");
  		return $query->result();
    } 
    function employee_count_search($search ="")
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select count(*) as row from fnSearchEmployee('$search')  ");
  		return $query->row();
    }
}