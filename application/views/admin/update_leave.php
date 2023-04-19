	<div class="container">
		<div class="span12">
			<h3>Update Employee Leave</h3>
			<hr></hr>
		</div>
	</div>	
	
	<div class="container">
		<div class="span12">
			<?= form_open('leave/update_leave/'.$leave_id, array('id' => 'index', 'class'=>'form-horizontal')); ?>
				<?php 
						echo bs_inputfield_hidden('leave_id',	'leave_id',			element('leave_id', $record),true, true); 
						echo bs_inputfield('Employee Name: ',	'leave_emp_name',	element('leave_emp_name', $record), true,true, 'readonly');
						echo bs_inputfield('Date: ',			'leave_date',		element('leave_date', $record),true, true);
						echo bs_inputfield('Leave Type: ',		'leave_type',		element('leave_type', $record),true, true, 'readonly');
						echo bs_inputfield('Reason: ',			'leave_reason',		element('leave_reason', $record),true, true);
				?>
				 <div class="form-actions">
					 <div class="span2" align="center">
						<button type="submit" name="btn-add" class="btn btn-inverse">Update Leave</button>	 				
					</div>				
				</div>
			<?= form_close();?>	
		</div>
	</div>

	<script type="text/javascript">
	    $(document).ready(function() {
	        $('#leave_date').datetimepicker({
	            timepicker: false,
	            format: 'Y-m-d'
	        }).datetimepicker({
	            value: '<?= date('Y-m-d', strtotime($record['leave_date']));?>',
	            timepicker: false,
	            step: 10
	        });
	
	    });
	</script>