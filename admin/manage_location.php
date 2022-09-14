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
		
		<link rel = "stylesheet" type = "text/css" href = "../css/css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/.css" />
	<script type="text/javascript" src="../vendor/jquery/jquery.min.js"></script>
	<link rel="stylesheet" href="../vendor/boostrap/css/boostrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/moodal.css">
		<style>

		input[type=text] ,input[type=email], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    height: 40px; 
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}
input[type=password]{width: 100%;}


		#header h1 {
	margin-top: -12px;
	padding: 5px 20px 0px 0px;
	text-transform: uppercase;
	font-weight: bold;
	text-align:center;
	color:;
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
	<h1><img src="images/health.png" style="width:80px;" />MINISTRY OF HEALTH MALAWI</h1>

</div>
<div id="menu" style="margin-top: -30px">
	<h1 class="head2" style="font-size:30px;color:lightblue;text-shadow:7px 7px 4px #000000; ">HOSPITAL IMPROVEMENT MONITORING SYSTEM</h1>
</div>
<div class="w3-row w3-sand" style="margin-top: -10px">
<a  href ="home.php?action=dash"><button type = "button" class = "btn btn-success" style="background-color:; border:none; margin-left: 20%; margin-right: 10%;"><span class = "glyphicon "></span> Home</button> </a>
<div class="dropdown" style="margin-left:; margin-right:30%:">
  <button type="button" class="btn btn-success" style="background-color:sand; border:none; margin-left: 20%;margin-right: 10%;"><span class = "glyphicon glyphicon-plus"></span>Manage User</button>
  <div class="dropdown-content">
       <button class="w3-btn w3-light-grey w3-block" id="uview" >View</button>
    <button class="w3-btn w3-light-grey w3-block" id="uadd">Add</button>
    <button class="w3-btn w3-light-grey w3-block" id="uedit">Modify-User</button>
     <button class="w3-btn w3-light-grey w3-block" id="udel">Delete-User</button>
    <a href="#"></a>
  </div>
</div> 
<div class="dropdown" style="margin-left:; margin-right:30%:">
  <button type="button" class="btn btn-success" style="background-color:sand; border:none; margin-left: 20%;margin-right: 10%;"><span class = "glyphicon glyphicon-plus"></span>Manage Visit</button>
  <div class="dropdown-content">
       <button class="w3-btn w3-light-grey w3-block" >Viewing</button>
    <button class="w3-btn w3-light-grey w3-block" id="vadd">Adding</button>
    <button class="w3-btn w3-light-grey w3-block" id="gh">Edit</button>
    <button class="w3-btn w3-light-grey w3-block" id="del">Delete</button>
    <a href="#"></a>
  </div>
</div> 
<a  href ="index.php"><button type = "button" class = "btn btn-success" style="background-color:red; border:none; margin-left: 20%;"><span class = "glyphicon "></span>Logout</button> </a>

		</div>
		
		<div class="w3-col ">

			<div class="w3-padding cs" id="View">
				
				<div class = "alert alert-info">Standard details</div><div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table" class = "table table-bordered" style="">
							<thead>
								<tr>
									<th>Standard Code</th>
									<th>Description</th>
									<th>Criteria number</th>
									<th>Verification Criteria</th>
									<th>Department name</th>
									<th>Area number</th>
									
									
									
								</tr>
							</thead>
							<tbody>
								<?php
								
									$s_query = $conn->query("SELECT * FROM `standard`") or die(mysqli_error());
									while($s_fetch = $s_query->fetch_array()){	
								?>
								<tr>
									<td><?php echo $s_fetch['standard_code']?></td>
									<td><?php echo $s_fetch['description']?></td>
									<td><?php echo $s_fetch['department_id']?></td>
									<td><?php echo $s_fetch['role']?></td>
									<td><?php echo $s_fetch['email_address']?></td>
                                    
									<td><?php echo $s_fetch['username']?></td>
									
									
									
								</tr>
								<script type="text/javascript">
										function redi() {
									window.location = 'manage_location.php?act=View';
													}

									
											</script>
		
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
								<center><label class = "text-danger">This is accepted user profile in the hospital location</label></center>
								<br />
								<center><a class = "btn btn-danger delete_student" ><span class = "glyphicon glyphicon-trash"></span> Ok</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> that's fine</button></center>
							</div>
						</div>
					</div>
				</div>
				
		</div>
	

			</div>

			<div class="w3-padding cs" id="Add" style="display: none;">
				<center>
				<h1 style="">Add user</h1>
	<form method="post">
	<table id="utable">
	<tr><td>Name:</td><td><input type="text" name="name"  autocomplete="off" /></td></tr>
	
	<tr><td>Department:	</td><td><select name="department_id" autocomplete="off">
		<?php
                include "connection.php";
						$sel=mysql_query("SELECT *FROM department");
						echo '<option >--select department--</option>';
						while($fetch=mysql_fetch_array($sel)){
		               echo '<option value="'.$fetch['name'].'">'.$fetch['department_id'].'	'.$fetch['name'].' '.'['.
					   $fetch['area'].']'.'</option>';
			}
						?>
	</select></td></tr>
	
	<tr><td>Area:	</td><td><select name="area" autocomplete="off">
		<?php
                include "connection.php";
						$sel=mysql_query("SELECT *FROM department ");
						echo '<option >--select area--</option>';
						while($fetch=mysql_fetch_array($sel)){
						
		               echo '<option value="'.$fetch['area'].'">'.$fetch['area'].'	'.$fetch['name'].'</option>';
			}
						?>
	</select></td></tr>
	
	<tr><td>Role:</td>
	<td><select name="role" autofocus="off">
	<option>--select role--</option>
	<option>Admin</option>
	<option>Assessor</option>
	<option>In charge</option>
	</select>
	</td></tr>
	<tr><td>Email address *:	</td><td><input type="email" name="email" required /></td></tr>
	<tr><td>User name *:</td><td><input type="text" name="uname"  required /></td></tr>
	<tr><td>Password *:	</td><td><input type="password" name="pwd" required /></td></tr>
	<tr><td></td><td><input type="submit" name="Submit" value="AddUser" /></td></tr>
	</table>
	</form>
	</center>
	
	<?php
	if(isset($_POST['Submit'])){
	$uid='ID'.rand();
	$name=$_POST['name'];
	$dep=$_POST['department_id'];
	$role=$_POST['role'];
	$area=$_POST['area'];
	$email=$_POST['email'];
	$username=$_POST['uname'];
	$pwd=$_POST['pwd'];
	$pwds=md5($pwd);
	
	$sel=mysql_query("SELECT *FROM user WHERE username='$username'");
	$ro=mysql_num_rows($sel);
	if ($ro > 0 ){
	echo 'Sorry! username is in use by someone else. please chose another username';
	}else if($username==""){
	echo 'You forgot to enter username.username and password can\'t be empty';
	}else if($pwd==""){
	echo 'You forgot to enter password.password can\'t be empty<br/>';
	}else{
	$adduser=mysql_query("INSERT INTO user VALUES('$uid', '$name', '$dep', '$role','$area', '$email', '$username','$pwds' )");
	if(!$adduser){
	echo mysql_error();
	}else {
	echo '<font style="color:green; margin-left:30%;">User details added successfully</font>';
	?>
	<script type="text/javascript">
			function redi() {
				window.location = 'user_profile.php?act=Add';
			}

			//setTimeout(redi, );
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
						$sel=mysql_query("SELECT *FROM visit ORDER by visit_date");
						while($fetch=mysql_fetch_array($sel)){
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
						$sel=mysql_query("SELECT *FROM user where role='Assessor' ORDER by name");
						echo '<option >--select name--</option>';
						while($fetch=mysql_fetch_array($sel)){
						
		               echo '<option value="'.$fetch['name'].'">'.$fetch['name'].'	'.$fetch['role'].'</option>';
			}
						?></td></tr>
	<tr><td>User ID *:	</td>
	<td><select name="user_id" required  style="width:100%; height:40px;" ><?php
                include "connection.php";
						$sel=mysql_query("SELECT *FROM user WHERE role='Assessor'");
						echo '<option >--select Assessor ID--</option>';
						while($fetch=mysql_fetch_array($sel)){
						
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
	
	$sel=mysql_query("SELECT *FROM visit WHERE visit_date='$dep'");
	$ro=mysql_num_rows($sel);
	if ($ro > 0 ){
	echo 'Sory! Visit Id is in use by someone else. please chose another user date';
	}else if($uid==""){
	echo '<br/>You forgot to enter Visit id. Visit id and User Id can\'t be empty<br/>';
	}else if($email==""){
	echo 'You forgot to enter user ID.user can\'t be empty<br/>';
	}else{
	$adduser=mysql_query("INSERT INTO visit VALUES('$uid', '$name', '$dep', '$role', '$email')");
	if(!$adduser){
	echo mysql_error();
	}else {
	echo '<font style="color:green; margin-left:30%; ">Visit details added successfully</font>';
	?>
	<script type="text/javascript">
			function redi() {
				window.location = 'user_profile.php?act=Adding';
			}

			//setTimeout(redi, );
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
						$sel=mysql_query("SELECT *FROM visit ");
						while($fetch=mysql_fetch_array($sel)){
		               echo '<option value="'.$fetch['visit_id'].'">'.$fetch['assessor'].'</option>';
			}
						?>
	
	</select>
	
	 <input type="submit" name="delete"  value="Delete Visit" />
	</form>
	
	<?php
	if(isset($_POST['delete'])){
	
	
	 $id=$_POST['visitid'];
	 $query=mysql_query("DELETE FROM visit WHERE 1 AND visit_id='$id'");
	 if($query){
	  echo 'visit has been deleted';
	  ?>
	  <script type="text/javascript">
			function redi() {
				window.location = 'user_profile.php?act=Delete';
			}

			//setTimeout(redi,);
		</script>
		<?php
	  
	 }else{
	
	 echo 'please click delete button again';
	 
	 }	}?>

		</div>

				<div class="w3-padding cs" id="Modify-User" style="display: none;">
					<h1>Select user to view and modify details</h1>
						<form method="post" action="useredit.php">
	 
							 <select name="userid" class="form-control">
                <?php
						$sel=mysql_query("SELECT *FROM user ");
						while($fetch=mysql_fetch_array($sel)){
		               echo '<option value="'.$fetch['user_id'].'">'.$fetch['username'].'	'.$fetch['name'].'	'.$fetch['department'].'</option>';
			}
						?>
		<script type="text/javascript">
			function redi() {
				window.location = 'user_profile.php?act=Modify-User';
			}

			//setTimeout(redi, );
		</script>
	
	</select>
	
	 <input type="submit" name="go" value="click" />
	</form>
				</div>

				<div class="w3-padding cs" id="Delete-User" style="display: none;">
					<h1>Select User to delete</h1>
	<form method="post">
	 
	 <select name="userid">
                <?php
						$sel=mysql_query("SELECT *FROM user ");
						while($fetch=mysql_fetch_array($sel)){
		               echo '<option value="'.$fetch['user_id'].'">'.$fetch['username'].'	'.$fetch['name'].'	'.$fetch['role'].'	'.$fetch['user_id'].'</option>';
			}
						?>
	
	</select>
	
	 <input type="submit" name="delete"  value="Delete User" />
	</form>
	
	<?php
	if(isset($_POST['delete'])){
	
	
	 $id=$_POST['userid'];
	 $query=mysql_query("DELETE FROM user WHERE 1 AND user_id='$id'");
	 if($query){
	  echo 'user has been deleted';?>

	  <script type="text/javascript">
			function redi() {
				window.location = 'user_profile.php?act=Delete-User';
			}

			//setTimeout(redi, );
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
	<div id="footer">
	<p>Copyright@ saiwavincentgmail.com</p>
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
<?php
/*if (isset($_GET['act'])) {
	?>
	<script type="text/javascript">
		$('#gh').click();
		$('#del').click();
		$('#vadd').click();
		$('#uadd').click();
		$('#uview').click();
		$('#udel').click();
		$('#uedit').click();

	</script>
	<?php
}
*/?>
</html>
