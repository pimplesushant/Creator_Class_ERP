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
	<legend>All Classes</legend>
		<a class="btn" href="<?php echo base_url('index.php/class_controller'); ?>">Add New Class</a>
		<a class="btn" href="<?php echo base_url('index.php/class_controller/show_all_classes'); ?>">Show All Classes</a>
	</div>
    <div class="container">
	<?php echo $this->session->flashdata('message'); ?>
	<fieldset>
        <?php echo $output; ?>
	</fieldset>
    </div>
</body>
</html>