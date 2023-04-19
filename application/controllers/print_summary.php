<?php 
class print_summary extends Secure_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model( array( 'mindex_doc') ); 
		$this->load->model( array( 'mindex_summary') );  
		$this->load->library('pdf'); // Load library
		$this->pdf->fontpath = 'font/'; // Specify font folder
	}

	public function index()
	{
		$btn_submit = $this->input->post('btn_submit');
		$users = $this->input->post('users');
		$month = $this->input->post('month');
		$year = $this->input->post('year');
		$cutoffdate = 0;
		$name = "";
		$count_user = count($users);
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['success']="";
		$data['record'] = "";
		$data['get_all_users'] = $this->mindex_summary->get_all_users();
		if($users == false )
		{		    
			$data['mos'] = date('m');
    		$data['yr']  = date('Y');
			$this->load->view('layouts/header');
			$this->load->view('view_print/print_summary', $data);   
			$this->load->view('layouts/footer');
			return false;
		}
		$this->mindex_doc->print_all_summary($users, $name,$cutoffdate,$month,$year,$count_user);
	}
}
?>