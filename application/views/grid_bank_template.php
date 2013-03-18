<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
<?php foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<?php foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
 

</head>
<body>
<div class="container" style="margin-bottom:20px;">
	<legend>All Bank Accounts</legend>
		<a class="btn" href="<?php echo base_url('index.php/bank_controller/view_bank'); ?>">Add New Account</a>
		<a class="btn" href="<?php echo base_url('index.php/bank_controller/show_all_accounts'); ?>">Show All Accounts</a>
	</div>
    <div class="container">
	<?php echo $this->session->flashdata('message'); ?>
	<fieldset>
        <?php echo $output; ?>
	</fieldset>
    </div>
</body>
</html>