	<div class="container">
		<div class="span12">
			<h3> Add Daily Task</h3>
			<hr></hr>
		</div>
	</div>	
	
	<div class="container">
		<div class="span12">		
			<?= form_open( 'daily_task/add_daily_task' , array ('id' => 'index', 'class' =>'form-horizontal' )); ?>
			 	<?php
					echo bs_inputfield('Employee No.: ' ,       'dt_emp_no' ,     element( 'dt_emp_no', $record), true );
					echo bs_inputfield('Date: ' ,               'dt_date',        element ('dt_date' , $record), true );
					echo bs_inputfield('In: ' ,                 'dt_in',          element ('dt_in' , $record), true );
					echo bs_inputfield('Out: ' ,                'dt_out',         element ('dt_out' , $record), true );
					echo bs_inputfield('Remarks: ' ,            'dt_remarks',     element( 'dt_remarks', $record ), true);
				?>
		 		<div class="form-actions">
					<div class="span2">
						<button type="submit" name="btn-add" value="add" class="btn btn-inverse">Add Daily Task</button>                      
					</div>                         
		 		</div>
			<?= form_close(); ?>     
		 </div>
	</div>

	<script type="text/javascript">
	    $(document).ready(function() {
	        $('#dt_date').datetimepicker({
	                timepicker: false,
	                format: 'Y-m-d'
	            })
	            .datetimepicker({
	                value: '<?= date("Y-m-d" );?> '
	            });
	
	        $('#dt_date_mask').datetimepicker({
	            mask: ' <?= date("Y-m-d H:i:s" );?> '
	        });
	        $('#dt_in').datetimepicker({
	                datepicker: false,
	                format: 'H:i',
	                step: 5
	            })
	            .datetimepicker({
	                value: '00:00'
	            });
	        $('#dt_out').datetimepicker({
	                datepicker: false,
	                format: 'H:i',
	                step: 5
	            })
	            .datetimepicker({
	                value: '00:00'
	            });
	    });
	</script>

