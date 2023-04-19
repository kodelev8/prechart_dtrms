
<?php
/**
 * -------------------------------------------------------------------
 * Index Controller
 * -------------------------------------------------------------------
 * Maps to the following URL
 * http://localhost/dtr
 * Author: Emerson Tiamzon
 */
class daily_task extends Secure_Controller
{
       /**
       * Constructor
       */
       function __construct()
    {
        parent::__construct();
        $this-> load->model( array ( 'mindex_daily_task' ,'mglobal' ) );  
    }

    /**
     * Function Index
     * This function will load the header, body and footer of the form page
     */
 
	function index()
	{
		$dt_emp_no = $this-> input->post( 'dt_emp_no');
		$dt_date_from = $this-> input->post( 'dt_date_from');
		$dt_date_to = $this-> input->post( 'dt_date_to');
		$btn_submit = $this-> input->post( 'btn_submit');
		$data['get_dt_emp'] = $this->mindex_daily_task ->get_dt_emp();
		$data['get_dt'] = $this->mindex_daily_task ->view_daily_task($dt_emp_no,$dt_date_from,$dt_date_to);
		$data['record'] = "";
		if($dt_emp_no=="" )
		{
			$dt_emp_no= '03';
			$dt_date_from = date('Y-m-d',strtotime('yesterday'));
			$dt_date_to = date('Y-m-d');
		}
		else 
		{
		}
		if($btn_submit)
		{
			$data['record'] = array('dt_emp_no'=>$dt_emp_no,'dt_date_from'=>$dt_date_from,'dt_date_to'=>$dt_date_to,);
			$data['success'] = "";
			$data['dt_emp_no'] = $dt_emp_no;
			$data['dt_date_from'] = $dt_date_from;
			$data['dt_date_to'] = $dt_date_to;
			$data['get_dt_emp'] = $this->mindex_daily_task ->get_dt_emp();
			$data['get_dt'] = $this->mindex_daily_task ->view_daily_task($dt_emp_no,$dt_date_from,$dt_date_to);
			$data['get_dt_totalhours'] = $this->mindex_daily_task ->get_dt_totalhours($dt_emp_no,$dt_date_from,$dt_date_to);
			$this->load->view( 'layouts/header');
			$this->load->view( 'admin/view_daily_task',$data );
			$this->load->view( 'layouts/footer' );
		}
		else
		{
			$data['record'] = array('dt_emp_no'=>$dt_emp_no,'dt_date_from'=>$dt_date_from,'dt_date_to'=>$dt_date_to,);
			$data['success'] = "";
			$data['dt_emp_no'] = $dt_emp_no;
			$data['dt_date_from'] = $dt_date_from;
			$data['dt_date_to'] = $dt_date_to;
			$data['get_dt_emp'] = $this->mindex_daily_task ->get_dt_emp();
			$data['get_dt'] = $this->mindex_daily_task ->view_daily_task($dt_emp_no,$dt_date_from,$dt_date_to);
			$data['get_dt_totalhours'] = $this->mindex_daily_task ->get_dt_totalhours($dt_emp_no,$dt_date_from,$dt_date_to);
			$this-> load->view('layouts/header');
			$this-> load->view('admin/view_daily_task',$data);
			$this-> load->view('layouts/footer');
		}
	}
            
	function add_daily_task()
	{
		$dt_array ="";
		$dt_emp_no=$this -> input->post('dt_emp_no');
		$dt_date=$this -> input->post('dt_date');
		$dt_in=$this -> input->post('dt_in');
		$dt_out=$this -> input->post('dt_out');
		$dt_remarks=$this -> input->post('dt_remarks');
		$add = $this -> input->post('btn-add');
           
		$this-> load->helper( array ('form' , 'url' ));
		$this-> load->library( 'form_validation' );
		$this-> form_validation->set_rules('dt_emp_no' ,           'Employee Number' ,     'required|callback_dt_empno_check' );
		$this-> form_validation->set_rules('dt_date' ,             'Date',                 'required');
		$this-> form_validation->set_rules('dt_in' ,               'In',                   'required|callback_dt_time_check');
		$this-> form_validation->set_rules('dt_out' ,              'Out',                  'required|callback_dt_time_check');
		$this-> form_validation->set_rules('dt_remarks' ,          'Remarks',              'required');
        
		$data[ 'record' ] = array (
					'dt_emp_no'		=> $this->input->post('dt_emp_no'),
					'dt_date'		=> $this->input->post('dt_date'),
					'dt_in'			=> $this->input->post('dt_in'), 
					'dt_out'		=> $this->input->post('dt_out'), 
					'dt_remarks'	=> $this->input->post('dt_remarks'),       
				);
		if( $add)
		{    
			if ($this ->form_validation ->run() == false)
			{
				$this-> session->set_flashdata( 'error' , 'error_message');
				$this-> load->view( 'layouts/header' );
				$this-> load->view( 'admin/add_daily_task' , $data);
				$this-> load->view( 'layouts/footer' );
			}
			else
			{
				$dt_array = array('dt_emp_no' => $dt_emp_no,'dt_date_from' => $dt_date,'dt_date_to'=> $dt_date,);
				$this-> mindex_daily_task->add_daily_task($dt_emp_no,$dt_date,$dt_in,$dt_out,$dt_remarks );
				redirect('daily_task/added_daily_task/'.$dt_emp_no);
 			}    
		}
		else
		{
 			$data['record'] = "";
 			$this->load->view('layouts/header');
			$this->load->view('admin/add_daily_task',$data);
			$this->load->view('layouts/footer');  
		}         
	}
	function added_daily_task($dt_emp_no="")
	{
		$dt_emp_no= $dt_emp_no;
		$dt_date_from = date('Y-m-d',strtotime( 'yesterday'));
		$dt_date_to = date('Y-m-d');
		$data['success'] ='<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a> Daily Task Added Success</div>';
		$data['dt_emp_no'] = $dt_emp_no;
		$data['dt_date_from'] = $dt_date_from;
		$data['dt_date_to'] = $dt_date_to;
		$data['record'] = array('dt_emp_no'=>$dt_emp_no,'dt_date_from'=>$dt_date_from,'dt_date_to'=>$dt_date_to,);
		$data['get_dt_emp'] = $this->mindex_daily_task ->get_dt_emp();
		$data['get_dt'] = $this->mindex_daily_task ->view_daily_task($dt_emp_no,$dt_date_from,$dt_date_to);
		$data['get_dt_totalhours'] = $this->mindex_daily_task ->get_dt_totalhours($dt_emp_no,$dt_date_from,$dt_date_to);
		$this->load->view('layouts/header');
		$this->load->view('admin/view_daily_task' ,$data );
		$this->load->view('layouts/footer');
	}
	function update_daily_task($dt_id = 0)
	{
		$data['dt_id'] = $dt_id;
		$dt_emp_no=$this->input->post('dt_emp_no');
		$dt_date=$this->input->post('dt_date');
		$dt_in=$this->input->post('dt_in');
		$dt_out=$this ->input->post('dt_out');
		$dt_remarks=$this->input->post('dt_remarks');
		$update_dt = $this->mindex_daily_task->view_update_daily_task($dt_id);
		$data['record'] = array(
				'dt_emp_no'			=> $update_dt[0]->dt_emp_no,
				'dt_date'   		=> $update_dt[0]->dt_date,
				'dt_in'   			=> $update_dt[0]->dt_in,
				'dt_out'   			=> $update_dt[0]->dt_out,
				'dt_remarks'   		=> $update_dt[0]->dt_remarks,
		);
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this-> form_validation->set_rules('dt_emp_no' ,           'Employee Number' ,     'required|callback_dt_empno_check' );
		$this-> form_validation->set_rules('dt_date' ,             'Date',                 'required');
		$this-> form_validation->set_rules('dt_in' ,               'In',                   'required|callback_dt_time_check');
		$this-> form_validation->set_rules('dt_out' ,              'Out',                  'required|callback_dt_time_check');
		$this-> form_validation->set_rules('dt_remarks' ,          'Remarks',              'required');;
		 
			
		if ($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('error', 'error_message');
		}
		else
		{
			$this->mindex_daily_task->update_daily_task($dt_id, $dt_date,$dt_in ,$dt_out,$dt_remarks);
			redirect('daily_task/view_updated_daily_task/'.$dt_emp_no);
		}
		$this->load->view('layouts/header');
		$this->load->view('admin/update_daily_task',$data);
		$this->load->view('layouts/footer');
	}
	function view_updated_daily_task($dt_emp_no=0)
	{
		$dt_emp_no= $dt_emp_no;
		$dt_date_from = date('Y-m-d',strtotime( 'yesterday'));
		$dt_date_to = date('Y-m-d');
		$data['success'] ='<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a> Daily Task Updated Success</div>';
		$data['dt_emp_no'] = $dt_emp_no;
		$data['dt_date_from'] = $dt_date_from;
		$data['dt_date_to'] = $dt_date_to;
		$data['get_dt_emp'] = $this->mindex_daily_task ->get_dt_emp();
		$data['record'] = array('dt_emp_no'=>$dt_emp_no,'dt_date_from'=>$dt_date_from,'dt_date_to'=>$dt_date_to,);
		$data['get_dt'] = $this->mindex_daily_task ->view_daily_task($dt_emp_no,$dt_date_from,$dt_date_to);
		$data['get_dt_totalhours'] = $this->mindex_daily_task ->get_dt_totalhours($dt_emp_no,$dt_date_from,$dt_date_to);
		$this-> load->view( 'layouts/header');
		$this-> load->view( 'admin/view_daily_task' ,$data );
		$this-> load->view( 'layouts/footer' );
	}
	function delete_daily_task($dt_id = 0)
	{
		$this-> mindex_daily_task->delete_daily_task($dt_id);
		redirect('daily_task/view_deleted_daily_task');
	}
	function view_deleted_daily_task($dt_emp_no=0,$dt_date_from=0,$dt_date_to=0)
	{
		$dt_emp_no= '03';
		$dt_date_from = date('Y-m-d',strtotime( 'yesterday'));
		$dt_date_to = date('Y-m-d');
		$data['success'] ='<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a> Daily Task Deleted Success</div>';
		$data['dt_emp_no'] = $dt_emp_no;
		$data['dt_date_from'] = $dt_date_from;
		$data['dt_date_to'] = $dt_date_to;
		$data['record'] = array('dt_emp_no'=>$dt_emp_no,'dt_date_from'=>$dt_date_from,'dt_date_to'=>$dt_date_to,);
		$data['get_dt_emp'] = $this->mindex_daily_task ->get_dt_emp();
		$data['get_dt'] = $this->mindex_daily_task ->view_daily_task($dt_emp_no,$dt_date_from,$dt_date_to);
		$data['get_dt_totalhours'] = $this->mindex_daily_task ->get_dt_totalhours($dt_emp_no,$dt_date_from,$dt_date_to);
		$this-> load->view( 'layouts/header');
		$this-> load->view( 'admin/view_daily_task' ,$data );
		$this-> load->view( 'layouts/footer' );
	}
 	public function dt_empno_check($dt_emp_no= "")
	{
		$test = $this-> mindex_daily_task->check_empno($dt_emp_no);
		if(count($test) == 0)
		{
			$this-> form_validation->set_message('dt_empno_check' , 'Employee Number not exist');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
 	}
 	public function dt_time_check($dt_in= "",$dt_out= "")
	{
		if($dt_in =='00:00' or $dt_out =='00:00')
		{
			$this-> form_validation->set_message('dt_time_check' , 'Input Time');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
 	}
}
/**
* END Controller class
* End of file index.php
* Location: ..\application\controllers\index.php
*/

