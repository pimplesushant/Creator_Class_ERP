<div class="container">
   <legend>Add Subject</legend>
	<fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;
    <form class="form-horizontal" action="<?php echo $action;?>" method="post">
    <div class="control-group">
        <label class="control-label"> Subject Name :</label>
		<div class="controls">
			<input type="text" class="input-xlarge" id="name"  value="<?php echo $this->form_validation->name; ?>" placeholder="Full Name"> 
			<input type="hidden" name="id" value="<?php echo $this->form_validation->id; ?>"/>
			<?php echo form_error('name'); ?>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label"></label>
		<div class="controls">
			<button type="submit" class="btn btn-success" > Save </button>
			<button type="submit" class="btn" > Clear </button>
		</div>
	</div>
    </form>  
   </fieldset>

	<?php include 'datagridfooter.php'; ?>