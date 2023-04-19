	<div class="container">
		<div class="span12">
			<h3>Update Daily Time Record</h3>
			<hr></hr>
		</div>
	</div>	
		
	<div class="container">
		<div class="span12">	
			<?= form_open('timesheets/update_timesheets/'.$ts_id, array('id' => 'index', 'class'=>'form-horizontal')); ?>
				<?php echo bs_inputfield('Employee Name: ', 'ts_emp_name', 	element('ts_emp_name',$record), true, true,'readonly');?>
				<div class="control-group">
					<label class="control-label" for="inputEmail">Remarks:</label>
					<div class="controls">
						<select name="ts_option_name" class="DropDown" >
							<option value="Log - IN" <?= $record['ts_option_name'] == 'Log - IN' ? 'selected="selected"': ''; ?>>Log  - IN</option>
							<option value="Lunch Break - OUT" <?= $record['ts_option_name'] == 'Lunch Break - OUT' ? 'selected="selected"': ''; ?>>Lunch Break - OUT</option>
							<option value="Lunch Break - IN" <?= $record['ts_option_name'] == 'Lunch Break - IN' ? 'selected="selected"': ''; ?>>Lunch Break - IN</option>	
							<option value="Log - OUT" <?= $record['ts_option_name'] == 'Log - OUT' ? 'selected="selected"': ''; ?>>Log - OUT</option>	
						</select>
					</div>
				</div>
				<?php echo bs_inputfield('Date: ', 'ts_date', 	element('ts_date',$record), true, true);?>
				 <div class="form-actions">
					 <div class="span1" align="center">
						<button type="submit" name="btn-add" class="btn btn-inverse">Update</button>			
					</div>
				</div>
			<?= form_close();?>	 
		</div>
	</div>

	<?$date= date('Y-m-d H:i:s',strtotime($record['ts_date']));?>
	<script type="text/javascript">
	    $(document).ready(function() {
	        $('#ts_date').datetimepicker({
	            timepicker: true,
	            format: 'Y-m-d H:i:s'
	        }).datetimepicker({
	            value: '<?=$date;?>',
	            timepicker: true,
	            step: 10
	        });
	
	        $('#ts_date_mask').datetimepicker({
	            mask: '2014-08-14 H:i:s'
	        });
	    });
	</script>