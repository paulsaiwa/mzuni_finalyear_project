<?php error_reporting('E_NOTICE') ?>
<?php 
include('connection.php');
session_start();  
if(!empty($_SESSION['ID']) OR !empty($_SESSION['password']) ) {  
  
   header('Location: index.php?login=access_denied' );   
}  ?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>hims</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script> 
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/.css" rel="stylesheet">
     <link href="css/moodal.css" rel="stylesheet">
      <link href="css/.css" rel="stylesheet">
	<link href="date/htmlDatepicker.css" rel="stylesheet" />
	<script language="JavaScript" src="date/htmlDatepicker.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/boxOver.js"></script>
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


 </style>
</head>
<body class=" ">


<div id="header">
	<h1><img src="images/health.png" style="width:80px;" />MINISTRY OF HEALTH MALAWI</h1>

</div>
<div id="menu">
	<h1 class="head2" style="font-size:30px;color:lightblue;text-shadow:7px 7px 4px #000000;">HOSPITAL IMPROVEMENT MONITORING SYSTEM</h1>
</div> 
<div class="w3-bar w3-sand" style="margin-top: -10px;">
  <a href="home.php?action=dash" class="w3-bar-item w3-button" style="margin-left: 10%; margin-right: 10%;">Home</a>
 <a href="home.php?action=vdepartment" class="w3-bar-item w3-button" style="margin-left: 10%; margin-right: 10%;">Department</a>
    <a href="index.php" class="w3-bar-item w3-button "style="margin-left: 20%; margin-right: ; background: red; color:white">Logout</a>
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
'.'<t style="color:black; margin-right:20px;">'.'User:'.'</t>'.$Name.'<img src="images/private.png">'.'</d>';

?>

</div>


  
<div class="w3-container">
	<?php 
 $id=$_REQUEST['department_id'];
$sel=mysql_query("SELECT * FROM department WHERE department_id='$id'");

$fetch=mysql_fetch_array($sel);


?>			
		<h3 style="margin-left:60%; margin-right:">Modify department details</h3>
		<center>
		<form method="post" >
	<table class="ptable" width="" height="">
  <tr>
    <td>Department ID</td>
    <td><input type="text" class="form-control" name="department_id" readonly="readonly" value="<?php echo $fetch[0] ?>"  style="width: 100%;" /></td>
	</tr>
	<tr>
    <td>Name</td>
    <td><input type="text"  class="form-control" name="name" value="<?php echo $fetch[1] ?>"  style="width: 100%;" /></td>
  </tr>
  <tr>
    <td>Area Number</td>
    <td><input type="text"  class="form-control" name="area"  value="<?php echo $fetch[2] ?>" style="width: 100%;"></td>
    
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
	
// get the posted data
$dcode = $_REQUEST['department_id'];
$dname= $_REQUEST['name'];
$darea= $_REQUEST['area'];
//$dstandard=$_REQUEST['standard'];
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
$update=mysql_query("UPDATE department SET department_id='$dcode',name='$dname', area='$darea' WHERE department_id='$dcode' ");
if($update){
echo '<font color="green">Department details successully updated...</font> ';
echo '<meta content="2;home.php?action=vdepartment" http-equiv="refresh" />';

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
<div id="footer">
	<p>Copyright saiwavincent@gmail.com</p>
</div>


<!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>
</body>
</html>
