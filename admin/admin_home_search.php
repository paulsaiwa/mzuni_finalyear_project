
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
    <link href="css/.css" rel="stylesheet">
    <link href="css/.css" rel="stylesheet">
     <link href="css/moodal.css" rel="stylesheet">
      <link href="css/.css" rel="stylesheet">
	<link href="date/htmlDatepicker.css" rel="stylesheet" />
	<script language="JavaScript" src="date/htmlDatepicker.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/boxOver.js"></script>
	<script src="js/stopusers.js"></script>
	
	
<style>
<?php// style for search textbox , open the tags?>
body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: center;
  width: 40%;
  background: #f1f1f1;
  
  margin-top:3%;
  margin-left:10%;
 
}

.search {
  float: center;
  width: 20%;
  padding: 10px;
  background: #428bca;
  color: white;
  font-size: 17px;
  border: none;
  border-left: none;
  cursor: pointer;
   border-radius:6px;
}

form.example button:hover {
  background: #;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
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

.link{background-color: red; margin-left:30%; float:center;} 
 </style>
</head>
<body>
<div id= "">
<div id="header">
	<h1><img src="images/health.png" style="width:80px;" />MINISTRY OF HEALTH MALAWI</h1>

</div>
<div id="menu">
	<h1 class="head2" style="font-size:30px;color:lightblue;text-shadow:7px 7px 4px #000000;">
	HOSPITAL IMPROVEMENT MONITORING SYSTEM</h1>
	
</div> 
<div id="#links" style=" margin-right:1px; margin-bottom:2px;">
	<div class="dropdown" style="margin-left:30%; margin-right:30%:">
  <button class="w3-button" >Reports</button>
  <div class="dropdown-content">
    <a href="home.php?action=pdetails">Standard</a>
    <a href="#">Assessment </a>
    <a href="#">Recommendation</a>
  </div>
</div> 
<a href="home.php?action=dash" class="w3-button" style="margin-left:20%; margin-right:20%; ;" >Home</a>

<a href="logout.php" class="w3-button" style="margin-left:10%; margin-right:-500px; color:red; ">Logout</a>
</div>
<div id="content">
	<div id="">
	<?php
			include " connection.php";
			$user_id=$_SESSION['user_id'];
			$id=$_SESSION['name'];
			
			$result=mysql_query("select * from user where username='$user_id'")or die(mysql_error);
			$date=mysql_query("SELECT curdate() as date");
			$row=mysql_fetch_array($result);
			$d=mysql_fetch_array($date);
			$Name=$row['name'];
			$role=$row['role'];
	
echo '<img src="images/admin.png"> logged in as <font color="red" size="3"> '.'   '.$role.
'</font>'.'<b style="margin-left:50%; color:">'.'user :'.'<a style="margin-left:2%; color:green">  '.$Name.'</a>'.'</b>';



?>
  
  <?php
	//$action=$_REQUEST['action'];
	//if($action=='dash'){
	 ?>

 


<form class="example" action="admin_home_search.php">
<h3 style="margin-left:20%;"> Search Standard details</h3>
  <input type="text" placeholder="Search by standard code " name="standard_code">
  <input type="submit" value="Search" class="search" >
</form>


<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "ictpms";
mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database) or die("Could not select database");
 $idmark = $_GET['standard_code'];
$sql = "select * from standard where standard_code = '".$idmark."'";
$result = mysql_query($sql);

 
			if (mysql_num_rows($result)>0) {  $i=0; 
			echo '<table style="background:; width:80%; text-align:center; border-left: solid #428bca; 
		 margin-top:3%;	border-right: solid #428bca; margin-bottom:10px;" >';
            echo '<tr style="background:#428bca; color:white ;text-align:center;">';
              echo '<th><strong>Standard Code</strong></th>';
                echo '<th><strong>Description</strong></th>';
               echo ' <th><strong>Criteria</strong></th>';
			   echo ' <th><strong>Department</strong></th>';
                
                

           echo ' </tr>';
            while($row = mysql_fetch_assoc($result)) { ?>
     
                <td><?php echo $row['standard_code'];?></td>
                <td><?php echo $row['description'];?></td>
                <td><?php echo $row['verify_criteria'];?></td>
                <td><?php echo $row['department_id'];?></td>
                <td><?php //echo $row[''];?></td>

            </tr>


			<?php $i++;}}
			 else echo '<b style=" margin-left:20%; margin-top:%; color:red;">'
			 .' no results found, please try again or</b> <a href="
			 home.php?action=pdetails" style="color:blue;"> click here to add </a>';
			echo '</table>';
?>
	</div>
	</div>
	</div>
	
	<div >
	<!---side bar slide --->
	
	   
            </div>

        <!--- side bar slide --->
	
	

	
<div id="footer">
	<p>Copyright@ saiwavincentgmail.com</p>
</div>


<!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>
	
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
</body>
</html>
