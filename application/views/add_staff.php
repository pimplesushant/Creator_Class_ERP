<div class="container">
<legend>Add Staff Member</legend>
<a class="btn" href="<?php echo base_url('index.php/assign_faculty_subject_ctrl'); ?>">Assign Subjects to Faculty</a>
   <div class="container ">&nbsp;</div>

 <fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;
<form autocomplete="on"  class="form-horizontal" action="<?php echo $action; ?>" method="post">

<div class="control-group">
    <label class="control-label"> Name</label>
        <div class="controls">
			<input type="text" class="input-xlarge" id="name" name="name" placeholder="Full Name">
			<?php echo form_error('name'); ?>
        </div>
</div>

<div class="control-group">
    <label class="control-label">Designation</label>
	<div class="controls">
        <select id="designation_id" name="designation_id">
			<option>1</option>
			<option>2</option>
			<option>3</option>
		</select>
	</div>
</div>

<div class="control-group">
    <label class="control-label">Address</label>
        <div class="controls">
			<textarea rows="2" id="address" name="address" placeholder="House, Landmark, City, Pincode"></textarea>
			
		</div>
</div>
<div class="control-group"></div>

<div class="control-group">
				<label class="control-label">Telephone No.</label>
				<div class="controls">
					
					<input type="text" class="input-medium" id="telephone_no" name="telephone_no" placeholder="Phone Number">
					
				</div>
			</div>
	
	<div class="input-prepend control-group">
				<label class="control-label">Mobile No.</label>
					<div class="controls">
					
					<input class="input-large" id="mobile" name="mobile" type="text" placeholder="xxxxxxxxxx">
				</div>
			</div>
	
<div class="control-group">
		<label class="control-label">Email Id</label>
		<div class="controls">
	    <input type="text" id="email" name="email" placeholder="E-mail Address">
		<?php echo form_error('email'); ?>
		</div>
</div>
<div class="control-group">
		<label class="control-label">Date of Birth</label>
		<div class="controls">
		   <select style="width:8%" id="d1" name="d1">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
				<option>13</option>
				<option>14</option>
				<option>15</option>
				<option>16</option>
				<option>17</option>
				<option>18</option>
				<option>19</option>
				<option>20</option>
				<option>21</option>
				<option>22</option>
				<option>23</option>
				<option>24</option>
				<option>25</option>
				<option>26</option>
				<option>27</option>
				<option>28</option>
				<option>29</option>
				<option>30</option>
				<option>31</option>
			</select>
		    <select style="width:15%" id="d2" name="d2"> 
				<option>January</option>
				<option>february</option>
				<option>March</option>
				<option>April</option>
				<option>May</option>
				<option>June</option>
				<option>July</option>
				<option>August</option>
				<option>September</option>
				<option>October</option>
				<option>November</option>
				<option>December</option>
			</select>
			<select style="width:12%" id="d3" name="d3"> 
				<option>1990</option>
				<option>1991</option>
				<option>1992</option>
				<option>1993</option>
				<option>1994</option>
				<option>1995</option>
				<option>1996</option>
				<option>1997</option>
				<option>1998</option>
				<option>2000</option>
				<option>2001</option>
				<option>2002</option>
				<option>2003</option>
				
				
			</select>
		</div>
</div>

<div class="control-group">
	<label class="control-label" for="Gender">Gender</label>
	<div class="controls">
		<label for="1"><input type="radio" id="gender" name="gender" value="Male">Male</label>
		<label for="2"><input type="radio" id="gender" name="gender" value="Female" checked>Female</label>
	</div>
</div>
		


<div class="input-prepend control-group">		
		<label class="control-label">Salary Type</label>
					<div class="controls">
					<span class="add-on WebRupee">Rs.</span>
			<select>
				<option>10000 p.m.</option>
				<option>20000 p.m.</option>
				<option>30000 p.m.</option>
			</select>
		</div>
</div> 

<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<button type="submit" class="btn btn-success" > Save </button>
					<button type="reset" class="btn" > Clear </button>
				</div>
			</div>

</form>	
</fieldset>

	<div class="content">
		
			<div class="paging"><?php echo $pagination; ?></div>
			<div class="data"><?php echo $table; ?></div>
			<br />
			
		</div>
	<!--<?php include 'datagridfooter.php'; ?>