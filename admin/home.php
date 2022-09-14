<?php error_reporting('E_NOTICE') ?>
<?php 
include('connection.php');

if (!isset($_SESSION)) {
	session_start();
}
if (isset($_SESSION['username'], $_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
	$username = $_SESSION['username'];
}
else{
	header("location: ../logout.php");
}

  ?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/style.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/jquery.dataTables.css" />

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>hims</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../css/default.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../tcal.css" />
<script type="text/javascript" src="../tcal.js"></script> 
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../font-awesome/font-awesome/css/font-awesome.min.css">
     <link href="../css/moodal.css" rel="stylesheet">
      <link href="css/.css" rel="stylesheet">
      <link rel="stylesheet" href="../4/w3.css">
	<link href="../date/htmlDatepicker.css" rel="stylesheet" />
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
xmlhttp.open("GET",".php?q="+str,true);
xmlhttp.send();
}
</script>

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

button{
	font-size: 20px;
}
h4,button,a,{
	font-size: 20px;
}
/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
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
.dropdown-content a:hover {background-color:;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: ;} 

button{background-color:#FFFFCC; margin-left:; float:center; width:100%; height:100%;} 
select{width: 100%; height: 40px;}

textarea{width:100%;}
input [type=numbers]{width: 100%; height: 40px;}

input[type=text] ,input[type=email], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    height: 
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

 {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

form-control[type=text]{widows: 80%;}
</style>
 
</head>
<body class="w3-cont" >
<div id= "wrapper" >
<?php include 'admin_header.php';?>

  

<div id="content" class="w3-container">
	<div id="columnA" class="w3-col s9 w3--grey w3-center">
		<div class="w3-bar w3-black" style="width: 100%;">
		  
		 
</div>
	
  <?php
	$action=$_REQUEST['action'];
	if($action=='dash'){
	 ?>

  <table cellspacing="10" width="100%" style="margin-left:; cellspacing:10px; float:center;">
<tr> 
	<td><a href="user_profile1.php"><button class="w3-hover-green"> <img src="../images/admin_2.png" 	width="80" height="80"><br><center>user Profile
		<?php /*

  $query = mysqli_query($connection,"select count(user_id) as total from user");
  $result = mysqli_fetch_array($query);
  echo '<label style="color:red;">('. $result['total'].')</label>';*/?></center>
  </button></a></td>

  	<td><a href="home.php?action=department"><button class="w3-hover-pink"><img src="../images/staff.jpeg"	width="80" height="80"><br>Register Department</button></a></td>

  	<td><a href="department_assessment_rules.php"><button class="w3-hover-red "><img src="../img/ass5.jpg" width="80" height="80"><br>Assessment Rules</button></a></td>

  	<td><a href="follow_assessor.php"><button class="w3-hover-green"><img src="../img/visit2.png" class="fa fa-user" 	width="80" height="80"><br>Assessor Follow up report</button></a></td>
	</tr>
	</tr>

  	<td><a href="manage_plan.php"><button class="w3-hover-black"><img src="../img/plan1.png"	width="80" height="80"><br>Manage Plan</button></a></td>

  	<td><a href="department_assessment_results1.php"><button class="w3-hover-pink"><img src="../img/istock.jpg"	width="80" height="80"><br>Manage Assessment</button></a></td>

  	<td><a href="standard.php"><button class="w3-hover-yellow"><img src="../img/sta.jpg"	width="80" height="80"><br>General Standard(s)</button></a></td>

  	<td><a href="budget_plan_report.php"><button class="w3-hover-yellow"><img src="../images/group.png"	width="80" height="80"><br>Plan,Budget report</button></a></td>


  	</tr>
 
   
  </table>
  <?php }
  
  // section that manages standards 
  // start of standard block
	else if($action=='pdetails'){
		
	 ?>
	
		<h3 style ="" class="alert alert-info w3-center">Register Standard</h3>


		<form method="post" >
	<table class="ptable" style="border-radius:4px;">
  <tr>
    <td>Standard code</td>
    <td><input type="text" name="standard_code" class="form-control"  autocomplete="off" required  style=" "/></td>
      </tr>
 
  <tr>
    <td>Department</td>
    <td><select name="department_id" class="form-control" required style="width: 100%;">
                <?php
                include 'connection.php';
						$sel=mysqli_query($connection,"SELECT *FROM department ");
						echo '<option>--select department ID--</option>';
						while($fetch=mysqli_fetch_array($sel)){
		               echo '<option value="'.$fetch['department_id'].'">'.$fetch['department_id'].'		'.$fetch['department_name'].'	'.$fetch['area'].' 		'.$fetch['standard_code'].'</option>';
			}
						?>
			</select></td>
  </tr>
  
   <tr>
		 <td>Description</td>
    <td><textarea name="description" required style=" " autocomplete="off"> </textarea></td>
  </tr>

  
  <tr>
   	<td></td>
    <td><input type="submit" value="submit" name="submit" style="width:55%;"/></td>

  </tr>
  
</table>

		</form>
		

	<?php	

	
	if (isset($_POST['submit'])) {

		$user_id=$_SESSION['user_id'];
	
// get the posted data
 $scode =trim($_POST['standard_code']);
 $sname = trim($_POST['description']);
 $manager = trim($_POST['department_id']);
 $initdate = date("F d, Y");
 

$checkpcode=mysqli_query($connection,"SELECT * FROM standard where standard_code='$scode'");
  $outpcode=mysqli_fetch_array($checkpcode);
   $rowpcode=mysqli_num_rows($checkpcode);
 if($rowpcode > 0 ){
 echo '<font color=red size=-1>standard code exists. please chose different standard code.</font><br/>';

 }
else if( $scode=="")
{
 echo '<font color=red size=-1>standard code, name can\' t be empty, please fill all the fields. </font><br/>';

}else{


$insert_data = mysqli_query($connection,"INSERT INTO standard VALUES( '$scode', '$sname', '$manager','$initdate','$user_id')");
if($insert_data){
echo '<font color="green">standard details successully stored</font> ';
echo '<meta content="2," http-equiv="refresh" />';

	
}else {
echo mysqli_error();
}
}
 }// end of standard  block



	}
	// start of search code, it is no working as for now
	else if($action=='search'){
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
echo '<table class="w3-table" cell-padding="4px;" style="margin-left:24%;">';
echo '<tbody><tr><td>Firstname</td><td>'.$row['fname'].'</td></tr>';
echo '<tr><td>Surname</td><td>'.$row['sname'].'</td></tr>';
echo '<tr><td>Department</td><td>'.$row['department_name'].'</td></tr>';
echo '<tr><td>Area</td><td>'.$row['area'].'</td></tr>';
echo '<tr><td>Email</td><td>'.$row['email_address'].'</td></tr>';
echo '</tr></tbody></table></div>';


				
	 ?>


   




	<?php
// start of block, not functioning
	}else if($action=='department'){
	
	
	?> <p style="width: 40%;"><a href="home.php?action=editdepartment"><button class="w3-teal w3-button w3-center w3-btn">Modify Department</button></a></p>
	 <p class=" w3-sand" style="margin-left: 60%; background-color: blue; color: white; margin-bottom: -6px; margin-top: -40px">View Department ID</p>
	<select name="name" required  class="form-control" style="width: 40%; margin-left: 60%; border-color: red" >
		<option>-----View department ID-----</option> 
		<option>CSM-----Practise Setting Casualty, Surgical & Medical Wards</option>>
		<option>FANC-----Focused Antenatal Care</option> 
		<option>NLD------Normal Labour and Delivery</option>
		<option>MCLD-----Management of Complications during Labour and Delivery</option> 
		
			<option>-----Postnatal Care for the Mother and Neonate</option> 
			<option>FPS-----Familily planning Starting a Contraceptive Method</option> 
			<option>FPFU-----Family Planning Follow Up Visit</option> 
			<option>PAC-----Post-Abortion Care</option> 
				
				<option>CC-----Cervical Cancer</option> 
				<option>STI-----STI Syndromic Management Approach</option> 
				<option>SS-----Support Systems</option>
				<option>IEC-----IEC and Community Participation</option> 
				<option>None-----Administration</option>
		</select>
		 </td>
	</tr>
		<h1 class="w3-center alert-info alert">Register Department</h1>
	<form method="post" height="100%">
	<table class="" >
  <tr>
    <td>Name</td>
	<td><select name="department_name" required  class="form-control" >
		<option></option> 
		<option>Practise Setting Casualty, Surgical & Medical Wards</option>
		<option>Focused Antenatal Care</option> 
		<option>Normal Labour and Delivery</option>
		<option>Management of Complications during Labour and Delivery</option> 
		
			<option>Postnatal Care for the Mother and Neonate</option> 
			<option>Familily planning Starting a Contraceptive Method</option> 
			<option>Familily Planning Follow Up Visit</option> 
			<option>Post-Abortion Care</option> 
				
				<option>Cervical Cancer</option> 
				<option>STI Syndromic Management Approach</option> 
				<option>Support Systems</option>
				<option>IEC and Community Participation</option> 
				<option>Administration</option>
		</select>
		 </td>
	</tr>
	  <tr>
    <td>Depatment ID</td>
	<td><select name="department_id" required  class="form-control" >
		<option></option> 
		<option>CSM</option> 
		<option>NLD</option>
		<option>FANC</option> 
		
			<option>STI</option> 
			<option>PAC</option> 
			<option>MCLD</option> 
			<option>IEC</option> 
				
				<option>CC</option> 
				<option>SS</option> 
				<option>FPS</option>
				<option>FPFU</option> 
				<option>None</option>
		</select>
		 </td>
	</tr>
	
			<tr>
			<td>Area Number</td>
	<td><select name="area" required class="form-control">
			
	<option></option>
	<option>Area 1</option>
	<option>Area 2</option>
	<option>Area 3</option>
			<option>Area 4</option>
			<option>Area 5</option>
			<option>Area 6</option>
			<option>Area 7</option>
						<option>Area 8</option>
						<option>Area 9</option>
						<option>Area 10</option>
						<option>Area 11</option>
	<option>none</option>
	</select></td></tr>
	
    <tr>
    <td></td>
    <td><input type="submit" value="submit" name="sub" class="form-control" style="width:100%; margin-top:-5px;"/></td>
  </tr>
  </table >
  </form>
  
  
		
		<?php 
		
		
		}
			
	if (isset($_POST['sub'])) {
	include 'connection.php';
// get the posted data
$implcode = $_POST['department_id'];
$pcod = ( htmlspecialchars( $_POST['department_name']));
//$implcode = $_POST['department'];
$impstatus= $_POST['area'];
//$remarks=$_POST['in-charge'];


$insert_info = mysqli_query($connection,"INSERT INTO department VALUES( '$implcode','$pcod', '$impstatus')");
	if($insert_info){
echo '<font color="green">department successully stored</font> ';
echo '<meta content="2;" http-equiv="refresh" />';
}else {
echo '';


}

 }

		
		
		        
                            
		// print out details of department connected its standard, open block
				else if($action==vdepartment){
	
		echo'<h3 style="margin-top:-4px; margin-bottom:-3px;">Departments Details</h3>';
				 include('connection.php');
				    $sel=mysql_query("SELECT * FROM  department ORDER by area");
					
					$rowscheck=mysql_num_rows($sel);
		 if($rowscheck < 1){
		 echo 'the is No department details <a href="home.php?action=department">here</a> to register';
		 
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
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" width="80" height="80">MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> Department Names available</P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
 <p class="pprint"> <a href="javascript:caaictpms()" style="margin-top: -30px;" ><img src="../images/Print.png" width="35" height="20"  margin-left="-200"/></a></p><br/>
		  
<div  id="print_content">
                         
		 <?php
			echo '<table style=" width:100%;" id="results"  class="w3-table w3-table-all w3-justify">';
			echo '<thead style="margin-left:10%;"><tr style=" color:red" class="w3-teal"><th>Department ID</th><th>Name</th><th align=>Area Number</th></tr></thead>';
			$flag=0;
			while($fetch=mysql_fetch_array($sel)){
			if($flag%2==0)
			echo '<tbody><tr bgcolor=#E5E5E5>';
			
	else 
echo '<tbody><tr bgcolor=white>';
echo '<td>'.$fetch['department_id'].'</td><td>'.$fetch['name'].'</td><td >'.$fetch['area'].'</td>';

			  
			$flag=$flag+1;
			}
			echo '</table>';
			
						
				}?>
				</div>
				
		<?php 
		

		// end of block



		}else if($action==editdepartment){
	
		echo'<h3 style="margin-top:-4px; margin-bottom:-3px;">Modify Department details</h3>';
				 include('connection.php');
				    $sel=mysql_query("SELECT * FROM  department ORDER by area");
					
					$rowscheck=mysql_num_rows($sel);
		 if($rowscheck < 1){
		 echo 'the is No department details <a href="home.php?action=department">here</a> to register';
		 
		 }else{
		 
		 
			?>					<script language="javascript">
function caaictpms()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Hospital Improvement Monitoring System </title>'); 
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" width="80" height="80">MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> Status of Projects</P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<p class=""> 
		  
<div  id="print_content">
                         
		 <?php
			echo '<table style=" width:100%;" id="results"  class="w3-table w3-table-all">';
			echo '<thead style="margin-left:10%;"><tr style=" color:red" class="w3-teal"><th>Department ID</th><th>Name</th><th align=>Area Number</th><th>Update</th><th>Delete</th></tr></thead>';
			$flag=0;
			while($fetch=mysql_fetch_array($sel)){
			if($flag%2==0)
			echo '<tbody><tr bgcolor=#E5E5E5>';
			
	else 
echo '<tbody><tr bgcolor=white>';
echo '<td>'.$fetch['department_id'].'</td><td>'.$fetch['name'].'</td><td >'.$fetch['area'].'</td>';
echo '<td><a href=modifydepartment.php?department_id='.$fetch['department_id'].'><img src="../img/edit1.jpg" width=30 height=15  />'.'</a>';
echo '<td><a href=deletedepartment.php?department_id='.$fetch['department_id'].'><img src="../img/del1.jpg" width="20" height="20" title=DELETE_RECORD /></a></td></tr></tbody>';
			  
			$flag=$flag+1;
			}
			echo '</table>';
			
						
				}?>
				</div>
				
		<?php 
		

		// end of block



		}
				// start of facility block
		else if($action=='facility'){
	 
	
	?>
		<h3  class="alert alert-info w3-center" >facility </h3> 
	<form method="post" style="width: 100%">
	<table class="ptable" >
  <tr>
    <td>Name</td>
   <td><input type="text" name="facility_name" autocomplete="off" class="form-control w3-center" required placeholder="facility name" pattern="[A-Za-z]+" />  </td>
	</tr>
	<tr>
    <td>Contact</td>
    <td><input type="numbers" name="contact" required class="form-control w3-center" placeholder="contact number" pattern="[0-9]+" style="width: 100%; height: 40px; border-radius: 4px;" /></td>
	</tr>
 
  <tr>
    <td>Email</td>
   <td> <input type="email"  name="email"  autocomplete="off"  class="form-control w3-center" placeholder="email address" /></td>
       </tr>
       <tr> 
	<td>Type</td>
	<td><select name="type" class="form-control w3-center"  style="width: 100%" placeholder="">
	<option style="text-align: center">--select Facility type--</option>
		<option>Central hospital</option>
		<option>District hospital</option>
		<option>health centre</option>
	</select>
	</td> 
	</tr>
	<tr>
    <td>District</td>
    <td><select name="district_id"  class="form-control w3-center"  style="width: 100%" required>
		 
                <?php
						$sel=mysqli_query($connection,"SELECT *FROM districts ");
						echo '<option>--select district--</option>';
						while($fetch=mysqli_fetch_array($sel)){
		               echo '<option value="'.$fetch['district_id'].'">'.$fetch['district_name'].'</option>';
			}
						?>
					</select></td>
</tr><tr>
        <td>Region</td>
	<td><select name="region_id" class="form-control" style="width: 100%" required >
		 <?php
						$sel=mysqli_query($connection,"SELECT *FROM regions ");
						echo '<option>--select region--</option>';
						while($fetch=mysqli_fetch_array($sel)){
		               echo '<option value="'.$fetch['region_id'].'">'.$fetch['region_name'].'</option>';
			}
						?>
					
	</select>
		</td>
        </tr>
		
		<tr>
    	<td>Address</td><td><textarea  name="address" rows="3" cols="3" class="form-control w3-center" placeholder="The address is ..." style="width: 100%;" required>   </textarea></td>
		</tr>
<tr>
	<td></td>
  <td> <input type="submit" value="submit" name="facility"/></td>
  </tr>
  </table>
  </form>
 
		
		<?php 
		
		
		
			
	if (isset($_POST['facility'])) {
	
// get the posted data
$facility = rand();
$facility_name = ( htmlspecialchars( $_POST['facility_name']));
$contact = $_POST['contact'];
$email= $_POST['email'];
$address=$_POST['address'];
$type=$_POST['type'];
$region=$_POST['region_id'];
$district=$_POST['district_id'];

$insert_info = mysqli_query($connection,"INSERT INTO facility VALUES( '$facility','$facility_name', '$contact', '$email', '$address', '$type','$region','$district')");
	if($insert_info){
echo "<script type='text/javascript'>alert('facility details added successfully')</script>";
echo '<meta content="2;facility_table.php" http-equiv="refresh" />';
}else {
echo mysqli_error();


}
 }
		
	// end of facility block
		
		}

						// start of block that handles region detils
						// require automatio on select tag from database, please remember saiwa
		else if($action=='region'){
		
	?>
		<h3 class="w3-center alert-info alert" style="width: 86%;"> Register Region details</h3>
	<form method="post">
	<table class="ptable" style="border:none;" >
	<tr>
	
	
   <td>Name
	<select name="region_name" class="form-control" style="width: 100%" required>
		<option></option>
		<option>Southern</option>
		<option>Eastern</option>
		<option>Northern</option>
		<option>Central</option>
	</select>
		</td>	</tr>   
    <td><input type="submit" value="Save Region" class="fa fa-save" name="sub8"/></td>
  </tr>
  </table>
  </form>

		
		<?php 
		
		// it has logic syntax error, make sure i remember to collect it
		// conflict with district block , 
		}
			
	if (isset($_POST['sub8'])) {
	
// get the posted data
//$reg_id =$_POST['region_id']; 
$reg_name = ( htmlspecialchars( $_POST['region_name']));
//$location = $_POST['location'];


$insert_info = mysqli_query($connection,"INSERT INTO regions VALUES('','$reg_name')");
	if($insert_info){
echo '<font color="green">Region details added successfully</font> ';
echo '<meta content="2;location_manage_table.php" http-equiv="refresh" />';

}else {
echo "<h style='color:red;'>Already registered in the database</h>";



}
 }
		
		
		// view  region details codes start
		else if($action==rega){
				
		echo '<h3 class="alert alert-info" style=" "> Region(s) information details </h3>';
		
		$selects=mysql_query("SELECT * FROM regions");
		 $rowscheck=mysql_num_rows($selects);
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
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" width="80" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> Completed </P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
		   <p class="pprint"> <a href="javascript:caaictpms()" ><img src="../images/Print.png" width="30" height="30"  margin-left="-200"/></a></p><br/>

<div  id="print_content">
                        
		 <?php
			echo '<table style="" id=""  class="w3-table w3-table-all">';
			echo '<thead class="w3-khaki"><tr class="w3-khaki"  style="width:100%;" ><th>Region ID</th><th>Name</th></tr></thead>';
			$flag=0;
			while($fetch=mysql_fetch_array($selects)){
			if($flag%2==0)
			echo '<tbody><tr bgcolor=#E5E5E5>';
			
	else 
echo '<tbody><tr bgcolor=white>';
echo '<td>'.$fetch['id'].'</td><td>'.$fetch['name'].'</td>';
			 $flag++;
			}
			echo '</tbody></table>';
			echo '</div>';
			echo	'</br><a class="w3-left w3-button w3-btn w3-hover-green" href="home.php?action=region" style="width:30%; background:blue; color:white;">Region++</a>';
	
		// end of block that retieve region details 	
		}
		}




				//	start codes that manages district modules
		else if($action=='district'){
			
		
	$result = mysql_query("SELECT  * from district1");// challenging this code saiwa
	$rows=mysql_num_rows($result);
	if($rows <1){
		echo "<br>";
	//echo '<t style="color:red;">'.'no district details found.</t> <a href="home.php?action=addDistrict"><br><br><button style=" background:blue; color:white;">Add++</button></a>';
	} else

				//insert data into district table  in the database
				// block start
	?>
		<h3 class="alert alert-info" style=""> Register District details</h3>
	<form method="post">
	<table class="ptable" style="border:none;">
	<tr>
	<td>Name</td>
	
	<td><input type="text" name="district_name" class="form-control" autocomplete="off" required style="width: 100%;"></td><tr>

		<tr><td>Region</td>
			<td><select name="region_id" class="form-control" required style="width: 100%;"> <?php
						$sel=mysqli_query($connection,"SELECT *FROM regions ");
						while($fetch=mysqli_fetch_array($sel)){
		               echo '<option value="'.$fetch['region_id'].'">'.$fetch['region_id'].'	'.$fetch['region_name'].'</option>';
			}
						?></select></td></tr>
    <td></td>
    <td><input type="submit" value="Save District" name="sub6" style="padding-top: -6px;" /></td>
  </tr>
  </table>
  </form>
		
		<?php 
		
		
		}
			
	if (isset($_POST['sub6'])) {
	
// get the posted data
$id =$_POST['region_id']; 
$d_name =  $_POST['district_name'];

$insert_info = mysqli_query($connection,"INSERT INTO districts VALUES('', '$d_name','$id')");
	if($insert_info){
echo '<font color="green">district details added successfully</font> ';
echo '<meta content="2;location_manage_table.php" http-equiv="refresh" />';

}else {
echo mysqli_error();



}
 }
		
		
		// manages verification criteria standard details, insert block open
		else if($action=='criteria'){
			
		
	
				//insert data into criteria table  in the database
				// block start
	?>
		<h3 class="alert-info alert w3-center">Register Verification Criteria of Standard(s)</h3>
	<form method="post"  style="width: 100%;">
	<table class="" style="width: 80%;" >
		<tr>
	<td>Standard</td>
    <td><select name="standard_code" required class="form-control" style="width: 98%;" >
	<?php
                include "connection.php";
						$sel=mysqli_query($connection,"SELECT *FROM standard");
						echo '<option>--select Standard Code--</option>';
						while($fetch=mysqli_fetch_array($sel)){
							
		               echo '<option value="'.$fetch['standard_code'].'">'.$fetch['standard_code'].'	'.$fetch['department_id'].' '.$fetch['department_name'].'</option>';
			}
						?>
	</select>
	</td>
	</tr>

	<tr style="margin-bottom: 2px;">
		<td>Number</td>
		<td ><input type="number" min="1" name ="number"  class="form-control" style="width: 98%; margin-top: 4px"></td>
	</tr>
  <tr style="margin-top: 2%;">
    <td style="margin-top: 6px;">Criteria</td>
   <td><textarea name="criteria" required " rows="3" cols="3" class="form-control" style="width: 98%">  </textarea></td>
	</tr>

  </tr>
	
   
  <tr>
  	<td></td>
    <td>
    <input type="submit" value="submit" name="sub4" "/></td>
  </tr>
  </table>
    </form>
	<a href="criteria_table.php" class="w3-left w3-button w3-teal w3-btn" style="width: 20%; margin-top:4px">View Standard Criteria</a>
  
		
		<?php 
		
		
		}
			
	if (isset($_POST['sub4'])) {
	
// get the posted data
$crand = rand();
$criteria = ( htmlspecialchars( $_POST['criteria']));
$c_dep = $_POST['standard_code'];
$numb= $_POST['number'];
/*$address=$_POST['address'];
$type=$_POST['type'];
$region=$_POST['region_id'];
$district=$_POST['district_id'];*/

$insert_info = mysql_query("INSERT INTO criteria VALUES( '$crand','$numb','$criteria','$c_dep')");
	if($insert_info){
echo '<font color="green">verification Criteria added successfully</font> ';
echo '<meta content="2;"http-equiv="refresh" />';
}else {
echo mysql_error();


}
 }
	else if($action=='rules'){
			
		
	
				//insert data into criteria table  in the database
				// block start
	?>
		<h3 class="alert-info alert w3-center w3-text-black">Assessment rules<br>Application on how to Assess Particular Standard by Assessor Only</h3>
	<form method="post"  style="width: 100%;">
	<table class="" style="width: 80%;" >

		<tr>
	<td>Department</td>
    <td><select name="department" required class="form-control" style="width: 100%;" >
	<?php
                include "connection.php";
						$sel=mysqli_query($connection,"SELECT *FROM department");
						echo '<option></option>';
						while($fetch=mysqli_fetch_array($sel)){
							
		               echo '<option value="'.$fetch['department_id'].'">'.$fetch['department_id'].'	'.$fetch['department_name'].' '.'</option>';
			}
						?>
	</select>
	</td>
	</tr>

		<tr>
	<td>Standard</td>
    <td><select name="standard_code" required class="form-control" style="width: 100%;" >
	<?php
                include "connection.php";
						$sel=mysqli_query($connection,"SELECT *FROM standard");
						echo '<option></option>';
						while($fetch=mysqli_fetch_array($sel)){
							
		               echo '<option value="'.$fetch['standard_code'].'">'.$fetch['standard_code'].'	'.$fetch['department_id'].' '.$fetch['department_name'].'</option>';
			}
						?>
	</select>
	</td>
	</tr>

	<tr style="margin-bottom: 2px;">
		<td>Title</td>
		<td >
			<textarea name="title" class="form-control" style="width: 100%;">	

		</textarea>
		</td>
	</tr>
  <tr style="margin-top: 2%;">
    <td style="margin-top: 6px;">Description</td>
   <td><textarea name="description" required " rows="3" cols="3" class="form-control" style="width: 100%">  </textarea></td>
	</tr>

  </tr>
	
   
  <tr>
  	<td></td>
    <td>
    <input type="submit" value="Save" name="rules" class="form-control w3-hover-teal w3-xlarge" /></td>
  </tr>
  </table>
    </form>
	
  
		
		<?php 
		
		
		}
			
	if (isset($_POST['rules'])) {
	
// get the posted data
//$crand = rand();
$department = ( htmlspecialchars( $_POST['department']));
$standard = $_POST['standard_code'];
$title= $_POST['title'];
$des=$_POST['description'];
/*$type=$_POST['type'];
$region=$_POST['region_id'];
$district=$_POST['district_id'];*/

$insert_info = mysqli_query($connection,"INSERT INTO assessment_rules VALUES( '','$department','$standard','$title','$des')");
	if($insert_info){
echo '<font color="green">Assessment rules added successfully</font> ';
echo '<meta content="2;assessment_rules_edit.php"http-equiv="refresh" />';
}else {
echo mysql_error();


}
 }
		else if($action=='tu'){
				
		echo '<h3 style=" margin-left:200px;"> District(s) information details </h3>';
		
		$selects=mysql_query("SELECT * FROM district");
		 $rowscheck=mysql_num_rows($selects);
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
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> Completed </P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<div  id="print_content">
                           <p class="pprint"> <a href="javascript:caaictpms()" ><img src="../images/Print.png" width="30" height="30"  margin-left="-200"/></a></p><br/>
		
		 <?php
			echo '<table style="" id="results" >';
			echo '<tr style="background:#0066FF; color:white"><th>Name</th><th>Location</th></tr>';
			$flag=0;
			while($fetch=mysql_fetch_array($selects)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['name'].'</td><td>'.$fetch['location'].'</td><td>';
			 $flag++;
			}
			echo '</table >';
			echo '</div>';
			echo	'<a href="home.php?action=hh"><br><br><button style=" background:blue; color:white;">Add++</button></a>';
	
			
		}
		}else if($action=='view_facility'){
				
		echo '<h1 class=" alert alert-info w3-center">Facility</h1>';
		
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
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" width="80" height="80" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> Facility details in e </P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:1200px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

                           <p class=""> <a href="javascript:caaictpms()" ><img src="../images/Print.png" width="30" height="30" /></a></p>
<div  id="print_content">
		
		 <?php
			echo '<table style="" id="results" class="w3-table w3-table-all">';
			echo '<thead>';
			echo '<tr style="background:#0066FF; color:white"><th>facility name</th><th>Contacts</th>
			<th>Email</th><th>Type</th><th>Address</th></tr>';
			 echo '</thead style="width:400%;">';
			 echo '<tbody>';
			$flag=0;
			while($fetch=mysqli_fetch_array($selects)){
			if($flag%2==0)
				
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['name'].'</td><td>'.$fetch['contact'].'</td><td>'.$fetch['email'].'</td><td>'.$fetch['type'].'</td><td>'.$fetch['address'].'</td></tr>';
			 $flag++;
			}
			echo '</tbody>';
			echo '</table>';
			echo '</div>';
	
			
		}
		}else if($action=='editfacility'){
				
		echo '<div class = "alert alert-info">Modify Facility details</div>';
		
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
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" width="80" height="80" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> Facility details in e </P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:1200px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

<div  id="print_content">
		
		 <?php
			echo '<table style="" id="results" class="w3-table-all">';
			echo '<thead style="">';
			echo '<tr style="background:#0066FF; color:white"><th>facility name</th><th>Contacts</th>
			<th>Email</th><th>Type</th><th>Address</th><th>Update</th><th>Delete</th></tr>';
			 echo '</thead style="width:400%;">';
			 echo '<tbody>';
			$flag=0;
			while($fetch=mysqli_fetch_array($selects)){
			if($flag%2==0)
				
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['name'].'</td><td>'.$fetch['contact'].'</td><td>'.$fetch['email'].'</td><td>'.$fetch['type'].'</td><td>'.$fetch['address'].'</td>';
echo '<td><a href="editfacility.php?facility_id='.$fetch['facility_id'].
					'" class="w3-button w3-center w3-khaki fa fa-pencil">Update</a> </td>';

	echo '<td><a href="deletefacility.php?facility_id='.$fetch['facility_id'].
					'" class="w3-center w3-bar-item w3-button fa fa-remove w3-red" >Delete</a> </td></tr>';
			 $flag++;
			}
			echo '</tbody>';
			echo '</table>';
			echo '</div>';
	
			
		}
		}else if($action=='reportregion'){
				
		echo '<div class = "alert alert-info">Modify region(s) details</div>';
		
		$selects=mysqli_query($connection,"SELECT * FROM regions");
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
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" width="80" height="80" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> Facility details in e </P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:1200px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

<div  id="print_content">
		
		 <?php
			echo '<table style="" id="results" class="w3-table-all">';
			echo '<thead style="">';
			echo '<tr style="background:#0066FF; color:white"><th>facility name</th><th>Contacts</th>
			<th>Email</th><th>Type</th><th>Address</th><th>Update</th><th>Delete</th></tr>';
			 echo '</thead style="width:400%;">';
			 echo '<tbody>';
			$flag=0;
			while($fetch=mysqli_fetch_array($selects)){
			if($flag%2==0)
				
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['name'].'</td><td>'.$fetch['contact'].'</td><td>'.$fetch['email'].'</td><td>'.$fetch['type'].'</td><td>'.$fetch['address'].'</td>';
echo '<td><a href="editfaility.php?facility_id='.$fetch['facility_id'].
					'" ><button><img src="../img/edit1.jpg" width="35" height="25"></button></a> </td>';

	echo '<td><a href="deletefacility.php?facility_id='.$fetch['facility_id'].
					'" class="fa fa-remove" >Delete</a> </td></tr>';
			 $flag++;
			}
			echo '</tbody>';
			echo '</table>';
			echo '</div>';
	
			
		}
		}else if($action==visits){
		echo '<h1>Visit details</h1>';
		$selec=mysqli_query($connection,"SELECT * FROM user, visit
		 WHERE visit.user_id=user.user_id AND role='Assessor'");
		 $rowscheck=mysqli_num_rows($selec);
		 if($rowscheck < 1){
		 echo 'No visit(s)';
		 
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
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center">Visiting Assessors</P>');
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
			echo '<tr style="background:#0066FF; color:white"><th>Visit ID</th><th>Assessor name</th><th> Visit Type</th><th>Visit date</th><th>Department</th><th>Edit</th></tr>';
			$flag=0;
			while($fetch=mysqli_fetch_array($selec)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['visit_id'].'</td><td>'.$fetch['name'].'</td><td>'.$fetch['visit_type'].'</td><td>'.$fetch['visit_date'].'</td><td>'.$fetch['department'].'</td><td><a href=modifystatus.php?id='.$fetch['department_id'].'><img src="../images/edit-icon.png" width=15 height=15 title=MODIFY_RECORD /></a></td><!---<td><a href=deletevisit.php?id='.$fetch['visi_id'].'><img src="../images/deletee.ico" width="15" height="15" title=DELETE_RECORD /></a></td>---></tr>';
			 $flag++;
			}
			echo '</table>';

		
          echo '</div>';
	
			
		}
		}else if($action==vstandard){
				
		echo '<h3 style=" margin-top:-4px;">Available Standards</h3>';
		
		$selects=mysql_query("SELECT * FROM `standard`,`criteria` ,`department`where standard.
									standard_code=criteria.standard_code AND department.department_id=standard.department_id");
		 $rowscheck=mysql_num_rows($selects);
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
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png"  width="80px" height:"80px">MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> Complete standard</P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<a href="javascript:caaictpms()" style="color:red; background:; float:right; margin-right:; " ><button style="margin-top: -60%; border-color: red;" class="w3-border"><img src="../images/Print.png" width="60" height="30" /></button></a><br/>
<div  id="print_content">
          
		
		 <?php
			echo '<table style=" width:100%;" id="results" class="w3-table w3-table-all">';
			echo '<tr style="background:#0066FF; color:white"><th>Standard Code</th><th>Description</th><th> Criteria number</th><th>Criteria</th><th>Department</th><th>Area</th></tr>';
			$flag=0;
			while($fetch=mysql_fetch_array($selects)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['standard_code'].'</td><td>'.$fetch['description'].'</td><td>'.$fetch['number'].'</td><td>'.$fetch['criteria'].'</td><td>'.$fetch['name'].'</td><td>'.$fetch['area'].'</td></tr>';
			 $flag++;
			}
			echo '</table>';
			echo '</div>';
	
			
		}
		}else if($action==visits){// please , debug here , make sure you check it
		echo '<h1>Visit details</h1>';
		$selec=mysqli_query($connection,"SELECT * FROM user, visit WHERE visit.user_id=user.user_id AND role='Assessor'");
		 $rowscheck=mysqli_num_rows($selec);
		 if($rowscheck < 1){
		 echo 'No visit(s)';
		 
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
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center">Visiting Assessors</P>');
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
			echo '<tr style="background:#0066FF; color:white"><th>Visit ID</th><th>Assessor name</th><th> Visit Type</th><th>Visit date</th><th>Department</th><th>Edit</th></tr>';
			$flag=0;
			while($fetch=mysqli_fetch_array($selec)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['visit_id'].'</td><td>'.$fetch['name'].'</td><td>'.$fetch['visit_type'].'</td><td>'.$fetch['visit_date'].'</td><td>'.$fetch['department'].'</td><td><a href=modifystatus.php?id='.$fetch['department_id'].'><img src="../images/edit-icon.png" width=15 height=15 title=MODIFY_RECORD /></a></td><!---<td><a href=deletevisit.php?id='.$fetch['visi_id'].'><img src="../images/deletee.ico" width="15" height="15" title=DELETE_RECORD /></a></td>---></tr>';
			 $flag++;
			}
			echo '</table>';

		
          echo '</div>';
	
			
		}
		}else if($action==stp){// no implemented now, wamva saiwa, but i thought folllow up table
		echo '<h1>wawa</h1>';
		$sel=mysql_query("SELECT * ");
		 $rowscheck=mysql_num_rows($sel);
		 if($rowscheck < 1){
		 echo 'i dont (s)';
		 
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
   docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" >MNISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> kaya</P>'); 
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
			echo '<tr style="background:#0066FF; color:white"><th>kaay  code</th><th></th><th> code</th><th>startDate</th><th>endDate</th></tr>';
			$flag=0;
			while($fetch=mysql_fetch_array($sel)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['code'].'</td><td>'.$fetch[''].'</td><td>'.$fetch[''].'</td><td>'.$fetch['Impl_StartDate'].'</td><td>'.$fetch['Impl_EndDate'].'</td></tr>';
			 $flag++;
			}
			echo '</table>';
		
			 echo '</div>';
	
			
		}
		}
		else if($action=='see'){
			echo "here";
 }

		
		
	else if($action=='ass'){// assessor details only

		
		
		echo '<h3 style="margin-left:100px;">modify or deleting kkkkkk Criteria</h3>';
		 
		?>
		<?php
		$sel=mysqli_query($connection,"SELECT * FROM standard, criteria
		 WHERE criteria.standard=standard.standard_code ORDER by standard_code");
		 $rowscheck=mysqli_num_rows($sel);
		 if($rowscheck < 1){
		 echo 'No registered standard(s)';
		 
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
   docprint.document.write('<html><head><title>HIMS </title>'); 
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">Hospital improvment monitoring System</P><BR><P  align="center"> verified and recommended standard(s)</P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
		 <div  id="print_conte">
                          
						  
		 <?php
			echo '<table style=" width:780px;" id="results" >';
			echo '<tr style="background:#0066FF; color:white"><th>Standard</th><th>Description</th><th>Number</th><th>Verification Criteria</th><th>edit</th><th>delete</th></tr>';
			$flag=0;
			while($fetch=mysqli_fetch_array($sel)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['standard_code'].'</td>';
echo '<td>'.$fetch['description'].'</td>';
echo '<td>'.$fetch['number'].'</td>';
echo '<td>'.$fetch['criteria'].'</td>';
//echo '<td>'.$fetch['area'].'</td>';
echo "<td><a href='editcriteria.php?c_id=".$fetch['c_id']."'><img src='../img/b_edit.png'></a> </td>"; 
echo "<td><a href='deletecriteria.php?c_id=".$fetch['c_id']."'><img src='../img/b_drop.png'></a> </td>"; 
echo '</tr>';
			$flag++; 
			}
			echo '</table>';
		
			 echo '</div>';
	echo '<a href="home.php?action=criteria"><button style="width:20%; margin-top:2%;"><img src="../img/add_2.png" 
	width="" height="">	<br>Add++</button></a>';
	
	}}
	
	else if($action=='vcriteria'){

		
		
		echo '<h3 style="margin-left:100px;">modify or deleting standard(s) Criteria</h3>';
		 
		?>
		<?php
		$sel=mysql_query("SELECT * FROM standard, criteria
		 WHERE criteria.standard=standard.standard_code ORDER by standard_code");
		 $rowscheck=mysql_num_rows($sel);
		 if($rowscheck < 1){
		 echo 'No registered standard(s)';
		 
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
   docprint.document.write('<html><head><title>HIMS </title>'); 
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">Hospital improvment monitoring System</P><BR><P  align="center"> verified and recommended standard(s)</P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
		 <div  id="print_conte">
                          
						  
		 <?php
			echo '<table style=" width:780px;" id="results" >';
			echo '<tr style="background:#0066FF; color:white"><th>Standard</th><th>Description</th><th>Number</th><th>Verification Criteria</th><th>edit</th><th>delete</th></tr>';
			$flag=0;
			while($fetch=mysql_fetch_array($sel)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['standard_code'].'</td>';
echo '<td>'.$fetch['description'].'</td>';
echo '<td>'.$fetch['number'].'</td>';
echo '<td>'.$fetch['criteria'].'</td>';
//echo '<td>'.$fetch['area'].'</td>';
echo "<td><a href='editcriteria.php?c_id=".$fetch['c_id']."'><img src='../img/b_edit.png'></a> </td>"; 
echo "<td><a href='deletecriteria.php?c_id=".$fetch['c_id']."'><img src='../img/b_drop.png'></a> </td>"; 
echo '</tr>';
			$flag++; 
			}
			echo '</table>';
		
			 echo '</div>';
	echo '<a href="home.php?action=criteria"><button style="width:20%; margin-top:2%;"><img src="../img/add_2.png" 
	width="" height="">	<br>Add++</button></a>';
	
	}}else if($action=='editstandard'){

		
		
		echo '<h3 style="margin-left:100px;">modify or deleting standard(s)</h3>';
		 
		?>
		<?php
		$sel=mysql_query("SELECT * FROM standard, department
		 WHERE department.standard=standard.standard_code ORDER by standard_code");
		 $rowscheck=mysql_num_rows($sel);
		 if($rowscheck < 1){
		 echo 'No registered standard(s)';
		 
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
   docprint.document.write('<html><head><title>HIMS </title>'); 
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">Hospital improvment monitoring System</P><BR><P  align="center"> verified and recommended standard(s)</P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/20px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
		 <div  id="print_conte">
                          
						  
		 <?php
			echo '<table style=" width:780px;" id="results" >';
			echo '<tr style="background:#0066FF; color:white"><th>Standard</th><th>Description</th><th>Criteria</th><th>Department</th><th>Area number</th><th>edit</th><th>delete</th></tr>';
			$flag=0;
			while($fetch=mysql_fetch_array($sel)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['standard_code'].'</td>';
echo '<td>'.$fetch['description'].'</td>';
echo '<td>'.$fetch['verify_criteria'].'</td>';
echo '<td>'.$fetch['name'].'</td>';
echo '<td>'.$fetch['area'].'</td>';
echo "<td><a href='editstandards.php?standard_code=".$fetch['standard_code']."'><img src='../img/b_edit.png'></a> </td>"; 
echo "<td><a href='deletestandard.php?standard_code=".$fetch['standard_code']."'><img src='../img/b_drop.png'></a> </td>"; 
echo '</tr>';
			$flag++; 
			}
			echo '</table>';
		
			 echo '</div>';
	echo '<a href="home.php?action=pdetails"><button style="width:20%; margin-top:2%;"><img src="../img/add_2.png" 
	width="" height="">	<br>Add++</button></a>';
			
		}}else if($action=='users'){

		//echo '<a href="home.php?action=pdetails" style="color:white; margin-left:500px;"><button style=" height:30px; background:blue;">Add standard(s)</button></a>';
		
		echo '<h3 style="margin-left:100px;">Systen user(s) details</h3>';
		 
		?>
		<?php
		$sel=mysql_query("SELECT * FROM user");
		 $rowscheck=mysql_num_rows($sel);
		 if($rowscheck < 1){
		 echo 'No registered user(s)';
		 
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
   docprint.document.write('<html><head><title>HIMS </title>'); 
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" width="80" height="80" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">Hospital improvment monitoring System</P><BR><P  align="center"> user(s) of monitoring management system</P>');
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
			echo '<table style=" width:780px;" id="results" >';
			echo '<tr style="background:#0066FF; color:white"><th>Name</th><th>user role</th><th>Department</th><th>Email Address</th></tr>';
			$flag=0;
			while($fetch=mysql_fetch_array($sel)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['name'].'</td>';
echo '<td>'.$fetch['role'].'</td>';
echo '<td>'.$fetch['department'].'</td>';
echo '<td>'.$fetch['email_address'].'</td>';
echo "<td><a href=''><img src='../img/s_success.png'></a> </td>"; 
 
echo '</tr>';
			$flag++; 
			}
			echo '</table>';
		
			 echo '</div>';
	
			
		}}
		else if($action=='back'){
		echo'<h1> backups</h1>';
				 include('connection.php');
				    $sel=mysql_query("SELECT * FROM  ");
					
					$rowscheck=mysql_num_rows($sel);
		 if($rowscheck < 1){
		 echo 'Back up not available. click <a href="home.php?action=">here</a> to view assessment status';
		 
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
   docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">ICT PROJECTS MONITORING SYSTEM</P><BR><P  align="center"> Projects Status back up information</P>');
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
			echo '<table style="" id="results">';
			echo '<tr style="background:#0066FF; color:white"><th>assessment Name</th><th></th><th align=left> status</th><th>kk</th><th>remarks</th><th>action required</th><th>Date modified</th></tr>';
			$flag=0;
			while($fetch=mysql_fetch_array($sel)){
			if($flag%2==0)
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['Project_name'].'</td><td>'.$fetch[''].'</td><td>'.$fetch['Impl_status'].'</td><td>'.$fetch['ass_status'].'</td><td>'.$fetch['Remarks'].'</td><td>'.$fetch['Action_required'].'</td><td>'.$fetch['update_date'].'</td></tr>';
			  
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
			include " connection.php";
			$user_id=$_SESSION['user_id'];
			$result=mysqli_query($connection,"select * from user where user_id='$user_id'")or die(mysqli_error);
			$date=mysqli_query($connection,"SELECT curdate() as date");
			$row=mysqli_fetch_array($result);
			$d=mysqli_fetch_array($date);
			$Name=$row['name'];
			$role=$row['role'];
	
echo '<img src="../images/admin.png" style=""> logged in as [<font color="green" size="3"> '.$role.'</font>]';
?>
  
	
	
        <div class="row">

            <div class="col-lg-12 w3-center">

                <div class="panel-group" id="accordion">
				<!--- test all--->
				
				<!--- stop--->
				 <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title w3-center">
                               <a  class="w3-button w3-hover-green fa fa-dashboard" href="?action=dash" style="width: 100%; text-align: left; font-size: 20px;">
                        Dashboard
                        
                  </a>
                            </h4>
                        </div>
                        
                    </div>

                     <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="w3-button w3-hover-green fa fa-user" href="add_user.php" style="width: 100%; text-align: left; font-size: 20px;">
                        Manage User
                  </a>
                            </h4>
                        </div>
                        
                    </div>
					
					
                    <div class="panel panel-default">
                        <div class="panel-heading">
 							<h4 class="panel-title ">
                                <a class="accordion-toggle w3-button w3-hover-green fa fa-sitemap" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" style="width: 100%; text-align: left; font-size: 20px;">
                        Manage standard
                  </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
							<ol>
								
                                <li class=" w3-button w3-large"><a href="?action=pdetails">Register Standard</a></li>
							    <li class=" w3-large"><a href="?action=criteria">Register Criteria</a></li>
							    <li class=" w3-large"><a href="standard_edit_del.php">Update Standard</a></li>
							    <li class=" w3-large"><a href="criteria_table.php">Update Criteria</a></li>

							     <li class=" w3-large"><a href="home.php?action=rules">Register Assessment Rules</a></li>
								
 							</ol>
                            </div>
                        </div>
                    
					
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="w3-button w3-hover-green fa fa-building-o" href="department_table.php" style="width: 100%; text-align: left; font-size: 20px;">
                       Manage Department
                  </a>
                            </h4>
                        </div>
                        
                    </div>
					
					 <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="w3-button w3-hover-green fa fa-institution" href="facility_table.php" style="width: 100%; text-align: left; font-size: 20px;">
                       Manage Facility
                  </a>
                            </h4>
                        </div>
                        
                    </div>
					
					
					
					 <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="w3-button w3-hover-green fa fa-area-chart" href="location_manage_table.php" style="width: 100%; text-align: left; font-size: 20px;">
                        Manage location
                  </a>
                            </h4>
                        </div>


                        
                    </div>
					 <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="w3-button w3-hover-green fa fa-wpforms" href="department_assessment_rules.php" style="width: 100%; text-align: left; font-size: 20px;">
                        Assessment Rules
                  </a>
                            </h4>
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
<?php include '../footer.php';?>
</div>

<!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
	<script src="../js/stopusers.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>
    <script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
		$('#table2').DataTable();
		$('#table3').DataTable();
		$('#table4').DataTable();
	});
</script>
<?php
include 'class.php'; 
$user = new users($user_id);
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
