<?php error_reporting('E_NOTICE') ?>
<?php 
include('connection.php');
session_start();  
if(empty($_SESSION['user_id']) OR empty($_SESSION['password']) ) {  
  
   // header('Location: index.php?login=access_denied' );   
}  ?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>HIms</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="date/htmlDatepicker.css" rel="stylesheet" />
	<script language="JavaScript" src="date/htmlDatepicker.js" type="text/javascript"></script>
	<script src = "js/js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="js/boxOver.js"></script>


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
	<h1><img src="images/health.png"  width="80"/>MINISTRY OF HEALTH MALAWI</h1>

</div>
<div id="menu">
	<h1 class="head2" style="font-size:30px;color:lightblue;text-shadow:7px 7px 4px #000000; margin-top: -2px;">HOSPITAL IMPROVEMENT  MONITORING SYSTEM</h1>
</div>
<div id="content">
	<div id="columnA">

<?php 
	$id=$_REQUEST['visitid'];
	$out=mysql_query("SELECT * FROM visit WHERE visit_id='$id' ");
	$fetch=mysql_fetch_array($out);

	?>
	
	<p>modify visit entries </p>
	<form method="post" >
	<table id="">
	<tr><td>Visit ID:</td><td><input type="text" name="visit_id" readonly="readonly" value="<?php echo $fetch[0] ?>" maxlength="8"/></td></tr>
	<tr><td>Visit Date:</td><td><input type="text" readonly="" name="visit_date" value="<?php echo $fetch[1] ?>"/></td></tr>
	<tr><td>Visit Type:	</td><td><input type="text" name="visit_type" value="<?php echo $fetch[2] ?>"/></td></tr>
	<tr><td>Assessor:</td><td><input type="text" name="assessor" readonly="" value="<?php echo $fetch[3] ?>" /></td></tr>
	<tr><td>User ID *:	</td><td><input type="text" name="user_id" readonly="" required value="<?php echo $fetch[4] ?>" /></td></tr>
	
	<tr><td></td><td><input type="submit" name="wawa" value="Update visit"  /></td></tr>
	</table>
	</form>
	
	<?php
	if(isset($_POST['wawa'])){
	
	$uids = $_REQUEST['visit_id'];
	$name = $_REQUEST['visit_date'];
	$dep= $_REQUEST['visit_type'];
	$role=$_REQUEST['assessor'];
	$email=$_REQUEST['user_id'];
	
	$pwd=mysql_query("SELECT assessor FROM visit WHERE visit_id='$uids' ");

$fetch=mysql_fetch_array($pwd);
if($email=""){
$pass=$fetch['assessor'];

}else {
$pass=$pass;
}
$update=mysql_query("UPDATE visit SET visit_date='$name', visit_type='$dep',assessor='$role', user_id='$email' WHERE user_id='$uids' ");
if($update){
echo '<font color="green">visit information updated</font> ';
		?>
		<script type="text/javascript">
			function redi() {
				window.location = 'user_profile.php?act=Edit';
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
	<div id="columnB">
	<!---side bar slide --->
	
	
	    
</div>
<div id="footer">
	<p>Copyright saiwavincent@gmail.com</p>
</div>


<!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>
</body>
</html>
