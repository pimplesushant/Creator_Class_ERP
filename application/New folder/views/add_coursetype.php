<div class="container">
   <legend>Course Type</legend>
   <fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;
   <form class="form-horizontal">    
	<div class="control-group">
     <label class="control-label">Course Name</label>
       <div class="controls">
           <input type="text" class="input-xlarge" id="course_name" name="course_name" placeholder="Course Name"> 
       </div>
	</div>
	
	<div class="control-group">
		<label class="control-label">Standard</label>
		<div class="controls">
                 <select name="standard"  id="standard">
                 <option value="00">--Select Your Standard--</option>
                    <option value="8th">8</option>
                    <option value="9th">9</option>
                    <option value="10th">10</option>
                    <option value="11th">11</option>
					<option value="12th">12</option>
                 </select>   
		</div>
	</div>
	
	
	<div class="control-group">
            <label class="control-label" for="multiSelect">Select Subject</label>
            <div class="controls">
              <select multiple="multiple" id="multiSelect">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
				<option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
	
	<div class="control-group">
		<label class="control-label">Subject</label>
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
	</div>
	
	
	
	
	<div class="control-group">
        <label class="control-label">Course Fees</label>
        <div class="controls">
			<input type="text" class="input-xlarge" id="course_fees" name="course_fees" placeholder="Course Fees"><br><br>
			<button type="submit" class="btn btn-success" >Save</button>
			<button class="btn" type="button">Clear</button>    
		</div>
	</div>
   </form>
   </fieldset>
 </div>