<div class="container">
	<legend>Add Batch</legend>
	<?php echo $this->session->flashdata('msg'); ?>
	 <a class="btn" href="<?php echo base_url('index.php/assign_standard_batch_ctrl'); ?>">Assign Batches to Standard</a>
 <div class="container ">&nbsp;</div>
	
        <fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;
		<form class="form-horizontal" action="<?php echo $batch; ?>" method="POST" >
		
		<div class="control-group">
			<label class="control-label">Batch Name<span style="color:red;"> *</span></label>
			<div class="controls">
				<input type="text" required class="input-xlarge" id="batch_name" name="batch_name" placeholder="Batch Name"> 
			   <?php echo form_error('batch_name'); ?>
			</div>
		 </div>
 
		
		
		
		<div class="control-group">
			<label class="control-label"></label>
			<div class="controls">
				<button type="submit" class="btn btn-success" >Save</button>
				<button  type="clear"  class="btn" >Clear</button>
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
	
				<!--div id="grid" style="border:0px solid red;"bgcolor="#E5E5E5">
		<div id="tsort-tablewrapper" >
			<div id="tsort-tableheader" style="width:100%;">
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
							<th style="width:10%"><h3>
								<input type="checkbox" name="allCheck" onClick="selectallMe()"> 
							</h3></th>
							<th style="width:1%"><h3>Sr.No.</></h3></th>
							<th style="width:10%"><h3>Batch name</h3></th>
							<th style="width:10%"><h3>Course Type</h3></th>
							
							<th class="nosort" style="width:10%"><h3>Update</h3></th>
							<th class="nosort" style="width:10%"><h3>Delete</h3></th>		
						</tr>
					</thead>
					<tbody>			
						
</div-->
