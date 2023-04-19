	<div class="container">
		<div class="span12">
			<h3>View Holidays</h3>
			<hr id=""></hr>
		</div>
	</div>
	
	<div class="container">
		<div class="span12">
			<?= form_open('holiday/search_holiday', array('id' => 'index', 'class'=>'form-horizontal' ,'onclick'=>'')); ?>
				<input type="text" name="search"></input>
				<input type="submit" name="btn-search" value="Search" class="btn btn-inverse"></input>
				<a href="<?= base_url('index.php/holiday/add_holiday/');?>" class="btn btn-inverse">	
					<i class="icon-plus icon-white"></i>Add Holiday
				</a>
			<?= form_close(); ?>
		</div>
	</div>
	
	<div class="container">
		<div class="span12">
			<?= $success;?>
			<table class="table table-bordered table-condensed">
				<tr>
					<td>Date</td>
					<td>Holiday Type</td>
					<td>Remarks</td>
					<td>Action</td>
				</tr>
				<? if (count($holiday) > 0 ): ?>
					<?php foreach($holiday as $users):?>
				<tr>
					<td>
						<? 
						$createDate = new DateTime($users->hday_date);
						echo $createDate->format("Y-m-d");
						?>
					</td>
					<td><?= $users->hday_type; ?></td>
					<td><?= $users->hday_remarks; ?></td>
					<td>
						<a href="<?= base_url('index.php/holiday/update_holiday/'.$users->hday_id);?>"><span class="icon-edit" id="icon-size"></span></a> |
						<a href="<?= base_url('index.php/holiday/delete_holiday/'.$users->hday_id);?>"><span class="icon-trash" id="icon-size"></span></a>
					</td>
				</tr>
				<?php endforeach; ?>
			<?else: ?>
				<tr>
					<td colspan="5">No Record Found!</td>
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
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Delete Holiday</h4>
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
			$("a[href*='holiday/delete_holiday/']").click(function(e) {
				e.preventDefault();
				$('#alert_modal').data('href', $(this).attr('href')).modal('show');
			});
			$('#alert_modal').on('show', function() {
				$(this).find('.btn-primary').attr('href', $(this).data('href'));
			});
		})
	</script>