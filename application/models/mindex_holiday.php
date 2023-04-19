<?php
/**
 * -------------------------------------------------------------------
 * mIndex Model
 * -------------------------------------------------------------------
 * This file is for the sql queries.
 * Author:  
 */
class mindex_holiday extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }
    
	/**
	 * Function ...
	 * This function ...
	 */
	function view_holiday($hday_row = 15)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select top 15 * from vwHoliday where row between $hday_row - 14 and $hday_row and deleted  = 0");
  		return $query->result();
    }
    function count_holiday()
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select COUNT(hday_id) as row from vwHoliday where deleted = 0");
  		return $query->row();
    }
	function get_holiday_type()
    {
  		$query = $this->db->query("select [holiday type] as hday_type, [holiday name] as hday_name from [holiday type]");
  		return $query->result();
    }
	function add_holiday($hday_date="", $hday_type="", 	$hday_date="", $hday_name="")
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("insert into holiday ([date] ,[holiday type], [holiday date], [remarks])
					Values('$hday_date','$hday_type' ,'$hday_date','$hday_name')");
    }
	function view_update_holiday($hday_id = 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select * from vwHoliday where hday_id = $hday_id");
  		return $query->row();
    }
	function update_holiday($hday_date= 0, $hday_type = 0, $hday_date = 0, $hday_remarks = 0 , $hday_id =0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("update [Holiday] set   [Date]='$hday_date', [holiday type]='$hday_type',[holiday date] = '$hday_date' ,[remarks]='$hday_remarks' , 
  										[Changed Date] = getdate()where [Holiday ID] = $hday_id");
    }
	function view_holiday_after_updated($hday_row = 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select top 15 * from vwHoliday where row between $hday_row  and $hday_row + 14 and deleted  = 0");
  		return $query->result();
    }
	function delete_holiday( $hday_id = 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("update [Holiday] set deleted = 1, [Changed Date] = getdate()where [Holiday ID] = $hday_id");
    }
	function search_holiday($search = 0,$hday_row = 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select * from fnsearchholiday('$search')where holidayrow between $hday_row -15 and $hday_row");
  		return $query->result();
    }
	function count_search_holiday($search = 0)
    {
    	$this->dbAll = $this->load->database('default', TRUE);
  		$query = $this->dbAll->query("select count(*) as row from fnsearchholiday('$search')");
  		return $query->row();
    }
 
}