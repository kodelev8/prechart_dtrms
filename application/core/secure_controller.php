<?php
class Secure_Controller extends CI_Controller
{
	var $id_users = 0;
	
	    
	public function __construct()
    {
    	parent::__construct();
    	$this->Authenticate();
    }
    
    function Authenticate()
    {
        $this->id_users = $this->session->userdata('id_users');
                
    	if ($this->id_users == null || $this->id_users == 0)
		{	
			redirect('admin/index/');
		}
    }
}