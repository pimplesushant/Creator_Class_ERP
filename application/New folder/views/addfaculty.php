<?php include 'db.php'?>
        <!-- Header -->
			<script type="text/javascript">
var fieldName='chkName';

function selectall(){
  var i=document.frm.elements.length;
  var e=document.frm.elements;
  var name=new Array();
  var value=new Array();
  var j=0;
  for(var k=0;k<i;k++)
  {
    if(document.frm.elements[k].name==fieldName)
    {
      if(document.frm.elements[k].checked==true){
        value[j]=document.frm.elements[k].value;
        j++;
      }
    }
  }
  checkSelect();
}
function selectCheck(obj)
{
 var i=document.frm.elements.length;
  for(var k=0;k<i;k++)
  {
    if(document.frm.elements[k].name==fieldName)
    {
      document.frm.elements[k].checked=obj;
    }
  }
  selectall();
}

function selectallMe()
{
  if(document.frm.allCheck.checked==true)
  {
   selectCheck(true);
  }
  else
  {
    selectCheck(false);
  }
}
function checkSelect()
{
 var i=document.frm.elements.length;
 var berror=true;
  for(var k=0;k<i;k++)
  {
    if(document.frm.elements[k].name==fieldName)
    {
      if(document.frm.elements[k].checked==false)
      {
        berror=false;
        break;
      }
    }
  }
  if(berror==false)
  {
    document.frm.allCheck.checked=false;
  }
  else
  {
    document.frm.allCheck.checked=true;
  }
}
</script>
    
        <div class="container">
            
			<div class="heading">
				<b>Add Faculty</b>
			</div> <!-- heading -->
			<div id="main-inner-content">
			<form class="form-horizontal" action="<?php echo $addfaculty;?>" method="post" style="border:2px solid #C0C0C0; background-color:#f0f0f0;">
			<?php
				session_start();
				if(isset($_SESSION["coursename"]))
				{
				$sub=$_SESSION["coursename"];
				}
				unset($_SESSION["coursename"]);
				
				?>
				<?php
				if(isset($_SESSION["coursemsg"]))
				{
					echo $_SESSION["coursemsg"];
					unset($_SESSION["coursemsg"]);
				}
				?>
				<fieldset style="margin-top: 40px;">
					<div class="control-group">
						<label class="control-label">Name:</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="user_name" name="user_name" rel="popover" data-content="Enter your name." data-original-title="Full Name">
							<?php echo form_error('user_name'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Email id:</label>
						<div class="controls">
							<input type="email" class="input-xlarge" id="email_id" name="email_id" rel="popover" data-content="Enter your email address" data-original-title="Email Address">
							<?php echo form_error('email_id'); ?>
						</div>
					</div>
					 <div class="control-group">
						<label class="control-label">Password</label>
						<div class="controls">
							<input type="password" class="input-xlarge" name="pwd" />
							<?php echo form_error('pwd'); ?>
							<p class="help-block"></p>
						</div>
						</div>
						<div class="control-group">
							<label class="control-label">Conform Password</label>
						<div class="controls">
						<input
						type="password"
						data-validation-match-match="pwd"
						name="some_other_field" class="input-xlarge"
						<?php echo form_error('some_other_field'); ?>
						>
						<p class="help-block"></p>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Address:</label>
						<div class="controls">
							<div class="input">
								<textarea class="xxlarge" id="address" name="address" rows="2"></textarea>	
								<?php echo form_error('address'); ?>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Gender:</label>
						<div class="controls">
							<label class="radio">
								<input type="radio" name="gender" id="gender" value="Male" checked>
								
								Male:
							</label>
							<label class="radio">
								<input type="radio" name="gender" id="gender" value="Female">
								Female:
							</label>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Date Of Birth:</label>
						<div class="controls">
							<input type="text" id="datepicker" class="input-xlarge" name="datepicker" />
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Mobile No.:</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="mobile_no" name="mobile_no" rel="popover" data-content="Enter your telephone number" data-original-title="telephone no">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Telephone No.:</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="telephone_no" name="telephone_no" rel="popover" data-content="Enter your telephone number" data-original-title="telephone no">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"></label>
							<div class="controls">
								<button type="submit" class="btn btn-success">Save</button>
								<button type="reset" class="btn">Reset</button>
							</div>
					</div>
					
				</fieldset>
			</form>
			</div><!-- main-inner-content -->
		
	<!-- ##############################################################################################################-->
		
	<div id="grid" style="border:0px solid red;"bgcolor="#E5E5E5">
		<div id="tsort-tablewrapper" >
			<div id="tsort-tableheader" style="width:371px;">
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
							<th style="width:10%"><h3>Sr.No.</></h3></th>
							<th style="width:10%"><h3>Name</h3></th>
							<th style="width:10%"><h3>Email id</h3></th>
							<th style="width:10%"><h3>Address</h3></th>
							<th style="width:10%"><h3>Gender</h3></th>
							<th style="width:10%"><h3>Date Of Birth</h3></th>
							<th style="width:10%"><h3>Mobile No.</h3></th>
							<th style="width:10%"><h3>Telephone No.</h3></th>

							<th class="nosort" style="width:10%"><h3>UPDATE</h3></th>
							<th class="nosort" style="width:10%"><h3>DELETE</h3></th>		
						</tr>
					</thead>
					<tbody>				
						<?php
							$result= mysql_query("SELECT * FROM admin ");
							$i=1;
							while ($row=mysql_fetch_array($result))
							{	
								echo "<tr>";
								?>
								<td>							
								<input type="checkbox" name="chkName" onClick="selectall()"> 
								</td>
					<?php
						echo "<td align='center'>" . $i . "</td> " ;
						echo "<td align='center'>" . $row['name'] . "</td> " ;	
						echo "<td align='center'>" . $row['email_id'] . "</td> " ;	
						echo "<td align='center'>" . $row['address'] . "</td> " ;	
						echo "<td align='center'>" . $row['gender'] . "</td> " ;	
						echo "<td align='center'>" . $row['dob'] . "</td> " ;	
						echo "<td align='center'>" . $row['mobile_no'] . "</td> " ;	
						echo "<td align='center'>" . $row['telephone_no'] . "</td> " ;	
						
					?>
					<td align='center'><a href="updatefaculty.php?adminid=<?php echo $row['admin_id'] ?>"><img src="../assets/img/update.png" width="16" height="16"  /></a></td>
					<td align='center'><a href="addsubject.php?adminid=<?php echo $row['admin_id']?>" onclick="return confirm('Are you sure you want to delete?')"><img src="../assets/img/delete.png" width="16" height="16"  /></a></td>
					
					<?php
						$i++;
									
							}
									?>
								
							</tbody>
						</table>
				
			</div>    
	
