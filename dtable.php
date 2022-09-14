<?php

require 'connect.php';


?>
<!DOCTYPE html>
<html>
<head>
	<title>Rows</title>
	<link rel="stylesheet" type="text/css" href="css/moodal.css">
</head>
<body>

	<div class="w3-row">
		<div class="w3-col m1">&nbsp;</div>
		<div class="w3-col m10">
			<table class="w3-table" border="1">
				<th>Std Code</th><th>Date</th><th>Do</th><th>Level</th><th>Comment</th>
				<?php
				$sql = $db->query("SELECT DISTINCT standard_code FROM assessment_details");
				while ($ro = $sql->fetch_assoc()) {
					$std = $ro['standard_code'];
					$in = $db->query("SELECT * FROM assessment_details WHERE standard_code = '$std' ");
					$count = $in->num_rows;
					$i = 1;
					while ($row = $in->fetch_assoc()) {
						# code...
						if ($i > 1) {
							echo "<tr><td>{$row['date']}</td><td>{$row['do']}</td><td>{$row['level_achieved']}</td><td>{$row['comment']}</td></tr>";
						}
						else{
							echo "<tr><td rowspan=\"$count\">{$row['standard_code']}</td><td>{$row['date']}</td><td>{$row['do']}</td><td>{$row['level_achieved']}</td><td>{$row['comment']}</td></tr>";
						}
						$i = $i + 1;
					}
				}
				?>
			</table>
	</div>

</body>
</html>