<?php
$do=$_REQUEST['standard_code'];
if (isset($_POST['input'])) {
	include 'connection.php';
	// get the posted data
	$budget_details = $_POST['budget_details'];
	$amount_budget= $_POST['budget_amount'];
	$date=date("F d Y");
	$code=$_POST['standard_code'];
	$startDate=$_POST['startDate'];
	$enddate=$_POST['endDate'];


	$backup=mysqli_query($connection,"INSERT INTO budget_ass_results VALUES('','$code','$date','$budget_details','$amount_budget', '$startDate','$enddate')");
	if(!$backup){
		$result = ['status' => false, 'message' => $connection->error];
		echo json_encode($result);
	}
	else{
		$result = ['status' => true, 'message' => 'Successfully added budget hahahahahaah'];
		echo json_encode($result);
	}
}
else{
	$result = ['status' => false, 'message' => 'We did not receive any data'];
	echo json_encode($result);
}

?>		