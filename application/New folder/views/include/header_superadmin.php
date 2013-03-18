<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">
		<meta charset="utf-8" />
		<title>Creator's Class ERP</title>
		
		<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/select2.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/bootstrap-fileupload.min.css') ?>" rel="stylesheet">
		<!-- for rupee icon -->
		<link href="<?php echo base_url('assets/css/rupee_symbol.css') ?>" rel="stylesheet">
		
		 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script> 
		<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/select2.js') ?>"></script>	
		<script src="<?php echo base_url('assets/js/rupee_symbol.js') ?>"></script>	
		<script src="<?php echo base_url('assets/js/bootstrap-fileupload.min.js') ?>"></script>	
		<script>$(document).ready(function() { $("#sub").select2(); $("#course_type").select2(); });</script>
			
	</head>
	<body>
		<div align="center" class=" page-header"><img src="<?php echo base_url('assets/css/images/logo5.gif') ?>"/></div>
		<div class="container navbar navbar-inverse">
			<div class="navbar-inner">
				<ul class="nav">
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					Master
					<b class="caret"></b>
					</a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">

					 <li><?php echo anchor('branch_controller/view_branch', 'Add Branch Detail'); ?></li>
					</ul>
					
					<li><a href="">Home </a></li>
					<li><a href="">Reports </a></li>
					<li><a href="logout_ctrl">Logout</a></li>
				</ul>
			</div>
		</div>
		
