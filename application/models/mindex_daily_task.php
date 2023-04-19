<?php
/**
 * -------------------------------------------------------------------
 * mIndex Model
 * -------------------------------------------------------------------
 * This file is for the sql queries.
 * Author:
 */
class mindex_daily_task extends CI_Model
{
       public function __construct()
    {
        parent::__construct();
    }
  
       /**
       * Function ...
       * This function ...
       */
  
    function view_daily_task($dt_emp_no= "",$dt_date_from="" ,$dt_date_to="")
    {
       $this-> dbAll = $this-> load->database( 'default' , TRUE );
       $query = $this -> dbAll->query( "select * from vwDailyTask where dt_emp_no = '$dt_emp_no'and cast(dt_date as datetime) between '$dt_date_from ' and '$dt_date_to'");
       return $query->result();
    }
    function get_dt_emp()
    {
       $this-> dbAll = $this-> load->database( 'default' , TRUE );
       $query = $this -> dbAll->query("select * from vwemployee");
       return $query->result();
    }
   
    function add_daily_task($dt_emp_no="",$dt_date ="" ,$dt_in ="" ,$dt_out = "" ,$dt_remarks = "" )
    {
      $this-> dbAll = $this-> load->database( 'default' , TRUE );
             $query = $this -> dbAll->query("insert into [daily task] ([emp no],[date] ,[time in], [time out], [remarks])
                              Values('$dt_emp_no','$dt_date','$dt_in','$dt_out','$dt_remarks')");
    }
    function view_update_daily_task($dt_id = "")
    {
    	$this-> dbAll = $this-> load->database( 'default' , TRUE );
    	$query = $this->dbAll->query("select * from vwDailyTask where dt_id = '$dt_id'");
    	return $query->result();
    }     
    function update_daily_task($dt_id = "",$dt_date = "",$dt_in ="",$dt_out = "",$dt_remarks = "" )
    {
    	$this-> dbAll = $this-> load->database( 'default' , TRUE );
    	$query = $this->dbAll->query("update [daily task] set date = '$dt_date', [time in] = '$dt_in', [time out] = '$dt_out', 
    									[remarks] = '$dt_remarks' , [changed date] = getdate() where id = $dt_id");
    }
	function delete_daily_task($dt_id = "")
    {
    	$this-> dbAll = $this-> load->database( 'default' , TRUE );
    	$query = $this->dbAll->query("update [daily task] set deleted = '1' , [changed date] = getdate() where id = $dt_id");
    }       
    function check_empno($dt_emp_no = 0)
    {
       $this-> dbAll = $this-> load->database( 'default', TRUE );
       $query = $this-> dbAll->query( "select [Emp no] as dt_emp_no from [users] where [deleted] = '0' and [emp no] ='$dt_emp_no '");
       return $query->result();
    }
    function get_emp_name($dt_emp_no = 0)
    {
       $this-> dbAll = $this-> load->database( 'default', TRUE );
       $query = $this-> dbAll->query( "select ([first name]+' '+ [last name]) as dt_emp_name, [first name] as dt_first_name, [last name] as dt_last_name from [users] where [deleted] = '0' and [emp no] ='$dt_emp_no '");
       return $query->row();
    }
    function get_dt_totalhours($dt_emp_no= '', $dt_date_from = 0, $dt_date_to = 0)
    {
	  	$this->dbAll = $this->load->database('default', TRUE);
	  	$query =  $this->dbAll->query("spGetDailyTaskTotalHours @emp_no='$dt_emp_no', @date_from='$dt_date_from', @date_to='$dt_date_to'");
	 	return $query->row();
	}	
	function get_dt_totalhours_per_day($dt_emp_no= '', $dt_date = 0)
    {
	  	$this->dbAll = $this->load->database('default', TRUE);
	  	$query =  $this->dbAll->query("spGetDailyTaskTotalHoursPerDay @emp_no='$dt_emp_no', @date='$dt_date'");
	 	return $query->row();
	}	
}
  
