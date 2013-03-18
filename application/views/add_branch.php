<div class="container">


<legend>Add Branch Details</legend>
<?php echo $this->session->flashdata('msg'); ?>
<fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;

<form class="form-horizontal" enctype="multipart/form-data"  method="POST" action="<?php echo $branch; ?>" method="POST"  >
<div class="control-group">
    <label class="control-label">Branch Name<span style="color:red;"> *</span></label>
        <div class="controls">
        <input type="text" id="branch_name" name="branch_name" class="input-xlarge"  required placeholder="Branch Name" >
		<?php echo form_error('branch_name'); ?>
        </div>
</div>

<div class="control-group">
    <label class="control-label">Branch Address<span style="color:red;"> *</span></label>
        <div class="controls">
		<textarea rows="2"  class="input-xlarge"  name="branch_address" required placeholder="House, Landmark, City, Pincode"></textarea>
	<?php echo form_error('branch_address'); ?>
	</div>
</div>

<div class="control-group">
				<label class="control-label">Telephone No<span style="color:red;"> *</span></label>
				<div class="controls">
					<input type="text"  class="input-large" id="telephone_number" name="telephone_number" placeholder="Phone Number">
				<?php echo form_error('telephone_number'); ?>
				</div>
			</div>

<div class="control-group">
				<label class="control-label">Mobile No<span style="color:red;"> *</span></label>
					<div class="controls">
					
					<input class="input-large"  id="mobile_no" name="mobile_no" type="text" required placeholder="xxxxxxxxxx">
				<?php echo form_error('mobile_no'); ?>
				</div>
			</div>

<div class="control-group">
				<label class="control-label">E-mail<span style="color:red;"> *</span></label>
					<div class="controls">
					
					<input class="input-large" type="email" id="email_id" name="email_id"  required placeholder="E-mail">
				<?php echo form_error('email_id'); ?>
				</div>
			</div>
		
    <div class="control-group">	
		<label class="control-label"></label>
	<div class="controls">
	<button type="Save" class="btn btn-success">Save</button>&nbsp;
    <button type="clear" class="btn">Clear</button>
	</div>

</div>    
  
    </form>
	</fieldset>
	<div class="content">
  
   <div class="paging"><?php echo $pagination; ?></div>
   <div class="data"><?php echo $table; ?></div>
   <br />
   
  </div>
  </div>
	<!--############################################################################!-->
    <!--<div class="container">	
				<div id="grid" style="border:0px solid red;"bgcolor="#E5E5E5">
		<div id="tsort-tablewrapper" >
			<div id="tsort-tableheader" style="width:370px;">
				<div class="tsort-search">
					<select id="tsort-columns" onchange="sorter.search('query')">
					</select>
						<input type="text" id="query" onkeyup="sorter.search('query')" />
				</div>
				
			<span class="tsort-details" >
					<div>Records <span id="tsort-startrecord"></span>-<span id="tsort-endrecord"></span> of <span id="tsort-totalrecords"></span></div>
					<div><a href="javascript:sorter.reset()">Reset</a></div>
				</span> 
				</div>
			<form name="frm" action="addcourse.php" method="post">
				<table id="tsctablesort1" class="tinytable" cellspacing="0" cellpadding="0" border="0" 39px;"="" margin-top:="" #f9f9f9;="" style="border: 0px none; margin-top: 39px;">
					<thead>
						<tr>
							<!--th style="width:1%"><h3>
								<input type="checkbox" name="allCheck" onClick="selectallMe()" >
							</h3></th>
							<th style="width:1%"><h3>Sr.No.</h3></th>
							<th style="width:10%"><h3>Branch Name</h3></th>
							<th style="width:10%"><h3>E-mail</h3></th>
							<th style="width:10%"><h3>Telephone</h3></th>
							<th style="width:10%"><h3>Mobile</h3></th>
							<th style="width:10%"><h3>Address</h3></th>
							
							<th class="nosort" style="width:1%"><h3>Update</h3></th>
							<th class="nosort" style="width:1%"><h3>Delete</h3></th>		
						</tr>
					
</div>
</div>-->