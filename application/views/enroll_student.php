<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<script language="JavaScript" src="<?php echo base_url(); ?>js/myminiAJAX.js"></script>
<script language="JavaScript" src="<?php echo base_url(); ?>js/functions1.js"></script>	
<script type="text/javascript">
			function init() {
			
		doAjax('<?php echo base_url(); ?>course_list.php', '', 'populateCourse', 'post', '1');	
			}
			</script>
	
</head>

<body onload="init()">
	<div class="container">
		<legend>Admit Student</legend>
			<fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">
				<form class="form-horizontal" name="enroll_student" id="enroll_student" method="POST"  action="<?php echo $action; ?>" >&nbsp;

		
		
		
					<div class="control-group">
						<label class="control-label">Standard Name:</label>
						<div class="controls">
							<label>
								<select name="courses" id="courses" required onChange="resetValues();doAjax('<?php echo base_url(); ?>stage_list.php', 'course='+getValue('courses'), 'populateStage', 'post', '1')">
									<option value="">Please select:</option>
								</select>
							</label>
						</div>
					</div>
		
		
		
					<div class="control-group">
						<label class="control-label">Student Name & Registration no:</label>
						<div class="controls">
							<select name="stages" id="stages" required  disabled="disabled">
									<option value="">Please select:</option>
								</select>
								
						</div>
					</div>
	
	
		<div class="control-group">
			<label class="control-label">Select Batch</label>
			<div class="controls">
				<!--<select id="$batch_num" name="$batch_num" class="input-large">
				<?php foreach($batch_name as $batchname) { ?>
					<?php echo $batchname->batch_id; ?>
				<option id="batch" value="<?php echo $batchname->batch_id; ?>"><?php echo $batchname->name; ?></option>  
					<?php }  ?>
				</select>-->
				
				<?php echo form_dropdown('batch', $batch_name,'batch');  ?>
			</div>
		</div>
	
    
		<div class="control-group">
			   <label class="control-label"></label>
				<div class="controls">
					<button type="submit" class="btn btn-success" >Save & Add Guardian Details</button>
					<button type="button" class="btn btn-success">Add Later</button>
				</div>
		</div>
				
		

</form>
<div id="loading" style="display: none;"></div>
</div>
</fieldset>
 </body>
 
     
	 
	 
     
   <!--
   <div class="control-group">
     <label class="control-label">Academic Year</label>
       <div class="controls">
                 <select name="academicyear"  id="academicyear">
                 <option value="00">--Select Academic Year--</option>
					<option value="2009-10">2009-10</option>
                    <option value="2010-11">2010-11</option>
                    <option value="2011-12">2011-12</option>
                    <option value="2012-13">2012-13</option>
                    <option value="2013-14">2013-14</option>
					<option value="2014-15">2014-15</option>
                 </select>  
     </div> -->
  
 
  
  
		
			
		 