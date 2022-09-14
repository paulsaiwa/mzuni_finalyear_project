<?php include('connection.php')?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php 

	 $id=$_REQUEST['worker_id'];
	 $query=mysql_query("DELETE FROM worker WHERE 1 AND worker_id='$id'");
	 
	    header('location:in-charge.php?action=edit_worker');	 
	 ?>

  </p>
</div>
</body>
</html>
