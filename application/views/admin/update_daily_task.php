	<div class="container">
	 	<div class="span12">
			<h3> Update Daily Task</h3>
			<hr></hr>
		</div>
	</div>		

	<div class="container">
	 	<div class="span12">
			<?= form_open( 'daily_task/update_daily_task/'.$dt_id , array ('id' => 'index', 'class' =>'form-horizontal' )); ?>
				<?php
					echo bs_inputfield('Employee No.: ' ,       'dt_emp_no' ,     element('dt_emp_no', $record), true,true,'readonly' );
					echo bs_inputfield('Date: ' ,               'dt_date',        element('dt_date', $record), true,true );
					echo bs_inputfield('In: ' ,                 'dt_in',          element('dt_in', $record), true,true );
					echo bs_inputfield('Out: ' ,                'dt_out',         element('dt_out', $record), true,true );
					echo bs_inputfield('Remarks: ' ,            'dt_remarks',     element('dt_remarks', $record ), true,true);
				?>
				<div class= "form-actions" >
					<div class= "span2">
						<button type="submit" name="btn-add" class="btn btn-inverse">Update Daily Task</button>                      
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
	                value: '<?= date("Y-m-d");?>'
	            });
	
	        $('#dt_date_mask').datetimepicker({
	            mask: '<?= date("Y-m-d H:i:s");?>'
	        });
	        $('#dt_in').datetimepicker({
	                datepicker: false,
	                format: 'H:i',
	                step: 5
	            })
	            .datetimepicker({
	                value: '<?= $record['dt_in'];?>'
	            });
	        $('#dt_in_mask').datetimepicker({
	            mask:  '<?= date("H:i");?>'
	        });
	        $('#dt_out').datetimepicker({
	                datepicker: false,
	                format: 'H:i',
	                step: 5
	            })
	            .datetimepicker({
	                value: '<?= $record['dt_out'];?>'
	            });
	        $('#dt_out_mask').datetimepicker({
	            mask: '<?= date("H:i" );?>'
	        });
	    });
	</script>