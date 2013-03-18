<div class="container">
<legend>Add Staff Member</legend>
 <fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;
<form autocomplete="on"  class="form-horizontal" action="<?php echo $action; ?>" method="post">

<div class="control-group">
    <label class="control-label"> Name</label>
        <div class="controls">
			<input type="text" class="input-large" id="name" name="name" value="<?php echo $this->form_validation->name; ?>" placeholder="Full Name">
			<input type="hidden" name="id" value="<?php echo $this->form_validation->id; ?>"/>
			<?php echo form_error('name'); ?>
        </div>
</div>

<div class="control-group">
    <label class="control-label">Designation</label>
	<div class="controls">
        <select id="designation_id" name="designation_id" value="<?php echo  $this->form_validation->designation_id; ?>">
		
			<option>1</option>
			<option>2</option>
			<option>3</option>
		</select>
	</div>
</div>

<div class="control-group">
    <label class="control-label">Address</label>
        <div class="controls">
			<textarea rows="2"  name="address" value="" placeholder="House, Landmark, City, Pincode"><?php echo $this->form_validation->address; ?></textarea>
			
		</div>
</div>
<div class="control-group"></div>

<div class="control-group">
				<label class="control-label">Telephone No.</label>
				<div class="controls">
					
		         <input type="text" class="input-large " id="telephone_no" name="telephone_no" value="<?php echo $this->form_validation->telephone_no;?>" placeholder="Phone Number">
					
				</div>
			</div>
	
	<div class="input-prepend control-group">
				<label class="control-label">Mobile No.</label>
					<div class="controls">
					
					<input class="input-large" id="mobile_no"  name="mobile_no" type="text" value="<?php echo $this->form_validation->mobile_no; ?>"  placeholder="xxxxxxxxxx">
					
				</div>
			</div>
	
<div class="control-group">
		<label class="control-label">Email Id</label>
		<div class="controls">
	    <input type="text" id="email" name="email" value="<?php echo $this->form_validation->email_id; ?>" placeholder="Email Address">
		
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
				<option>2013</option>
				<option>2014</option>
				<option>2015</option>
				<option>2016</option>
				<option>2017</option>
				<option>2018</option>
				<option>2019</option>
				<option>2020</option>
			</select>
		</div>
</div>

<div class="control-group">
	<label class="control-label" for="Gender">Gender</label>
	<div class="controls">
		<label for="1"><input type="radio" id="gender" name="gender" value="Male"> Male</label>
		<label for="2"><input type="radio" id="gender" name="gender" value="Female"  checked>Female</label>
		
	</div>
</div>
		


<!-- div class="input-prepend control-group">		
		<label class="control-label">Salary Type</label>
					<div class="controls">
					<input class="input-large" id="salarytype" name="salarytype" type="text" value="" placeholder="xxxxxxxxxx">
					<span class="add-on WebRupee">Rs.</span>
			<select>
				<option>10000 p.m.</option>
				<option>20000 p.m.</option>
				<option>30000 p.m.</option>
			</select>
		</div>
</div--> 

<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<button type="submit" class="btn btn-success" > Save </button>
					<button type="reset" class="btn" > Clear </button>
				</div>
			</div>

</form>	
</fieldset>


	<?php include 'datagridfooter.php'; ?>