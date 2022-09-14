<?php error_reporting('E_NOTICE') ?>
<?php 
include('connection.php');
session_start();  
if(empty($_SESSION['user_id']) OR empty($_SESSION['password']) ) {  
  
   // header('Location: index.php?login=access_denied' );   
}  ?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>hims</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/moodal.css" rel="stylesheet">
	<link href="date/htmlDatepicker.css" rel="stylesheet" />
	<script language="JavaScript" src="date/htmlDatepicker.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/boxOver.js"></script>
	<style>
	input{ width:100%;}
	input[type="button"]{ width:100%;}
	select{ width:100%;}
	form{ width:300%; border:red;}
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

button{background-color: red; border:none;  border-radius:6px; hover:blue;} 
button.hover{color:blue;}
	</style>
</head>
<body>
<div id="header">
	<h1><img src="images/health.png"  width="80"/>MINISTRY OF HEALTH MALAWI</h1>

</div>
<div id="menu">
	<h1 class="head2">HOSPITAL IMPROVEMENT  MONITORING SYSTEM</h1>
</div>
<div id="#links" style=" margin-right:1px; margin-bottom:2px; margin-left:10%;">
	<div class="dropdown" style="margin-left:2px; margin-right:1px;">
  <button class="w3-button" >Reports</button>
  <div class="dropdown-content">
    <a href="">Standard</a>
    <a href="#">Assessment </a>
    <a href="#">Recommendation</a>
  </div>
</div> 
<a href="assessor.php?action=dashboard" class="w3-button"style=" margin-left:-30px">Home</a>
<div class="dropdown" >
  <button class="w3-button" >Updates</button>
  <div class="dropdown-content">
    <a href="">Recommendation</a>
    <a href="#">Follow-ups</a>
    <a href="#">Notification</a>
  </div>
</div> 
<a href="logout.php" class="w3-button" style="margin-left:10%; margin-right:-400px; color:red; ">Logout</a>
</div>
<div id="content" style="text-align:center;">
	<div id="">


	
	<?php 
 $id=$_REQUEST['standard_code'];
$sel=mysql_query("SELECT * FROM standard WHERE standard_code='$id'");

$fetch=mysql_fetch_array($sel);


?>			
		<h3 style="margin-left:%; margin-right:-300px;">Modify Standard  Verification Criteria details</h3>
		<center>
		<form method="post" style="margin-left:%; width:200%; margin-bottom:3%; height:">
	<table class="ptable" >
  <tr>
    <td>code</td>
    <td><input type="text" name="standard_code" readonly="readonly" value="<?php echo $fetch['standard_code'] ?>"   /></td>
	</tr>
	<tr>
    <td>des</td>
    <td><input type="text" name="description" value="<?php echo $fetch['description'] ?>" /></td>
  </tr>
  <tr>
    <td>Criteria</td>
    <td><textarea name="verify_criteria"> <?php echo $fetch['verify_criteria'] ?></textarea></td>
    
  </tr>
  <tr>
    <td>dep</td>
    <td><input type="text" name="department_id"  readonly="" value="<?php echo $fetch['department_id'] ?>"   /></td>
	</tr>
	 <tr>
    <td>date</td>
    <td><input type="text" name="initdate"  readonly="" value="<?php echo $fetch['initdate'] ?>"   /></td>
	</tr>
	 <tr>
    <td>user</td>
    <td><input type="text" name="user_id"  readonly="" value="<?php echo $fetch['user_id'] ?>"   /></td>
	</tr>
	 <tr>
    <td>level</td>
    <td><input type="text" name="level"   /></td>
	</tr>
	
  <tr>
    
    <td>&nbsp;</td>
    <td><input type="submit" value="submit" name="isub"/></td>
  </tr>
  
</table>
		</form>
		</center>
	<?php	
	
	if (isset($_POST['isub'])) {
	
/* get the posted data
$dcode = $_REQUEST['c_id'];
$dname= $_REQUEST['number'];
$darea= $_REQUEST['criteria'];
$dstandard=$_REQUEST['standard'];
//$date=$_REQUEST['initdate'];
//$user=$_REQUEST['user_id'];
//$rmarks=$_REQUEST['rmarks'];
//$areq = $_REQUEST['areq'];
//BACKUP
*/
 
$Bpcode = $fetch['standard_code'];
$Bicode= $fetch[1];
$Bistatus= $fetch[2];
$Bpstatus=$fetch[3];
$Brmarks=$fetch[4];
$Bareq = $fetch[5];
$level = $fetch[6];
//$s=mysql_query("SELECT * FROM  WHERE Proj_code='$Bpcode'");

//$f=mysql_fetch_array($s);
//$g=$f['Project_name'];

$backup=mysql_query("INSERT INTO ratings(standard_code,initdate,description,verify_criteria,department_id,user_id,level) VALUES('$Bpcode','$Bareq','$Bistatus','$Bpstatus','$Brmarks','$Bicode','$level')");
if(!$backup){
echo mysql_error();
}


else {
echo "Verification Criteria Already assessed, please choose another";

	}}

?>	
</div>

					
</div>

	</div>
	<div id="">
	<!---side bar slide --->
	
	
	    
</div>
<div id="footer">
	<p>Copyright saiwavincent@gmail.com</p>
</div>


<!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>
</body>
</html>
