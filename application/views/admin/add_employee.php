	<div class="container">
		<div class="span12">
			<h3>Add Employee</h3>
			<hr></hr>
		</div>
	</div>		

	<div class="container">
		<div class="span12">	
			<?= form_open('employee/employee_add', array('id' => 'index', 'class'=>'form-horizontal')); ?>
				<?php 
					echo bs_inputfield('Employee Number: ', 			'emp_no', 					element('emp_no', 				$record), true,true,'readonly');
					echo bs_inputfield('First Name: ', 					'emp_first_name', 			element('emp_first_name',		$record), true);
					echo bs_inputfield('Middle Name: ', 				'emp_mid_name', 			element('emp_mid_name',			$record), true);
					echo bs_inputfield('Last Name: ', 					'emp_last_name', 			element('emp_last_name',		$record), true);
					echo bs_inputfield('Position: ', 					'emp_position', 			element('emp_position',			$record), true);
					echo bs_inputfield('Email Address: ',				'emp_email', 				element('emp_email',			$record), true);
					echo bs_inputfield('User Name: ', 					'emp_username',				element('emp_username',			$record), true);
					echo bs_inputfield_password('Password: ',			'emp_password',				element('emp_password',			$record), true);
					echo bs_inputfield_password('Confirm Password: ', 	'emp_confirm_password', 	element('emp_confirm_password',	$record), true);
				?>
				 <div class="form-actions">
					 <div class="span2">
						<button type="submit" name="btn-add" value="add" class="btn btn-inverse">Add Employee</button>			
					</div>				
				</div>
			<?= form_close();?>	
		</div>
	</div>