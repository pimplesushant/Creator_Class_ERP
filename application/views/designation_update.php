<div class="container">
<legend>Add Designation</legend>

  <a class="btn" href="<?php echo base_url('index.php/designation_controller/view_designation'); ?>">Add Designation</a>
	<div class="container">&nbsp;</div>
	 <?php echo $this->session->flashdata('msg'); ?>

	 <fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">
	 
		 <form class="form-horizontal" id="adddesignation" action="<?php echo $action; ?>"  method="post">&nbsp;
  
  <div class="control-group">
	<label class="control-label">Designation Name<span style="color:red;"> *</span></label>
	  <div class="controls">
		 <input type="text" required class="input-xlarge" id="designation_name" name="designation_name" value="<?php echo $row[0]->designation_name; ?>"> 
		 <input type="hidden" name="designation_id" id="designation_id" value="<?php echo $row[0]->designation_id; ?>">
		<?php echo form_error('designation_name'); ?>
	</div>
	</div>


	<div class="control-group">
	   <label class="control-label">Description<span style="color:red;"> *</span></label>
	 <div class="controls">
		  <textarea class="input-xlarge" required id="description" name="description" value="" ><?php echo $row[0]->description; ?>
		  </textarea>
		  <?php echo form_error('description'); ?>
	 </div>
	 </div>

	<div class="control-group">
	 <label class="control-label"></label>
		<div class="controls">
	      <button type="submit" class="btn btn-success" > Save </button>
	      <button type="clear" class="btn" > Clear </button>
	</div>
	</div>
	</form>
</fieldset>
