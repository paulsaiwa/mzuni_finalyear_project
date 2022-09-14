<?php error_reporting('E_NOTICE') ?>
<?php 
include('../connection.php');

if (!isset($_SESSION)) {
	session_start();
}
if (isset($_SESSION['username'], $_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
	$username = $_SESSION['username'];
}
else{
	header("location:../logout.php");
}

require 'class.php';
$user = new users($user_id);
?>
<?// this is duplicate from assessor page, please saiwa use it carefully?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>hims</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../css/default.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../tcal.css" />
<script type="text/javascript" src="../tcal.js"></script> 
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/moodal.css" rel="stylesheet">
	<link href="../date/htmlDatepicker.css" rel="stylesheet" />

	 <link rel="stylesheet" type="text/css" href="../font-awesome/font-awesome/css/font-awesome.min.css">

	<script language="JavaScript" src="../date/htmlDatepicker.js" type="text/javascript"></script>
	<script type="text/javascript" src="../js/boxOver.js"></script>
	<script type="text/javascript">

   function enterNumber(){

  var e = document.getElementById('this');

  if (!/^[0-9]+$/.test(e.value)) 
{ 
alert("Please enter onyl number.");
e.value = e.value.substring(0,e.value.length-1);
}
}   

</script>
	<script type="text/javascript">
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    //if (charCode > 31 && (charCode < 48 || charCode > 57))
	if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
        return false;
    return true;
}</script>
<script>
function showprojectdetails(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";//txtHint is an event handler 
  return;
  }
if (window.XMLHttpRequest)  //XMLHttp request object is created and we are checking whether ajax works in diffrent browsers..i.e we are checking browser compatibity
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()//xmlhttprequest object is configured
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)//asyncronous request to web server
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getprojinfo.php?q="+str,true);
xmlhttp.send();
}
</script>
</style>
<style>
 
 
 
  /* Dropdown Button */
.dropbtn {
  background-color: ;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  height:20px;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

button{font-size: 20px;}
/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: green;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: red;} 

button{background-color:#FFFFCC; margin-left:; float:center; width:100%; height:100%;} 
select{width:80%; height:40px;}
input[type="text"]{width:80%;height:40px;}
input[type="email"]{width:80%;height:40px;}
input[type="numbers"]{width:180%;height:40px;}
textarea{width:80%;}
 </style>

</head>
<body>
<?php include 'charge_header.php';?>
<div class="w3-row w3-grey" style="margin-top: 6px ; font-size: 20px; border-top-color: red; border-top-style: solid; border-bottom-style: solid; border-bottom-color: red;">
  <a href="in-charge.php?action=dashb" class="w3-bar-item w3-button fa fa-home" style="margin-left: ; margin-right: 10%; font-size: 20px; color: white;">Home</a>
<a href="" class="w3-bar-item w3-button  fa fa-refresh " style="height:30px; padding-top: 6px; font-size: 20px; color: white; margin-left: 20%; ">Refresh</a>

  
  <a href="../logout.php" class="w3-bar-item w3-button  fa fa-sign-out w3-red w3-right" style="height:30px; padding-top: 6px; font-size: 20px;">Logout</a>
</div>

<div class="w3-bar w3-#FFFFCC" style="" > <?php
			include "connection.php";
			$user_id=$_SESSION['user_id'];
						
			$result=mysqli_query($connection,"select * from user,department where user.user_id='$user_id' AND user.department_id=department.department_id")or die(mysqli_error());
			$date=mysqli_query($connection,"SELECT curdate() as date");
			$row=mysqli_fetch_array($result);
			$d=mysqli_fetch_array($date);
			$Name=$row['fname'];
			$s=$row['sname'];
			$d=$row['department_name'];
	
echo '<label class="w3-left-align w3-large">Department:</label><label style="color:blue;" class="w3-large">'. $d.'</label><d  style="color:black;  margin-left:;" class=\'fa fa-user w3-right w3-large\'>'.'User:'.'	'.'<label style="color:green;" class="w3-large">'.$Name.'	'.$s.'</label></d>';

?>

</div>


  


<div id="content">
	<div id="columnA" class="w3-col s9 w3- w3-center">
	
  
	<?php
	$action=$_REQUEST['action'];

	if($action=='vstandard'){
		$result=mysqli_query($connection,"select * from user where username='$user_id' ");
		$row=mysqli_fetch_array($result);
			$dep=$row['user_id'];
				
		echo '<h3 style="margin-left:50px; margin-bottom:-10px;">Adopted Health Standards in Ministry of Health Malawi</h3>';
		
		$selects=mysqli_query($connection,"SELECT * FROM standard, user, criteria,department where standard.department_id=department.name AND user.department=standard.department_id AND standard.user_id='$dep' AND standard.standard_code=criteria.standard");
		 $rowscheck=mysqli_num_rows($selects);
		 if($rowscheck < 1){
		 echo 'No entry(s)';
		 
		 }else{
		 
			?>					<script language="javascript">
function caaictpms()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>HIMS </title>'); 
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png"  width="80px" height:"80px">MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> Health standard(s) in Ministry of Health</P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:1000px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
		<p class=""> <a href="javascript:caaictpms()" ><img src="../images/Print.png" width="30" height="30" /></a></p>
		
<div  id="print_content">
                           
		 <?php
			echo '<table style=" width:760px;" id="results" >';
			echo '<tr style="background:#0066FF; color:white"><th>Standard</th><th>Criteria Verification</th><th>Department applied</th><th>Area applied</th></tr>';
			$flag=0;
			while($fetch=mysqli_fetch_array($selects)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['standard_code'].'	<br><br><br>'.$fetch['description'].'</td><td>'.$fetch['number'].'	'.$fetch['criteria'].'</td><td>	'.$fetch['name'].'</td><td>	'.$fetch['area'].'</td></tr>';
			 $flag++;
			}
			echo '</table>';
			echo '</div>';
	
			
		}
		}
	
		

 else if($action=='workers'){
		
	?> 
		<h3 class="alert alert-info w3-center">Add departmental Staff members</h2>
		
	<form method="post">
	<table class=""  style="width:80%;">
  <tr>
    <td>Firstname</td>
   <td><input type="text" name="fname" class="form-control" required style=" width:100%;"/>  </td>
	</tr>

<tr>
    <td>Surname</td>
   <td><input type="text" name="sname" class="form-control" required style=" width:100%;" />  </td>
	</tr>
	
	<tr>
    <td>Duty</td>
    <td><input type="text" name="duty" class="form-control" required style=" width:100%;" /></td>
	</tr>
  </tr>
  <tr>
    <td>Job description</td>
    <td><textarea name="job_des" rows="3"  cols="3" class="form-control" style="  width:100%;" required ></textarea></td>
        </td>
	<tr>
	<td>Worker area</td>
	 <td><input type="text" name="work_area" class="form-control" style=" width:100%;" required  /></td>
	</tr>
	
  </tr>
   
  <tr>
    <td></td>
    <td><input type="submit" value="submit" name="go" style="width: 100%;" /></td>
  </tr>
  </table>
  </form>
	<a class="w3-hover-green w3-button w3-indigo w3-left" href="in-charge.php?action=view_worker" style =" color:white;background-color:yellow; width: 30%; margin-top: 3px;"> Staff Members</a>	
	<a class="w3-hover-green w3-button w3-indigo w3-center" href="in-charge.php?action=edit_worker" style =" color:white;background-color:yellow; width: 30%; margin-top: 3px;"> Edit Staff</a>	
		<?php 
		
		
		}
			
	if (isset($_POST['go'])) {
	
// get the posted data
$implcode = rand();
$fname = ( htmlspecialchars( $_POST['fname']));
$sname = ( htmlspecialchars( $_POST['sname']));
$duty = $_POST['duty'];
$job= $_POST['job_des'];
$locate=$_POST['work_area'];
//$remarks=$_POST['in-charge'];


$insert_info = mysqli_query($connection,"INSERT INTO worker VALUES( '$implcode','$fname', '$sname', '$duty', '$job', '$locate')");
	if($insert_info){
echo '<font color="green">Worker details successully stored</font> ';
echo '<meta content="2;" http-equiv="refresh" />';
}else {
echo mysqli_error();


}
 
		
		
		}else if($action=='dashb'){
		
	?> 
		
  <table cellspacing="10" width="100%" style="margin-left:; cellspacing:10px; float:center;">
<tr> 
	<td><a href="Budget.php"><button class="w3-hover-green"> <img src="../images/group.png" 	width="80" height="80"><br><center> Budget Report</center></button></a></td>

  	<td><a href="assessor_visits.php"><button class="w3-hover-pink"><img src="../images/assessor.jpeg"	width="80" height="80"><br> Manage Assesor</button></a></td>

  	<td><a href="follow_charge.php"><button class="w3-hover-red"><img src="../images/contact.png"	width="80" height="80"><br>Follow Up Report</button></a></td>

  	<td><a href="in-charge.php?action=planning"><button class="w3-hover-green"><img src="../images/user.png"	width="80" height="80"><br>Profile</button></a></td>
	</tr>
	</tr>

  	<td><a href="plan_report.php"><button class="w3-hover-black"><img src="../img/index.jpg"	width="80" height="80"><br>Committee Plan details</button></a></td>

  	<td><a href="assessment_rules_charge.php"><button class="w3-hover-yellow"><img src="../img/istock.jpg"	width="80" height="80"><br>Assessment Rules</button></a></td>

  	<td><a href="assessment_report.php"><button class="w3-hover-pink"><img src="../img/ass2.png"	width="80" height="80"><br>Assessment report</button></a></td>
  	<td><a href="standard_code.php"><button class="w3-hover-yellow"><img src="../img/bo.jpg"	width="80" height="80"><br>General Standard(s) </button></a></td>


  	</tr>
 
   
  </table>
 
		<?php
		
		}else if($action=='pmr'){
		
		
		
		header('.php');
		
		
		}else if($action==sop){
		
		echo'<h1>View department</h1>';
				 include('connection.php');
				    $sel=mysqli_query($connection,"SELECT * FROM  department");
					
					$rowscheck=mysqli_num_rows($sel);
		 if($rowscheck < 1){
		 echo 'the is No kk. click <a href="home.php?action=impstatus">here</a> to ';
		 
		 }else{
		 
		 
			?>					<script language="javascript">
function caaictpms()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Hospital Improvement monitoring system </title>'); 
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">hh</P><BR><P  align="center"> pano</P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<div  id="print_content">
                         <p class="pprint"> <a href="javascript:caaictpms()" ><img src="../images/Print.png" width="30" height="30" /></a></p><br/>
		  
		 <?php
			echo '<table style="" id="results" >';
			echo '<tr style="background:#0066FF; color:white"><th>Name</th><th>Function/Operation</th><th align=left>Description</th><th>Location</th><th>In-Charge</th><th>Edit</th></tr>';
			$flag=0;
			while($fetch=mysqli_fetch_array($sel)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['name'].'</td><td>'.$fetch['function'].'</td><td>'.$fetch['description'].'</td><td>'.$fetch['location'].'</td><td>'.$fetch['in-charge'].'</td><td>'.'</td><td><a href=modifystatus.php?id='.$fetch['department_id'].'><img src="../images/edit-icon.png" width=15 height=15 title=MODIFY_RECORD /></a></td><!---<td><a href=deletestatus.php?id='.$fetch['Proj_code'].'><img src="../images/deletee.ico" width="15" height="15" title=DELETE_RECORD /></a></td>---></tr>';
			  
			$flag=$flag+1;
			}
			echo '</table>';
			
						
				}?>
				</div>
		<?php 
		
		}else if($action=='edit_worker'){
		
		echo'<h3 class="alert-info alert">Modify Staff Member(s)</h3>';
				 include('connection.php');
				    $sel=mysqli_query($connection,"SELECT * FROM  worker");
					
					$rowscheck=mysqli_num_rows($sel);
		 if($rowscheck < 1){
		 echo 'the is No worker available. click <a href="in-charge.php?action=workers">here</a> to add staff';
		 
		 }else{
		 
		 
			?>					<script language="javascript">
function caaictpms()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title></title>'); 
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" width="80" height="80" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> Departmental staff details </P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<p class=""> <a class="w3-hover-red w3-button w3-right w3-black" href="javascript:caaictpms()" ><img src="../images/Print.png" width="30" height="30" style="width: 70%; background-color:yellow; " /></a></p> 
<div  id="print_content">
                         
		  
		 <?php
			echo '<table style=" width:780px;" id="" class="w3-table w3-table-all w3-center">';
			echo '<thead ><tr class="w3-khaki" style="background:; color:white"><th>Firstname</th><th>Surname</th><th align=left>Duty assigned</th><th>Job description</th><th>Work area</th><td>Update</td><td>Delete</td></tr></thead>';
			$flag=0;
			while($fetch=mysqli_fetch_array($sel)){
			if($flag%2==0)
			echo '<tr bgcolor=>';
			
	else 
echo '<tbody><tr bgcolor=white>';
echo '<td>'.$fetch['fname'].'</td>';
echo '<td>'.$fetch['sname'].'</td>';
echo '<td>'.$fetch['duty'].'</td>';
echo '<td>'.$fetch['job_des'].'</td>';
echo '<td>'.$fetch['work_area'].'</td>';

echo '<td><a class=" w3-hover-green w3-button w3-khaki" style="width:100%" href=modifystaff.php?worker_id='.$fetch['worker_id'].'><img src="../img/edit1.jpg" width="35" height="15"  />'.'</a>';
echo '<td><a class=" w3-hover-green w3-button w3-red" style="width:100%" href=deletestaff.php?worker_id='.$fetch['worker_id'].'><img src="../img/del1.jpg" width="35" height="20" title=DELETE_RECORD /></a></td></tr></tbody>';


			  
			$flag=$flag+1;
			}
			echo '</tr></tbody></table>';
			
						
				}?>
				</div>
		<?php 
		
		}else if($action=='view_worker'){
		
		echo'<h3 class="alert-info alert">Department Staff Member(s)</h3>';
				 include('connection.php');
				    $sel=mysqli_query($connection,"SELECT * FROM  worker");
					
					$rowscheck=mysqli_num_rows($sel);
		 if($rowscheck < 1){
		 echo 'the is No worker available. click <a href="in-charge.php?action=workers">here</a> to add staff';
		 
		 }else{
		 
		 
			?>					<script language="javascript">
function caaictpms()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title></title>'); 
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" width="80" height="80" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> Departmental staff details </P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<p class=""> <a class="w3-hover-red w3-button w3-right w3-black" href="javascript:caaictpms()" ><img src="../images/Print.png" width="30" height="30" style="width: 70%; background-color:yellow; " /></a></p> 
<div  id="print_content">
                         
		  
		 <?php
			echo '<table style=" width:780px;" id="" class="w3-table w3-table-all w3-center">';
			echo '<thead ><tr class="w3-khaki" style="background:; color:white"><th>Firstname</th><th>Surname</th><th align=left>Duty assigned</th><th>Job description</th><th>Work area</th></tr></thead>';
			$flag=0;
			while($fetch=mysqli_fetch_array($sel)){
			if($flag%2==0)
			echo '<tr bgcolor=>';
			
	else 
echo '<tbody><tr bgcolor=white>';
echo '<td>'.$fetch['fname'].'</td>';
echo '<td>'.$fetch['sname'].'</td>';
echo '<td>'.$fetch['duty'].'</td>';
echo '<td>'.$fetch['job_des'].'</td>';
echo '<td>'.$fetch['work_area'].'</td>';

			  
			$flag=$flag+1;
			}
			echo '</tr></tbody></table>';
			
						
				}?>
				</div>
		<?php 
		
		}else if($action=='facility'){
	$result = mysqli_query($connection,"SELECT Proj_code FROM General_information WHERE 1 AND Proj_code  NOT IN (SELECT Proj_code FROM Implementation_Status)   ");
	$rows=mysqli_num_rows($result);
	if($rows <1){
	echo 'no department details found. <a href="home.php?action=sop">view department</a>';
	}else{ 
	
	?>
		<h1>facility</h1>
	<form method="post">
	<table class="ptable" >
  <tr>
    <td>Name</td>
   <td><input type="text" name="name" required  />  </td>
	</tr>
	
	<tr>
    <td>Contacts</td>
    <td><input type="numbers" name="contact" required  /></td>
	</tr>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="email"  name="email"/></td>
        </tr>
	<tr>
	<td>Type</td>
	<td>
	<select name="type">
	<option>---------</option>
		<option>Central hospital</option>
		<option>District hospital</option>
		<option>health centre</option>
	</select>
	</td> 
	</tr>
	<tr>
    <td>Address</td>
    <td><textarea  name="address">   </textarea></td>
        </tr>
		<tr>
    <td>Region</td>
    <td>
	<select name="region_id">
		<option>-----------------------</option>
		<option>Southern</option>
		<option>Eastern</option>
		<option>Northern</option>
		<option>Central</option>
	</select>
		
		
		</td>
        </tr>
		
		<tr>
    <td>District</td>
    <td><select name="district_id">
		<option>--------------------------------------</option>
		<option>Balaka</option>
		<option>Ntcheu</option>
		<option>Mangochi</option>
		<option>Chiradzuro</option>
	</select>
	</td>
        </tr>
  <tr>
    
    <td><input type="submit" value="submit" name="sub"/></td>
  </tr>
  </table>
  </form>
		
		<?php 
		
		
		}
			
	if (isset($_POST['sub'])) {
	
// get the posted data
$facility = rand();
$facility_name = ( htmlspecialchars( $_POST['name']));
$contact = $_POST['contact'];
$email= $_POST['email'];
$address=$_POST['address'];
$type=$_POST['type'];
$region=$_POST['region_id'];
$district=$_POST['district_id'];

$insert_info = mysqli_query($connection,"INSERT INTO facility VALUES( '$facility','$facility_name', '$contact', '$email', '$address', '$type','$region','$district')");
	if($insert_info){
echo '<font color="green">facility successully stored</font> ';
echo '<meta content="2;home.php?action=sop" http-equiv="refresh" />';
}else {
echo mysqli_error();


}
 }
		
		
		}else if($action=='comp'){
				
		echo '<h1>Facility</h1>';
		
		$selects=mysqli_query($connection,"SELECT * FROM facility");
		 $rowscheck=mysqli_num_rows($selects);
		 if($rowscheck < 1){
		 echo 'No entry(s)';
		 
		 }else{
		 
			?>					<script language="javascript">
function caaictpms()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>HIMS </title>'); 
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> Completed improvement</P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<div  id="print_content">
                           <p class="pprint"> <a href="javascript:caaictpms()" ><img src="../images/Print.png" width="30" height="30" /></a></p><br/>
		
		 <?php
			echo '<table style="" id="results" >';
			echo '<tr style="background:#0066FF; color:white"><th>facility name</th><th>Contacts</th><th>Email</th><th>Type</th><th>Address</th></tr>';
			$flag=0;
			while($fetch=mysql_fetch_array($selects)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['name'].'</td><td>'.$fetch['contact'].'</td><td>'.$fetch['email'].'</td><td>'.$fetch['type'].'</td><td>'.$fetch['address'].'</td></tr>';
			 $flag++;
			}
			echo '</table>';
			echo '</div>';
	
			
		}
		}else if($action=='kk'){
		echo '<h1>running improvement</h1>';
		$selec=mysqli_query($connection,"SELECT * ");
		 
		 $rowscheck=mysql_num_rows($selec);
		 if($rowscheck < 1){
		 echo 'No running kaya(s)';
		 
		 }else{
		 ?>
		 		<script language="javascript">
function caaictp()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes"; 
  var content_vlue = document.getElementById("print_conte").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Hospital Improvement monitoring system </title>'); 
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">palibe improvement MONITORING SYSTEM</P><BR><P  align="center"> Running improvement</P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
		 <div  id="print_conte">
                          <a href="javascript:caaictp()"><img src="../images/Print.png" width="30" height="30" /></a><br/>
						  
	 
		 <?php
			echo '<table style="" id="results" >';
			echo '<tr style="background:#0066FF; color:white"><th>kaya  code</th><th>kaya name</th><th>Implementation code</th><th>Implementation startDate</th><th>endDate</th></tr>';
			$flag=0;
			while($fetch=mysqli_fetch_array($selec)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['Proj_code'].'</td><td>'.$fetch['Project_name'].'</td><td>'.$fetch['Impl_code'].'</td><td>'.$fetch['Impl_StartDate'].'</td><td>'.$fetch['Impl_EndDate'].'</td></tr>';
			 $flag++;
			}
			echo '</table>';

		
          echo '</div>';
	
			
		}
		}else if($action=='stp'){
		echo '<h1>stalled kaya</h1>';
		$sel=mysqli_query($connection,"SELECT * FROM Implementation_status, General_information
		 WHERE General_information.Proj_code=Implementation_status.Proj_code AND Proj_status='stalled'");
		 $rowscheck=mysqli_num_rows($sel);
		 if($rowscheck < 1){
		 echo 'No stalled kaya(s)';
		 
		 }else{
		 
		 ?>
		 		<script language="javascript">
function caaictp()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes"; 
  var content_vlue = document.getElementById("print_conte").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Hospital Improvement monitoring system </title>');
   docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" >MNISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> Stalled improvement</P>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
		 <div  id="print_conte">
		 <a href="javascript:caaictp()"><img src="../images/Print.png" width="30" height="30" /></a><br/>
   
						
		 <?php
			echo '<table style="" id="results" >';
			echo '<tr style="background:#0066FF; color:white"><th>kaya  code</th><th>kaya name</th><th>Implementation code</th><th>Implementation startDate</th><th>endDate</th></tr>';
			$flag=0;
			while($fetch=mysqli_fetch_array($sel)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['Proj_code'].'</td><td>'.$fetch[''].'</td><td>'.$fetch[''].'</td><td>'.$fetch[''].'</td><td>'.$fetch['Impl_EndDate'].'</td></tr>';
			 $flag++;
			}
			echo '</table>';
		
			 echo '</div>';
	
			
		}
		}else if($action=='jjj'){
		
		echo 'other notifications<br/>';
		$compdate=mysql1_query($connection,"SELECT *");
		$rowscheck=mysqli_num_rows($compdate);
		if($rowscheck <1){
		echo '<br/><font color=red>Not available </font>';
		}
		while($fetch=mysqli_fetch_array($compdate)){
			echo 'kaya <font color=red>['.$fetch['Project_name']. ']</font> with implementation code <font color=red> ['.$fetch['Impl_code']. '] </font>has passed its compeletion time <br/>';
			
			
			}
			echo '</table>';
		
		
		}else if($action=='password'){
		
		echo '<h1>Update Password</h1>';
		?>
						  
		 <?php	
	
			include "connection.php";
			$user_id=$_SESSION['user_id'];
			//$id=$_SESSION['name'];
			
		
	$id=$_REQUEST['user_id'];
	$out=mysqli_query( $connection,"SELECT * FROM user WHERE user_id='$id' ");
	$fetch=mysqli_fetch_array($out);

	?>
			
			<form>
				<table class="table">
					<tr>
						<td>New Password</td>
						<td><input type="text" class="form-control" name="password" value="<?php echo $row['password']?>" style="width: 200%;"></td>
					</tr>
					<tr>
						<td>Confirm Password</td>
						<td><input type="text" name="password1" value="<?php echo $row['password']?>" class="form-control" style="width: 200%;"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="pass" value="Update Pasword"></td>
					</tr>
				</table>
			</form>

<?php
if (isset($_POST['pass'])) {
	$user_id=trim($_REQUEST['user_id']);
	$password=trim($_REQUEST['password']);
	$password1=trim($_REQUEST['password1']);
	$password=md5($password);

	if ($password1==$password) {
		$data=mysqli_query($connection,"Update user set user_id='$user_id' password='$password'");

		echo "<script>alert('hello')</script>";

		header("location:in-charge.php?action=password");
	}

	else{
		mysqli_error("kkk");
	}
}



?>

		<?php
	}		
		
		else if($action=='planning'){
				 include('connection.php');
				 ?>
				  <script language="javascript">
function caaictpms()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>HIMS </title>'); 
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" width="80" height="80" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"></P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<p class=""> <a href="javascript:caaictpms()" ><button style="margin-bottom: -68%; height: 30px; width: 20%; border: none; color: white; margin-left: 20%;"  class="fa fa-print w3-xlarge w3-gray">Print</button> </a></p><br/>
<div  id="print_content">
                           
		
		 <?php	
	
			include "connection.php";
			$user_id=$_SESSION['user_id'];
			//$id=$_SESSION['name'];
			
			$result=mysqli_query( $connection,"select * from user,department where user.user_id='$user_id' AND user.department_id=department.department_id")or die(mysqli_error());
			$date=mysqli_query($connection,"SELECT curdate() as date");
			$row=mysqli_fetch_array($result);
			$d=mysqli_fetch_array($date);
			
echo '<h3 class="alert alert-info w3-text-black w3-xlarge" style="margin-top:-40px;">Profile Details</h3>';	
echo '<table class="w3-table w3-table-all " cell-padding="4px;" style="margin-left:%; width:100%;">';
echo '<tbody><tr><td>Firstname</td><td>'.$row['fname'].'</td></tr>';
echo '<tr><td>Surname</td><td>'.$row['sname'].'</td></tr>';
echo '<tr><td>Department</td><td>'.$row['department_name'].'</td></tr>';
echo '<tr><td>Area</td><td>'.$row['area'].'</td></tr>';
echo '<tr><td>Email</td><td>'.$row['email_address'].'</td></tr>';
echo '</tr></tbody></table></div>';


		}
?>	
	</div>
	
	<div id="columnB">
	<!---side bar slide --->
	<?php
			include "connection.php";
			$user_id=$_SESSION['user_id'];
				
			$result=mysqli_query($connection,"select * from user where user_id='$user_id'")or die(mysqli_error());
			$date=mysqli_query($connection,"SELECT curdate() as date");
			$row=mysqli_fetch_array($result);
			$d=mysqli_fetch_array($date);
			$Name=$row['name'];
			$role=$row['role'];
	
echo '<img src="../images/admin.png" style=""> logged in as [<font color="green" size="3"> '.$role.'</font>]';



?>
	
	
        <div class="row">

            <div class="col-lg-12">

                <div class="panel-group" id="accordion">
				<!--- test all--->
				
				<!--- stop--->
					 <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="w3-button w3-hover-green fa fa-dashboard" href="?action=dashb" style="width: 100%; font-size: 20px; text-align: left;">
                        Dashboard
                  </a>
                            </h4>
                        </div>
                        
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="w3-hover-green w3-button fa fa-sitemap" href="charge_standard_table.php" style="width: 100%; text-align: left; font-size: 20px;">
                        Department Standards
                  </a>
                            </h4>
                        </div>
                        
                    </div>
					
					
					 <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="w3-hover-green w3-button fa fa-user" href="?action=planning" style="width: 100%; font-size: 20px; text-align: left;">
                        Profile
                  </a>
                            </h4>
                        </div>
                        
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle w3-hover-green w3-button fa fa-envelope" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" style="width: 100%; font-size: 20px; text-align: left;">
                        VIEW REPORTS
                  </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
							<ol>
								
                                <li class="odd"><a href="assessment_report.php">assessment report</a></li>
							    <li class="even"><a href="standard_code.php">Standard  report</a></li>
					
								
 							</ol>
                            </div>
                        </div>
                    </div>
					
					
					
					
                     
                        
                    </div>
                    </div>

                </div>

            </div>

        
	
	
	
	<!--- side bar slide --->
	
	</div>
</div>
<div id="footer" class="w3-center" style="margin-top:  10%;">
<?php include '../footer.php';?>
</div>


<!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>
    <script src="../js/stopusers.js"></script>
<?php
if ($user->password == md5("0000")) {
	?>
	<!--Modal for default password-->
<div class="w3-modal" id="passwordModal" style="display: block;">
	<div class="w3-modal-content" style="width: 400px;">
		<div class="w3-padding bg-primary">
			Change password
		</div>
		<div class="w3-padding">
			<div class="alert alert-warning" id="error_reporting">It looks like you are using a default password. Change the Password</div>
			<br>
			<input type="password" name="" id="new_password" class="form-control w3-center" placeholder="New password" style="width: 370px;"><br>
			<p><input type="password" name="" id="old_password" class="form-control w3-center" placeholder="Confirm password" style="width: 370px;"></p><br>
			<button class="btn btn-primary" onclick="changePassword();">Update</button>
		</div>
	</div>
</div>
<?php
}
?>
</body>
<script type="text/javascript">
    	function changePassword() {
    		var new_password = $('#new_password').val();
    		var old_password = $('#old_password').val();

    		if (new_password == old_password) {
    			if (new_password.length < 6) {
    				$('#error_reporting').html("Password is too short!! Please use a longer one!!");
    				$('#error_reporting').css('background-color', '#ff9999');
    			}
    			else{
    				//send ajax
    				$.ajax({
    					url: "password.php",
    					method: "POST",
    					data: {password:new_password},
    					success: function(result){
    						$('#error_reporting').html("successfully updated password");
    						$('#passwordModal').fadeOut();
    					}
    				})
    			}
    		}
    		else{
    			$('#error_reporting').html("The two passwords didn't match");
    			$('#error_reporting').css('background-color', '#ff9999');
    		}
    		
    	}
    </script>
</html>

</body>
</html>
