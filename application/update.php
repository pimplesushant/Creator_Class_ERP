<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Add Branch detail</title>

</head>
<body>
	<div class="content">
		<h1><?php echo $title; ?></h1>
		<?php echo $message; ?>
		<form method="post" action="<?php echo $action; ?>">
		<div class="data">
		<table>
			<tr>
				<td width="30%">E-mail</td>
				
				<td><input type="text" name="email_id" id="email_id" enabled="enabled" class="text" value="<?php echo $row[0]->email_id; ?>" />
				<input type="hidden" name="branch_id" id="branch_id" value="<?php echo $row[0]->branch_id; ?>" />
				<?php echo form_error('email_id'); ?></td>
			</tr>
			<tr>
				
				<td valign="top">Branch Name<span style="color:red;"></span></td>
				<td><input type="text" name="branch_name" id="branch_name" class="text" value="<?php echo $row[0]->name; ?>" />
				<?php echo form_error('branch_name'); ?></td>
			</tr>
			<tr>
				
				<td valign="top">Mobile No.<span style="color:red;"></span></td>
				<td><input type="text" name="mobile_no" id="mobile_no" class="text" value="<?php echo $row[0]->mobile_no; ?>" />
				<?php echo form_error('mobile_no'); ?></td>
			</tr>
			
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="Save"/></td>
				
			</tr>
		</table>
		</div>
		</form>
		<br />
		<?php echo $link_back; ?>
	</div>
</body>
</html>