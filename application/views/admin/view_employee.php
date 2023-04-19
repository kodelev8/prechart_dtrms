	<style>
		.btn {
			margin-top: -10px;
		}
	</style>
	<div class="container">
		<div class="span12">
			<div class="span4">
				<h3>View Employees</h3>
				<hr id=""></hr>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="span12">
			<?= form_open('employee/employee_search/', array('id' => 'index', 'class'=>'' ,'onclick'=>'')); ?>
				<input type="text" name="search"></input>
				<input type="submit" name="btn-search" value="Search" class="btn btn-inverse"></input>
				<a href="<?= base_url('index.php/employee/employee_add');?>" class="btn btn-inverse">	
					<i class="icon-plus icon-white"></i>Add Employee
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
					<td>Position</td>
					<td>Email Address</td>
					<td>Action</td>
				</tr>
				<? if (count($employee_view) > 0 ): ?>
				<?php foreach($employee_view as $users):?>
				<tr >
					<td>
						<?= $users->emp_no;?>
					</td>
					<td>
						<?= $users->emp_last_name; ?>
					</td>
					<td>
						<?= $users->emp_first_name; ?>
					</td>
					<td>
						<?= $users->emp_mid_name; ?>
					</td>
					<td>
						<?= $users->emp_position; ?>
					</td>
					<td>
						<?= $users->emp_email; ?>
					</td>
					<td>
						<a href="<?= base_url('index.php/employee/employee_update/'.$users->emp_no);?>"><span class="icon-edit" id="icon-size"></span></a> |
						<a href="<?= base_url('index.php/employee/employee_delete/'.$users->emp_no);?>"><span class="icon-trash" id="icon-size"></span></a>
					</td>
				</tr>
				<?php endforeach; ?>
				<?else: ?>
				<tr>
					<td colspan="8">
						No Record Found!
					</td>
				</tr>
				<?endif;?>
				</table>
				<table>
					<tr>
						<td>
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
					<h4 class="modal-title" id="myModalLabel">Delete Employee</h4>
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
			$("a[href*='employee/employee_delete/']").click(function(e) {
				e.preventDefault();
				$('#alert_modal').data('href', $(this).attr('href')).modal('show');
			});
			$('#alert_modal').on('show', function() {
				$(this).find('.btn-primary').attr('href', $(this).data('href'));
			});
		})
	</script>