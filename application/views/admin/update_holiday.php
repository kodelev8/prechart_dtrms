	<div class="container">
		<div class="span12">
			<h3>Update Holiday</h3>
			<hr></hr>
		</div>	
	</div>
	
	<div class="container">
		<div class="span12">
			<?= form_open('holiday/update_holiday/'.$hday_id, array('id' => 'index', 'class'=>'form-horizontal')); ?>
				<?php 
						echo bs_inputfield('Remarks: ', 	'hday_remarks', 		element('hday_remarks', $record), true,true);
						echo bs_inputfield('Date: ',		'hday_date', 			element('hday_date', $record), true, true);	
				?>
				<div class="control-group">
					<label class="control-label">Holiday Type:</label>
					<div class="controls">
						<select name="hday_type" class="DropDown" >
							<?foreach($holiday_type as $row) :?>
								<option style="color:#000000;" value="<?= $row->hday_type;?>" <?= $row->hday_type == $record['hday_type'] ? 'selected="selected"': ''; ?>><?= $row->hday_name; ?></option>		  	
							<?endforeach;?>
						</select>
					</div>
				</div>
				 <div class="form-actions">
					 <div class="span2">
						<button type="submit" name="btn-update" class="btn btn-inverse">Update Holiday</button> 				
					</div>				
				</div>
			<?= form_close();?>	
		</div>
	</div>

	<script type="text/javascript">
	    $(document).ready(function() {
	        $('#hday_date').datetimepicker({
	            timepicker: false,
	            format: 'Y-m-d'
	        }).datetimepicker({
	            value: '<?= date('Y-m-d',strtotime($record['hday_date']));?>',
	            timepicker: false,
	            step: 10
	        });
	
	        $('#hday_date_mask').datetimepicker({
	            mask: '2014-08-14'
	        });
	    });
	</script>