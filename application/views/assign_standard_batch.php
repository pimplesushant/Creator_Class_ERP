<div class="container">
  <legend>Assign Batches To Standard</legend>
	<form class="form-horizontal"  name="assign" id="enroll_student" method="POST"  action="<?php echo $action; ?>" >
       <fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;
		   
		    <div class="control-group">
			   <label class="control-label">Select </label>
			   <div class="controls">
				<!--<select id="$standard_num" name="$standard_num" class="input-large">
				<?php foreach($standard_name as $stname) { ?>
				 <?php echo $stname->standard_id; ?>
				<option id="std" value="<?php echo $stname->standard_id; ?>"><?php echo $stname->name; ?></option>  
				 <?php }  ?>4
				</select>-->
				
				<?php echo form_dropdown('std', $standard_name,'std');  ?>
		   </div>
		  </div>
		  
		  
		  <div class="control-group">
			   <label class="control-label">Select batch</label>
			   <div class="controls">
				<!--<select id="$standard_num" name="$standard_num" class="input-large">
				<?php foreach($batch_name as $batname) { ?>
				 <?php echo $batname->batch_id; ?>
				<option id="bat" value="<?php echo $batname->batch_id; ?>"><?php echo $batname->name; ?></option>  
				 <?php }  ?>
				</select>-->
				
				<?php echo form_multiselect('bat[]', $batch_name,'bat');  ?>
		   </div>
		  </div>
				  
				  
			
				  
			<div class="control-group">
			    <div class="controls">
				  <button type="batmit" class="btn btn-success" >Assign</button>
				  <button type="batmit" class="btn" > Clear </button>
				</div>
		   </div>
		   
       </fieldset>
	</form>
 </div>