<?php
$do=$_REQUEST['standard_code'];
	if (isset($_POST['input'])) {
	include 'connection.php';
// get the posted data
$recommend = $_POST['recommend'];
$plan= $_POST['plan'];
$date=date("F d Y");
$code=$_POST['standard_code'];


$backup=mysqli_query($connection,"INSERT INTO action_plan VALUES('','$code','$date','$recommend','$plan')");
if(!$backup){
echo mysqli_error();

}else {
 echo '<script>alert("Plan details are successfuly stored")</script>';

 header("location:standard_table.php");

}}

?>		