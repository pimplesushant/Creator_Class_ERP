<div class="container">
   <legend>Add Subject</legend>
   
   <a class="btn" href="<?php echo base_url('index.php/subject_controller/view_subject'); ?>">Add Subject</a>
	<div class="container">&nbsp;</div>
	<?php echo $this->session->flashdata('msg'); ?>
	<fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;
	
    <form class="form-horizontal" action="<?php echo $action; ?>" method="POST"  >
    <div class="control-group">
        <label class="control-label"> Subject Name<span style="color:red;"> *</span></label>
		<div class="controls">
			<input type="text" required class="input-xlarge" id="sub_name" name="sub_name" value="<?php echo $row[0]->name; ?>"> 
         <input type="hidden" name="subject_id" id="subject_id" value="<?php echo $row[0]->subject_id; ?>">
      <?php echo form_error('sub_name'); ?>		 
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label"></label>
		<div class="controls">
			<button type="submit" class="btn btn-success" > Save </button>
			<button type="clear" class="btn" > Clear </button>
		</div>
	</div>
</div>
 </form>  
 </fieldset>
 