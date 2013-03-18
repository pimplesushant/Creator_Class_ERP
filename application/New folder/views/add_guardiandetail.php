 <div class="container">
   <legend>Guardian Detail</legend>
   <fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;
     <form class="form-horizontal" action="<?php echo $action; ?>">
	 <!--here display all student informaion updatable which is enrolled with id-->
	 
	 <div class="control-group">
     <label class="control-label">Select Student Enroll ID</label>
       <div class="controls">
                 <select name="studentname"  id="studentid">
                 <option value="00">--Select Student--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                 </select>   
     </div>
    </div>
	 
 <div class="control-group">
     <label class="control-label">Guardian Name</label>
        <div class="controls">
         <input type="text" class="input-xlarge" id="guardian_name" name="guardian_name" placeholder="Guardian's Full Name"> 
		 </div>
	   <?php echo form_error('guardian_name'); ?>
</div>

<div class="control-group">
				<label class="control-label">Address</label>
				<div class="controls">
					<textarea class="input-xlarge" id="address" placeholder="House, Landmark, City, Pincode" name="address"></textarea>
					<?php echo form_error('address'); ?>
				</div>
				
			</div>

<div class="control-group">
				<label class="control-label">Email</label>
				<div class="controls">
					<input type="email" class="input-xlarge" id="email_id" name="email_id" placeholder="E-mail Address">
				<?php echo form_error('email_id'); ?>
				</div>
				
			</div>

 <div class="input-prepend control-group">
				<label class="control-label">Mobile No.</label>
					<div class="controls">
					<input class="input-large" name="mobile_no" id="mobile_no" type="text" placeholder="xxxxxxxxxx">
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
     <label class="control-label">Relation</label>
       <div class="controls">
                 <select name="relation"  id="relation">
                 <option value="00"> -- Select Relation--</option>
                    <option value="Father">Father</option>
                    <option value="Mother">Mother</option>
                    <option value="Uncle">Uncle</option>
                    <option value="Uunty">Aunty</option>
					<option value="Father">Brother</option>
                    <option value="Mother">Sister</option>
                    <option value="Uncle">Grand-Father</option>
                    <option value="Uunty">Grand-Mother</option>
					<option value="Uunty">Other</option>
                 </select>	
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
</div>

