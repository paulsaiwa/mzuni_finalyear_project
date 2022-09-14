<?php
include('connection.php');

	 $id=$_REQUEST['c_id'];
	 $query=mysqli_query($connection,"DELETE FROM criteria WHERE 1 AND c_id='$id'");
	 
	    header('location:standard_table.php');	 
	 ?>