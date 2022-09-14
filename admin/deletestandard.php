<?php
include('connection.php');

	 $id=$_REQUEST['standard_code'];
	 $query=mysqli_query($connection,"DELETE FROM standard WHERE 1 AND standard_code='$id'");
	 
	    header('location:standard_edit_del.php');	 
	 ?>