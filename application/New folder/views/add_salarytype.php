<div class="container">
<legend>Salary Type</legend>
<fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;
<form autocomplete="on"  class="form-horizontal" action="<?php echo $action; ?>" method="post">

		<div class="control-group">
            <label class="control-label">Salary Type</label>
            <div class="controls">
				<input type="text" class="input-xlarge" id="salary" name="salary" placeholder="Salary Type">
			</div>
		</div>
		
		<div class="input-prepend control-group">		
		<label class="control-label">Salary amount</label>
					<div class="controls">
					<span class="add-on WebRupee">Rs.</span>
				<input type="text" class="input-large" id="amt" name="amt" placeholder="Salary Amount">

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
       <th style="width:1%"><h3>
        <input type="checkbox" name="allCheck" onClick="selectallMe()"> 
       </h3></th>
       <th style="width:1%"><h3>Sr.No.</></h3></th>
       <th style="width:22%"><h3>salary</h3></th>
       <th style="width:10%"><h3>amt</h3></th>
	   
       <th class="nosort" style="width:10%"><h3>UPDATE</h3></th>
       <th class="nosort" style="width:10%"><h3>DELETE</h3></th>  
      </tr>
     </thead>
     <tbody>    
      <?php
       $result= mysql_query("SELECT * FROM salary ");
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
      echo "<td align='center'>" . $row['salary'] . "</td> " ; 
      echo "<td align='center'>" . $row['amt'] . "</td> " ; 
	  
     ?>
     <td align='center'><a href="updatefaculty.php?salary_id=<?php echo $row['salary_id'] ?>"><img src="<?php echo base_url(); ?>assets/img/update.png" width="16" height="16"  /></a></td>
     <td align='center'><a href="addsubject.php?salary_id=<?php echo $row['salary_id']?>" onclick="return confirm('Are you sure you want to delete?')"><img src=" <?php echo base_url(); ?>assets/img/delete.png" width="16" height="16"  /></a></td>
     
     <?php
      $i++;
         
       }
         ?>
        
       </tbody>
      </table>
    
   </div>



</div>
	<?php include 'datagridfooter.php'; ?>

    
</div>
 
 

 
 
 