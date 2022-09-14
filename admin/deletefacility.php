<?php
include('connection.php');

	 $id=$_REQUEST['facility_id'];
	 $query=mysqli_query($connection,"DELETE FROM facility WHERE 1 AND facility_id='$id'");
	 
	    header('location:facility_table.php');	 
	 ?>