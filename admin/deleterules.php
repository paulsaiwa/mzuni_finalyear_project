<?php
include('connection.php');

	 $id=$_REQUEST['standard_code'];
	 $query=mysqli_query($connection,"DELETE FROM assessment_rules WHERE 1 AND standard_code='$id'");
	 
	    header('location:assessment_rules_edit.php');	 
	 ?>