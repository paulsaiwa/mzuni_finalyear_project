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

		<link rel="stylesheet" type="text/css" href="../font-awesome/font-awesome/css/font-awesome.min.css">
		<link rel = "stylesheet" type = "text/css" href = "../css/css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/style.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/.css" />
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

input{
	width: 100px;
}

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
	width:248%;
	margin-left:  ;
	height: 34px;
	background: #428bca;
	text-align: ;
}

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
</style>

	</head>
<body>
<!--------------------HEAD---------------------->
<?php //include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php //include 'sidebar.php'?>
<!-------------------SIDEBAR0------------------>
<div id="header">
	<h1 style="font-size: 30px;"><img src="../images/health.png" style="width:100px; height: 100%;" />MINISTRY OF HEALTH MALAWI</h1>

</div>

<div class="w3-row w3-grey" style="margin-top: -10px ; font-size: 17px; border-top-color: red; border-top-style: solid; border-bottom-style: solid; border-bottom-color: red;">
<a  href ="home.php?action=dash" class = " w3-btn w3-button fa fa-home" style="background-color:; border:none; margin-left: 10%; margin-right: 10%; font-size: 20px; color: white;"> Home</a>
<a  href ="" class = " w3-btn w3-button fa fa-refresh" style="background-color:; border:none; margin-left: 10%;  font-size: 20px; color: white;"> Refresh</a>
<div class="dropdown" style="margin-left:10%; margin-right:10%;">
  <button class="w3-btn w3-button fa fa-users" style="background-color:sand; border:none; margin-left: 20%;margin-right: 10%; font-size: 20px; color: white">Manage User</button>
  <div class="dropdown-content">
       <button class="w3-btn w3-red w3-block"  >View</button>
    <button class="w3-btn w3-light-grey w3-block" id="">Add</button>
    <button class="w3-btn w3-light-grey w3-block" id="">Modify</button>
     <button class="w3-btn w3-light-grey w3-block" id="">Delete-User</button>
       <button class="w3-btn w3-light-grey w3-block" id="">Deactivate-user</button>
    <a href="#"></a>
  </div>
</div> 

<a  href ="../logout.php" class = "w3-btn w3-bar-item w3-red fa fa-sign-out w3-button w3-right" style="height:35px; padding-top: 8px; font-size: 20px; ">Logout</a>

		</div>
		
		<div class="w3-col ">

			<div class="w3-padding cs" id="View">
				
				<div class = "alert alert-info w3-center " style="margin-top: 3%; font-size: 20px; color: black;">User profile Details</div><div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table" class = "table table-bordered" style="">
							<thead class="">
								<tr>
									
									<th>Firstname</th>
									<th>Surname</th>
									<th>Department</th>
									<th>Role</th>
									<th>Email</th>
									<th>Username</th>
									<th>Status/Action</th>
									
									
								</tr>
							</thead>
							<tbody>
								<?php
								
									$s_query = $conn->query("SELECT * FROM `user` WHERE username != '".trim($_SESSION['user_id'])."'") or die(mysqli_error());
									while($s_fetch = $s_query->fetch_array()){
									$user_id = $s_fetch['user_id'];
								?>
								<tr>
									
									<td><?php echo $s_fetch['fname']?></td>
									<td><?php echo $s_fetch['sname']?></td>
									<td><?php echo $s_fetch['department_id']?></td>
									<td><?php echo $s_fetch['role']?></td>
									<td><?php echo $s_fetch['email_address']?></td>
                                    
									<td><?php echo $s_fetch['username']?></td>
									<td><?php if ($s_fetch['status'] == "Off") {
										echo "<font id=\"tt$user_id\">".$s_fetch['status']."</font>";
									}
									else{
										echo "<font id=\"tt$user_id\">On</font>";
									} ?> &nbsp;<label class="switch">
									  <input type="checkbox" id="<?php echo $s_fetch['user_id']?>" onchange="see('<?php echo $s_fetch['user_id']?>');" <?php if ($s_fetch['status'] != "Off") { echo "checked";}?>>
									  <span class="slider round"></span>
									</label></td>									
								</tr>
		
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
				</div>
				
		</div>
	

			</div>

			<div class="w3-padding cs" id="Add" style="display: none;">
				<center>
	<div id="" class="alert alert-info w3-xlarge w3-text-black">User Registration</div>
	<form method="post">
	<table id="" style="width: 70%;">
	<tr><td>Firstname</td>
	<td><input type="text" name="fname" autocomplete="off"  class="form-control" pattern="[A-Za-z]+" autofocus="on" minlength="3" required /></td></tr>

	<tr><td>Surname</td><td><input type="text" name="sname" autocomplete="off"  class="form-control" pattern="[A-Za-z]+" minlength="3" required /></td></tr>
	
	<tr><td>Department name	</td><td><select name="department_id" autocomplete="off" class="form-control" required style="width: 100%;">
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
	
	<tr><td>Area	</td><td><select name="area" autocomplete="off" class="form-control" required>
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
	<td><select name="role" autofocus="off" class="form-control" required>
	<option></option>
	<option>Admin</option>
	<option>Assessor</option>
	<option>In charge</option>
	</select>
	</td></tr>
	<tr><td>Email address	</td><td><input type="email" name="email" class="form-control" autocomplete="off" required  /></td></tr>
	<tr><td>Username</td><td><input type="text" name="uname"  class="form-control" autocomplete="off" pattern="[A-Za-z0-9]+" minlength="8" required /></td></tr>
	<tr><td>Status	</td><td><select name="status" class="form-control" autofocus="" required>
		<option></option>
		<option>On</option>
		<option>Off</option>
	</select></td></tr>
	<tr><td></td><td><input type="submit" name="Submit" value="AddUser" class="w3-green w3-hover-teal form-control" /></td></tr>
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

			<div class="w3-padding cs" id="Edit" style="display: none;">
			
				<h1>Select visit to view and Edit details</h1>
	<form method="post" action="visitedit.php">
	 
	 <select name="visitid">
                <?php
						$sel=mysqli_query($connection,"SELECT *FROM visit ORDER by visit_date");
						while($fetch=mysqli_fetch_array($sel)){
		               echo '<option value="'.$fetch['visit_id'].'">'.$fetch['assessor'].'</option>';
			}
						?>
	
	</select>
	
	 <input type="submit" name="go" value="click" />
	</form>
			</div>

		</div>

		<div class="w3-padding cs" id="Viewing" style="display: none;">
			<div class = "alert alert-info">Assessor visit Status</div><div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table2" class = "table table-bordered" style="">
							<thead>
								<tr>
									<th>Visit ID</th>
									<th>Date of Visit</th>
									<th>Visit Type</th>
									<th>Name of Visit</th>
									<th>User Id</th>
									
									
									
								</tr>
							</thead>
							<tbody>
								<?php
								
									$s_query = $conn->query("SELECT * FROM `visit`") or die(mysqli_error());
									while($s_fetch = $s_query->fetch_array()){	
								?>
								<tr>
									<td><?php echo $s_fetch['visit_id']?></td>
									<td><?php echo $s_fetch['visit_date']?></td>
									<td><?php echo $s_fetch['visit_type']?></td>
									<td><?php echo $s_fetch['assessor']?></td>
									<td><?php echo $s_fetch['user_id']?></td>
									
									
									
									
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
		</div>
		<div class="w3-padding cs" id="Adding" style="display: none;">

		<center>	<h1 style="background-color:" class = "alert alert-info">Add visit</h1>
	<form method="post">
	<table id="utable">
	<tr><td>Visit type:	</td><td><select name="visit_type" >
	<option></option>
	<option>Assessment</option>
	<option>Follow-up</option>
	<option>Reporting</option>
	</td></tr>
	<tr><td>Assessor name:</td>
	<td><select name="assessor" required  style="width:100%; height:40px;" >
	<?php
                include "connection.php";
						$sel=mysqli_query($connection,"SELECT *FROM user where role='Assessor' ORDER by name");
						echo '<option >--select name--</option>';
						while($fetch=mysqli_fetch_array($sel)){
						
		               echo '<option value="'.$fetch['name'].'">'.$fetch['name'].'	'.$fetch['role'].'</option>';
			}
						?></td></tr>
	<tr><td>User ID *:	</td>
	<td><select name="user_id" required  style="width:100%; height:40px;" ><?php
                include "connection.php";
						$sel=mysqli_query($connection,"SELECT *FROM user WHERE role='Assessor'");
						echo '<option >--select Assessor ID--</option>';
						while($fetch=mysqli_fetch_array($sel)){
						
		               echo '<option value="'.$fetch['user_id'].'">'.$fetch['user_id'].'	
					   '.$fetch['name'].'	'.$fetch['role'].'</option>';
			}
						?></td></tr>
	
	<tr><td></td><td><input type="submit" name="Submit" value="AddVisit" /></td></tr>
	</table>
	</form>
		</center>
	<?php
	if(isset($_POST['Submit'])){
	$uid='V'.rand();
	$name=date("F d , Y");
	$dep=$_POST['visit_type'];
	$role=$_POST['assessor'];
	$email=$_POST['user_id'];
	
	$sel=mysqli_query("SELECT *FROM visit WHERE visit_date='$dep'");
	$ro=mysqli_num_rows($sel);
	if ($ro > 0 ){
	echo 'Sory! Visit Id is in use by someone else. please chose another user date';
	}else if($uid==""){
	echo '<br/>You forgot to enter Visit id. Visit id and User Id can\'t be empty<br/>';
	}else if($email==""){
	echo 'You forgot to enter user ID.user can\'t be empty<br/>';
	}else{
	$adduser=mysqli_query("INSERT INTO visit VALUES('$uid', '$name', '$dep', '$role', '$email')");
	if(!$adduser){
	echo mysqli_error();
	}else {
	echo '<font style="color:green; margin-left:30%; ">Visit details added successfully</font>';
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
	}
	?>
		</div>
		<div class="w3-padding cs" id="Delete" style="display: none;">
			<h1>Select used to delete</h1>
	<form method="post">
	 
	 <select name="visitid">
                <?php
						$sel=mysqli_query($connection,"SELECT *FROM visit ");
						while($fetch=mysqli_fetch_array($sel)){
		               echo '<option value="'.$fetch['visit_id'].'">'.$fetch['assessor'].'</option>';
			}
						?>
	
	</select>
	
	 <input type="submit" name="delete"  value="Delete Visit" />
	</form>
	
	<?php
	if(isset($_POST['delete'])){
	
	
	 $id=$_POST['visitid'];
	 $query=mysqli_query($connection,"DELETE FROM visit WHERE 1 AND visit_id='$id'");
	 if($query){
	  echo 'visit has been deleted';
	  ?>
	  <script type="text/javascript">
			function redi() {
				window.location = '';
			}

		//	setTimeout(redi, 2000);
		</script>
		<?php
	  
	 }else{
	
	 echo 'please click delete button again';
	 
	 }	}?>

		</div>

				<div class="w3-padding cs" id="Modify" style="display: none;">
					<h1>Select user to view and modify details</h1>
						<form method="post" action="useredit.php">
	 
							 <select name="userid" class="form-control">
                <?php
						$sel=mysqli_query($connection,"SELECT *FROM user ");
						while($fetch=mysqli_fetch_array($sel)){
		               echo '<option value="'.$fetch['user_id'].'">'.$fetch['username'].'	'.$fetch['fname'].'		'.$fetch['sname'].'	'.$fetch['department'].'</option>';
			}
						?>
		<script type="text/javascript">
			function redi() {
				window.location = '';
			}

			//setTimeout(redi, );
		</script>
	
	</select>
	
	 <input type="submit" name="go" value="click" class="form-control w3-green w3-xlarge"  style="padding-top: -4px;" />
	</form>
				</div>

				<div class="w3-padding cs" id="Delete-User" style="display: none;">
					<h1>Select User to delete</h1>
	<form method="post">
	 
	 <select name="userid">
	 			<option value="option"></option>
                <?php
						$sel=mysqli_query($connection,"SELECT *FROM user ");
						while($fetch=mysqli_fetch_array($sel)){
		               echo '<option value="'.$fetch['user_id'].'">'.$fetch['username'].'	'.$fetch['name'].'	'.$fetch['role'].'	'.$fetch['user_id'].'</option>';
			}
						?>
	
	</select>
	
	 <input type="submit" name="delete"  value="Delete User" class="form-control w3-xlarge w3-green w3-hover-teal" style="width: 100%;" />
	</form>
	
	<?php
	if(isset($_POST['delete'])){
	
	
	 $id=$_POST['userid'];
	 $query=mysqli_query($connection,"DELETE FROM user WHERE 1 AND user_id='$id'");
	 if($query){
	  echo '<script>alert("user has been deleted")</script> ';?>

	  <script type="text/javascript">
			function redi() {
				window.location = 'user_profile.php?act=Delete-User';
			}

			//setTimeout(redi, 2000);
		</script>
		<?php
	  
	 }else{
	
	 echo 'please click delete button again';
	 
	 }}?>
				</div>


			<script type="text/javascript">
	$('.w3-block').click(function() {
		var text = $(this).text();
		//changing color of button
		$('.w3-block').removeClass('w3-red').removeClass('w3-light-grey');
		$(this).addClass('w3-red');
		//showing the div
		$('.cs').hide();
		$('#'+text).show();
	})
</script>
	<?php include '../footer1.php';?>
	<div class="w3-modal" id="deModal">
		<div class="w3-modal-content" style="width: 500px;" id="modalContent"></div>
	</div>
</body>	

<script src = "../js/js/jquery-3.1.1.js"></script>
<script src = "../js/js/sidebar.js"></script>
<script src = "../js/js/bootstrap.js"></script>
<script src = "../js/js/jquery.dataTables.min.js"></script>
<script src = "../js/js/script.js"></script>


    <script src=""></script>
	<script src="../js/stopusers.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
		$('#table2').DataTable();
	});

	function deactivate(id) {
		$.ajax({
			url: "draw.php",
			method: "POST",
			data: {id:id},
			success: function(result) {
				$('#modalContent').html(result);
				$('#deModal').show();
			}
		})
	}

	function see(tab) {
	    var tabs = document.getElementById(tab);
	    if (tabs.checked == true) {
	    	var ched = "On";
	    	$.ajax({
				url: "draw.php",
				method: "POST",
				data: {id:tab, valu:ched},
				success: function(result) {
					$('#tt'+tab).html(result);
				}
			});
	    }
	    else{
	    	var ched = "Off";
	    	$.ajax({
				url: "draw.php",
				method: "POST",
				data: {id:tab, valu:ched},
				success: function(result) {
					$('#tt'+tab).html("Off");
				}
			});
	    }
	}
</script>

</html>
