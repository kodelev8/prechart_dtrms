	<div class="container">
		<div class="row">
			<div class="span12">
				<h3>Daily Time Record - Monitoring</h3>
				<hr></hr>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="span12">
			<h4>Employee Name : <?= $post_name;?></h4>
		</div>
	</div>
	
	<?$get_post_dtr =  array('post_name'=>$post_name,'post_month'=>$post_month, 'post_year'=>$post_year,);?>
	<?$this->session->set_userdata($get_post_dtr);?>
	<div class="container">
		<div class="span12">
			<h4> Employee Leave Available</h4>
			<?= $success; ?>
			<table class="table table-bordered table-condensed">
				<tr>
					<td> Month</td>
					<td> Year</td>
					<td> Cut Off Date</td>
					<td> Leave Awarded</td>
					<td> Last Year Leave</td>
					<td> Leave Taken</td>
					<td> Leave This Month</td>
					<td> Leave Available</td>
					<td> Remarks</td>
				</tr>
				<? if (count($post_GetEmpLeaveAvailable) > 0 ):?>
				<?php foreach($post_GetEmpLeaveAvailable as $post_Get_ELA):?>
				<tr>   
					<td><?= $post_Get_ELA['MONTH'];?></td>
					<td><?= $post_Get_ELA['YEAR'];?></td>
					<td><?= $post_Get_ELA['CUT OFF DATE'];?></td>
					<td><?= $post_Get_ELA['LEAVE AWARDED'];?></td>
					<td><?= $post_Get_ELA['LAST YEAR LEAVE'];?></td>
					<td><?= $post_Get_ELA['LEAVE TAKEN'];?></td>
					<td><?= $post_Get_ELA['THIS MONTH LEAVE'];?></td>
					<td><?= $post_Get_ELA['LEAVE AVAILABLE'];?></td>
					<td><?= $post_Get_ELA['REMARKS'];?></td>
				</tr>
				<?php endforeach;?>
				<?else:?>
				<tr>
					<td colspan="9"> No Record Found!</td>
				</tr>
				<?endif;?>
			</table>       
		</div>
	</div>

	<div class="container">
		<div class="span12">
		<h4> Employee Current Leave Available</h4>
			<table class="table table-bordered table-condensed">
				<tr>
					<td> Month</td>
					<td> Year</td>
					<td> Cut Off Date</td>
					<td> Leave Awarded</td>
					<td> Last Year Leave</td>
					<td> Leave Taken</td>
					<td> Leave This Month</td>
					<td> Leave Available</td>
					<td> Remarks</td>
				</tr>
				<? if (count($post_GetCurrentLeaveAvailable) > 0 ):?>
				<?php foreach($post_GetCurrentLeaveAvailable as $post_Get_CLA):?>
				<tr>   
					<td><?= $post_Get_CLA['MONTH'];?></td>
					<td><?= $post_Get_CLA['YEAR'];?></td>
					<td><?= $post_Get_CLA['CUT OFF DATE'];?></td>
					<td><?= $post_Get_CLA['LEAVE AWARDED'];?></td>
					<td><?= $post_Get_CLA['LAST YEAR LEAVE'];?></td>
					<td><?= $post_Get_CLA['LEAVE TAKEN'];?></td>
					<td><?= $post_Get_CLA['THIS MONTH LEAVE'];?></td>
					<td><?= $post_Get_CLA['LEAVE AVAILABLE'];?></td>
					<td><?= $post_Get_CLA['REMARKS'];?></td>
				</tr>
				<?php endforeach;?>
				<?else:?>
				<tr>
					<td colspan="9"> No Record Found!</td>
				</tr>
				<?endif;?>
			</table> 
		</div>
	</div>	
	
	<div class="container">
		<div class="span12">
			 <div class="form-actions">
				<div class="span2">
					<a href="<?= base_url('index.php/summary/index/');?>">
						<button type="submit" name="btn-add" value="add" class="btn btn-inverse">Back</button>
					</a>
					<a href="<?= base_url('index.php/summary/posted_dtr');?>">
						<button type="submit" name="btn-add" value="add" id="post_dtr" class="btn btn-inverse" <?=$btn_action == 1? 'disabled="disabled"': '';?>>Post</button>                      
					</a>
				</div>                         
	 		</div>
		</div>
	</div>
	
	<div class="modal hide fade" id="alert_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"> Post Employee Leave</h4>
				</div>
				<div class="modal-body">
					Are sure you want to post?
	      		</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">No </button>
					<a href="#" class="btn btn-primary">Yes</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal hide fade" id="alert_modal_2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"> Post Employee Leave</h4>
				</div>
				<div class="modal-body">
					<?=date('F',mktime(0,0,0,$post_month,1,2014)).' ' .$post_year;?> is not ended yet!
	      		</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close </button>
				</div>
			</div>
		</div>
	</div>
	
	<?$post_month == date('m')? $post_month = 1: $post_month = 0;?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#post_dtr').on('click', function() {
				var post_month = <?= $post_month;?>;
				if(post_month == 1){
					$('#alert_modal_2').modal('show');
					return false;
				}
				else {
					$("a[href*='summary/posted_dtr']").click(function(e) {
						e.preventDefault();
						$('#alert_modal').data('href', $(this).attr('href')).modal('show');
					});
					$('#alert_modal').on('show', function() {
						$(this).find('.btn-primary').attr('href', $(this).data('href'));
					});	
				}	
			});

		});
	</script>
	
