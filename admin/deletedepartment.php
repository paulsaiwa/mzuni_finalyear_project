<?php include('connection.php')?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php 
	 $id=$_REQUEST['department_id'];
	 $query=mysqli_query($connection,"DELETE FROM department WHERE 1 AND department_id='$id'");
	 
	    header('location:department_table.php');	 
	 ?>

  </p>
</div>
</body>
</html>
