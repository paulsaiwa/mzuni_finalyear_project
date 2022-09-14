
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
      <link href="/default.css" rel="stylesheet">
      <link rel="stylesheet" href="../4/w3.css">
	<link href="../date/htmlDatepicker.css" rel="stylesheet" />
	<script language="JavaScript" src="../date/htmlDatepicker.js" type="text/javascript"></script>
	<script type="text/javascript" src="../js/boxOver.js"></script>
 <link rel="stylesheet" type="text/css" href="../font-awesome/font-awesome/css/font-awesome.min.css">
	<style>

	input{width:100px;}	

</style>
</head>
<body>

<?php include"user_header.php";?>
        <!-- Page wrapper  -->
<div id="">
	
	<div id="column" style="margin-left: ;">

	<?php 
	$id=$_REQUEST['user_id'];
	$out=mysqli_query($connection,"SELECT * FROM user WHERE user_id='$id' ");
	$fetch=mysqli_fetch_array($out);

	?>
	
	<h3 style="" class=" alert alert-info w3-center w3-xlarge w3-text-black">Modify User entries </h3>

	<h3 style="margin-left: 20%;"><?php echo 'Current User Department ID'.'	'.'<label class="w3-text-red w3-xlarge">'. $fetch['department_id'].'</label>'?></h3>
	
	<form method="post" style="margin-left: 20%;">
	<table id="" style="margin-left:;">
	<tr><td><input type="hidden" class="form-control w3-disabled" name="user_id" readonly="readonly" value="<?php echo $fetch['user_id'] ?>" maxlength="8" style="width:100%;" /></td></tr>
	<tr><td>Firstname</td><td><input type="text" class="form-control" name="fname" value="<?php echo $fetch['fname'] ?>" style="width:100%;" /></td></tr>
	<tr><td>Surname</td><td><input type="text" class="form-control" name="sname" value="<?php echo $fetch['sname'] ?>" style="width:100%;" /></td></tr>
	<tr><td>Department	</td>
		<td><select name="department_id" class="form-control"  style="width: 100%;" value="<?php echo $fetch['department_name'] ?>" required>
                <?php
                include 'connection.php';
						$sel=mysqli_query($connection,"SELECT *FROM department ");
						echo '<option></option>';
						while($etch=mysqli_fetch_array($sel)){
		               echo '<option value="'.$etch['department_id'].'">'.$etch['department_id'].'		'.$etch['department_name'].''.'</option>';
			}
						?>
			</select></td></tr>
	<tr><td>User role</td>
		<td><select name="role" class="form-control" style="width:100%;"  value="<?php echo $fetch['role'] ?>" required>
			<option></option>
			<option>Admin</option>
			<option>Assessor</option>
			<option>In charge</option></select></td></tr>

	<tr><td>Area	</td>
		<td><select name="area" required class="form-control"  style="width: 100%;"value="<?php echo $fetch['area'] ?>">
                <?php
                include 'connection.php';
						$sel=mysqli_query($connection,"SELECT *FROM department ");
						echo '<option></option>';
						while($etch=mysqli_fetch_array($sel)){
		               echo '<option value="'.$etch['area'].'">'.$etch['area'].'		'.$etch['department_name'].'</option>';
			}
						?>
			</select></td></tr>
	<tr><td>Email address	</td><td><input type="email" class="form-control" name="email_address"  value="<?php echo $fetch['email_address'] ?>"  style="width:100%;" ></td></tr>
	<tr><td>User name</td><td><input type="text" name="username" class="form-control"  value="<?php echo $fetch['username'] ?>" style="width:100%;"  /></td></tr>
	<tr><td>Password *:	</td><td><input type="text" name="password" class="form-control"  value=""  style="width:100%;" /></td></tr>
	<tr><td></td><td><input type="submit" name="up" value="Update User"  class="form-control" style="width:100%; background-color:green;"  /></td></tr>
	</table>
	</form>
	
	<?php
	if(isset($_POST['up'])){
	
	$uids = $_REQUEST['user_id'];
	$fname = $_REQUEST['fname'];
	$sname=$_REQUEST['sname'];
	$dep= $_REQUEST['department_id'];
	$role=$_REQUEST['role'];
	$a=$_REQUEST['area'];
	$email=$_REQUEST['email_address'];
	$uname = $_REQUEST['username'];
	$password=$_REQUEST['password'];
	$pass=md5($password);
	
$pwd=mysqli_query($connection,"SELECT password FROM user WHERE user_id='$uids' ");

$fetch=mysqli_fetch_array($pwd);
if($password=""){
$pass=$fetch['password'];

}else {
$pass=$pass;
}
$update=mysqli_query($connection,"UPDATE user SET  user_id='$uids',fname='$fname',sname='$sname',department_id='$dep',role='$role', area='$a', email_address='$email',username='$uname', password='$pass' WHERE user_id='$uids' ");
if($update){
echo '<font color="green">User information updated</font> ';
echo '<meta content="2;" user_profile.php http-equiv="refresh" />';

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
