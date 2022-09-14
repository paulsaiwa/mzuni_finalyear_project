<?php
include 'connection.php';
	if (isset($_POST['Update'])) {
	
	
// get the posted data
$fid = $_POST['action_id'];
$plan=$_POST['plan'];

$update=mysqli_query($connection,"UPDATE action_plan SET action_id='$fid',plan='$plan'WHERE action_id='$fid' ");
if($update){
echo '<script>alert("Updated successfully")</script> ';
//echo '<meta content="2;home.php?action=editfacility" http-equiv="refresh" />';
header("location:admin_assess_plan.php");

}else {
echo mysqli_error();

}
}
?>		