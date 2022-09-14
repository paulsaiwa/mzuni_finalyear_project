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
		<link rel = "stylesheet" type = "text/css" href = "../css/css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/style.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/.css" />
<link rel="stylesheet" type="text/css" href="../font-awesome/font-awesome/css/font-awesome.min.css">
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

input{height: 30%;}

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
	
	background: #428bca;
	text-align: ;
}
.tr:hover {background-color:#f5f5f5;}

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

table{
	margin-left: 20%;
}
</style>

	</head>
<body>
<!--------------------HEAD---------------------->
<?php //include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php //include 'sidebar.php'?>

<?php include "user_header.php";?>
		</div>
		
		<div class="w3-col ">
<div id="" class="alert alert-info w3-xlarge w3-text-black w3-center" style="margin-top: 2%;">User Registration</div>
	<form method="post">
	<table id="" style="width:; ">
	<tr><td>Firstname</td>
	<td><input type="text" name="fname" autocomplete="off"  class="form-control" pattern="[A-Za-z]+" autofocus="on" minlength="3" required style="height: 50px; margin-bottom: 4px;"/></td></tr>

	<tr><td>Surname</td><td><input type="text" name="sname" autocomplete="off"  class="form-control" pattern="[A-Za-z]+" minlength="3" required style="height: 50px; margin-bottom: 4px;"/></td></tr>
	
	<tr><td>Department name	</td><td><select name="department_id" autocomplete="off" class="form-control" required style="height: 50px; margin-bottom: 4px;">
		<?php
                include "connection.php";
						$sel=mysqli_query($connection,"SELECT *FROM department");
						echo '<option ></option>';
						while($fetch=mysqli_fetch_array($sel)){
		               echo '<option value="'.$fetch['department_id'].'">'.$fetch['department_id'].'	'.$fetch['department_name'].' '.'['.
					   $fetch['area'].']'.'</option>';
			}
						?>
	</select></td></tr>
	
	<tr><td>Area	</td><td><select name="area" autocomplete="off" class="form-control" required style="height: 50px; margin-bottom: 4px;">
		<?php
                include "connection.php";
						$sel=mysqli_query($connection,"SELECT *FROM department ");
						echo '<option ></option>';
						while($fetch=mysqli_fetch_array($sel)){
						
		               echo '<option value="'.$fetch['area'].'">'.$fetch['area'].'	'.$fetch['department_name'].'</option>';
			}
						?>
	</select></td></tr>
	
	<tr><td>User role</td>
	<td><select name="role" autofocus="off" class="form-control" required style="height: 50px; margin-bottom: 4px;">
	<option></option>
	<option>Admin</option>
	<option>Assessor</option>
	<option>In charge</option>
	</select>
	</td></tr>
	<tr><td>Email address	</td><td><input type="email" name="email" class="form-control" autocomplete="off" required  style="height: 50px; margin-bottom: 4px;" /></td></tr>
	<tr><td>Username</td><td><input type="text" name="uname"  class="form-control" autocomplete="off" pattern="[A-Za-z0-9]+" minlength="8" required style="height: 50px; margin-bottom: 4px;"/></td></tr>
	<tr><td>Status	</td><td><select name="status" class="form-control" autofocus="" required style="height: 50px; margin-bottom: 4px;">
		<option></option>
		<option>On</option>
		<option>Off</option>
	</select></td></tr>
	<tr><td></td><td><input type="submit" name="Submit" value="Save User" class="w3-green w3-hover-teal form-control" /></td></tr>
	</table>
	</form>
	</center>
	
	<?php
	if(isset($_POST['Submit'])){
	$uid='ID'.rand();
	$fname=$_POST['fname'];
	$sname=$_POST['sname'];
	$dep=$_POST['department_id'];
	$role=$_POST['role'];
	$area=$_POST['area'];
	$email=$_POST['email'];
	$username=$_POST['uname'];
	$status=$_POST['status'];
	$pwds=md5("0000");
	
	$sel=mysqli_query($connection,"SELECT *FROM user WHERE username='$username'");
	$ro=mysqli_num_rows($sel);
	if ($ro > 0 ){
	echo '<script>alert("Sorry! username is in use by someone else. please chose another username")</script>';
	}else if($username==""){
	echo '<script>alert("You forgot to enter username.username and password can\'t be empty")</script> ';
	}else if($pwds==""){
	echo '<script>alert("You forgot to enter password.password can\'t be empty<br/>")</script> ';
	}else{
	$adduser=mysqli_query($connection,"INSERT INTO user VALUES('$uid', '$fname','$sname','$dep', '$role','$area', '$email', '$username','$pwds', '$status' )");
	if(!$adduser){
	echo mysqli_error();
	}else {
	echo '<script>alert("User details added successfully")</script>';
	?>
	<script type="text/javascript">
			function redi() {
				window.location = '';
			}

			//setTimeout(redi, 2000);
		</script>
		<?php

	}
	
	}
	}?>
			</div>

		
	</div>



<div >
	<?php //include"../footer.php";?>
	</div>
<s


    <script src=""></script>
	<script src="../js/stopusers.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>

</script>


</html>