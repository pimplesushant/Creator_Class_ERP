<div class="container">
   <legend>Add Subject</legend>
   
   <a class="btn" href="<?php echo base_url('index.php/assign_standard_subject_ctrl'); ?>">Assign Subject to Standard</a>
   <a class="btn" href="<?php echo base_url('index.php/assign_faculty_subject_ctrl'); ?>">Assign Subjects to Faculty</a>
<div class="container ">&nbsp;</div>
	<fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;
    <form class="form-horizontal"action="<?php echo $subject; ?>" method="POST"  >
    <div class="control-group">
        <label class="control-label"> Subject Name<span style="color:red;"> *</span></label>
		<div class="controls">
			<input type="text" required class="input-xlarge" id="sub_name" name="sub_name" placeholder="Subject Name">   
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

 </form>  
 </fieldset>
 <div class="content">
  
   <div class="paging"><?php echo $pagination; ?></div>
   <div class="data"><?php echo $table; ?></div>
   <br />
   
  </div>
</div>