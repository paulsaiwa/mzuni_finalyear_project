<?php

include('connection.php');

	 $id=$_REQUEST['action_id'];
	 $query=mysqli_query($connection,"DELETE FROM action_plan WHERE 1 AND action_id='$id'");
	 
	    header('location:manage_plan.php');	 
	 ?>
?>