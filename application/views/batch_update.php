<div class="container">
	<legend>Update Batch</legend>
	<a class="btn" href="<?php echo base_url('index.php/batch_controller/view_batch'); ?>">Add Batch</a>
	<div class="container">&nbsp;</div>
	<?php echo $this->session->flashdata('msg'); ?>
        <fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;
		
		<form class="form-horizontal" action="<?php echo $action; ?>" method="POST" >
		
		<div class="control-group">
			<label class="control-label">Batch Name<span style="color:red;"> *</span></label>
			<div class="controls">
				<input type="text" required class="input-xlarge" id="batch_name" name="batch_name" value="<?php echo $row[0]->name; ?>"> 
				<input type="hidden" name="batch_id" id="batch_id" value="<?php echo $row[0]->batch_id; ?>">
			    <?php echo form_error('batch_name'); ?>
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
