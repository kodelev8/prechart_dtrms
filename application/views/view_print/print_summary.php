	<style>
		.btn {
			margin-top: -10px;
		}
	</style>
	<div class="container">
		<div class="span12">
			<div class="span4">
				<h3>Print DTR Summaries</h3>
				<hr id=""></hr>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="span12">
			<?= form_open('print_summary/', array('id' => 'frm_dtr', 'class'=>'')); ?>
				<select name="month" class="DropDown" id="month">   
					<option value="1" <?= $mos == '01' ? 'selected="selected"': ''; ?>>January</option>
					<option value="2" <?= $mos == '02' ? 'selected="selected"': ''; ?>>February</option>
					<option value="3" <?= $mos == '03' ? 'selected="selected"': ''; ?>>March</option>
					<option value="4" <?= $mos == '04' ? 'selected="selected"': ''; ?>>April</option>
					<option value="5" <?= $mos == '05' ? 'selected="selected"': ''; ?>>May</option>
					<option value="6" <?= $mos == '06' ? 'selected="selected"': ''; ?>>June</option>
					<option value="7" <?= $mos == '07' ? 'selected="selected"': ''; ?>>July</option>
					<option value="8" <?= $mos == '08' ? 'selected="selected"': ''; ?>>August</option>
					<option value="9" <?= $mos == '09' ? 'selected="selected"': ''; ?>>September</option>
					<option value="10" <?= $mos == '10' ? 'selected="selected"': ''; ?>>October</option>
					<option value="11" <?= $mos == '11' ? 'selected="selected"': ''; ?>>November</option>
					<option value="12" <?= $mos == '12' ? 'selected="selected"': ''; ?>>December</option>
				</select>
				<select name="year" class="DropDown" id="year" >
					<option value="2008" <?= $yr == '2008' ? 'selected="selected"': ''; ?>>2008</option>
					<option value="2009" <?= $yr == '2009' ? 'selected="selected"': ''; ?>>2009</option>
					<option value="2010" <?= $yr == '2010' ? 'selected="selected"': ''; ?>>2010</option>
					<option value="2011" <?= $yr == '2011' ? 'selected="selected"': ''; ?>>2011</option>
					<option value="2012" <?= $yr == '2012' ? 'selected="selected"': ''; ?>>2012</option>
					<option value="2013" <?= $yr == '2013' ? 'selected="selected"': ''; ?>>2013</option>
					<option value="2014" <?= $yr == '2014' ? 'selected="selected"': ''; ?>>2014</option>
					<option value="2015" <?= $yr == '2015' ? 'selected="selected"': ''; ?>>2015</option>
					<option value="2016" <?= $yr == '2016' ? 'selected="selected"': ''; ?>>2016</option>
					<option value="2017" <?= $yr == '2017' ? 'selected="selected"': ''; ?>>2017</option>
					<option value="2018" <?= $yr == '2018' ? 'selected="selected"': ''; ?>>2018</option>
					<option value="2019" <?= $yr == '2019' ? 'selected="selected"': ''; ?>>2019</option>
					<option value="2020" <?= $yr == '2020' ? 'selected="selected"': ''; ?>>2020</option>
				</select>
				<input type="submit" class="btn btn-inverse" name="btn_submit" id="btnsubmit" value="Print "></input>
		</div>
	</div>	
	
	<div class="container">
		<div class="span12">
			<table id="tblPayslips" class="table table-bordered table-condense" style="width: auto !important">
				<tr>
					<td><input id="checkall" class="checkall" type="checkbox" value="<??>" name="checkall"/></td>
					<td>Emp #</td>
					<td>Last Name</td>
					<td>First Name</td>
					<td>Middle Name</td>
					<td>Position</td>
					<td>Email Address</td>
				</tr>
				<?php foreach($get_all_users as $users):?>
				<tr >
					<td>
						<input type="checkbox" class="all" id="checkbox" value="<?= $users->emp_no. $users->first_name.' '.$users->last_name; ?>" name ="users[]" />
					</td>
					<td>
						<?= $users->emp_no;?>
					</td>
					<td>
						<?= $users->last_name; ?>
					</td>
					<td>
						<?= $users->first_name; ?>
					</td>
					<td>
						<?= $users->midname; ?>
					</td>
					<td>
						<?= $users->position; ?>
					</td>
					<td>
						<?= $users->email; ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
			<?= form_close(); ?>
		</div>
	</div>
	
	<div class="modal fade" id= "alert_modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Print Summary</h4>
		    	</div>
			    <div class="modal-body">
					<p>Please select atleast 1 checkbox!</p>
			    </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
		jQuery(document).ready(function() {
	
			$(document).on('click', '.checkall', function() {
	
				var atLeastOneIsChecked = $('.checkall:checked').length > 0;
				
				if (atLeastOneIsChecked) {
					$('input:checkbox').prop('checked', true);
				} else {
					$('input:checkbox').prop('checked', false);
				}
			});
	
			$(".all").change(function() {
				var a = $(".all");
				if (a.length == a.filter(":checked").length) {
					$('.checkall').attr('checked', true);
				} else {
					$('.checkall').attr('checked', false);
				}
			});
	
			$('#btnsubmit').click(function() {
	
				if ($('.all:checked').length == 0) {
					$('#alert_modal').modal('show');
					return false;
				}
			});
			
			var lastChecked = null;
			$(document).ready(function() {
				var $chkboxes = $('.all');
	
				$chkboxes.click(function(e) {
					if (!lastChecked) {
						lastChecked = this;
						return;
					}
	
					if (e.shiftKey) {
						var start = $chkboxes.index(this);
						var end = $chkboxes.index(lastChecked);
	
						$chkboxes.slice(Math.min(start, end), Math.max(start, end) + 1).attr('checked', lastChecked.checked);
					}
					lastChecked = this;
				});
			});
		});
	</script>