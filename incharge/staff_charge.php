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
	header("location:../logout.php");
}

  ?>

<!DOCTYPE html>
<?php
	//require_once 'session.php';
	require_once '../js/connect.php';
?>
<html lang = "eng">
	<head>
		<title>hims</title>
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />

		<link rel="stylesheet" type="text/css" href="../font-awesome/font-awesome/css/font-awesome.min.css">
		<link rel = "stylesheet" type = "text/css" href = "../css/css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/style.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/default.css" />
	<script type="text/javascript" src="../vendor/jquery/jquery.min.js"></script>
	<link rel="stylesheet" href="../vendor/boostrap/css/boostrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/moodal.css">
		<style>

		


		#header h1 {
	margin-top: -12px;
	padding: 5px 20px 0px 0px;
	text-transform: uppercase;
	font-weight: bold;
	text-align:center;
	color:;
}

#header h2 {
	margin: 0 0 0 -80px;
	padding: 0px 0px 0px 95px;
	text-transform: uppercase;
	font-weight: bold;
	font-size: 13px;
}

/** MENU */

#menu {
	width:% ;
	margin: 0px auto;
	text-align:left;
	overflow-x:hidden;
}
#header.head1 { float:left; 
	padding-bottom:-5px; 
	color:#003399;}
.head2{   font: 24px/34px arial, sans-serif;
color:;
text-align:left;
background: #428bca;
height:70px;
width:
padding-left:20px;
padding-top:20px;
}

#footer {
	clear: both;
	width:248%;
	margin-left:  ;
	height: 34px;
	background: #428bca;
	text-align: ;
}

#footer p {
	margin: 0px;
	padding: 18px 0px 0px 0px;
	font-size: 10px;
	color: ;
	width:131.6%;
	margin-left:20%;
}

#footer a {
	color: ;
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
</style>

	</head>
<body>
<!--------------------HEAD---------------------->
<?php //include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php //include 'sidebar.php'?>
<!-------------------SIDEBAR0------------------>
<div id="header">
	<?php include 'charge_header.php';?>
	</div>
<div class="w3-row w3-grey" style="margin-top: 6px ; font-size: 20px; border-top-color: red; border-top-style: solid; border-bottom-style: solid; border-bottom-color: red;">
  <a href="in-charge.php?action=dashb" class="w3-bar-item w3-button fa fa-home" style="margin-left: ; margin-right: 10%; font-size: 20px; color: white;">Home</a>
<a href="" class="w3-bar-item w3-button  fa fa-refresh " style="height:30px; padding-top: 6px; font-size: 20px; color: white;">Refresh</a>
<a href="" class="w3-bar-item w3-button  fa fa-user " style=" margin-left: 10%; height:30px; padding-top: 6px; font-size: 20px; color: white;">Register Staff</a>
<a href="" class="w3-bar-item w3-button  fa fa-user " style=" margin-left: 10%; height:30px; padding-top: 6px; font-size: 20px; color: white;">Update Staff</a>

  <a href="../logout.php" class="w3-bar-item w3-button  fa fa-sign-out w3-red w3-right" style="height:30px; padding-top: 6px; font-size: 20px;">Logout</a>
</div>
		
		<div class="w3-col ">

			

			
				<center>
				<h3 class="alert alert-info w3-center">Add departmental Staff members</h2>
		
	<form method="post" id="k">
	<table class=""  style="width:80%;">
  <tr>
    <td>Firstname</td>
   <td><input type="text" name="fname" class="form-control w3-center" required style=" " placeholder="firstname" pattern="[A-Za-z]+" />  </td>
	</tr>

<tr>
    <td>Surname</td>
   <td><input type="text" name="sname" class="form-control w3-center" placeholder="Surname" pattern="[A-Za-z]+" required style=" width:100%;" />  </td>
	</tr>
	
	<tr>
    <td>Duty</td>
    <td><input type="text" name="duty" class="form-control w3-center" pattern="[A-Za-z]+" required style=" width:100%;" placeholder="Duty Assigned" /></td>
	</tr>
  </tr>
  <tr>
	<td>Worker area</td>
	 <td><input type="text" name="work_area" class="form-control w3-center" placeholder="work area..." style=" width:100%;" required pattern="[A-Za-z0-9]+"  /></td>
	</tr>
  <tr>
    <td>Job description</td>
    <td><textarea name="job_des" rows="3"  cols="3" class="form-control w3-center" style="  width:100%;" required  placeholder="Job description..."></textarea></td>
        </td>
	
	
  </tr>
   
  <tr>
    <td></td>
    <td><input type="submit" value="submit" name="go" class="w3-green w3-hover-gray" style="width: 100%;" /></td>
  </tr>
  </table>
  </form>
	
		<?php 
		
		
		
			
	if (isset($_POST['go'])) {
	
// get the posted data
$implcode = rand();
$fname = ( htmlspecialchars( $_POST['fname']));
$sname = ( htmlspecialchars( $_POST['sname']));
$duty = $_POST['duty'];
$job= $_POST['job_des'];
$locate=$_POST['work_area'];
//$remarks=$_POST['in-charge'];


$insert_info = mysqli_query($connection,"INSERT INTO charge_staff_member VALUES( '$implcode','$fname', '$sname', '$duty', '$job', '$locate')");
	if($insert_info){
echo '<script>alert("Staff Member added successfully")</script>';
echo '<meta content="2;" http-equiv="refresh" />';
}else {
echo mysqli_error();


}}

?>

 </div>

		
</body>	



    <script src=""></script>
	<script src="../js/stopusers.js"></script>
   
</html>
