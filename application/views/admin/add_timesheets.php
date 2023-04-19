	<div class="container">
		<div class="span12">
				<h3>Add Daily Time Record</h3>
				<hr></hr>
		</div>
	</div>	
	
	<div class="container">
		<div class="span12">		
			<?= form_open('timesheets/add_timesheets', array('id' => 'index', 'class'=>'form-horizontal')); ?>
				<div class="control-group">
					<label class="control-label">Employee Name:</label>
					<div class="controls">
						<select name="ts_emp_no" id="emp_name" class="DropDown" >
							<?foreach($get_emp_no as $user):?>
							  	<option value="<?= $user->emp_no.$user->emp_user_id;?>"><?= $user->emp_last_name .' ' .$user->emp_first_name .', ' .$user->emp_mid_name?></option>
							<?endforeach; ?>  	
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Remarks:</label>
					<div class="controls">
						<select name="ts_option_name" id="emp_name" class="DropDown" >
							<option value="Log - IN">Log  - IN</option>
							<option value="Lunch Break - OUT">Lunch Break - OUT</option>
							<option value="Lunch Break - IN">Lunch Break - IN</option>	
							<option value="Log - OUT">Log - OUT</option>	
						</select>
					</div>
				</div>
				<?php echo bs_inputfield('Date: ', 'ts_date', 	element('ts_date',		$record), true);?>
				 <div class="form-actions">
					 <div class="span2" align="center">
						<input type="submit" name="btn-add" value="add" class="btn btn-inverse"></input>	 				
					</div>
				</div>
			<?= form_close();?>
		</div>
	</div>

	<script type="text/javascript">
	    $(document).ready(function() {
	        $('#ts_date').datetimepicker({
	            timepicker: true,
	            format: 'Y-m-d H:i:s'
	        }).datetimepicker({
	            value: '<?= date("Y-m-d H:i:s");?>',
	            timepicker: true,
	            step: 10
	        });
	
	        $('#ts_date_mask').datetimepicker({
	            mask: '2014-08-14 12:12:12'
	        });
	    });
	</script>