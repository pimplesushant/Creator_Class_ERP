<style>
span
{
color:red;
}
</style>
    <div class="container">
			<a class="btn" href="<?php echo base_url('index.php/bank_controller/view_bank'); ?>">Add New Account</a>
		    <a class="btn" href="<?php echo base_url('index.php/bank_controller/show_all_accounts'); ?>">Show All Accounts</a>
		<div class="container ">&nbsp;</div>
	</div>

	 <div class="container">
	<?php echo $this->session->flashdata('msg'); ?>
	<fieldset>
		<form class="form-horizontal" enctype="multipart/form-data"  method="POST" action="<?php echo $class=site_url('bank_controller/updateBank'); ?>"  >
			<?php echo form_hidden('bank_id', $row[0]->bank_id); ?> 
			<div class="control-group">
			<label class="control-label">Bank Name<span> *</span></label>
			<div class="controls">
				<input type="text" name="bank_name" id="bank_name" required value="<?php echo $row[0]->bank_name; ?>" placeholder="Enter Bank Name">
				<?php echo form_error('bank_name'); ?>
			</div>
			</div>

			<div class="control-group">
			<label class="control-label">Address<span> *</span></label>
			<div class="controls">
				<textarea rows="2" name="bank_address" id="bank_address" required placeholder="House, Landmark, City, Pincode"><?php echo $row[0]->bank_address; ?></textarea>
				<?php echo form_error('bank_address'); ?>
			</div>
			</div>
			
			<div class="control-group ">
			<label class="control-label">Account No.</label>
			<div class="controls">
				<input type="text"  class="input-large" id="account_number" name="account_number" value="<?php echo $row[0]->account_number; ?>" placeholder="Account Number">
				<?php echo form_error('account_number'); ?>
			</div>
			</div>
			
			<div class="control-group">
			<label class="control-label"><abbr title="The Indian Financial System Code">IFS Code</abbr><span> *</span></label>
			<div class="controls">
				<input class="input-large" id="ifsc" name="ifsc"  required type="text" value="<?php echo $row[0]->ifsc; ?>" placeholder="11 Digit IFS Code">
				<?php echo form_error('ifsc'); ?>
			</div>
			</div>
			
			<div class="control-group">
			<label class="control-label"><abbr title="Magnetic Ink Character Recognition Code">MICR Code</abbr><span> *</span></label>
			<div class="controls">
				<input class="input-large" id="micr" name="micr"  required type="text" value="<?php echo $row[0]->micr; ?>" placeholder="9 Digit MICR Code">
				<?php echo form_error('micr'); ?>
			</div>
			</div>
						
			<div class="control-group">
			<label class="control-label"></label>
			<div class="controls">
				<button class="btn btn-success" id="submit" type="submit">Submit</button>&nbsp;
				<button class="btn" id="reset" type="Reset">Clear</button>
			</div>
			</div> 
			
		</form>
 </fieldset>  
</div>

