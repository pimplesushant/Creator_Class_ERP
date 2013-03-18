<?php 
/* Written for Khaoskreations 2010-06-13 */


//db connect code
$con = mysql_connect('localhost','root','');
$con1 = mysql_select_db('training', $con);


$query = "SELECT * FROM example ";
$result = mysql_query($query);

//==============================================================================build arrays from db
$last = array();
$first = array();
$dob = array();

if (!$result) echo "Error: ".mysql_error();
else {
	$last_group = "";
	$first_group = "";
	$num = mysql_num_rows($result);
	
	for ($i = 0;$i<$num;$i++) {
		$r = mysql_fetch_array($result);
		
		if ($r['last_name'] != $last_group) {
			$last[$r['last_name']] = $r['last_name'];
			$first[$r['last_name']][$r['first_name']] = $r['first_name'];
			$dob[$r['last_name']][$r['first_name']][$r['id']] = $r['dob']."::".$r['id'];
			
			$last_group = $r['last_name'];
			$first_group = $r['last_name'];
		} else if ($r['first_name'] != $first_group) {
			$first[$r['last_name']][$r['first_name']] = $r['first_name'];
			$dob[$r['last_name']][$r['first_name']][$r['id']] = $r['dob']."::".$r['id'];
			
			$first_group = $r['last_name'];
		} else {
			$dob[$r['last_name']][$r['first_name']][$r['id']] = $r['dob']."::".$r['id'];
		}
	}
}

//==============================================================================create scripts
$script = "\n<script type='text/javascript'>\n";
//build last name array
$script .= "var last_name = new Array(";
$list = "";
foreach ($last as $key => $val) {
	$list .= " \"".$val."\",";
	//echo $val ."<br />";
}
$list = substr($list, 0, -1);
$list .= " );\n";
$script .= $list;
$list = "";
//build first name array
$script .= "\nvar first_name = new Array();";
foreach ($first as $lastn => $fary) {
	$list .= "\nfirst_name[\"".$lastn."\"] = new Array(";
	foreach ($fary as $key => $value) {
		$list .= " \"". $value . "\",";
	}
	$list = substr($list, 0, -1);
	$list .= " );";
}

$script .= $list;
$list = "";
//build dob array
$list = "\nvar dob = new Array();";
foreach ($dob as $lastn => $fary) {
	$list .= "\ndob[\"".$lastn."\"] = new Array();";
	foreach ($fary as $firstn => $aary) {
		$list .= "\ndob[\"".$lastn."\"][\"".$firstn."\"] = new Array(";
		foreach ($aary as $key => $value) {
			$list .= "new Array(".$key.", \"".$value."\"),";
		}
		$list = substr($list, 0, -1);
		$list .= " );";
	}
}
$script .= $list;

//script functions to update tiers

$script .= <<< EOSCRIPT


function resetForm(theForm) {
	theForm.last_names.options[0] = new Option("Select...", "");
	for (var i=0; i<last_name.length; i++) {
		theForm.last_names.options[i+1] = new Option(last_name[i], last_name[i]);
	}
	theForm.last_names.options[0].selected = true;
	
	theForm.first_names.options[0] = new Option("Select...", "");
	theForm.first_names.options[0].selected = true;
	theForm.dob_id.options[0] = new Option("Select...", "");
	theForm.dob_id.options[0].selected = true;
	document.getElementById("selectbox").innerHTML = "";
}

function reloadForm(theForm,lastname,firstname,bday) {
	theForm.last_names.options[0] = new Option("Select...", "");
	for (var i=0; i<last_name.length; i++) {
		theForm.last_names.options[i+1] = new Option(last_name[i], last_name[i]);
		if (lastname == last_name[i]) theForm.last_names.options[i+1].selected = true;
	}
	document.getElementById("selectbox").innerHTML = "here";
	
	var fn = first_name[lastname];
	
	theForm.first_names.options.length = 0;
	for (var i=0; i<fn.length; i++) {
		theForm.first_names.options[i] = new Option(fn[i], fn[i]);
		if (firstname == fn[i]) {
			theForm.first_names.options[i].selected = true;
		}
	}
	
	var dobs = dob[lastname][firstname];
	
	theForm.dob_id.options.length = 0;
	for (var i=0; i<dobs.length; i++) {
		theForm.dob_id.options[i] = new Option(dobs[i][1], dobs[i][0]);
		if (bday == dobs[i][0]) {
			theForm.dob_id.options[i].selected = true;
		}
	}
	document.getElementById("selectbox").innerHTML = "You selected person #"+bday;
}

function updateFirstNames(theForm) {
	var lname = theForm.last_names.options[theForm.last_names.options.selectedIndex].value;
	var fnames = first_name[lname];
	
	theForm.first_names.options.length = 0;
	for (var i=0; i<fnames.length; i++) {
		theForm.first_names.options[i] = new Option(fnames[i], fnames[i]);
	}
	
	var findex = theForm.first_names.options[theForm.first_names.options.selectedIndex].value;
	var dobs = dob[lname][findex];
	
	theForm.dob_id.options.length = 0;
	for (var i=0; i<dobs.length; i++) {
		theForm.dob_id.options[i] = new Option(dobs[i][1], dobs[i][0]);
	}
	theForm.dob_id.options[0].selected = true;
}

function updateDOB(theForm) {
	var lname = theForm.last_names.options[theForm.last_names.options.selectedIndex].value;
	var findex = theForm.first_names.options[theForm.first_names.options.selectedIndex].value;
	var dobs = dob[lname][findex];
	
	theForm.dob_id.options.length = 0;
	for (var i=0; i<dobs.length; i++) {
		theForm.dob_id.options[i] = new Option(dobs[i][1], dobs[i][0]);
	}
	theForm.dob_id.options[0].selected = true;
}

</script>

EOSCRIPT;

$reload_script = "";
if ($_POST['last_names'] != "" && $_POST['first_names'] != "") {
	$reload_script .= "<script type='text/javascript'> "
			."reloadForm(document.peopleForm,'".$_POST['last_names']."','".$_POST['first_names']."',".$_POST['dob_id'].");"
			."</script>";
} else {
	$reload_script .= "<script type='text/javascript'>"
			."resetForm(document.peopleForm);"
			."</script>";
}

//============================================================================== build page


$page = <<< EOPAGE
<html>
	<head>
		{$script}
	</head>
	<body>
		<form method="post" action="cascading_select.php" name='peopleForm'>
			<select name='last_names' onchange="updateFirstNames(this.form)"></select>
			<select name="first_names" onchange="updateDOB(this.form)"></select>
			<select name="dob_id"></select>
			<input type='button' value='Reset' onclick='resetForm(document.peopleForm)'/>
			<input type='submit' value='Reload'/>
		</form>
		<div id='selectbox'></div>
		{$reload_script}
	</body>
</html>

EOPAGE;

echo $page;

?>