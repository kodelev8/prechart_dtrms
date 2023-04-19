	<div class="container">
		<div class="span12">
			<h3>View Daily Time Record</h3>
			<hr id=""></hr>
		</div>
	</div>
	
	<div class="container">
		<div class="span12">
			<?= form_open('timesheets/search_timesheets/', array('id' => 'index', 'class'=>'form-horizontal' ,'onclick'=>'')); ?>
				<input type="text" name="search"></input>
				<input type="submit" name="btn-search" value="Search" class="btn btn-inverse"></input>
				<a href="<?= base_url('index.php/timesheets/add_timesheets');?>" class="btn btn-inverse">	
					<i class="icon-plus icon-white"></i>Add DTR
				</a>
			<?= form_close(); ?>
		</div>
	</div>
	
	<div class="container">
		<div class="span12">
		<?= $success;?>
		<table class="table table-bordered table-condensed">
			<tr>
				<td>Emp #</td>
				<td>Last Name</td>
				<td>First Name</td>
				<td>Middle Name</td>
				<td>Option Name</td>
				<td>Time</td>
				<td>Action</td>
			</tr>
			<? if (count($get_timesheets) > 0 ): ?>
				<?php foreach($get_timesheets as $ts):?>
					<tr >
						<td>
							<?= $ts->ts_emp_no;?>
						</td>
						<td>
							<?= $ts->ts_last_name; ?>
						</td>
						<td>
							<?= $ts->ts_first_name; ?>
						</td>
						<td>
							<?= $ts->ts_mid_name; ?>
						</td>
						<td>
							<?= $ts->ts_option_name; ?>
						</td>
						<td>
							<?= date("d-m-Y H:i:s", strtotime($ts->ts_time));?>
						</td>
						<td>
							<a href="<?= base_url('index.php/timesheets/update_timesheets/'.$ts->ts_id);?>"><span class="icon-edit" id="icon-size"></span></a> |
							<a href="<?= base_url('index.php/timesheets/delete_timesheets/'.$ts->ts_id);?>"><span class="icon-trash" id="icon-size"></span></a>
						</td>
					</tr>
				<?php endforeach; ?>
			<?else: ?>
				<tr>
					<td colspan="7">
						No Record Found!
					</td>
				</tr>
			<?endif;?>
			</table>
			<table>
				<tr>
					<td style="border: 0;">
						<ul class="pagination">
							<?= $links;?>	
						</ul>
					</td>
				</tr>
			</table>		 
		</div>
	</div>
	
	<div class="modal hide fade" id="alert_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon-remove"></span></button>
					<h4 class="modal-title" id="myModalLabel">Delete Daily Time Record</h4>
				</div>
				<div class="modal-body">
					Are sure you want to delete?
				</div>				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button> 
					<a href="#" class="btn btn-primary">Yes</a>
				</div>
			</div>
		</div>
	</div>
	
	<script type='text/javascript'>
		$(document).ready(function() {
			$("a[href*='timesheets/delete_timesheets/']").click(function(e) {
				e.preventDefault();
				$('#alert_modal').data('href', $(this).attr('href')).modal('show');
			});
			$('#alert_modal').on('show', function() {
				$(this).find('.btn-primary').attr('href', $(this).data('href'));
			});
		})
	</script>