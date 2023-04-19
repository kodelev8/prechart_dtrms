<!DOCTYPE html>
<html>
	<head>
	    <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta http-equiv="cache-control" content= "no-cache" />
		<meta http-equiv="expires" content= "-1" />
		<meta http-equiv="pragma" content="no-cache" />
		
	    <title><?= lang('page_title');?></title>
	
	    <link rel="icon" href="<?= base_url('images/favicon.ico'); ?>" type="image/x-icon">
	    <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap.min.css'); ?>">
	    <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap-responsive.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('css/jquery.datetimepicker.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('css/modified.css'); ?>">
	    
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
	            		<span class="icon-bar"></span>
	            		<span class="icon-bar"></span>
	            		<span class="icon-bar"></span>
	            	</button>
	            	<a class="brand" href="<?= base_url(); ?>">DTRMS</a>
	            	<div class="nav-collapse collapse">
	            		<ul class="nav">
	            			<li><a href="<?= base_url('index.php/dtr_summary');?>">Summary</a></li>
	            		</ul>
	            	</div>
				</div>
			</div>
		</div>
		
		<div class="container" id="container_separator"></div>
		
		<div class="container">
			<div class="span3">
				<div class="row-fluid">
					<h4 id="h4_employee"><?= lang('emp_info');?></h4>
					<table class="" id="table_employee">
						<tr >
							<td>Name</td>
							<td>:</td>
							<td><?= $get_emp_info != '' ? $get_emp_info->first_name. ' ' .$get_emp_info->last_name: '';?></td>
						</tr>
						<tr >
							<td>Position</td>
							<td>:</td>
							<td><?= $get_emp_info != '' ? $get_emp_info->Position: '';?></td>
						</tr>
						<tr >
							<td>Email</td>
							<td>:</td>
							<td> <?= $get_emp_info != '' ? $get_emp_info->email_address: '';?></td>
						</tr>
						<tr >
							<td>Time</td>
							<td>:</td>
							<td><?= $date;?></td>
						</tr>
						<tr >
							<td>Remarks</td>
							<td>:</td>
							<td><?= $post_option_name;?></td>
						</tr>
					</table>
				</div>
			</div>
				
			<div class="span3">
				<div class="row-fluid">
					<? $get_emp_info != '' ? $picture = substr($get_emp_info->Picture,1): $picture = '/Pictures/default.png';?>
					<img id="user_image" src="<?= base_url().'images'.$picture; ?>" class="img-thumbnail"/>
				</div>
			</div>

			<div class="span3">
				<div class="row-fluid">
					<div class="span">
						<?= form_open('index/', array('id' => 'index', 'class'=>'')); ?>
						<center>
							<input id="emp_id" disabled="disabled" type="text" name="emp_no" maxlength ="2" value="<?= $get_emp_info != '' ? $get_emp_info->emp_no: ''; ?>" required /> 
							<input id="btn_id" disabled="disabled" type="submit" name="btn_id" class="btn"  value="OK"/>
							<input type="hidden" class="txt_option" name="option" value="<?= $option; ?>"/>
						</center>
						
						<input type="hidden" class="txt_option_name" name="option_name" value="<?= $option_name; ?>"/>
						<?= form_close(); ?>
						<center id ="empinfo-txt"><?= $nrf == 'true' ? 'No Record Found': ''; ?></center>
						<p id="h4_title">&nbsp;</p> 	
					</div>
				</div>
				
				<div class="row-fluid">
					<div class="span">
						<img src="<?= base_url('images/clock.png'); ?>" class="place-left"/>
						<div>
							<div id="date"></div> 
							<div id="date-view"><?= date('d/m/Y');?></div> 
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="span">
				<div class="row-fluid">
					<div id="div_btn">
						<input class="btn btn_controls" type="submit" id="btn_login"  name="login" value="Log-in">
						<input class="btn btn_controls" type="submit" id="btn_lunchout" name="lunchout" value="Lunch Break-out">
						<input class="btn btn_controls" type="submit" id="btn_lunchin" name="lunchin" value="Lunch Break-in">
						<input class="btn btn_controls" type="submit" id="btn_logout" name="logout" value="Log-out">
					</div>
				</div>
			</div>
		</div>
			
	
		<div class="container">
			<div class="span">
				<p align="center"> 
					<strong style= "color: #000">&copy; 2011 Prechart Software Inc.</strong>
				</p>
			</div>
		</div>
		
		<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Duplicate <?= $option_name;?> </h4>
					</div>
					
					<div class="modal-body">
						You have already do "<?= $option_name;?>"!
					</div>
					
					<div class="modal-footer">
						<?= form_open('index/overwrite/', array('id' => 'index', 'class'=>'form-horizontal')); ?>
							<input type="hidden" name="dtr_emp_no" value="<?= $dtr_emp_no; ?>"/>
							<input type="hidden" name="dtr_id" value="<?= $dtr_id; ?>"/>
							<input type="hidden" name="option" value="<?= $option_name; ?>"/>
							<input type="submit" class="btn btn-default" data-dismiss="modal" value="Close">
							<input type="submit" class="btn btn-primary" name="btn-dtr_update" value="Save changes">
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
		
		<script type="text/javascript" src="<?= base_url('js/jquery-1.11.1.min.js'); ?>"></script>
	    <script type="text/javascript" src="<?= base_url('js/bootstrap.min.js'); ?>"></script>
	    <script type="text/javascript" src="<?= base_url('js/bootstrap.js'); ?>"></script>
	    <script type="text/javascript" src="<?= base_url('js/google-analytics.js'); ?>"></script>
	    <script type="text/javascript" src="<?= base_url('js/jquery.datetimepicker.js'); ?>"></script>
	
		<script type="text/javascript">
			$(document).ready(function() {
	
				$('.btn_controls').on('click', function() {
					var btn = $(this).attr('id');
	
					var option = '';
					var option_name = '';
					var btn_name = '';
	
					if (btn == 'btn_login') {
						option = '1';
						option_name = 'Log - IN';
						btn_name = 'Log-in';
					} else if (btn == 'btn_lunchout') {
						option = '3';
						option_name = 'Lunch Break - OUT';
						btn_name = 'Lunch Break-out';
					} else if (btn == 'btn_lunchin') {
						option = '4';
						option_name = 'Lunch Break - IN';
						btn_name = 'Lunch Break-in';
					} else if (btn == 'btn_logout') {
						option = '2';
						option_name = 'Log - OUT';
						btn_name = 'Log-out';
					}
	
					$('.txt_option').val(option);
					$('.txt_option_name').val(option_name);
					$('#h4_title').html(btn_name);
	
	
					$('.btn_controls').removeClass('btn_color');
	
					$(this).addClass('btn_color');
	
					$('#emp_id').removeAttr('disabled');
					$('#emp_id').val('');
					$('#btn_id').removeAttr('disabled');
	
					$('#emp_id').focus();
	
					return false;
				});
			});
	
			$(document).ready(function() {
				$("#emp_id").keydown(function(event) {
					if ($.inArray(event.keyCode, [46, 8, 9, 27, 13]) !== -1 || (event.keyCode == 65 && event.ctrlKey === true) || (event.keyCode >= 35 && event.keyCode <= 39)) {
						return;
					} else {
						if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
							event.preventDefault();
						}
					}
				});
			});
	
			function date() {
				var m = "AM";
				var gd = new Date();
				var secs = gd.getSeconds();
				var minutes = gd.getMinutes();
				var hours = gd.getHours();
				var day = gd.getDay();
				var month = gd.getMonth();
				var date = gd.getDate();
				var year = gd.getYear();
	
	
				if (secs < 10) {
					secs = "0" + secs;
				}
				if (minutes < 10) {
					minutes = "0" + minutes;
				}
				if (hours < 10) {
					hours = "0" + hours;
				}
	
				var montharray = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	
				var fulldate = hours + ":" + minutes + ":" + secs;
	
				$("#date").html(fulldate);
				setTimeout("date()", 1000);
			}
	
			date();

			<?= $warning_remarks; ?>
		</script>
		
	</body>
</html>