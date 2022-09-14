<?php
session_start();
include '../connection.php';
$do=$_SESSION['id'];
if (isset($_POST['recommend'])) {
	include 'connection.php';
	// get the posted data
	$recommend = $_POST['recommend'];
	$plan= $_POST['plan'];
	$date=date("F d Y");
	$code=$_POST['standard_code'];
	$start=$_POST['startDate'];
	$end=$_POST['endDate'];
	$bug=$_POST['budget_details'];


	$backup=mysqli_query( $connection,"INSERT INTO action_plan VALUES('','$code','$date','$recommend','$plan')");
	$budget=mysqli_query( $connection,"INSERT INTO budget VALUES('','$code','$date','$bug','$start','$end')");
	if(!$backup){
		$result = ['status' => false, 'message' => mysqli_error()];
		echo json_encode($result);
	}
	else {
		$result = ['status' => true];
		json_encode($result);
	}
}
else{
	$result = ['status' => false, 'message' => 'We did not receive any data'];
	echo json_encode($result);
}

?>		