	<div class="container">
		<div class="span12">
			<h3>Add Holiday</h3>
			<hr></hr>
		</div>
	</div>		
	
	<div class="container">
		<div class="span12">
			<?= form_open('holiday/add_holiday', array('id' => 'frm_hday', 'class'=>'form-horizontal')); ?>
				<?php 
					echo bs_inputfield('Remarks: ', 	'hday_remarks', 	element('hday_remarks', $record), true);
					echo bs_inputfield('Date: ', 		'hday_date', 		element('hday_date',	$record), true);
				?>
				<div class="control-group">
					<label class="control-label">Holiday Type:</label>
					<div class="controls">
						<select name="hday_type" class="DropDown" >
							<?foreach($holiday_type as $row):?>
							  	<option value="<?= $row->hday_type; ?>"><?= $row->hday_name;?></option>
							<?endforeach; ?>  	
						</select>
					</div>
				</div>
				 <div class="form-actions">
				 	<div class="span2" align="center">
		 				<button type="submit" name="btn-add" value="add" class="btn btn-inverse">Add Holiday</button>  				
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
	            value: '<?= date("Y-m-d");?>',
	            timepicker: false,
	            step: 10
	        });
	
	        $('#hday_date_mask').datetimepicker({
	            mask: '2014-08-14'
	        });

	    });
	</script>	