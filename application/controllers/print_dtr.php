
<?php
/**
 * -------------------------------------------------------------------
 * Index Controller
 * -------------------------------------------------------------------
 * Maps to the following URL
 * http://localhost/dtr
 * Author: Emerson Tiamzon
 */
class print_dtr extends Secure_Controller
{
	/**
	 * Constructor
	 */
	function __construct()
    {
        parent::__construct();
        $this->load->model( array( 'mindex_summary') );    
    }

    /**
     * Function Index
     * This function will load the header, body and footer of the form page
     */
   
   public function index()
    {
		$btn_submit = $this->input->post('btn_submit');
	   	$users = $this->input->post('users');
	   	$month = $this->input->post('month');
	   	$year = $this->input->post('year');
	   	$error = "";
	    $get = $this->mindex_summary->get_all_users();
	    $data['mos'] = date('m');
	    $data['yr'] = date('Y');
		$data['error'] =$error;
		$data['sample'] =$users;
		$data['get_all_users'] = $get;
		$data['status'] = 0;
		$this->load->view('layouts/header', $data);
		$this->load->view('view_print/print_summary', $data);   
		$this->load->view('layouts/footer');
	}
}



/**
* END Controller class
* End of file index.php
* Location: ..\application\controllers\index.php
*/
