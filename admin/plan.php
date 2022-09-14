
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
<title>HIms</title>
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
      <link href="css/.css" rel="stylesheet">
      <link rel="stylesheet" href="../4/w3.css">
	<link href="../date/htmlDatepicker.css" rel="stylesheet" />
	<script language="JavaScript" src="../date/htmlDatepicker.js" type="text/javascript"></script>
	<script type="text/javascript" src="../js/boxOver.js"></script>

	<style>

		input[type=text] ,input[type=email], select {
    width: 200%;
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
	<div id="column" style="margin-left: 20%;">

	<?php 
	$id=$_REQUEST['id'];
	$out=mysqli_query($connection,"SELECT * FROM assessment_details WHERE id='$id' ");
	$fetch=mysqli_fetch_array($out);

	?>
	
	<p style=" margin-left: -12%; text-align: center;width: 90%; " class="w3-teal alert alert-info w3-center">Action Plan </p>
	<form method="post">
	<table id="utable">
	<tr><td>User_id:</td><td><input type="text" name="" readonly="readonly" value="<?php echo $fetch[0] ?>" maxlength="8"/></td></tr>
	<tr><td>Name:</td><td><input type="text" name="standard_code" value="<?php echo $fetch[1] ?>"/></td></tr>
	<tr><td>Department:	</td><td><input type="text" name="date" value="<?php echo $fetch[2] ?>"/></td></tr>
	<tr><td>Role:</td><td><input type="text" name="do" value="<?php echo $fetch[3] ?>" /></td></tr>
	<tr><td>Area:	</td><td><input type="text" name="level_achieved" value="<?php echo $fetch[4] ?>"/></td></tr>
	<tr><td>Email address *:	</td><td><input type="text" name="comment" required value="<?php echo $fetch[5] ?>" /></td></tr>
	
	<tr><td></td><td><input type="submit" name="up" value="Updateuser"  /></td></tr>
	</table>
	</form>
	
	<?php
	if(isset($_POST['up'])){
	
	$uids = $_REQUEST['id'];
	$name = $_REQUEST['standard_code'];
	$dep= $_REQUEST['date'];
	$dep=time();
	$role=$_REQUEST['do'];
	$a=$_REQUEST['plan'];
	$comment=$_REQUEST['comment'];


	
	
$pwd=mysqli_query($connection,"SELECT* FROM action_plan WHERE id='$uids' ");

$fetch=mysqli_fetch_array($pwd);
if($dep=""){
$dep=$fetch['date'];

}else {
$uids=$uids;
}
$update=$backup=mysqli_query($connection,"INSERT INTO action_plan(id, standard_code,date,do,comment,plan) VALUES('$uids',						'$name','$dep','$role','$comment' ,'$a')");
if($update){
echo '<font color="green">User information updated</font> ';
?>
		<script type="text/javascript">
			function redi() {
				window.location = '';
			}

			setTimeout(redi, 2000);
		</script>
		<?php
}else{
echo mysql_error();
}
	
		

	}

?>
</div>
</div>
	<div id="">
	<!---side bar slide --->
	
	
	    
</div>
<div id="footer">
	<p>Copyright saiwavincent@gmail.com</p>
</div>
</div>
</body>
</html>


<!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>
</body>
</html>
