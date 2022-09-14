<?php
	$conn = new mysqli('localhost', 'root', '', 'ictpms') or die(mysqli_error());
	$admin_query = $conn->query("SELECT * FROM `user`") or die(mysqli_error());
	$admin_valid = $admin_query->num_rows;
	if($admin_valid == 1){
		echo '<script>alert("Error: Can\'t delete if only one admin account is available")</script>';
		echo '<script>window.location = "assess_details.php"</script>';
	}else{
		$conn->query("DELETE FROM `user` WHERE `user_id` = '$_REQUEST[user_id]'") or die(mysqli_error());
		header('location:assess_details.php');
	}	?>