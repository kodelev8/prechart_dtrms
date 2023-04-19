	<div class="container">
		<div class="span12">
			<h3>Update Employee</h3>
			<hr></hr>
		</div>
	</div>		
	
	<div class="container">
		<div class="span12">	
			<?= form_open('employee/employee_update/'.$emp_no, array('id' => 'index', 'class'=>'form-horizontal')); ?>
				<?php 
					echo bs_inputfield('Employee Number: ', 'emp_no', 				element('emp_no', 			$record), true, true, 'readonly');
					echo bs_inputfield('First Name: ', 		'emp_first_name',		element('emp_first_name',	$record), true, true);
					echo bs_inputfield('Middle Name: ', 	'emp_mid_name',			element('emp_mid_name', 	$record), true, true);
					echo bs_inputfield('Last Name: ', 		'emp_last_name',		element('emp_last_name', 	$record), true, true);
					echo bs_inputfield('Position: ', 		'emp_position',			element('emp_position', 	$record), true, true);
					echo bs_inputfield('Email Address: ', 	'emp_email',			element('emp_email', 		$record), true, true);	
				?>
				 <div class="form-actions">
					 <div class="span2" align="center">
						<button type="submit" name="btn-update" class="btn btn-inverse">Update Employee</button>			
					</div>				
				</div>
			<?= form_close();?>	 
		</div>
	</div>