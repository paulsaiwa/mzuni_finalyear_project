<?php
include('connection.php');

	 $id=$_REQUEST['district_id'];
	 $query=mysqli_query($connection,"DELETE FROM  districts WHERE 1 AND district_id='$id'");
	 
	    header('location:location_manage_table.php');	 
	 ?>