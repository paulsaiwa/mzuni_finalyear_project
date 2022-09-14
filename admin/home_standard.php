
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
	
	<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/css/style.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/css/jquery.dataTables.css" />
	
	
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
  
  <div id = "sidecontent" class = "well pull-right">
				<div class = "alert alert-info">students profile</div>
				
				<button style = "display:none;" type = "button" id = "cancel_student" class = "btn btn-warning"><span class = "glyphicon glyphicon-hand-right"></span> Cancel</button>
				<br />
				<br />
				<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table" class = "table table-bordered">
							<thead>
								<tr>
									<th>company name</th>
									<th>Firstname</th>
									<th>Lastname</th>
									<th>Email</th>
									<th>Gender</th>
									<th>CV</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								
									$s_query = $conn->query("SELECT * FROM `user`") or die(mysqli_error());
									while($s_fetch = $s_query->fetch_array()){	
								?>
								<tr>
									<td><?php echo $s_fetch['name']?></td>
									<td><?php echo $s_fetch['first_name']?></td>
									<td><?php echo $s_fetch['last_name']?></td>
									<td><?php echo $s_fetch['email']?></td>
									<td><?php echo $s_fetch['gender']?></td>
                                    
									<td><?php echo $s_fetch['file']?></td>
									<td><center> <a href = "#" name = "<?php echo $s_fetch['id']?>" data-toggle = "modal" data-target = "#delete_student" class = "btn btn-danger id"><span class=  "glyphicon glyphicon-trash"></span> Delete</a></center></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
				<div class = "modal fade" id = "delete_student" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
					<div class = "modal-dialog" role = "document">
						<div class = "modal-content ">
							<div class = "modal-body">
								<center><label class = "text-danger">Are you sure you want to delete this particulars?</label></center>
								<br />
								<center><a class = "btn btn-danger delete_student" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
							</div>
						</div>
					</div>
				</div>
				
		</div>
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
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
	
	<script src = "js/js/jquery-3.1.1.js"></script>
<script src = "js/js/sidebar.js"></script>
<script src = "js/js/bootstrap.js"></script>
<script src = "js/js/jquery.dataTables.min.js"></script>
<script src = "js/js/script.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	});
</script>
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#pic')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200)
						.css('display', 'block');
					$('.pic_hide').hide();
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('.id').on('click', function(){
			$id = $(this).attr('name');
			$('.delete_student').on('click', function(){
				window.location = 'delete_student.php?id=' + $id;
			});
		});
	});
</script>



	
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
