<?php

/**
* SENDS EMAIL WITH GMAIL
*/
class Email extends Secure_Controller
{
	function __construct()
	{
		parent::__construct();
		//$this->load->controller('summary');
	}
	
	function index() 
	{	
		
		
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'emertiamzon@gmail.com';
		$config['smtp_pass'] = 'disconnectionnotice';
		$config['mailtype']  = 'html';
		
		$html_email = "";//$this->load->controller('summary',$data, true);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		$this->email->from('emertiamzon@gmail.com', 'Emerson Tiamzon');
		$this->email->to('emerson@prechart.com');		
		$this->email->subject('This is an email test');	
		$this->email->set_mailtype("html");	
		$this->email->message($html_email);
		
		
		if($this->email->send())
		{
			echo 'Your email was sent, successfully.';
			
		}
		
		else
		{
			show_error($this->email->print_debugger());
		}
	}
}

?>
      
