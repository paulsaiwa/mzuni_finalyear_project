<?php

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

require '../connect.php';
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
    <link href=".../css/.css" rel="stylesheet">
     <link href="../css/moodal.css" rel="stylesheet">
      <link href="css/.css" rel="stylesheet">
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



</head>
<body>
<div id= "wrapper">
	<body>
<div id= "wrapper">
<div id="header">
  <h1 class=" w3-center" style="font-size: 30px;"><img src="../images/health.png" style="width:100px; height: 85px; font-size: 24px;" />MINISTRY OF HEALTH MALAWI</h1>

</div>

<div id="#hello" class="w3-bar w3-light-gray w3-large w3-hover" style="margin-top: 6px; border-top-style: solid; border-top-color: red; border-bottom-style: solid; border-bottom-color: red;">
  <a href="home.php?action=dash" class="w3-bar-item w3-button fa fa-home" style="margin-left: 10%; margin-right: 10%;">Home</a>
  <a  href ="home.php?action=department" class = " w3-btn w3-button fa fa-building" style="background-color:; border:none; margin-left: 10%; margin-right: 10%;"> Register Department</a>

  <a href="../logout.php" class="w3-bar-item w3-button fa fa-sign-out w3-right w3-red">Logout</a>
</div>

	
</div>
	<?php 
  include 'connection.php';
 $id=$_REQUEST['department_id'];
$sel=mysqli_query($connection,"SELECT * FROM department WHERE department_id='$id'");

$fetch=mysqli_fetch_array($sel);


?>		
<a href="department_table.php" class="w3-button w3-light-blue w3-bar-item w3-hover-green fa fa-arrow-left" style="margin-top: 6%; margin-bottom: -6%">Back</a>	
		
		<center>
		<form method="post" style="">
      <h3 class="alert alert-info w3-center" style="width: 80%">Modify Department details</h3>
	<table class="" style="margin-left:">
  <tr>
    <td>Department ID</td>
    <td>
      <select name="department_id" required  class="form-control" >
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
    </select></td>
	</tr>
	<tr>
    <td>Department Name</td>
    <td><select name="department_name" required class="form-control" >
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
    </select></td>
  </tr>
  <tr>
    <td>Area</td>
    <td><select name="area" required class="form-control" >
      
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
  </select></td>
  </tr>
  
	
  <tr>
    
    <td>&nbsp;</td>
    <td><input type="submit" value="submit" class="form-control fa fa-home" name="isub" style="margin-bottom: 10%;width: 100%" />
    </td>
  </tr>
  
</table>
		</form>
		</center>
	<?php	
	include '../connection.php';
	if (isset($_POST['isub'])) {
	
// get the posted data
$dcode = $_REQUEST['department_id'];
$dname= $_REQUEST['department_name'];
$darea= $_REQUEST['area'];
//$dstandard=$_REQUEST['standard_code'];
//$date=$_REQUEST['initdate'];
//$user=$_REQUEST['user_id'];
//$rmarks=$_REQUEST['rmarks'];
//$areq = $_REQUEST['areq'];
//BACKUP

/*  left delibarately 
$Bpcode = $fetch['Proj_code'];
$Bicode= $fetch[1];
$Bistatus= $fetch[2];
$Bpstatus=$fetch[3];
$Brmarks=$fetch[4];
$Bareq = $fetch[5];
$s=mysql_query("SELECT * FROM  WHERE Proj_code='$Bpcode'");

$f=mysql_fetch_array($s);
$g=$f['Project_name'];

$backup=mysql_query("INSERT INTO backup(Proj_code,Project_name,Impl_code,Impl_status,Proj_status,Remarks,Action_required,update_date) VALUES('$g','$Bpcode','$Bicode','$Bistatus','$Bpstatus','$Brmarks','$Bareq',curdate())");
if(!$backup){
echo mysql_error();
}
*/
$update=mysqli_query($connection,"UPDATE department SET department_id='$dcode',department_name='$dname',
 area='$darea'  WHERE department_id='$dcode' ");
if($update){
echo '<font color="green"> Department successully updated...</font> ';
echo '<meta content="2;department_table.php" http-equiv="refresh" />';

}else {
echo "k";

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
<div id="footer">
	<?php include '../footer.php';?>
</div>


<!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>
</body>
</html>
