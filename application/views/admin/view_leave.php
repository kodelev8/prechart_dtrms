	<div class="container">
		<div class="span12">
			<h3>View Employee Leave</h3>
			<hr id=""></hr>
		</div>
	</div>
	
	<div class="container">
		<div class="span12">
			<?= form_open('leave/search_leave', array('id' => 'index', 'class'=>'form-horizontal' ,'onclick'=>'')); ?>
				<input type="text" name="search"></input>
				<input type="submit" name="btn-search" value="Search" class="btn btn-inverse"></input>
				<a href="<?= base_url('index.php/leave/add_leave');?>" class="btn btn-inverse">	
					<i class="icon-plus icon-white"></i>Add Leave
				</a>
			<?= form_close(); ?>	
		</div>
	</div>
	
	<div class="container">
		<div class="span12">
		<?= $success;?>
			<table class="table table-bordered table-condensed">
				<tr>
					<td>Employee Name</td>
					<td>Date</td>
					<td>Leave Type</td>
					<td>Reason</td>
					<td>Action</td>
				</tr>
			<?if (count($leave) > 0 ):?>
				<?php foreach($leave as $users):?>
				<tr>
					<td>
					<?= $users->leave_emp_name;?>
					</td>
					<td>
						<? 
						$createDate = new DateTime($users->leave_date);
						echo $createDate->format("Y-m-d");
						?>
					</td>
					<td><?= $users->leave_type;?></td>
					<td><?= $users->leave_reason; ?></td>
					<td>			
						<a href="<?= base_url('index.php/leave/update_leave/'.$users->leave_id);?>"><span class="icon-edit" id="icon-size"></span></a> |
						<a href="<?= base_url('index.php/leave/leave_delete/'.$users->leave_id);?>"><span class="icon-trash" id="icon-size"></span></a>	
					</td>
				</tr>
				<?php endforeach; ?>
			<?else: ?>
					<tr>
						<td colspan="5"> No Record Found!</td>
					</tr>				
			<?endif;?>
			</table>
			<ul class="pagination">
				<?= $links;?>	
			</ul>
		</div>	
	</div>
	<!-- Modal -->
	<div class="modal hide fade" id="alert_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Delete Leave</h4>
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
			$("a[href*='leave/leave_delete/']").click(function(e) {
				e.preventDefault();
				$('#alert_modal').data('href', $(this).attr('href')).modal('show');
			});
			$('#alert_modal').on('show', function() {
				$(this).find('.btn-primary').attr('href', $(this).data('href'));
			});
		})
	</script>