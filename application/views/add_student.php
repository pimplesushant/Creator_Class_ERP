<div class="container">
	<legend>Student Registration Form</legend>
	<fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">
		<form class="form-horizontal" name="addstudent" id="addstudent" method="post" action="<?php echo $action;?>">&nbsp;	
			
			<div class="control-group">
				<label class="control-label">Registration No.</label>
				<div class="controls">
					
					<input type="text" class="input-xlarge" id="reg_no" name="reg_no" placeholder="Student's Registration No">
					<?php echo form_error('reg_no'); ?>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Application No.</label>
				<div class="controls">
					
					<input type="text" class="input-xlarge" id="app_no" name="app_no" placeholder="Student's Application No">
					<?php echo form_error('app_no'); ?>
				</div>
			</div>
		
		<div class="control-group">
				<label class="control-label">Registration Date</label>
				<div class="controls">
					<input type="date" class="input-xlarge" id="date" name="date" readonly value="<?php echo date("d-m-Y"); ?>">
					<?php echo form_error('date'); ?>
				</div>
			</div>
			
			<div class="control-group">
			<label class="control-label">Select Standard</label>
			<div class="controls">
				<!--<select id="$standard_num" name="$standard_num" class="input-large">
				<?php foreach($standard_name as $stname) { ?>
					<?php echo $stname->standard_id; ?>
				<option id="std" value="<?php echo $stname->standard_id; ?>"><?php echo $stname->name; ?></option>  
					<?php }  ?>
				</select>-->
				
				<?php echo form_dropdown('std', $standard_name,'std');  ?>
			</div>
		</div>
		
		
			<div class="control-group">
				<label class="control-label">Full Name</label>
				<div class="controls">
					
					<input type="text" class="input-xlarge" id="name" name="name" placeholder="Student's Name">
					<?php echo form_error('name'); ?>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label"  for="Gender">Gender</label>
				<div class="controls">
				<div class="btn-group,horizontal" data-toggle="buttons-radio">
					<input type="radio" id="gender" name="gender" value="Male">Male
					<input type="radio" id="gender" name="gender" value="Female">Female
				<?php echo form_error('gender'); ?>
				</div>
				</div>
			</div>

			
			<div class="control-group">
				<label class="control-label">Date of Birth</label>
				<div class="controls">
				<input type="date" id="dob"  name="dob" placeholser="Birth Date">
				<?php echo form_error('dob'); ?>
				</div>
			</div>
			
			<div class="control-group">
			<label class="control-label">Select Mothertonge</label>
			<div class="controls">
				<select id="mothertongue" name="mothertongue" class="input-large">
				<option value="00">--Select Mothertongue--</option>
					<option value="English">English</option>
					<option value="Hindi">Hindi</option>
					<option value="Marathi">Marathi</option>
					<option value="Kannad">Kannad</option>
					<option value="Telegu">Telegu</option>
					<option value="Bengali">Bengali</option>
					
					
				</select>
			</div>
		</div>
			
			<div class="control-group">
				<label class="control-label">Email</label>
				<div class="controls">
					<input type="email" class="input-xlarge" id="email_id" name="email_id" placeholder="E-mail Address">
				<?php echo form_error('email_id'); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Address</label>
				<div class="controls">
					<textarea class="input-xlarge" id="address" placeholder="House, Landmark, City, Pincode" name="address"></textarea>
				<?php echo form_error('address'); ?>
				</div>
			</div>
			
			<div class="input-prepend control-group">
				<label class="control-label "><span class="icon-mobile-phone">  Mobile No.</span></label>
					<div class="controls">
					
					<input class="input-large" id="mobile_no" name="mobile_no" type="text" placeholder="xxxxxxxxxx">
					<?php echo form_error('mobile_no'); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Telephone No.</label>
				<div class="controls">
					
					<input type="text" class="input-medium" id="telephone_no" name="telephone_no" placeholder="Phone Number">
					
					<?php echo form_error('telephone_no'); ?>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">School/College </label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="schoo" name="school" placeholder="School or College Name">
					<?php echo form_error('school'); ?>
				</div>
			</div>


  					
	 <div class="fileupload fileupload-new controls" data-provides="fileupload">
		<div class="fileupload-new thumbnail" style="width: 150px; height: 180px;">
			<img src="http://www.placehold.it/150x180/EFEFEF/AAAAAA&text=NO PHOTO" /></div>
			<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
				
			<span class="btn btn-file">
			<span class="fileupload-new icon-upload"> Upload Photograph </span>
			<span class="fileupload-exists icon-upload"> Change</span><input type="file" />
			</span>
			<a href="#" class="btn fileupload-exists icon-remove-sign" data-dismiss="fileupload"> Remove</a>
				
	</div>
			
	<div class="control-group">
		<label class="control-label"></label>
		<div class="controls">
			<button type="submit" class="btn btn-success icon-save" > Save </button>
			<button type="reset" class="btn" > Clear </button>
		</div>
	</div>
			
			
			

		</form>
	</fieldset>
</div>
