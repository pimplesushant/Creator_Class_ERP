<div class="container">
  <legend>Add  Update Standard</legend>
	<form class="form-horizontal" action=<?php echo $action?> method="POST" >
       <fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;" >&nbsp;
		   <?php echo $message; ?>
		    <div class="control-group">
			  <label class="control-label">Standard Name</label>
				<div class="controls">
				  <input type="text" class="input-xlarge" id="name" name="name" value="<?php echo $this->form_validation->name; ?>" placeholder="Standard like 5th, 6th"><br><br>
				<input type="hidden" name="id"  value="<?php echo $this->form_validation->id; ?>"/>
			<?php echo form_error('name'); ?>
				</div>
			</div>
				  
				  
			
				  
			<div class="control-group">
			    <div class="controls">
				  <button type="submit" class="btn btn-success" >Save</button>
				  <button type="submit" class="btn" > Clear </button>
				</div>
		   </div>
		   
       </fieldset>
	   
	</form>
 
	<!--<?php include 'datagridfooter.php'; ?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
       