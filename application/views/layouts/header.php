<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <title><?= lang('page_title');?></title>
	
	    <link rel="icon" href="<?= base_url('images/favicon.ico'); ?>" type="image/x-icon">
	       
		<link rel="icon" href="<?= base_url('images/favicon.ico'); ?>" type="image/x-icon">
	    <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap.min.css'); ?>">
	    <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap-responsive.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('css/jquery.datetimepicker.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('css/modified.css'); ?>">
		
		<script type="text/javascript" src="<?= base_url('js/jquery-1.11.1.min.js'); ?>"></script>
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
	            	<a class="brand" href="#">DTRMS</a>
	            	<div class="nav-collapse collapse">
	            		<ul class="nav">
	            			<li><a href="<?= base_url('index.php/summary');?>">View DTR Summary</a></li>
	                        <li><a href="<?= base_url('index.php/print_summary');?>">Print Summary</a></li>
	                        <li><a href="<?= base_url('index.php/employee/');?>">View Employee</a></li>
	                    	<li><a href="<?= base_url('index.php/holiday');?>">View Holiday</a></li>
	                    	<li><a href="<?= base_url('index.php/leave');?>">View Leave</a></li>
	                    	<li><a href="<?= base_url('index.php/timesheets');?>">View Daily Time Record</a></li>
	                    	<li><a href="<?= base_url('index.php/daily_task');?>">View Daily Task</a></li>
	            		</ul>
	            		 <ul class="nav pull-right">
	                        <li><a href="<?= base_url('index.php/admin/logout');?>">Log out</a></li>
	                    </ul>     
	            	</div>
				</div>
			</div>
		</div>
		<div class="container" id="container_separator"></div>