 	<style>
	     form {
	     	float: left;
	     }
    </style>
	<div class="container">
		<div class="row">
			<div class="span12">
				<h3>Daily Time Record - Monitoring</h3>
				<hr></hr>
			</div>
		</div>
	</div>

	<div class="container">	
		<div class="row">
			<div class="span12">
				<?= form_open('summary/', array('id' => 'frm_dtr', 'class'=>'form-horizontal')); ?>
					<div class="span">
						<select name="emp_no"  id="emp_no">
							<?php foreach($get_all_users as $users):?>
								<option value="<?= $users->emp_no.$users->first_name.' '.$users->last_name; ?>" <?= $sel_name == $users->first_name.' '.$users->last_name ? 'selected="selected"' : '' ?>>
									<?= $users->last_name. ', '.$users->first_name; ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="span">
						<select name="month" class="DropDown" id="month">
							<?if($mos == false):?>
								<option value="1" <?= $mos == '1' ? 'selected="selected"': ''; ?>>January</option>
								<option value="2" <?= $mos == '2' ? 'selected="selected"': ''; ?>>February</option>
								<option value="3" <?= $mos == '3' ? 'selected="selected"': ''; ?>>March</option>
								<option value="4" <?= $mos == '4' ? 'selected="selected"': ''; ?>>April</option>
								<option value="5" <?= $mos == '5' ? 'selected="selected"': ''; ?>>May</option>
								<option value="6" <?= $mos == '6' ? 'selected="selected"': ''; ?>>June</option>
								<option value="7" <?= $mos == '7' ? 'selected="selected"': ''; ?>>July</option>
								<option value="8" <?= $mos == '8' ? 'selected="selected"': ''; ?>>August</option>
								<option value="9" <?= $mos == '9' ? 'selected="selected"': ''; ?>>September</option>
								<option value="10" <?= $mos == '10' ? 'selected="selected"': ''; ?>>October</option>
								<option value="11" <?= $mos == '11' ? 'selected="selected"': ''; ?>>November</option>
								<option value="12" <?= $mos == '12' ? 'selected="selected"': ''; ?>>December</option>
							<?else:?>   
								<option value="1" <?= $month == '1' ? 'selected="selected"': ''; ?>>January</option>
								<option value="2" <?= $month == '2' ? 'selected="selected"': ''; ?>>February</option>
								<option value="3" <?= $month == '3' ? 'selected="selected"': ''; ?>>March</option>
								<option value="4" <?= $month == '4' ? 'selected="selected"': ''; ?>>April</option>
								<option value="5" <?= $month == '5' ? 'selected="selected"': ''; ?>>May</option>
								<option value="6" <?= $month == '6' ? 'selected="selected"': ''; ?>>June</option>
								<option value="7" <?= $month == '7' ? 'selected="selected"': ''; ?>>July</option>
								<option value="8" <?= $month == '8' ? 'selected="selected"': ''; ?>>August</option>
								<option value="9" <?= $month == '9' ? 'selected="selected"': ''; ?>>September</option>
								<option value="10" <?= $month == '10' ? 'selected="selected"': ''; ?>>October</option>
								<option value="11" <?= $month == '11' ? 'selected="selected"': ''; ?>>November</option>
								<option value="12" <?= $month == '12' ? 'selected="selected"': ''; ?>>December</option>
							<?endif;?>
						</select>
					</div>
					<div class="span">
						<select name="year" class="DropDown" id="year">
							<?if($year == false):?>
								<option  value="2008" <?= $yr == '2008' ? 'selected="selected"': ''; ?>>2008</option>
								<option  value="2009" <?= $yr == '2009' ? 'selected="selected"': ''; ?>>2009</option>
								<option  value="2010" <?= $yr == '2010' ? 'selected="selected"': ''; ?>>2010</option>
								<option  value="2011" <?= $yr == '2011' ? 'selected="selected"': ''; ?>>2011</option>
								<option  value="2012" <?= $yr == '2012' ? 'selected="selected"': ''; ?>>2012</option>
								<option  value="2013" <?= $yr == '2013' ? 'selected="selected"': ''; ?>>2013</option>
								<option  value="2014" <?= $yr == '2014' ? 'selected="selected"': ''; ?>>2014</option>
								<option  value="2015" <?= $yr == '2015' ? 'selected="selected"': ''; ?>>2015</option>
								<option  value="2016" <?= $yr == '2016' ? 'selected="selected"': ''; ?>>2016</option>
								<option  value="2017" <?= $yr == '2017' ? 'selected="selected"': ''; ?>>2017</option>
								<option  value="2018" <?= $yr == '2018' ? 'selected="selected"': ''; ?>>2018</option>
								<option  value="2019" <?= $yr == '2019' ? 'selected="selected"': ''; ?>>2019</option>
								<option  value="2020" <?= $yr == '2020' ? 'selected="selected"': ''; ?>>2020</option>
							<?else:?>
								<option  value="2008" <?= $year == '2008' ? 'selected="selected"': ''; ?>>2008</option>
								<option  value="2009" <?= $year == '2009' ? 'selected="selected"': ''; ?>>2009</option>
								<option  value="2010" <?= $year == '2010' ? 'selected="selected"': ''; ?>>2010</option>
								<option  value="2011" <?= $year == '2011' ? 'selected="selected"': ''; ?>>2011</option>
								<option  value="2012" <?= $year == '2012' ? 'selected="selected"': ''; ?>>2012</option>
								<option  value="2013" <?= $year == '2013' ? 'selected="selected"': ''; ?>>2013</option>
								<option  value="2014" <?= $year == '2014' ? 'selected="selected"': ''; ?>>2014</option>
								<option  value="2015" <?= $year == '2015' ? 'selected="selected"': ''; ?>>2015</option>
								<option  value="2016" <?= $year == '2016' ? 'selected="selected"': ''; ?>>2016</option>
								<option  value="2017" <?= $year == '2017' ? 'selected="selected"': ''; ?>>2017</option>
								<option  value="2018" <?= $year == '2018' ? 'selected="selected"': ''; ?>>2018</option>
								<option  value="2019" <?= $year == '2019' ? 'selected="selected"': ''; ?>>2019</option>
								<option  value="2020" <?= $year == '2020' ? 'selected="selected"': ''; ?>>2020</option>
							<?endif;?>
						</select>
					</div>
				<?= form_close();?>
				
				<?= form_open('doc/', array('id' => 'index', 'class'=>'form-horizontal')); ?>
					<div class="span">
						<button type="submit" name="btn_pdf" id="pdf" class="btn btn-inverse">
							<i class="icon-print icon-white"></i> PDF
						</button>
						<input type="hidden" name ="name" value="<?= $sel_name;?>"></input>
						<input type="hidden" name ="month" value="<?= $month;?>"></input>
						<input type="hidden" name ="year" value="<?= $year;?>"></input>
					</div>
				<?= form_close();?>
				<?= form_open('summary/post_dtr', array('id' => 'index', 'class'=>'form-horizontal')); ?>
					<div class="span">
						<button type="submit" name="btn-post" value="add" class="btn btn-inverse">Post</button>
						<input type="hidden" name="post_name" value="<?= $sel_name;?>"></input>
						<input type="hidden" name="post_month" value="<?= $month;?>"></input>
						<input type="hidden" name="post_year" value="<?= $year;?>"></input>
					</div>
				<?= form_close();?>
			</div>
		</div>
	</div>
	
	<div class="container">	
		<div class="row">
			<div class="span12">
				<table class="table table-bordered table-condensed">
					<tr>
						<td>Date</td>
						<td>Log In</td>
						<td>Log Out</td>
						<td>Total Log</td>
						<td>Lunch-Out</td>
						<td>Lunch-In</td>
						<td>Total Lunch</td>
						<td>Total Worked</td>
						<td>Remarks</td>
					</tr>
					
					<?php foreach($dtr_emp_rec as $rec):?>
					<tr>
						<td id="data"><?= $rec['DATE'];?></td>
						<td id="data"><?= $rec['LOG IN'];?></td>
						<td id="data"><?= $rec['LOG OUT'];?></td>
						<td id="data"><?= $rec['TOTAL HRS LOG'];?></td>
						<td id="data"><?= $rec['LUNCH BREAK - OUT'];?></td>
						<td id="data"><?= $rec['LUNCH BREAK - IN'];?></td>
						<td id="data"><?= $rec['TOTAL HRS BREAK'];?></td>
						<td id="data"><?= $rec['TOTAL HRS WORKED'];?></td>
						<td id="data"><?= $rec['REMARKS']; ?></td>
					</tr>
					<?php endforeach; ?>
					<?php foreach($dtr_emp_header as $header):?>
					<?php endforeach; ?>
					<?php foreach($dtr_emp_getleave as $getleave):?>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
	
	<div class="container">	
		<div class="row">
			<div class="span5">
				<h4>Computation Hrs Worked</h4>
				<table class="table table-bordered table-condensed">
					<tr>
						<td>Total Hrs Log</td>
						<td class="right"><?=$header['Total Hrs Log'];?></td>
					</tr>
					<tr>
						<td>less</td>
						<td></td>
					</tr>
					<tr>
						<td>-   Total Hrs Lunch</td>
						<td class="right"><?=$header['Total Hrs Lunch'];?></td>
					</tr>
					<tr>
						<td>Total Hrs Worked</td>
						<td class="right"><?=$header['Total Hrs Worked'];?></td>
					</tr>
				</table>
			</div>
			<div class="span7">
				<h4>Computation of Target Days &amp; Hrs</h4>
				<table class="table table-bordered table-condensed">
					<tr>
						<td>Total No of Days</td>
						<td class="right"><?=$header['Total No of Days'];?></td>
					</tr>
					<tr>
						<td>less</td>
						<td></td>
					</tr>
					<tr>
						<td>-  Total No of Day Off</td>
						<td class="right"><?=$header['Total No of Day Off'];?></td>
					</tr>
					<tr>
						<td>-  Total No of Holidays</td>
						<td class="right"><?=$header['Total No of Holidays'];?></td>
					</tr>
					<tr>
						<td>Total No of Target Days</td>
						<td class="right"><?=$header['Total No of Target Days'];?></td>
					</tr>
					<tr>
						<td>multiply by</td>
						<td></td>
					</tr><tr>
						<td>*  Total No of Working Hrs/Day</td>
						<td class="right"><?=$header['Working Hrs Per Day'];?></td>
					</tr>
					<tr>
						<td>Total No of Target Hrs</td>
						<td class="right"><?=$header['Total No of Target Hrs'];?></td>
					</tr>
				</table>
			</div>
			<div class="span5">
				<h4>Computation of Over/Under Time in Hrs &amp; Days</h4>
				<table class="table table-bordered table-condensed">
					<tr>
						<td>Total Hrs Worked</td>
						<td class="right"><?= $header['Total Hrs Worked'];?></td>
					</tr>
					<tr>
						<td id="data" style="font-style:italic;width:250px;">less</td>
						<td></td>
					</tr>
					<tr>
						<td>- Total No of Target Hrs</td>
						<td class="right"><?=$header['Total No of Target Hrs'];?></td>
					</tr>
					<tr>
						<td>Over/Under Time in Hrs</td>
						<td class="right"><?=$header['Total Leave This Month in Hrs']; ?></td>
					</tr><tr>
						<td id="data" style="font-style:italic;width:250px;">divide by</td>
						<td></td>
					</tr>
					<tr>
						<td> &divide;  Total No of Working Hrs/Day</td>
						<td class="right"><?=$header['Working Hrs Per Day']; ?></td>
					</tr>
					<tr>
						<td>Over/Under Time in Days</td>
						<td class="right"><?=$header['Total Leave This Month in Days'];?></td>
					</tr>
				</table>
			</div>
			<div class="span7">
				<h4>Computation Available Leave</h4>
				<p></p>
				<table class="table table-bordered table-condensed">
					<tr>
						<td>Total Leave Awarded</td>
						<td class="right"><?=$header['Total Leave Awarded'];?></td>
					</tr>
					<tr>
						<td>add</td>
						<td></td>
					</tr>
					<tr>
						<td>+  Last Year Leave Available</td>
						<td class="right"><?=$getleave['LAST YEAR LEAVE'];?></td>
					</tr>
					<tr>
						<td>less</td>
						<td></td>
					</tr>
					<tr>
						<td>-  Total Leave Taken</td>
						<td class="right"><?=$header['Total Leave Taken'];?></td>
					</tr>
					<tr>
						<td>-  Over/Under Time in Days</td>
						<td class="right"><?=$header['Total Leave This Month in Days']; ?></td>
					</tr>
					<tr>
						<td>Total Leave Available</td>
						<td class="right"><?=$header['Total Leave Available'];?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	
	<div class="modal hide fade" id="alert_modal" tabindex="-1" role ="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class ="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id ="myModalLabel"> Post Employee Leave</h4>
				</div>
				<div class="modal-body">
					 <?=date('F',mktime(0,0,0,$month -1,1,2014)).' ' .$year;?> did'nt post yet!
	      		</div>
				<div class="modal-footer">
					<button type="button" class ="btn btn-default" data-dismiss="modal">Close </button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal hide fade" id="alert_modal_2" tabindex="-1" role ="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class ="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id ="myModalLabel"> Post Employee Leave</h4>
				</div>
				<div class="modal-body">
					 <?=date('F',mktime(0,0,0,$month,1,2014)).' ' .$year;?> already posted!
	      		</div>
				<div class="modal-footer">
					<button type="button" class ="btn btn-default" data-dismiss="modal">Close </button>
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="<?= base_url('js/jquery-1.11.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('js/bootstrap.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('js/google-analytics.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('js/jquery.datetimepicker.js'); ?>"></script>
    
	<?$post = count($check_post);?>
	<?$last_post = count($check_last_post);?>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#emp_no").change(function(e) {
				$('#frm_dtr').submit();
				return true;
			});
	
			$("#month").change(function(e) {
				$('#frm_dtr').submit();
				return true;
			});
	
			$("#year").change(function(e) {
				$('#frm_dtr').submit();
				return true;
			});

			$('.btn-inverse').on('click', function() {
				var check_post = <?= $post;?>;
				var last_post  = <?= $last_post;?>;
				if(check_post == 0){
					$('#alert_modal').modal('show');
					return false;
				}
				else if(last_post > 0){
					$('#alert_modal_2').modal('show');
					return false;	
				}	
			});

		});
	</script>