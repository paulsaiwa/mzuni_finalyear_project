<?php	
function criteria_name($id)
{
	# code...
}
error_reporting('E_NOTICE') ?>
<?php 
include('connection.php');
session_start();  
if(empty($_SESSION['user_id']) OR empty($_SESSION['password']) ) {  
  
   // header('Location: index.php?login=access_denied' );   
} 
if (isset($_POST['comment'])) {
	
	$level=$_POST['level_achieved'];
	$comment=$_POST['comment'];
	$code = $_POST['code'];

	$backup=mysqli_query($connection,"UPDATE assessment_details SET level_achieved = '$level',comment = '$comment' WHERE id = '$code' ");

	echo "<div class='alert alert-danger'>Successfully updated Verification criteria</div>";
}



?>	