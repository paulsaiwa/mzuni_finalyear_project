

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

function department_name($id)
{
  global $connection;
  $sql = mysqli_query($connection,"SELECT * FROM department WHERE department_id = '$id' ");
  $data = mysqli_fetch_assoc($sql);
  return $data['department_name'];
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
    <link href="css/.css" rel="stylesheet">
    <link href="css/.css" rel="stylesheet">
     <link href="../css/.css" rel="stylesheet">
      <link href="../css/moodal.css" rel="stylesheet">
	<link href="../date/htmlDatepicker.css" rel="stylesheet" />
	<script language="JavaScript" src="../date/htmlDatepicker.js" type="text/javascript"></script>
	<script type="text/javascript" src="../js/boxOver.js"></script>
<link rel="stylesheet" type="text/css" href="../font-awesome/font-awesome/css/font-awesome.min.css">


  <script type="text/javascript" src="../vendor/jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="../vendor/boostrap/css/boostrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/moodal.css">
	
<script language="javascript" type="text/javascript">
<!-- 
//Browser Support Code
function ajaxFunction(){
var ajaxRequest; // The variable that makes Ajax possible!
try{
// Opera 8.0+, Firefox, Safari
ajaxRequest = new XMLHttpRequest();
}catch (e){
// Internet Explorer Browsers
try{
ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
}catch (e) {
try{
ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
}catch (e){
// Something went wrong
alert("Your browser broke!");
return false;
}
}
}
// Create a function that will receive data 
// sent from the server and will update
// div section in the same page.
ajaxRequest.onreadystatechange = function(){
if(ajaxRequest.readyState == 4){
var ajaxDisplay = document.getElementById('ajaxDiv');
ajaxDisplay.innerHTML = ajaxRequest.responseText;
}
}
// Now get the value from user and pass it to 

// server script.
var sta = document.getElementById('standard_code').value;
var department = document.getElementById('department').value;
var wpm = document.getElementById('department').value;
var sex = document.getElementById('role').value;
var queryString = "?standard_code=" + standard_code ;
queryString += "&username=" + username + "&role=" + role + "&department=" + department;
ajaxRequest.open("GET", "saiwa.php" + 
queryString, true);
ajaxRequest.send(null); 
}
</script>
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
  width: 100%;
  background: #f1f1f1;
  
  margin-top:5%;
  margin-left:;
  margin-right:;
  border-radius:6px;
 
}




.search {
  float: ;
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

button{background-color: red; border:none; width:100%; height:100%; border-radius:6px; hover:blue;} 
button.hover{color:blue;}
 </style>
</head>
<body class="w3-white">

<?php include 'assessor_header.php';?>
<div class="w3-bar w3-grey w3-large w3-hover" style="margin-top: 6px; border-top-style: solid; border-top-color: red; border-bottom-style: solid; border-bottom-color: red;">
  <a href="assessor.php?action=dashboard" class="w3-bar-item w3-button fa fa-home" style="margin-left: %; margin-right: 2%; font-size: 20px; color: white;">Home</a>

<a href="assessor_assessment_details.php" class="w3-bar-item w3-button fa fa-edit" style="margin-left: 2%; margin-right: 2%; font-size: 20px; color: white;">Manage Assessment</a> 
<a href="assessment_report.php" class="w3-bar-item w3-button fa fa-archive" style="margin-left: 2%; margin-right: 2%; font-size: 20px; color: white;">General Observation</a>

<a href="rules.php" class="w3-bar-item w3-button fa fa-wpforms" style="margin-left: 2%; margin-right: 2%; font-size: 20px; color: white;">Assessment Rule</a> 

  <a href="../logout.php" class="w3-bar-item w3-button w3-red fa fa-sign-out w3-right" style="font-size: 20px;">Logout</a>
</div>





<div class="w3-bar w3-#FFFFCC " style=" ; " >
 <?php
      include "connection.php";
      $user_id=$_SESSION['user_id'];
     
      
      $result=mysqli_query($connection,"select * from user where user_id='$user_id'")or die(mysqli_error());
      $date=mysqli_query($connection,"SELECT curdate() as date");
      $row=mysqli_fetch_array($result);
      $d=mysqli_fetch_array($date);
      $Name=$row['fname'];
      $role=$row['sname'];


      echo '<label style="float:; color:black; margin-left:%; font-size:20px;">'.'Department name:'.' <b style="color:blue;">  '.department_name($row['department_id'])."</b> ".'</label>'; 
  
echo '<d  style="color:black; font-size:20px;" class="fa fa-user w3-right" >'.'User:<t style="color:green;">'.'   '.$Name.'   '.$role.'</t>'.'</d>';

?>
 
</div>
   <?php
      include "connection.php";
      $user_id=$_SESSION['user_id'];
           
      $result=mysqli_query($connection,"select * from user where user_id='$user_id'")or die(mysqli_error());
      $date=mysqli_query($connection,"SELECT curdate() as date");
      $row=mysqli_fetch_array($result);
      $d=mysqli_fetch_array($date);
      //$Name=$row['name'];
      $role=$row['role'];
      $dep_id = $row['department_id'];
      $_SESSION['department_id'] = $dep_id;
      //echo '<img src="../images/admin.png" style="margin-top-30%;"> logged in as [<font color="green" size="3"> '.$role.'</font>]';?>
  &nbsp;
  
  </div>
</div>

</div>
</div>


  
        <form class="example w3-center" action="ass_search_stand.php" name="" style="margin-top: 4%; margin-left: 4%;">
          <table class="w3-table w3-table-all w3-light-grey" style="border: none;">
            <tr>
              <td><button class="w3-bar-item w3-grey w3-text-white w3-large fa fa-plus-square" onmouseover="mOver(this)" onmouseout="mOut(this)" 
style="background-color:#D94A38;padding:40px; color: solid black; "><i style="">Standard Code</i> <br>
               <?php
      include "connection.php";
      $user_id=$_SESSION['user_id'];
     
      
      $result=mysqli_query($connection,"select * from user where user_id='$user_id'")or die(mysqli_error());
      $date=mysqli_query($connection,"SELECT curdate() as date");
      $row=mysqli_fetch_array($result);
      $d=mysqli_fetch_array($date);
      //$Name=$row['name'];
      $role=$row['role'];


      echo '<label style="float:center; ">'.''.'Department ID   '." (<b style=\"color:red\">" .$row['department_id'].")".'</label>'; ?>
    </button></td>
              <td>
                <input type="text" placeholder="Standard code..." name="standard_code" class="form-control w3-center fa fa-search" id="search" onkeyup="showResult(this.value)" autocomplete="off"autofocus="on" required>
              
              
                <input type="submit" value="Search "  style="margin-top: 18px; border:none; border-radius:6px; margin-left: %; background-color:#428bca; height:40px; width:130px; text-align:center;" class="w3-blue w3-hover-teal fa fa-user"></td>
                
            </tr>

          </table>
  

<div id="livesearch"></div>
  </form>
  



<?php
if(isset($_GET['standard_code'])){
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "ictpms";


 $user_id=$_SESSION['user_id'];
$connection= mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysqli_select_db($connection, $mysql_database) or die("Could not select database");
 $idmark = $_GET['standard_code'];
$sql = "select * from standard where standard_code='".$idmark. "' ";
$result = mysqli_query($connection,$sql);

 
      if (mysqli_num_rows($result)>0) {  $i=0; 
      
      echo '<table class="display nowrap table table-hover table-striped table-bordered" style="margin-left:2%; width:1000px;">';
            echo '<thead class=" w3-large w3-center" style="background-color:rgb(180, 180, 180);"><tr class="w3-silver" style="padding-left:3px;">';
              echo '<th><pre>Standard Code</pre></th>';
                echo '<th><pre>Standard Description </pre></th>';
               
         echo ' <th style="width:200px;"><pre class="fa fa-angle-double-right">Verification Criteria</pre></th>';
                
                

           echo ' </tr></thead>';
            while($row = mysqli_fetch_assoc($result)) { 
     
                echo '<tbody><td>'.$row['standard_code'].'</td>';
          echo '<td>'.$row['description'].'</td>';
        
          echo '<td><a href="assess_edit1.php?standard_code='.$row['standard_code'].
          '" class="w3-green w3-btn w3-bar-item" style="width:100%; border-radius:4px; "><span class="fa fa-edit" style="color:black">Criteria Assessment <span></a> </td></tbody>'; 
          
          echo '</tr>';
        
                ?>
            
          </td> 

            </tr>


      <?php $i++;}}
  
       
      echo "</table>";
    }
?>
  </div>

      

      <div class="w3-padding cs" id="Profile" style="display: none; margin-left: 20%; margin-top: -15%;">
     <?php   
      include "connection.php";
      $user_id=$_SESSION['user_id'];
           
      $result=mysqli_query($connection,"select * from user where user_id='$user_id'")or die(mysqli_error);
      $date=mysqli_query($connection,"SELECT curdate() as date");
      $row=mysqli_fetch_array($result);
      $d=mysqli_fetch_array($date);
      $Name=$row['name'];
      $role=$row['role'];
      $dep_id = $row['department_id'];
      $_SESSION['department_id'] = $dep_id;
      echo '<table>
      <thead>
          <tr>
          <td>user ID</td>';
      echo '<td>'.$role.'</td>'.
          '</tr></thead> </table>';?>
  &nbsp;

      </div>

      <div class="w3-padding cs" id="About" style="display: none; margin-left: 20%; margin-top: -15%;">
        <h3>Tab content 3</h3>
      </div>

    </div>


<!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>
	<script src="../js/stopusers.js"></script>
	
		<script type="text/javascript">
  $('.w3-block').click(function() {
    var text = $(this).text();
    //changing color of button
    $('.w3-block').removeClass('w3-red').removeClass('w3-light-grey');
    $(this).addClass('w3-red');
    //showing the div
    $('.cs').hide();
    $('#'+text).fadeIn();
  })
</script>
<script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>

<script>
function mOver(obj) {
    obj.innerHTML = "Please Start with Department ID given, then integer - e.g FANC-01, FANC-02"
}

function mOut(obj) {
    obj.innerHTML = "Hover on me"
}
</script>

<div id="footer"  class="w3-center" style="margin-top: 10%;">
   <?php include '../footer.php';?>
</div>


</body>
</html>
