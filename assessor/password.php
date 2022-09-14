<?php
require '../connect.php';

if (!isset($_SESSION)) {
	session_start();
}

if (isset($_POST['password'])) {
	$password = md5($_POST['password']);
	$user_id = $_SESSION['user_id'];

	$sql = $db->query("UPDATE user SET password = '$password' WHERE user_id = '$user_id'");
	echo "jck";
}


?>