
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
    <link href="../css/.css" rel="stylesheet">
     <link href="../css/moodal.css" rel="stylesheet">
      <link href="css/default.css" rel="stylesheet">
      <link rel="stylesheet" href="../4/w3.css">
	<link href="../date/htmlDatepicker.css" rel="stylesheet" />
	<script language="JavaScript" src="../date/htmlDatepicker.js" type="text/javascript"></script>
	<script type="text/javascript" src="../js/boxOver.js"></script>

	<style>

		

</style>
</head>
<body>
<div id="header">
	<h1><img src="../images/health.png"  width="80"/>MINISTRY OF HEALTH MALAWI</h1>

</div>
<div id="menu">
	<h1 class="head2" style="margin-top: -10px;font-size:30px;color:lightblue;text-shadow:7px 7px 4px #000000;" >HOSPITAL IMPROVEMENT  MONITORING SYSTEM </h1>
</div>
<div id="">
	<a class="w3-button w3-hover-green w3-left" href="user_profile.php" style="margin-bottom: 30px;"><img src="../images/28.png"></a>
	<div id="column" style="margin-left: 20%;">

	<?php 
	$id=$_REQUEST['worker_id'];
	$out=mysqli_query($connection,"SELECT * FROM charge_staff_member WHERE worker_id='$id' ");
	$fetch=mysqli_fetch_array($out);

	?>
	
	<p style=" margin-left: -12%; text-align: center;width: 90%; " class="w3-teal alert alert-info w3-center">modify user entries </p>
	
	<form method="post">
	<table id="utable">
	<tr><td>Worker ID</td><td><input type="text" name="worker_id" readonly="readonly" value="<?php echo $fetch[0] ?>" maxlength="8"/></td></tr>
	<tr><td>Firstname</td><td><input type="text" name="name" value="<?php echo $fetch[1] ?>"/></td></tr>
	<tr><td>Surname	</td><td><input type="text" name="department_id" value="<?php echo $fetch[2] ?>"/></td></tr>
	<tr><td>Role:</td><td><input type="text" name="role" value="<?php echo $fetch[3] ?>" /></td></tr>
	<tr><td>Duty	</td><td><input type="text" name="area" value="<?php echo $fetch[4] ?>"/></td></tr>
	<tr><td>Job Description</td><td><input type="email" name="email_address" required value="<?php echo $fetch[5] ?>" /></td></tr>
	<tr><td>Work Area</td><td><input type="text" name="username"  required value="<?php echo $fetch[6] ?>" /></td></tr>
	<tr><td>Password *:	</td><td><input type="text" name="password"   value="" required/></td></tr>
	<tr><td></td><td><input type="submit" name="up" value="Update"  /></td></tr>
	</table>
	</form>
	
	<?php
	if(isset($_POST['up'])){
	
	$uids = $_REQUEST['worker_id'];
	$name = $_REQUEST['fname'];
	$dep= $_REQUEST['sname'];
	$role=$_REQUEST['duty'];
	$a=$_REQUEST['job_des'];
	$email=$_REQUEST['work_area'];
	//$uname = $_REQUEST['username'];
	//$password=$_REQUEST['password'];
	//$pass=md5($password);
	
$pwd=mysqli_query($connection,"SELECT worker_id FROM  WHERE user_id='$uids' ");

$fetch=mysqli_fetch_array($pwd);
if($password=""){
$pass=$fetch['password'];

}else {
$pass=$pass;
}
$update=mysqli_query($connection,"UPDATE user SET  user_id='$uids',name='$name',department_id='$dep',role='$role', area='$a', email_address='$email',username='$uname', password='$pass' WHERE user_id='$uids' ");
if($update){
echo '<font color="green">User information updated</font> ';
?>
		<script type="text/javascript">
			function redi() {
				window.location = 'user_profile.php?act=uedit';
			}

			setTimeout(redi, 2000);
		</script>
		<?php
}else{
echo mysqli_error();
}
	
		

	}

?>
</div>
</div>
	<div id="">
	<!---side bar slide --->
	
	
	    
</div>
<div id="footer">
	<?php include "../footer.php";?>
</div>
</div>

<!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>

    <script type="text/javascript">

	function refreshOnline()
    {
        x = 0.5;  // 5 Seconds
    
        // Do your thing here
        $("#").load("useredit.php");
    
        setTimeout(refreshOnline, x*1000);
    }
    
    refreshOnline();
</script>
</body>
</html>
