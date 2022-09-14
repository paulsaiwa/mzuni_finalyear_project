<?php
if (!isset($_SESSION)) {
	session_start();
} 
include('connection.php');


if (isset($_SESSION['username'], $_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
	$username = $_SESSION['username'];
}
else{
	header("location: ../logout.php");
}

  ?>
<?// Saiwa , remember that this is duplicated page form admin page, edit it precisely?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>hims</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../css/default.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../tcal.css" />
<link rel="stylesheet" type="text/css" href="../font-awesome/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/css/style.css">


<script type="text/javascript" src="../tcal.js"></script> 
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/moodal.css" rel="stylesheet">
	<link href="../htmlDatepicker.css" rel="stylesheet" />
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
 

 #board{
 	background:#FFFFCC;
 	margin-right: 4px;
 	margin-bottom: 4px;
 	font-size: 20px;
 	text-align: right;
	height: 100px;
	padding-top: 5%;
	width: 250px;

	border-radius: 6px;
 }
 
 
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

label{
	font-size: 20px;
}
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
 </style>
</head>
<body>
<?php require 'assessor_header.php';?>

	 <div id="links" class="w3-bar  w3-large w3-hover" style="margin-top: 6px; border-top-style: solid; border-top-color: red; border-bottom-style: solid; border-bottom-color: red;">
  <a href="assessor.php?action=dashboard" class="w3-bar-item w3-button fa fa-home" style="margin-left: 4%; margin-right: 6%; font-size: 20px;">Home</a>    

<a href="assessor.php?action=facility" class="w3-bar-item w3-button fa fa-institution" style="margin-left: 4%; margin-right: 6%; font-size: 20px;">Facility</a>
  
<a href="" class="w3-bar-item w3-button fa fa-refresh" style="margin-left: 4%; margin-right: 6%; font-size: 20px;">Refresh</a>


<a href="assessor.php?action=profile" class="w3-bar-item w3-button fa fa-user w3-center" style="margin-left: 4%; margin-right: %; font-size: 20px; ">Profile</a>
  <a href="../logout.php" class="w3-bar-item w3-button w3-red fa fa-sign-out w3-right" style=" font-size: 20px;">Logout</a>
</div>

<div class="w3-bar"  > 
			<?php
			 include "connection.php";
			$user_id=$_SESSION['user_id'];
						
			$result=mysqli_query($connection,"select * from user,department where user.user_id='$user_id' AND user.department_id=department.department_id")or die(mysqli_error());
			$date=mysqli_query($connection,"SELECT curdate() as date");
			$row=mysqli_fetch_array($result);
			$d=mysqli_fetch_array($date);
			$fname=$row['fname'];
			$sname=$row['sname'];
			$d=$row['department_name'];
			$id=$row['department_id'];
	
echo '<label class="w3-center-align" style="margin-left:10%; fo">Department:</label><label style="color:blue;">'.'   '. $d.'</label><label style="color:black;  margin-left:; font-size:20px;" class=\'fa fa-user w3-right\'>'.'User:'.'	'.'<label style="color:green;">'.$fname.'	'.$sname.'</label></label>';

?>

</div>


<div id="content" class="w3-container">
	<div id="columnA" class="w3-col s9 w3- w3-center">
	
	<?php
	$action=$_REQUEST['action'];
	if($action=='dashboard'){
			?>	

			<div class="w3-row">
  <a href="ass_standard_table.php" >
  	<div id="board"  class="w3-col s4
  	 w3-center fa fa-medkit w3-hover-green" ><p>General Standards</p>
  </div></a> 

   <a href="assessor_assessment_details.php" >
  	<div id="board" class="w3-col s4  w3-center fa fa-envelope w3-hover-green" ><p >Manage Assessment </p>
  </div></a> 
  
   <a href="assessment_report.php" >
  	<div id="board" class="w3-col s4  w3-center fa fa-comments w3-hover-green" ><p >Assessment report</p>
  </div></a> 
  
   <a href="facilitator.php" >
  	<div id="board" class="w3-col s4 w3-center fa fa-group w3-hover-green" ><p >Facilitors</p>
  </div></a> 
  

</div>

			<div class="w3-row">
  <a href="budget_plan.php" >
  	<div id="board"  class="w3-col s4
  	 w3-center fa fa-info w3-hover-green" ><p>Plan Hospital Assessment Feedback</p>
  </div></a> 

   <a href="rules.php" >
  	<div id="board" class="w3-col s4  w3-center fa fa-hand-pointer-o w3-hover-green" ><p >Assessment Rules</p>
  </div></a> 
  
   <a href="followups_report.php" >
  	<div id="board" class="w3-col s4  w3-center fa fa-users w3-hover-green" ><p >Follow Up Report</p>
  </div></a> 
  
   <a href="Budget_only.php" >
  	<div id="board" class="w3-col s4 w3-center fa fa-user-md w3-hover-green" ><p >Department Budget Feedback</p>
  </div></a> 
  

</div>
	
		
<?php }
 if($action=='facility'){
				
		echo '<h3 class="alert alert-info w3-xlarge w3-text-black">Public Health facility under Assessment and Evaluation Session</h3>';
		
		$selects=mysqli_query( $connection,"SELECT * FROM facility, regions, districts WHERE facility.region_id=regions.region_id AND facility.district_id=districts.district_id");
		 $rowscheck=mysqli_num_rows($selects);
		 if($rowscheck < 1){
		 echo 'No entry(s)';
		 
		 }else{
		 
			?>					
		
		 <?php
			echo '<table class="w3-table w3-table-stripped w3-center" style="width:100%;"  >';
			echo '<thead class="w3-gray"><tr style=""><th>Name</th><th> Facility type</th><th>Region</th><th>District</th><th>Phone</th><th>Address</th><th>Email</th></tr></thead>';
			$flag=0;
			while($fetch=mysqli_fetch_array($selects)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tbody><tr bgcolor=white>';
echo '<td>'.$fetch['name'].'</td><td>'.$fetch['type'].'</td><td>'.$fetch['region_name'].'</td><td>'.$fetch['district_name'].'</td><td>'.$fetch['contact'].'</td><td>'.$fetch['address'].'</td><td>'.$fetch['email'].'</td></tr></tbody>';
			 $flag++;
			}
			echo '</table>';
			echo '';
	
			
		}
		}
	
		

 
	else if($action=='Facilitator'){
	$result = mysqli_query($connection,"SELECT * FROM user");
	$rows=mysqli_num_rows($result);
	if($rows <1){
	echo '<script>alert("Facilitator is already recorded in register facilitor table")</script>';
	}else{ 
	
	?>
		<h3 class="alert alert-info w3-text-black">Register Facilitator for Assessment Session at Departmental</h3>
	<form method="post">
	<table class="" >
  <tr>
    <td>Facilitator name</td>
   <td><select name="facilitator" class="form-control" required style="width: 250%;">
                <?php
                include 'connection.php';
						$sel=mysqli_query($connection,"SELECT *FROM user WHERE department_id='$id' AND role='In charge' ");
						echo '<option></option>';
						while($fetch=mysqli_fetch_array($sel)){
		               echo '<option value="'.$fetch['user_id'].'">'.$fetch['fname'].'		'.$fetch['sname'].'		' .$fetch['role'].'</option>';
			}
						?>
			</select> </td>
	</tr>
	
	
  <tr>
    <td></td>
    <td><input type="submit" value="Save" name="save" class="form-control w3-green w3-hover-teal fa fa-save w3-xlarge" /></td>
  </tr>
  </table>
  </form>
		
		<?php 
		
		
		}
			
	if (isset($_POST['save'])) {
	
// get the posted data
$implcode = rand();
$pcod = ( htmlspecialchars( $_POST['facilitator']));
$month = date("M");
$year= date("Y");
$day=date("D");
$assessor=$_SESSION['user_id'];



$insert_info = mysqli_query($connection,"INSERT INTO facilitator_monitors VALUES( '$implcode','$pcod', '$month', '$year', '$day', '$assessor')");
	if($insert_info){
echo '<font color="green">Facilitator details successully stored</font> ';
echo '<meta content="2;" http-equiv="refresh" />';
}else {
echo mysqli_error();


}
 }
		
		
		}else if($action=='pmr'){
		
		
		
		header('location:');
		
		
		}else if($action=='Recommended'){
		
		echo'<div class = "alert alert-info w3-center" style="margin-top: 3%;">Standard(s) details</div>
				';
				 //include('connection.php');
				    $sel=mysqli_query( $connection,"SELECT * FROM logs,user,department WHERE logs.user_id=user.user_id AND logs.user_id='$user_id' AND department.department_id=user.department_id ");
					
					$rowscheck=mysqli_num_rows($sel);
		 if($rowscheck < 1){
		 echo 'the is No details available';
		 
		 }else{
		 
		 
			?>					
		  
		 <?php
			echo '<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table" class = "table table-bordered" style="">';
			echo '<tr><th>Registered Fullname</th><th>department name</th><th>System Visit Times</th></tr>';
			$flag=0;
			while($fetch=mysqli_fetch_array($sel)){
			if($flag%2==0)
			echo '<tr>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['name'].'</td><td>'.$fetch['department_name'].'</td><td>'.date("d D Y,H:S m",$fetch['times']).'</td><td>'.'</tr>';
			  
			$flag=$flag+1;
			}
			echo '</table></div></div>';
			
						
				}?>
				
		<?php 
		
		}else if($action=='facility'){
	$result = mysqli_query($connection,"SELECT * )   ");
	$rows=mysqli_num_rows($result);
	if($rows <1){
	echo 'no department details found. <a href="assessor.php?action=sop"></a>';
	}else{ 
	
	?>
		
        
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
		
		
		}else if($action=='viewstandard'){
	
			
		echo '<h3 style="margin-left:50px;">standard details</h3>';
		
		$selects=mysqli_query($connection,"SELECT * FROM standard ORDER by standard_code");
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
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="images/health.png" width="80" height:"80" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center">standard(s) details</P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<p class=""> <a href="javascript:caaictpms()" ><img src="images/Print.png" width="30" height="30" /></a></p><br/>
<div  id="print_content">
                           
		
		 <?php
			echo '<table style=" width:80%;" id="results" >';
			echo '<tr style="background:#0066FF; color:white"><th>Standard code</th><th>Description</th><th>Criteria</th><th>departments</th></tr>';
			$flag=0;
			while($fetch=mysqli_fetch_array($selects)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['standard_code'].'</td><td>'.$fetch['description'].'</td><td>'.$fetch['verify_criteria'].'</td><td>'.$fetch['department_id'].'</td></tr>';
			 $flag++;
			}
			echo '</table>';
			echo '</div>';
	
			
		}
		}else if($action=='profile'){
		
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
<p class=""> <a href="javascript:caaictpms()" ><button style="margin-bottom: -60%; height: 30px; width: 40%; border: none; color: white" class="fa fa-print w3-xlarge w3-gray">Print</button> </a></p><br/>
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
echo '<table class="w3-table w3-table-stripped" cell-padding="4px;" style="margin-left:24%;">';
echo '<tbody><tr><td>Firstname</td><td>'.$row['fname'].'</td></tr>';
echo '<tr><td>Surname</td><td>'.$row['sname'].'</td></tr>';
echo '<tr><td>Department</td><td>'.$row['department_name'].'</td></tr>';
echo '<tr><td>Area</td><td>'.$row['area'].'</td></tr>';
echo '<tr><td>Email</td><td>'.$row['email_address'].'</td></tr>';
echo '</tr></tbody></table></div>';


		}
		else if($action=='comp'){
				
		echo '<h1>Assessment Details Report</h1>';
			
		
		$selects=mysqli_query( $connection,"SELECT * FROM `assessment_details`,`standard`, `department` where assessment_details.standard_code=standard.standard_code AND department.department_id=standard.department_id AND standard.department_id='$id'");
		 $rowscheck=mysqli_num_rows($selects);
		 
		 
			?>					<script language="javascript">
function caaictpms()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>HIMS </title>'); 
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" width="80" height="80" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> Assessment Details Report</P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<p class=""> <a href="javascript:caaictpms()" class="fa fa-print w3-button w3-text-black w3-xlarge w3-right" >Print</a></p><br/>

<div  id="print_content">
                           

		  <?php
		  $user_id=$_SESSION['user_id'];
			//$id=$_SESSION['name'];
			
			$result=mysqli_query( $connection,"select * from user,department where user.user_id='$user_id' AND user.department_id=department.department_id")or die(mysqli_error());
				//retrieving facilitators under assessment start
			$facilitator=mysqli_query( $connection,"select * from facilitator_monitors, user where facilitator_monitors.facilitator=user.user_id AND user.department_id='$id'")or die(mysqli_error());
			$fa=mysqli_fetch_array($facilitator);
				//end facilitator
			$date=mysqli_query($connection,"SELECT curdate() as date");
			$row=mysqli_fetch_array($result);
			$d=mysqli_fetch_array($date);


			echo "<table style=\"margin-left:2%;\" class='table-bordered w3-table w3-center'><tr><td><b>Assessor Fullname:</b>"."	".$row['fname']."	".$row['sname'].'</td></tr><tr><td>';
			echo "<b>Department Assessed:</b>".'	'.$row['department_name'].'</td></tr>';
			echo"<tr><td><b> Date:</b>".(date("D M Y h:sa")).'</td></tr>';
			echo '<tr><td><b>Head Facilitator:</b>'.$fa['fname'].'	'.$fa['sname'].'</td></tr>';
			$rand=rand();
			echo "<tr><td><b>Report Number</b>".'  '.$rand.'</td></tr></table>';
			
				echo "<h3 class=\"w3-text-black w3-xlarge w3-center\">Assessment Details</h3>";
		  echo '<table id="" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                
                                                <th style="width: 25%;">Standard</th>
                                                <th style="width: 40%;"> Criteria</th>
                                                <th style="width:25%;">Observation</th>
                                                <th style="width: 70%;">Comment</th>
                                                 <th>Month</th>
                                                <th>Year</th>
                                              
                                               
                                                
                                            </tr>
                                        </thead>
                                       
                                        <tbody>  
                                        	';?>
                                            <?php
                                include '../connection.php';
                                
                                    $s_query = $conn->query("SELECT * FROM `assessment_details`,`standard`, `department` where assessment_details.standard_code=standard.standard_code AND department.department_id=standard.department_id AND standard.department_id='$id'") or die(mysqli_error());
                                    while($s_fetch = $s_query->fetch_array()){  
                                ?>
                                <tr>
                                   
                                    <td><?php echo $s_fetch['standard_code']?></td>
                                    <td style="width: 120px;"><?php echo $s_fetch['do']?></td>
                                    <td style="width:;"><?php echo $s_fetch['level_achieved']?></td>
                                    <td><?php echo $s_fetch['comment']?></td>
                                    <td><?php echo $s_fetch['month']?></td>
                                    <td><?php echo $s_fetch['year']?></td>                                            
                                                    
                                     </tr>
                                <?php
                                    }
                                
                         echo '</tbody>
                                    </table></div>';
	
			
		}

		else if($action=='follow'){
				
		echo '<h1>Asssessment Follow up Details Report</h1>';
			
		
		$selects=mysqli_query( $connection,"SELECT * FROM `assessment_details`,`standard`, `department` where assessment_details.standard_code=standard.standard_code AND department.department_id=standard.department_id AND standard.department_id='$id'");
		 $rowscheck=mysqli_num_rows($selects);
		 
		 
			?>					<script language="javascript">
function caaictpms()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>HIMS </title>'); 
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" width="80" height="80" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> Department Assessment Follow up Details Report</P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<p class=""> <a href="javascript:caaictpms()" class="fa fa-print w3-button w3-text-black w3-xlarge w3-right" >Print</a></p><br/>

<div  id="print_content">
                           

		  <?php
		  $user_id=$_SESSION['user_id'];
			//$id=$_SESSION['name'];
			
			$result=mysqli_query( $connection,"select * from user,department where user.user_id='$user_id' AND user.department_id=department.department_id")or die(mysqli_error());
				//retrieving facilitators under assessment start
			$facilitator=mysqli_query( $connection,"select * from facilitator_monitors, user where facilitator_monitors.facilitator=user.user_id AND user.department_id='$id'")or die(mysqli_error());
			$fa=mysqli_fetch_array($facilitator);
				//end facilitator
			$date=mysqli_query($connection,"SELECT curdate() as date");
			$row=mysqli_fetch_array($result);
			$d=mysqli_fetch_array($date);


			echo "<table style=\"margin-left:2%;\" class='table-bordered w3-table w3-center'><tr><td><b>Assessor Fullname:</b>"."	".$row['fname']."	".$row['sname'].'</td></tr><tr><td>';
			echo "<b>Department Assessed:</b>".'	'.$row['department_name'].'</td></tr>';
			echo"<tr><td><b> Date:</b>".(date("D M Y h:sa")).'</td></tr>';
			echo '<tr><td><b>Head Facilitator:</b>'.$fa['fname'].'	'.$fa['sname'].'</td></tr>';
			$rand=rand();
			echo "<tr><td><b>Report Number</b>".'  '.$rand.'</td></tr></table>';
			
				echo "<h3 class=\"w3-text-black w3-xlarge w3-center\">Departmental Assessment Follow up  Details</h3>";
		  echo '<div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                       
                                        <thead>
                                            <tr>
                                                
                                                <th>Standard</th>
                                                <th style="">Recommendation(Assessor)</th>
                                                <th >Management</th>
                                                <th>Follow up Comment</th>
                                                <th>Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               
                                                <th>Standard</th>
                                                <th style="">Recommendation(Assessor)</th>
                                                <th >Management</th>
                                                <th>Follow up Comment</th>
                                                <th>Date</th>
                                                
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>';?>
                                        <?php
                                          
                                             include '../connection.php';
  $s_query = $conn->query("SELECT * FROM `assessor_followups` ,`standard` where standard.standard_code=assessor_followups.standard_code AND standard.department_id='$id'") or die(mysqli_error());
                  while($s_fetch = $s_query->fetch_array()){  
                ?>
                <tr>
                  <td><?php echo $s_fetch['standard_code']?></td>
                  <td><?php echo $s_fetch['recommend']?></td>
                  <td><?php echo $s_fetch['plan']?></td>
                  <td><?php echo $s_fetch['follow_comment']?></td>
                  <td><?php echo date("D M Y H:sa",$s_fetch['time_follow'])?></td>
                  
                                                
                  
                </tr>
                </tbody>
                            
                                  
	
                <?php
                  }
                echo'  </table></div></div>';
                            
			
		}
		else if($action=='runp'){
		echo '<h1>running </h1>';
		$selec=mysqli_query($connection,"SELECT * ");
		 
		 $rowscheck=mysqli_num_rows($selec);
		 if($rowscheck < 1){
		 echo 'No running assessment(s)';
		 
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
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="images/health.png" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">ICT PROJECTS MONITORING SYSTEM</P><BR><P  align="center"> Running Projects</P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
		 <div  id="print_conte">
                          <a href="javascript:caaictp()"><img src="images/Print.png" width="30" height="30" /></a><br/>
						  
	 
		 <?php
			echo '<table style="" id="results" >';
			echo '<tr style="background:#0066FF; color:white"><th></th><th> name</th><th> code</th><th></th><th>endDate</th></tr>';
			$flag=0;
			while($fetch=mysqli_fetch_array($selec)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['code'].'</td><td>'.$fetch['Project_name'].'</td><td>'.$fetch[''].'</td><td>'.$fetch[''].'</td><td>'.$fetch[''].'</td></tr>';
			 $flag++;
			}
			echo '</table>';

		
          echo '</div>';
	
			
		}
		}else if($action=='stp'){
		echo '<h1></h1>';
		$sel=mysqli_query($connection,"SELECT * '");
		 $rowscheck=mysqli_num_rows($sel);
		 if($rowscheck < 1){
		 echo 'No )';
		 
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
   docprint.document.write('<p align="center"> <FONT size="+3"><img src="images/health.png" >MNISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> Stalled Projects</P>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
		 <div  id="print_conte">
		 <a href="javascript:caaictp()"><img src="images/Print.png" width="30" height="30" /></a><br/>
   
						
		 <?php
			echo '<table style="" id="results" >';
			echo '<tr style="background:#0066FF; color:white"><th></th><th> name</th><th></th><th>Implementation startDate</th><th>endDate</th></tr>';
			$flag=0;
			while($fetch=mysqli_fetch_array($sel)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch[''].'</td><td>'.$fetch[''].'</td><td>'.$fetch[''].'</td><td>'.$fetch['Impl_StartDate'].'</td><td>'.$fetch['Impl_EndDate'].'</td></tr>';
			 $flag++;
			}
			echo '</table>';
		
			 echo '</div>';
	
			
		}
		}else if($action=='notes'){
		
		echo 'other notifications<br/>';
		$compdate=mysqli_query($connection,"SELECT * ");
		
		$rowscheck=mysqli_num_rows($compdate);
		if($rowscheck <1){
		echo '<br/><font color=red>Not available </font>';
		}
		while($fetch=mysqli_fetch_array($compdate)){
			echo 'Project <font color=red>['.$fetch['Project_name']. ']</font> with implementation code <font color=red> ['.$fetch['Impl_code']. '] </font>has passed its compeletion time <br/>';
			
			
			}
			echo '</table>';
		
		
		}else if($action=='term'){
		
		echo '<h1>Terminated projects</h1>';
		$sel=mysqli_query($connection,"SELECT * FROM ''");
		 $rowscheck=mysqli_num_rows($sel);
		 if($rowscheck < 1){
		 echo '(s)';
		 
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
   docprint.document.write('<html><head><title>Hospital IMPROVEMENT monitoring system </title>'); 
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="images/health.png" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">ICT PROJECTS MONITORING SYSTEM</P><BR><P  align="center"> Terminated Projects</P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
		 <div  id="print_conte">
                          <a href="javascript:caaictp()"><img src="../Print.png" width="30" height="30" /></a><br/>
						  
		 <?php
			echo '<table style="" id="results" >';
			echo '<tr style="background:#0066FF; color:white"><th>Project  code</th><th>Project name</th><th>Implementation code</th><th>Implementation startDate</th><th>endDate</th></tr>';
			$flag=0;
			while($fetch=mysqli_fetch_array($sel)){
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
		}else if($action==''){
		echo'<h1></h1>';
				 include('connection.php');
				    $sel=mysqli_query($connection,"SELECT * FROM  ");
					
					$rowscheck=mysqli_num_rows($sel);
		 if($rowscheck < 1){
		 echo '';
		 
		 }else{
		 
		 
			?>					<script language="javascript">
function caaictpms()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>HOSPITAL IMPROVEMENT monitoring system </title>'); 
   docprint.document.write('<p align="center"> <FONT size="+3"><img src="images/health.png" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">ICT PROJECTS MONITORING SYSTEM</P><BR><P  align="center"> Projects Status back up information</P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<div  id="print_content">
                           <p class="pprint"> <a href="javascript:caaictpms()" ><img src="images/Print.png" width="30" height="30" /></a></p><br/>
		 
		 <?php
			echo '<table style="" id="results">';
			echo '<tr style="background:#0066FF; color:white"><th>Project Name</th><th>Implementation code</th><th align=left>implementation status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			</th><th>project status</th><th>remarks</th><th>action required</th><th>Date modified</th></tr>';
			$flag=0;
			while($fetch=mysqli_fetch_array($sel)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['Project_name'].'</td><td>'.$fetch['Impl_code'].'</td><td>'.$fetch['Impl_status'].'</td><td>'.$fetch['Proj_status'].'</td><td>'.$fetch['Remarks'].'</td><td>'.$fetch['Action_required'].'</td><td>'.$fetch['update_date'].'</td></tr>';
			  
			$flag=$flag+1;
			}
			echo '</table>';
			
						
				}?>
				</div>
		<?php 
		}
		
		?>		
	</div>
	
	<div id="columnB" class="w3-col s3 w3- w3-center">
	<!---side bar slide --->
	
		<?php
			include "connection.php";
			$user_id=$_SESSION['user_id'];
						
			$result=mysqli_query($connection,"select * from user where user_id='$user_id'")or die(mysqli_error());
			$date=mysqli_query($connection,"SELECT curdate() as date");
			$row=mysqli_fetch_array($result);
			$d=mysqli_fetch_array($date);
			$Name=$row['fname'];
			$role=$row['role'];
	
echo '<img src="../images/admin.png" style=""> logged in as [<font color="green" size="3"> '.$role.'</font>]';



?>
	
        <div class="row" >

            <div class="col-lg-12">

                <div class="panel-group" id="accordion">
				<!--- test all--->
				
				<!--- stop--->
				 <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="w3-button w3-hover-green fa fa-dashboard" href="?action=dashboard" style="width: 100%; font-size: 20px; text-align: left;">
                        Dashboard
                  </a>
                            </h4>
                        </div>
                        
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="w3-hover-green w3-button fa fa-medkit" href="standard_assessor_table.php" style="width: 100%;font-size: 20px; text-align: left;">
                        Department Standards
                  </a>
                            </h4>
                        </div>
		

                     <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="w3-hover-green w3-button fa fa-user-md" href="?action=Facilitator" style="width: 100%;font-size: 20px; text-align: left;">
                        Manage Facilitator
                  </a>
                            </h4>
                        </div>
                        
                    </div>
					
					 <div class="panel panel-default">
                    
					 
					 <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="w3-hover-green w3-button fa fa-edit" href="ass_search_stand.php" style="width: 100%;font-size: 20px; text-align: left;">
                        Assessment
                  </a>
                            </h4>
                        </div>


					 <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="w3-hover-green w3-button fa fa-edit" href="Follow-up.php" style="width: 100%;font-size: 20px; text-align: left;">
                        Manage Follow-up
                  </a>
                            </h4>
                        </div>
                        
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle w3-hover-green w3-button fa fa-envelope-o" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" style="width: 100%; font-size: 20px; text-align: left;">
                        View Report
                  </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
							<ol>
								
                                <li class="odd"><a href="standard_assessor_table.php">standard monitoring report</a></li>
							    <li class="even"><a href="assessor.php?action=comp">Generate Assessment Report</a></li>
								<li class="odd"><a href="assessor.php?action=follow">Generate Follow ups report</a></li>
								
								
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
<?php
$user_id = $_SESSION['user_id'];
require '../connect.php';
$df = $db->query("SELECT * FROM user WHERE user_id = '$user_id'");
if (!$df) {
	echo $db->error;
}
$data = $df->fetch_assoc();
if ($data['password'] == md5("0000")) {
	?>
<!--Modal for default password-->
<div class="w3-modal" id="passwordModal" style="display: block;">
	<div class="w3-modal-content" style="width: 400px;">
		<div class="w3-padding bg-primary">
			Change password
		</div>
		<div class="w3-padding">
			<div class="alert alert-warning" id="error_reporting">It looks like you are using a default password. Please go change password to access and use the system</div>
			<br>
			<input type="text" name="" id="new_password" class="form-control" placeholder="New password" style="width: 370px;"><br>
			<p><input type="password" name="" id="old_password" class="form-control" placeholder="Confirm password" style="width: 370px;"></p><br>
			<button class="btn btn-primary" onclick="changePassword();">Update</button>
		</div>
	</div>
</div>
<?php
}
?>
<div id="footer" class="w3-center">
	<?php include '../footer.php';?>
</div>


<!-- JavaScript -->

    <script src="../js/jquery-1.10.2.js"></script>
	<script src="../js/stopusers.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>
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
</body>
</html>
<script src = "../js/js/jquery-3.1.1.js"></script>
<script src = "../js/js/sidebar.js"></script>
<script src = "../js/js/bootstrap.js"></script>
<script src = "../js/js/jquery.dataTables.min.js"></script>
<script src = "../js/js/script.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	});
</script>