
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
    <link href="css/.css" rel="stylesheet">
     <link href="../css/moodal.css" rel="stylesheet">

      <link rel="stylesheet" type="text/css" href="../font-awesome/font-awesome/css/font-awesome.min.css">
      <link href="css/.css" rel="stylesheet">
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
 
 #form-control{width: 100%;}
 
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

 </style>
</head>
<body>
<div id= "wrapper">
	<body>
<div id= "wrapper">
<div id="header">
	<h1><img src="../images/health.png" style="width:80px;" />MINISTRY OF HEALTH MALAWI</h1>

</div>
<div id="menu" style="margin-top: -2%;">
	<h1 class="head2" style="font-size:30px;color:lightblue;text-shadow:7px 7px 4px #000000;">HOSPITAL IMPROVEMENT MONITORING SYSTEM</h1>
</div> 
<div class="w3-bar w3-sand w3-large" style="margin-top: -20px;">
  <a href="in-charge.php?action=dash" class="w3-bar-item w3-button fa fa-home" style="margin-left: 10%; margin-right: 10%;">Home</a>

  <div class="w3-dropdown-hover" style="margin-top: 6px; margin-right: 10%;"">
    <button class="w3-button w3-">Location</button>
    <div class="w3-dropdown-content w3-bar-block w3-border">
      <a href="#" class="w3-bar-item w3-button">Region</a>
      <a href="#" class="w3-bar-item w3-button">District</a>
      <a href="#" class="w3-bar-item w3-button"></a>
    </div></div>

  <div class="w3-dropdown-hover" style="margin-top: 6px;  margin-right: 10%;"">
    <button class="w3-button w3-">Facility</button>
    <div class="w3-dropdown-content w3-bar-block w3-border">
     <a href="" class="w3-bar-item w3-button">View facility</a>
    </div></div>

  <div class="w3-dropdown-hover" style="margin-top: 6px;  margin-right: 10%;"">
    <button class="w3-button w3-">Report</button>
    <div class="w3-dropdown-content w3-bar-block w3-border">
      <a href="" class="w3-bar-item w3-button">Standard Report</a>
      <a href="#" class="w3-bar-item w3-button">Assessor Report</a>
      <a href="#" class="w3-bar-item w3-button">Assessment Report</a>
    </div></div>

  <a href="../logout.php" class="w3-bar-item w3-button "style="margin-left: 10%; margin-right: 10%; background: red; color:white">Logout</a>
</div>

<div class="w3-bar w3-#FFFFCC" style="margin-left: 75%; margin-right: 10%;" > <?php
      include " connection.php";
      $user_id=$_SESSION['user_id'];
      $id=$_SESSION['name'];
      
      $result=mysql_query("select * from user where username='$user_id'")or die(mysql_error);
      $date=mysql_query("SELECT curdate() as date");
      $row=mysql_fetch_array($result);
      $d=mysql_fetch_array($date);
      $Name=$row['name'];
      $role=$row['role'];
  
echo '<d  style="color:green;  margin-left:;">
'.'<t style="color:black; margin-right:20px;">'.'User:'.'</t>'.$Name.'<img src="../images/private.png">'.'</d>';

?>

</div>



  

	<?php 
 $id=$_REQUEST['worker_id'];
$sel=mysql_query("SELECT * FROM worker WHERE worker_id='$id'");

$fetch=mysql_fetch_array($sel);


?>			
		
		<center>

		<form method="post" ">

	<table class="ptable" >
    <div id="" class="alert alert-info" style="width: 80%; margin-left: -12%;">Update Staff Members Details</div>
  <tr>
    <td>Worker Id</td>
    <td><input type="text" name="worker_id" class="form-control" style="width: 100%;" readonly="readonly" value="<?php echo $fetch[0] ?>"   /></td>
	</tr>
	<tr>
    <td>Firstname</td>
    <td><input type="text" name="fname" class="form-control" style="width: 100%;" value="<?php echo $fetch[1] ?>" /></td>
  </tr>
  <tr>
    <td>Lastname</td>
    <td><input type="text" name="sname" class="form-control" style="width: 100%;" value="<?php echo $fetch[2] ?>" /></td>
  </tr>
  <tr>
    <td>Duty</td>
    <td><input type="text" name="duty" class="form-control" style="width: 100%;" value=" <?php echo $fetch[2] ?>"></td>
    
  </tr>
  <tr>
    <td>Job Description</td>
    <td><input type="text" name="job_des"  class="form-control" style="width: 100%;" value="<?php echo $fetch[3] ?>"   /></td>
	</tr>
  <tr>
    <td>Work Area</td>
    <td><input type="text" name="work_area"  style="width: 100%;" class="form-control"  value="<?php echo $fetch[4] ?>"   /></td>
  </tr>
	
  <tr>
    
    <td>&nbsp;</td>
    <td><input type="submit" value="submit" style="width: 100%;"name="isub"/></td>
  </tr>
  
</table>
		</form>
		</center>
	<?php	
	
	if (isset($_POST['isub'])) {
	
// get the posted data
$fid = $_REQUEST['worker_id'];
$name= $_REQUEST['fname'];
$reg= $_REQUEST['sname'];
$dfa=$_REQUEST['duty'];
$contact=$_REQUEST['job_des'];
$type=$_REQUEST['work_area'];


$update=mysql_query("UPDATE worker SET worker_id='$fid',fname='$name', sname='$reg', duty='$dfa' , job_des='$contact' , work_area='$type'  WHERE worker_id='$fid' ");
if($update){
echo '<script>alert("Updated successfully")</script> ';
echo '<meta content="2;in-charge.php?action=edit_worker" http-equiv="refresh" />';

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
<div id="footer" class="w3-center">
	<p>Copyright saiwavincent@gmail.com</p>
</div>


<!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>
</body>
</html>
