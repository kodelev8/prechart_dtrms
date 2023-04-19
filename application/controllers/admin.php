<?php
 //we need to call PHP's session object to access it through CI
/**
 * -------------------------------------------------------------------
 * Index Controller
 * -------------------------------------------------------------------
 * Maps to the following URL
 * http://localhost/dtr
 * Author: Emerson Tiamzon
 */
 
class admin extends CI_Controller
{
	/**
	 * Constructor
	 */
	function __construct()
    {
        parent::__construct();
        $this->load->model( array( 'mindex') );
        $this->load->model( array( 'mindex_summary') );
        $this->load->model( array( 'mindex_employee','mglobal') );  
    }

    /**
     * Function Index
     * This function will load the header, body and footer of the form page
     */
   
    function index()
    {
//    	if($this->session->userdata('id_users')<> 0)
//    	{
//    	 	redirect('employee');
//    	}
//    	else 
//    	{
    		$this->session->sess_destroy();
       		$this->load->view('layouts/header_login');
			$this->load->view('admin/admin_login'); 
			$this->load->view('layouts/footer');
//    	}
    	
    }

	function login()
	{	
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$login = $this->input->post('login');
			$id_users = "";
			
			if($username == "" or $password == "")
			{
				  $this->session->sess_destroy();
          		  $this->session->set_flashdata('error', 'error_message');
          		  redirect('admin');
			}
			else
			{
				$adminlogin= $this->mindex->adminlogin($username, $password);
				foreach($adminlogin as $row):
					$row->user_id;
				endforeach;
				if(count($adminlogin) > 0)
				{
					$id_users = $adminlogin[0]->user_id;
					$this->session->set_userdata('id_users', $id_users);
					redirect('employee');
				}
				else
				{
					$this->session->sess_destroy();
		            $this->session->set_flashdata('error', 'error_login_code');
	       	   	 	redirect('admin');
				}
			}
	}
	function logout()
	 {
	 	$this->session->set_userdata('id_users', 0);
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', lang('message_successfully_logged_off'));
        redirect('admin/index/');
    
	}
	
}


/**
* END Controller class
* End of file index.php
* Location: ..\application\controllers\index.php
*/
