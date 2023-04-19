	<div class="container">
		<div class="span12">
			<?= form_open('daily_task/index', array ('id' => 'frm_excel_view' , 'class'=>'form-horizontal' ,'onclick' =>'' )); ?>
				<select name="dt_emp_no"  id ="dt_emp_no">
					<?php foreach($get_dt_emp as $users):?>
						<option value="<?= $users->emp_no;?>"<?= $users->emp_no == $dt_emp_no ? 'selected="selected"' : '' ; ?> >
							<?= $users-> emp_last_name. ', '.$users->emp_first_name; ?>
						</option>
					<?php endforeach; ?>
				</select>
				<input type="text" id ="dt_date_from" name="dt_date_from"/>
				<input type="text" id ="dt_date_to" name="dt_date_to"/>
				<a href="<?= base_url('index.php/daily_task/add_daily_task/');?> " class="btn btn-inverse" >   
	               <i class="icon-plus icon-white"></i>Add Daily Task
				</a>
				<button class="btn btn-inverse" name="btn_excel" id="btn_excel">   
				<i class="icon-plus icon-white"></i>Excel
				</button>
			<?= form_close(); ?>
		</div>
	</div>
		
	<div class="container">
		<div class="span12">
			<?= $success;?>
			<table class="table table-bordered table-condensed">
				<tr>
					<td> Date</td>
					<td> In</td>
					<td> Out</td>
					<td> Remarks</td>
					<td> Total Log</td>
					<td> Action</td>
				</tr>
				<? if (count($get_dt) > 0 ):?>
				<?php foreach($get_dt as $dt):?>
				<tr>   
					<td><?= $dt->dt_date;?></td>
					<td><?= $dt->dt_in;?></td>
					<td><?= $dt->dt_out;?></td>
					<td><?= $dt->dt_remarks;?></td>
					<td><?= $dt->dt_total_log;?></td>
					<td>
						<a href="<?= base_url('index.php/daily_task/update_daily_task/'.$dt->dt_id);?> "><span class="icon-edit" id="icon-size"></span></a > |
						<a href="<?= base_url('index.php/daily_task/delete_daily_task/'.$dt->dt_id);?>"><span class="icon-trash" id="icon-size"></span></a >
					</td>
				</tr>
				<?php endforeach;?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>Total Hours</td>
					<td><?=$get_dt_totalhours->dt_total_log;?></td>
					<td></td>
				</tr>
				<?else:?>
				<tr>
					<td colspan="6"> No Record Found!</td >
				</tr>
				<?endif;?>
			</table>       
		</div>
	</div>
	
	<?= form_open('excel_daily_task/' , array ('id' => 'frm_excel', 'class' =>'form-horizontal')); ?>
		<input type="hidden" name="dt_emp_no" value="<?=$record['dt_emp_no'];?>"></input>
		<input type="hidden" name="dt_date_from" value="<?=$record['dt_date_from'];?>"></input>
		<input type="hidden" name="dt_date_to" value="<?=$record['dt_date_to'];?>"></input>
	<?= form_close();?>
	
	<div class="modal hide fade" id ="alert_modal" tabindex="-1" role ="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class ="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
					<h4 class="modal-title" id ="myModalLabel"> Delete Daily Task</h4 >
				</div>
				<div class="modal-body">
					Are sure you want to delete?
	      		</div>
				<div class="modal-footer">
					<button type="button" class ="btn btn-default" data-dismiss="modal" >No </button>
					<a href="#" class="btn btn-primary">Yes</a >
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" >
		$(document).ready(function() {
			$('#dt_date_from').datetimepicker({
				timepicker: false,
				format: 'Y-m-d'
			}).datetimepicker({
				value: '<?= $dt_date_from;?>'
			});
	
			$('#dt_date_to').datetimepicker({
				timepicker: false,
				format: 'Y-m-d'
			}).datetimepicker({
				value: '<?= $dt_date_to;?>'
			});
	
			$("a[href*='daily_task/delete_daily_task/']").click(function(e) {
				e.preventDefault();
				$('#alert_modal').data('href', $(this).attr('href')).modal('show');
			});
			$('#alert_modal').on('show', function() {
				$(this).find('.btn-primary').attr('href', $(this).data('href'));
			});
	
			$("#dt_date_to").change(function(e) {
				$('#frm_excel_view').submit();
				return true;
			});
	
			$("#btn_excel").click(function(e) {
				e.preventDefault()
				$('#frm_excel').submit();
				return true;
			});
		});
	</script>