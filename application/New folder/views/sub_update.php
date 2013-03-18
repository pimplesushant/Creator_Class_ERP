<div class="container">
   <legend>Add Subject</legend>
	<fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;
	<?php echo $message; ?>
    <form class="form-horizontal" action="<?php echo $action; ?>" method="POST"  >
    <div class="control-group">
        <label class="control-label"> Subject Name :</label>
		<div class="controls">
			<input type="text" class="input-xlarge" id="sub_name" name="sub_name" placeholder="Subject Name"> 
         <input type="hidden" name="subject_id" id="subject_id" value="<?php echo $row[0]->subject_id; ?>"
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
 <?php echo $link_back; ?>
 