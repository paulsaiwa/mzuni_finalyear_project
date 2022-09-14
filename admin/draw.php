<?php

if (isset($_POST['id'])) {
	# code...
	$id=trim($_POST['id']);
	$value = trim($_POST['valu']);

	include"connection.php";
						

	$sel=mysqli_query($connection,"UPDATE user SET status = '$value' where user_id='$id' ");
	echo $value;

}
						