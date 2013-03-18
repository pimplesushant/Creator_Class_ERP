<div class="container">
	<legend>Update Batch</legend>
        <fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;
		<?php echo $message; ?>
		<form class="form-horizontal" action="<?php echo $action; ?>" method="POST" >
		
		<div class="control-group">
			<label class="control-label">Batch Name</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="batch_name" name="batch_name" value="<?php echo $row[0]->name; ?>"> 
				<input type="hidden" name="batch_id" id="batch_id" value="<?php echo $row[0]->batch_id; ?>"
			    <?php echo form_error('batch_name'); ?>
			</div>
		 </div><br>
 
		<div class="control-group">
		<label class="control-label">Assign Standard</label>
			<div class="controls">
			<input type="text" class="input-xlarge" id="standard" name="standard"value="<?php echo $row[0]->standard_id; ?>"> 	
				 <?php echo form_error('standard'); ?>
			</div>
		</div>
		
		
		<div class="control-group">
			<label class="control-label"></label>
			<div class="controls">
				<button type="submit" class="btn btn-success" >Save</button>
				<button  type="clear"  class="btn" >Clear</button>
			</div>
		</div>
	</div>	
</form>
</fieldset>
<?php echo $link_back; ?>