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
		<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/select2.js') ?>"></script>	
		<script src="<?php echo base_url('assets/js/rupee_symbol.js') ?>"></script>	
		<script src="<?php echo base_url('assets/js/bootstrap-fileupload.min.js') ?>"></script>	


 <script>
        $(document).ready(function() { $("#sub").select2(); $("#course_type").select2(); });
    </script>
    <h1 align="center"> Creator's Class Pro </h1> 
	</head>
	<body>
		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<ul class="nav">
					<li><a href="#">Dashboard</a>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin Master</a>
					<ul class="dropdown-menu">
						<li><?php echo anchor('home/view_class_form', 'Add Class'); ?></li>
						<li><a href="addcourse.php">Add Standard</a></li>
						<li><a href="addsubject.php">Add Batch</a></li>
						<li><a href="addchapter.php">Add Subject</a></li>
						<li><a href="addquestion.php">Add Staff Member</a></li>
						<li><a href="addchapter.php">Add Designation</a></li>
						<li><?php echo anchor('branch_controller/view_branch', 'Add Branch Detail'); ?></li>
					</ul>
					</li>
					<li><a href="#">Report</a></li>
					<li><a href="#">Logout</a></li>
				</ul>
			</div>
		</div>
