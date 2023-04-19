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