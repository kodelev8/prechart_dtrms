	<div class="container">
		<div class="span12">
			<h3>Add Employee Leave</h3>
			<hr></hr>
		</div>
	</div>	
	<div class="container">
		<div class="span12">	
			<?= form_open('leave/add_leave', array('id' => 'index', 'class'=>'form-horizontal')); ?>
				<div class="control-group">
					<label class="control-label" for="inputEmail">Employee Name:</label>
					<div class="controls">
						<select name="leave_emp_no" id="emp_name" class="DropDown" >
							<?foreach($emp_leave as $user):?>
							  	<option value="<?= $user->emp_no?>"><?= $user->last_name .', ' .$user->first_name .' ' .$user->middle_name?></option>
							<?endforeach; ?>  	
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputEmail">Leave Type:</label>
					<div class="controls">
						<select name="leave_type" id="leave_type" class="DropDown" >
							<?foreach($get_leave_type as $leave):?>
							  	<option value="<?= $leave->leave_type;?>"><?= $leave->leave_type;?></option>
							<?endforeach; ?>  	
						</select>
					</div>
				</div>
					<?= bs_inputfield('Date: ',		'leave_date',		element('leave_date',	$record), true);?>
					<?= bs_inputfield('Reason: ',	'leave_reason',		element('leave_reason', $record), true);?> 
				 <div class="form-actions">
					 <div class="span2" align="center">
						<button type="submit" name="btn-add" value="add" class="btn btn-inverse">Add Leave</button>	 				
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
	            value: '<?= date("Y-m-d");?>',
	            timepicker: false,
	            step: 10
	        });
	
	        $('#leave_date_mask').datetimepicker({
	            mask: '2014-08-14'
	        });
	    });
	</script>