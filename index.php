<?php
session_start();
error_reporting('E_NOTICE');

include('connection.php');


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>HIMS</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/moodal.css" rel="stylesheet">
    <link href="css/.css" rel="stylesheet">
	<link href="date/htmlDatepicker.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<link rel="icon" type="image/png" href="images/health.png">
	<script language="JavaScript" src="date/htmlDatepicker.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/boxOver.js"></script>
<link rel="stylesheet" type="text/css" href="font-awesome/font-awesome/css/font-awesome.min.css">

	<style type="text/css">
		
		input[type=text], input[type=password]{ width: 50%;  margin-left:10%;}

		label{margin-left: 30%;}
	</style>
	
</head>

<div id="header">
	<h1 class=" w3-center" style="font-size: 30px;"><img src="images/health.png" style="width:100px; height: 85px; font-size: 24px;" />MINISTRY OF HEALTH MALAWI</h1>

</div>

 

<div id="#hello" class="w3-bar w3-grey  w3-large w3-hover" style="margin-top: 6px; border-top-style: solid; border-top-color: red; border-bottom-style: solid; border-bottom-color: red; background: ">
<h1 class="w3-center " id="head2" style="background:	;  font-size:24px;color:white; text-align: center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</h1>
</div>

<div id="content">
	<div id="">
	 

	 			
	              
	             </div>
				 <div class="form-group"  style="margin-left: 20%;  ">
				 		
				 
				   <form method="post" class="w3-container" style="border-left:black;" >
				   		<div id="">
	 		<div class="w3-container  w3-grey    " style="background-color:; width: 70%; margin-left:; border-top-left-radius: 5px; border-top-right-radius: 5px;">				 
		 <h1  class="" style="background:; font-size:20px;color:white;text-shadow:7px 7px 4px #000000; text-align: center">SIGN IN</h1></div>

					<label for="username" style=" " class=""></label></br>

					<input type="text" name="username"  placeholder="Username..." class ="w3-input w3-round w3-center" autocomplete="off" autofocus="on" style="color: blue" required pattern="[A-Za-z0-9]+" title="no any punctuation mark" minlength="3" /></br>

					<label for="password" style=" " class=""></label></br>

					<input type="password" name="password" placeholder="Password..." class ="w3-input w3-round w3-center " style="color: blue "required pattern="[A-Za-z0-9]{3}+" title="no any punctuation mark"  /></br>

					
					
					<input type="submit" name="login" value="Login" class="sub w3-btn w3-block w3-section w3-ripple w3-grey    fa fa-sign-in w3-hover-green w3-text-white" style="width: 70%; background-color:;font-size:20px;color:white;text-shadow:7px 7px 4px #000000;border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;" />
				
					</form>
				
					
				     
					  </div>
					</div>
					  
	<?php
	include "connect.php";
	if(isset($_POST['login'])){
		$user_name=$_POST['username'];
		$pass = $_POST['password'];
		$pass=md5($pass);

		$querry = "SELECT * FROM user WHERE username='$user_name' AND password='$pass'";

		$run = $db->query($querry);
        if($run->num_rows > 0){
			$get = $run->fetch_array();

			if($get['role'] == 'Admin' AND $get['status']=='On' ){

				$_SESSION['username'] = $get['username'];
				$_SESSION['user_id'] = $get['user_id'];

				log_activity($get['user_id'], "Has successfully logged in the system");
				header("location: admin/home.php?action=dash");
			}
	        elseif($get['role'] == 'Assessor' AND $get['status']=='On'){
				$_SESSION['username'] = $get['username'];
				$_SESSION['user_id'] = $get['user_id'];
				log_activity($get['user_id'], "Has successfully logged in the system");
				header("location: assessor/assessor.php?action=dashboard");
			}
			elseif($get['role'] == 'In charge' AND $get['status']=='On'){
				$_SESSION['username'] = $get['username'];
				$_SESSION['user_id'] = $get['user_id'];
				log_activity($get['user_id'], "Has successfully logged in the system");
				header("location: incharge/in-charge.php?action=dashb");
			}
			else  echo " <script type='text/javascript'>alert(' Sorry!! Access Denied, Consult Administrator!')</script>";
		}else{
			echo "<b style='color:red;'>". "<script type='text/javascript'>alert(' Wrong username Or password! Make sure you are authorised to login!')</script>"." </b>";
		}
	}
	
	?>
</div>
	</div>
	</div>
<div id="footer" class="w3-center">
	<?php include"footer.php"; ?>
</div>


<!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>
	<script src="js/stopusers.js"></script>
</body>
</html>
