<?php
	require_once 'js/connect.php';
	$conn->query("DELETE FROM `user` WHERE user_id = '$_REQUEST[user_id]'") or die(mysqli_error());
	header('location:user_profile.php');
?>