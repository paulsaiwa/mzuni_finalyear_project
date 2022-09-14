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
  header("location: logout.php");
}

  ?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>hims</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../css/default.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="../text/css" href="tcal.css" />
<script type="text/javascript" src="../tcal.js"></script> 
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="css/.css" rel="stylesheet">
     <link href="../css/moodal.css" rel="stylesheet">
      <link href="css/.css" rel="stylesheet">
	<link href="../date/htmlDatepicker.css" rel="stylesheet" />
	<script language="JavaScript" src="../date/htmlDatepicker.js" type="text/javascript"></script>
	<script type="text/javascript" src="../js/boxOver.js"></script>
  <link rel="stylesheet" type="text/css" href="../font-awesome/font-awesome/css/font-awesome.min.css">
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
		#columnB {
padding-top:0px;
float: left;
width: 200px;
font: 12px/17px arial, sans-serif;color: rgb(50, 50, 50);
margin-left:-40px;
margin-right:3px;
}

#content {


	width: 1200px;
	margin: 0px auto;
	padding: 10px 0px 10px 40px;font: 12px/17px arial, sans-serif;color: rgb(50, 50, 50);
}

#columnA {

	float: right;
	width: 990px;
	padding-left:20px;
	border-left: 1px solid #CCCCCC;
	padding-bottom:15px;
	font: 12px/17px arial, sans-serif;color: rgb(50, 50, 50);


}
#body{
	width:400px;
}
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
input[type="text"]{width:80%; height:80%;}
textarea{width:80%; height:110%;}

 </style>
</head>
<body>
<div id= "wrapper">
	<body>
<div id= "wrapper">
<div id="header">
  <h1 class=" w3-center" style="font-size: 30px;"><img src="../images/health.png" style="width:100px; height: 85px; font-size: 24px;" />MINISTRY OF HEALTH MALAWI</h1>

</div>

<div id="#hello" class="w3-bar w3-grey w3-large w3-hover" style="margin-top: 6px; border-top-style: solid; border-top-color: red; border-bottom-style: solid; border-bottom-color: red; font-size: 20px;  ">
  <a href="home.php?action=dash" class="w3-bar-item w3-button fa fa-home" style="margin-left: ; margin-right: 10%; font-size: 20px; color: white;">Home</a>
  <a href="follow-up.php" class="w3-bar-item w3-button fa fa-pencil" style="margin-left: ; margin-right: 10%; font-size: 20px; color: white;">Manage Follow ups</a>

  <a href="followups_report.php" class="w3-bar-item w3-button fa fa-envelope" style="margin-left: 10%; margin-right: 10%; font-size: 20px; color: white;">Follow up report</a>

  <a href="../logout.php" class="w3-bar-item w3-button fa fa-sign-out w3-right w3-red" style="font-size: 20px;">Logout</a>
</div>

  
</div>
<?php
			include "connection.php";
			$user_id=$_SESSION['user_id'];
			$id=$_SESSION['name'];
			
			$result=mysqli_query($connection,"select * from user where username='$user_id'")or die(mysql_error());
			$date=mysql_query($connection,"SELECT curdate() as date");
			$row=mysqli_fetch_array($result);
			$d=mysqli_fetch_array($date);
			$Name=$row['name'];
			$role=$row['role'];
	
echo '<d  style="margin-left:150%; color:green;  margin-left:;">
'.'<t style="color:black; margin-right:20px;">'.'User:'.'</t>'.$Name.'</d>';



?>
  
</div>
	
</div>
	<?php 
 $id=$_REQUEST['action_id'];
$sel=mysqli_query($connection,"SELECT * FROM action_plan WHERE action_id='$id'");

$fetch=mysqli_fetch_array($sel);


?>			
		 
    
		<center>
		<form method="post" style=" width: 80%; margin-bottom: 2%;">
      <h3 style="" class="alert alert-info w3-center w3-xlarge w3-text-black">Comment on Management Plan Details</h3>
	<table class="table" style="margin-left: -24%;">
  <tr>
    <td></td>
    <td><input type="Hidden" name="action_id" class="form-control" style="width: 98%;" value="<?php echo $fetch['action_id'] ?>"   /></td>
	</tr>
	
	<tr>
    <td><input type="Hidden" name="standard_code"  value="<?php echo $fetch[1] ?>"   /></td>
	</tr>
	
  <tr>
    <td><input type="Hidden" name="recommend" value="<?php echo $fetch['recommend'] ?>"></td>
    
  </tr>

   <tr>
    <td><input type="Hidden" name="plan" value="<?php echo $fetch['plan'] ?>"></td>
    
  </tr>

  <tr><td><textarea name="follow_comment" class="form-control" required></textarea></td></tr>
  
  <tr>
    
    <td></td>
    <td><input type="submit" value="submit" name="isub" class="form-control w3-green w3-hover-teal"  style=" margin-left: -60%; margin-top: 12px;" /></td>
  </tr>
  
</table>
		</form>
		</center>
	<?php	
	
	if (isset($_POST['isub'])) {
	
// get the posted data
$standard_code = $_REQUEST['standard_code'];
$action_id= $_REQUEST['action_id'];
//$darea= $_REQUEST['verify_criteria'];
$follow_comment=$_REQUEST['follow_comment'];
$recommend=$_REQUEST['recommend'];
$plan=$_REQUEST['plan'];
$date=time();

$update=mysqli_query($connection,"INSERT INTO  assessor_followups  VALUES('','$standard_code','$action_id','$recommend','$plan','$follow_comment','$date')");
if($update){
echo '<script>window.alert("Follow up details successfully stored")</script>';
echo header("location:follow-up.php");

}else {
echo mysql_error();

}
}
?>		
	</div>
	<div id="">
	<!---side bar slide --->
	
	
	
       
            </div>

        
	
	
	
	<!--- side bar slide --->
	
	</div>
</div>
<?php include '../footer.php';?>


<!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src=".../js/modern-business.js"></script>
</body>
</html>
