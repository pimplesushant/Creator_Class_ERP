<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		
	</head>
	
	<body>
		<?php 	$this->load->view('include/header_bootstrap'); ?>
		<div class="navigation">
			<?php echo $headline;?>
		</div>
		<div class="container">
		<?php $this->load->view($include); ?>
		</div>
	</body>
	
</html>
