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
    <div class="container">
        <?php echo $output; ?>
    </div>
</body>
</html>