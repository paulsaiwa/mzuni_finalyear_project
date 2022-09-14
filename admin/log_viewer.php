<!DOCTYPE html>
<html>
<head>
	<title>View activity logs</title>
	<link rel="stylesheet" type="text/css" href="">
	<link rel="stylesheet" type="text/css" href="../datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="../datatables/examples/resources/syntax/shCore.css">
	<script type="text/javascript" language="javascript" src="../datatables/media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="../datatables/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="../datatables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="../datatables/examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="../datatables/examples/resources/demo.js"></script>
	<script type="text/javascript" src="../modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>

	<table id="example" class="display" border="1" style="width:100%">
		<thead>
			<tr>
				<th>Date</th><th>Name</th><th>Action</th>
			</tr>
		</thead>
		<tbody id="allmps">
			<?php
			require '../connect.php';
			$df = $db->query("SELECT * FROM logs");
			while ($row = $df->fetch_assoc()) {
				echo "<tr><td>".date('D d M, Y H:i', $row['times'])."</td><td>".$row['user_id']."</td><td>".$row['description']."</td></tr>";
			}
			?>
			
		</tbody>
	</table>

</body>
<script type="text/javascript" src="../vendor/jquery/jquery.min.js"></script>
<script src="../js/jquery-1.10.2.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
		alert("jquery is working");
	});
</script>
</html>