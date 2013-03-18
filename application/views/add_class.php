<style>
span
{
color:red;
}
</style>
	<div class="container" style="margin-bottom:20px;">
	<legend>Add Class</legend>
	<a class="btn" href="<?php echo base_url('index.php/class_controller/show_all_classes'); ?>">Show All Classes</a>
	</div>
	<div class="container"> 
	<?php echo $this->session->flashdata('message'); ?>
	<fieldset>
		<form class="form-horizontal" enctype="multipart/form-data"  method="POST" action="<?php echo $class=site_url('class_controller/class_add'); ?>"  >
			 
			<div class="control-group">
			<label class="control-label">Class Name<span> *</span></label>
			<div class="controls success">
				<input type="text" name="class_name" id="class_name" required placeholder="Enter your Class Name">
				<?php echo form_error('class_name'); ?>
			</div>
			</div>

			<div class="control-group">
			<label class="control-label">Address<span> *</span></label>
			<div class="controls">
				<textarea rows="2" name="address" id="address" required placeholder="House, Landmark, City, Pincode"></textarea>
				<?php echo form_error('address'); ?>
			</div>
			</div>
			
			<div class="control-group">
			<label class="control-label">Telephone No.</label>
			<div class="controls">
				<input type="text"  class="input-large" id="telephone_no" name="telephone_no" placeholder="Phone Number">
				<?php echo form_error('telephone_no'); ?>
			</div>
			</div>
			
			<div class="control-group">
			<label class="control-label">Mobile Number<span> *</span></label>
			<div class="controls">
				<input class="input-large" id="mobile_no" name="mobile_no"  required type="text" placeholder="xxxxxxxxxx">
				<?php echo form_error('mobile_no'); ?>
			</div>
			</div>
			
			<div class="control-group">
			<label class="control-label">Image</label>
			<div class="controls">
				<input name="image" type="file" id="image"/>
				<?php echo form_error('image'); ?>
			</div>
			</div>
					
			<div class="control-group">
			<label class="control-label">E-mail<span> *</span></label>
			<div class="controls">
				<input type="email" name="email_id" id="email_id" required placeholder="Email Address">
				<?php echo form_error('email_id'); ?>
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

