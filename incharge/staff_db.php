		<?php 
		
		
		include 'connection.php';
			
	if (isset($_POST['go'])) {
	
// get the posted data
$implcode = rand();
$fname = ( htmlspecialchars( $_POST['fname']));
$sname = ( htmlspecialchars( $_POST['sname']));
$duty = $_POST['duty'];
$job= $_POST['job_des'];
$locate=$_POST['work_area'];
//$remarks=$_POST['in-charge'];


$insert_info = mysqli_query($connection,"INSERT INTO charge_staff_member VALUES( '$implcode','$fname', '$sname', '$duty', '$job', '$locate')");
	if($insert_info){
 echo "<script>alert('saiwa')</script>";
echo '<meta content="2;" http-equiv="refresh" />';
}else {
echo mysqli_error();


}}

?>