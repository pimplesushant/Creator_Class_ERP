<div class="container">
  <legend>Assign Faculty To Subject</legend>
	<form class="form-horizontal"  name="assign" id="enroll_student" method="POST"  action="<?php echo $action; ?>" >
       <fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;
		   
		    <div class="control-group">
			   <label class="control-label">Select faculty</label>
			   <div class="controls">
				<!--<select id="$faculty_num" name="$faculty_num" class="input-large">
				<?php foreach($faculty_name as $facname) { ?>
				 <?php echo $facname->faculty_id; ?>
				<option id="fac" value="<?php echo $facname->faculty_id; ?>"><?php echo $facname->name; ?></option>  
				 <?php }  ?>4
				</select>-->
				
				<?php echo form_dropdown('fac', $faculty_name,'fac');  ?>
		   </div>
		  </div>
		  
		  
		  <div class="control-group">
			   <label class="control-label">Select Subject</label>
			   <div class="controls">
				<!--<select id="$faculty_num" name="$faculty_num" class="input-large">
				<?php foreach($subject_name as $subname) { ?>
				 <?php echo $subname->subject_id; ?>
				<option id="sub" value="<?php echo $subname->subject_id; ?>"><?php echo $subname->name; ?></option>  
				 <?php }  ?>
				</select>-->
				
				<?php echo form_multiselect('sub[]',$subject_name,$this->input->post('sub'));  ?>
		   </div>
		  </div>
		  
		  
		  
				  
				  
			<!--<div class="control-group">
						<label class="control-label">Add Subject</label>
				<div class="controls">
						<select id="sub" multiple class="input-xlarge" >
						<option value="AL">A</option>
							<option value="ds">B</option>
							<option value="sd">C</option>
							<option value="ss">D</option>
							<option value="dd">E</option>
							<option value="WsddY">F</option>
							<option value="A1L">G</option>
							<option value="d1s">H</option>
							<option value="s1d">I</option>
							<option value="s1s">J</option>
							<option value="dd1">K</option>
							<option value="Wsd1dY">L</option>
					</select>
				</div>
			</div>-->
				  
			<div class="control-group">
			    <div class="controls">
				  <button type="submit" class="btn btn-success" >Assign</button>
				  <button type="submit" class="btn" > Clear </button>
				</div>
		   </div>
		   
       </fieldset>
	</form>
 </div>