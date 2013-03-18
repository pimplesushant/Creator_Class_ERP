 <div class="container">

<legend>Update Branch Details</legend>

<fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;

		<?php echo $message; ?>
<form class="form-horizontal" action="<?php echo $action; ?>" method="POST"  >
<div class="control-group">
    <label class="control-label" for="Branch Name">Branch Name</label>
        <div class="controls">
        <input type="text" id="branch_name" name="branch_name" class="input-xlarge" value="<?php echo $row[0]->name; ?>" >
		<input type="hidden" name="branch_id" id="branch_id" value="<?php echo $row[0]->branch_id; ?>"
		<?php echo form_error('branch_name'); ?>
        </div>
</div><br>

<div class="control-group">
    <label class="control-label" for="Branch Address">Branch Address</label>
        <div class="controls">
		<textarea rows="2" class="input-xlarge" id="branch_address"  name="branch_address" value=""><?php echo $row[0]->address; ?></textarea>
	<?php echo form_error('branch_address'); ?>
	</div>
</div>

<div class="control-group">
				<label class="control-label">Telephone No.</label>
				<div class="controls">
					<input type="text" class="input-large" id="telephone_number" name="telephone_number" value="<?php echo $row[0]->telephone_no; ?>">
				<?php echo form_error('telephone_number'); ?>
				</div>
			</div>

<div class="control-group">
				<label class="control-label">Mobile No.</label>
					<div class="controls">
					
					<input class="input-large" id="mobile_no" name="mobile_no" type="text" value="<?php echo $row[0]->mobile_no; ?>">
				<?php echo form_error('mobile_no'); ?>
				</div>
			</div>

       <div class="control-group">
				<label class="control-label">E-mail</label>
				<div class="controls">
					
					<input class="input-large" type="email" id="email_id" name="email_id" enabled="enabled" value="<?php echo $row[0]->email_id; ?>">
				<?php echo form_error('email_id'); ?>
				</div>
	    </div>
		
<div class="control-group">	
		<label class="control-label"></label>
	<div class="controls">
	<button type="submit" class="btn btn-success">Save</button>
    <button type="cancle" class="btn">Cancel</button>
	</div>
 
</div>    
</div>  
    </form>
	</fieldset>
	<?php echo $link_back; ?>
	