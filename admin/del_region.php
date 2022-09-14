<?php
include('connection.php');

	 $id=$_REQUEST['region_id'];
	 $query=mysqli_query($connection,"DELETE FROM  regions WHERE 1 AND region_id='$id'");
	 
	    header('location:location_manage_table.php');	 
	 ?>