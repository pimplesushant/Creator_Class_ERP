<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">
		
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
        $(document).ready(function() { $("#sub").select2(); $("#add_standard").select2(); });
    </script>
	</head>
	<body>
		<div class="navbar navbar-inverse">
		<div>
<h1 align="center">Online Class Mgmt</h1>
</div>
			<div class="navbar-inner">
				<ul class="nav">
					<li><a href="#">Dashboard</a>
				
					<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
Master
<b class="caret"></b>
</a>
<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">

<li><?php echo anchor('add_subject_ctrl',"Add Subject"); ?></li>
<li><?php echo anchor('add_class_ctrl',"Add Class"); ?></li>
<li><?php echo anchor('add_standard_ctrl',"Add Standard"); ?></li>
<li><?php echo anchor('add_staff_ctrl',"Add Staff Member"); ?></li>
<li><?php echo anchor('add_designation_ctrl',"Add Designation"); ?></li>
<li><?php echo anchor('add_batch_ctrl',"Add Batch"); ?></li>
<li><?php echo anchor('add_branch_ctrl',"Add Branch"); ?></li>


</ul>
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				Admission
				<b class="caret"></b></a>
		
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
					<li><?php echo anchor('add_student_ctrl',"Registration"); ?></li>
					<li><?php echo anchor('enroll_student_ctrl',"Admission"); ?></li>
					
					</ul>

					<li><a href="#">Reports </a></li>
					<li><?php echo anchor('logout_ctrl',"Logout"); ?></li>
					<li><a href="#"></a></li>
				</ul>
			</div>
		</div>
