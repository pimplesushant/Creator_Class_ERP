<head>

		
<!-- for grid -->
		<link href="<?php echo base_url('assets/grocery_crud/css/ui/simple/jquery-ui-1.9.0.custom.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/grocery_crud/css/ui/simple/chosen.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/grocery_crud/css/ui/simple/uniform.default.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/grocery_crud/css/ui/simple/fileuploader.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/grocery_crud/css/ui/simple/file-uploader.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/grocery_crud/css/ui/simple/jquery.fancybox.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/grocery_crud/css/ui/simple/jquery.fileupload-ui.css') ?>" rel="stylesheet"> 
		<link href="<?php echo base_url('assets/grocery_crud/css/ui/simple/jquery.ui.datetime.css') ?>" rel="stylesheet"> 
		<link href="<?php echo base_url('assets/grocery_crud/css/ui/simple/jquery-ui-timepicker-addon.css') ?>" rel="stylesheet"> 
		<link href="<?php echo base_url('assets/grocery_crud/css/ui/simple/ui.multiselect.css') ?>" rel="stylesheet"> 

		
		<script src="<?php echo base_url('assets/grocery_crud/js/jquery-1.8.2.min.js') ?>"></script>


<?php foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<?php foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>


 
	