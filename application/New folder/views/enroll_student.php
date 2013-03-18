<div class="container">
<legend>Admit Student</legend>
	<fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">
		<form class="form-horizontal" name="enroll_student" id="enroll_student" method="POST"  action="<?php echo $action; ?>" >&nbsp;

		<div class="control-group">
			<label class="control-label">Reg.No.</label>
			<div class="controls  horizontal">
				<?php echo form_dropdown('regno', $regno, 'Please select','id="regno"');  ?>&nbsp;
				App.No.
				<?php echo form_dropdown('appno', $appno, 'Please select','id="appno"');  ?>     
		  
		   </div>
		</div>
		
		<!--<div class="control-group">
		   <label class="control-label">App.No.</label>
		   <div class="controls">
				<?php echo form_dropdown('appno', $appno, 'Please select','id="appno"');  ?>     
		   </div>
		</div>--> 
		
		
		<div class="control-group">
			<label class="control-label">Select Student</label>
			<div class="controls">
				<!--<select id="$student_num" name="$student_num" class="input-large">
				<?php foreach($full_name as $student) { ?>
					<?php echo $student->student_id; ?>
				<option id="student" value="<?php echo $student->student_id; ?>"><?php echo $student->full_name; ?></option>  
					<?php }  ?>
				</select>-->
				
				<?php echo form_dropdown('student', $full_name,'student');  ?>
			</div>
		</div>
	
  
		<div class="control-group">
			<label class="control-label">Select Batch</label>
			<div class="controls">
				<!--<select id="$batch_num" name="$batch_num" class="input-large">
				<?php foreach($batch_name as $batchname) { ?>
					<?php echo $batchname->batch_id; ?>
				<option id="batch" value="<?php echo $batchname->batch_id; ?>"><?php echo $batchname->name; ?></option>  
					<?php }  ?>
				</select>-->
				
				<?php echo form_dropdown('batch', $batch_name,'batch');  ?>
			</div>
		</div>
	
    
			<div class="control-group">
			   <label class="control-label"></label>
				<div class="controls">
					<button type="submit" class="btn btn-success" >Save & Add Guardian Details</button>
					<button type="button" class="btn btn-success">Add Later</button>
					</div>
			</div>
				
		
		
		</form>
	</fieldset>
</div>
 
 
     
	 
	 
     
   <!--
   <div class="control-group">
     <label class="control-label">Academic Year</label>
       <div class="controls">
                 <select name="academicyear"  id="academicyear">
                 <option value="00">--Select Academic Year--</option>
					<option value="2009-10">2009-10</option>
                    <option value="2010-11">2010-11</option>
                    <option value="2011-12">2011-12</option>
                    <option value="2012-13">2012-13</option>
                    <option value="2013-14">2013-14</option>
					<option value="2014-15">2014-15</option>
                 </select>  
     </div> -->
  
 
  
  
		
			
		 