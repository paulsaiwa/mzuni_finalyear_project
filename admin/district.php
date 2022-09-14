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
      <link href="css/.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="../font-awesome/font-awesome/css/font-awesome.min.css">

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
input[type="number"]{width:80%; height:80%;}
textarea{width:80%; height:110%;}

 </style>
</head>
<body>
<div id= "wrapper">
	<body>
<div id= "wrapper">
<div id="header">
	<h1><img src="../images/health.png" style="width:80px;" />MINISTRY OF HEALTH MALAWI</h1>

</div>
<div id="menu" style="margin-top: -23px;">
	<h1 class="head2" style="font-size:30px;color:lightblue;text-shadow:7px 7px 4px #000000;">HOSPITAL IMPROVEMENT MONITORING SYSTEM</h1>
</div> 
<div class="w3-bar w3-sand" style="margin-top: -23px;">
  <a href="home.php?action=dash" class="w3-bar-item w3-button fa fa-home" style="margin-left: 10%; margin-right: 10%;">Home</a>
  

  <a href="../logout.php" class="w3-bar-item w3-button w3-red w3-right fa fa-sign-out">Logout</a>
</div>

<div class="w3-bar w3-#FFFFCC" style="margin-left: 75%; margin-right: 10%;" > <?php
			include "connection.php";
			$user_id=$_SESSION['user_id'];
						
			$result=mysqli_query($connection,"select * from user where user_id='$user_id'")or die(mysqli_error);
			$date=mysqli_query($connection,"SELECT curdate() as date");
			$row=mysqli_fetch_array($result);
			$d=mysqli_fetch_array($date);
			$Name=$row['name'];
			$role=$row['role'];
	
echo '<d  style="color:green;  margin-left:;">
'.'<t style="color:black; margin-right:20px;" class="fa fa-user">'.'User:'.'</t>'.$Name.'<img src="../images/private.png">'.'</d>';

?>

</div>
	<?php 
 $id=$_REQUEST['id'];
$sel=mysqli_query($connection,"SELECT * FROM districts WHERE id='$id'");

$fetch=mysqli_fetch_array($sel);


?>	
<a class="w3-button w3-left w3-hover-green w3-light-blue fa fa-arrow-left"  href="standard_table.php" style="margin-right: 10%; margin-bottom: 9%;" >Back </a>		
		<h3  class="alert alert-info w3-center">Modify District details</h3>
		<center>
		<form method="post" >
	<table class="ptable">
  <tr>
    <td> Id</td>
    <td><input type="text" name="id" readonly="readonly" class="form-control" value="<?php echo $fetch[0] ?>"   /></td>
	</tr>
	<tr>
    <td>Name</td>
    <td><input type="text" name="name" class="form-control" value="<?php echo $fetch[1] ?>" /></td>
  </tr>
  <tr><td></td><td>
  	<input type="submit" value="submit" name="isub">
  </td></tr>
</table>
		</form>
		</center>
	<?php	
	
	if (isset($_POST['isub'])) {
	
// get the posted data
$dcode = $_REQUEST['id'];
$dname= $_REQUEST['name'];

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
$update=mysqli_query($connection,"UPDATE districts SET id='$dcode',name='$dname' WHERE id='$dcode' ");
if($update){
echo '<font color="green"> districts details successully updated...</font> ';
echo '<meta content="2; http-equiv="refresh" />';

}else {
echo mysqli_error();

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
