<?php
require_once 'js/connect.php';
	if(isset($_POST['Submit'])){
	$uid='ID'.rand();
	$name=$_POST['name'];
	$dep=$_POST['dep'];
	$role=$_POST['role'];
	$area=$_POST['area'];
	$email=$_POST['email'];
	$username=$_POST['uname'];
	$pwd=$_POST['pwd'];
	$pwds=md5($pwd);
	
	$sel=mysql_query("SELECT *FROM user WHERE username='$username'");
	$ro=mysql_num_rows($sel);
	if ($ro > 0 ){
	echo '<script>alert("Sory! username is in use by someone else. please chose another username")</script>';
	}else if($username==""){
	echo '<br/><script>alert("You forgot to enter username.username and password can\'t be empty")</script><br/>';
	}else if($pwd==""){
	echo '<script>alert("You forgot to enter password.password can\'t be empty<br/>")</script>';
	}else{
	$adduser=mysql_query("INSERT INTO user VALUES('$uid', '$name', '$dep', '$role','$area', '$email', '$username','$pwds' )");
	if(!$adduser){
	echo mysql_error();
	}else {
	echo '<script>alert("User added successfully")</script>';

	}
	
	}
	}?>