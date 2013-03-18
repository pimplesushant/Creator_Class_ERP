 <div class="container">
   <legend>Guardian Detail</legend>
   <fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;
     <form class="form-horizontal">
 <div class="control-group">
     <label class="control-label">Guardian Name</label>
        <div class="controls">
         <input type="text" class="input-xlarge" id="gurardian_name" name="gurardian_name" placeholder="Gurdian's Full Name"> 
       </div>
</div>

<div class="control-group">
				<label class="control-label">Address</label>
				<div class="controls">
					<textarea class="input-xlarge" id="address" placeholder="House, Landmark, City, Pincode" name="address"></textarea>
				</div>
			</div>

<div class="control-group">
				<label class="control-label">Email</label>
				<div class="controls">
					<input type="email" class="input-xlarge" id="email_id" name="email_id" placeholder="E-mail Address">
				</div>
			</div>

 <div class="input-prepend control-group">
				<label class="control-label">Mobile No.</label>
					<div class="controls">
					<span class="add-on">+91</span>
					<input class="input-large" id="mobile" type="text" placeholder="xxxxxxxxxx">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Telephone No.</label>
				<div class="controls">
					<input type="text" class="input-small" id="std_code" name="std_code" placeholder="STD Code"> - 
					<input type="text" class="input-medium" id="telephone_number" name="telephone_number" placeholder="Phone Number">
				</div>
			</div>

 <div class="control-group">
     <label class="control-label">Relation</label>
       <div class="controls">
                 <select name="Relation"  id="Relation">
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

