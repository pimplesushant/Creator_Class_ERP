<div class="container">
<legend>Add Standard</legend>
<a class="btn" href="<?php echo base_url('index.php/assign_standard_subject_ctrl'); ?>">Assign Subject to Standard</a>
<a class="btn" href="<?php echo base_url('index.php/assign_standard_batch_ctrl'); ?>">Assign Batches to Standard</a>
<div class="container">&nbsp;</div>
<form class="form-horizontal" action="<?php echo $action; ?>" method="post">
<fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;
	  
<div class="control-group">
			  <label class="control-label">Standard Name</label>
				    <div class="controls">
				        <input type="text" class="input-xlarge" id="name" name="name" placeholder="Standard like 5th, 6th"><br><br>
				    </div>
              </div>
				  
<div class="control-group">
			    <div class="controls">
				  <button type="submit" class="btn btn-success" >Save</button>
				  <button type="submit" class="btn" > Clear </button>
				</div>
		   </div>
		   
       </fieldset>
	</form>
	<div class="content">
		
			<div class="paging"><?php echo $pagination; ?></div>
			<div class="data"><?php echo $table; ?></div>
			<br />
			
		</div>
		
	<!--<?php include 'datagridfooter.php'; ?>
 