<?php
session_start();
require '../includes/inc.conn.php';
$db = $conn;
if (isset($_COOKIE['userId'])) {
	$userId = $db->real_escape_string($_COOKIE['userId']);
}
else{
	//generate a random number
	$userId = rand(283329, 72332);
	setcookie("userId", $userId, time()+60*60*24*30*12); //cookie for one year
}

if (!file_exists("txt.txt")) {
	file_put_contents("txt.txt", md5("mapadmin"));
}

if (isset($_POST['password'])) {
	if(md5($_POST['password']) == file_get_contents("txt.txt")){
		$_SESSION['map_admin'] = "alfred";
		header("Location: ../maps/");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Open Gates Agency</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="../image/png" href="iconz/logo.png">
	<link rel="stylesheet" type="text/css" href="../css/w32.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<script src="../bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../font-awesome/font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans|Roboto" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="datatables/examples/resources/syntax/shCore.css">
	<script type="text/javascript" language="javascript" src="datatables/media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="datatables/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="datatables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="datatables/examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="datatables/examples/resources/demo.js"></script>
	<script type="text/javascript" src="../modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <style>
            body{
                font-family: 'PT Sans', sans-serif;
            }
            .form-control:focus{
                box-shadow:none;
            }
            .round-50{
            	border-radius: 50%;
            }
        </style>
</head>
<body style="background-color: rgba(0,0,0,.02);">
	<?php
	if (!isset($_SESSION['map_admin'])) {
		?>
		<div class="w3-modal" style="display: block;">
			<div class="w3-modal-content w3-card-16 rounded">
				<div class="w3-padding-large bg-success rounded-top">Login first</div>
				<form action="" method="POST" class="w3-padding">
					<input type="password" name="password" class="form-control" placeholder="Enter password"><br><br>
					<input type="submit" name="" value="Login" class="btn btn-success btn-sm">
				</form>
			</div>
		</div>
		<?php
	}
	else{
	?>
	<p>&nbsp;</p>
	<div class="w3-row">
		<div class="w3-col m2">&nbsp;</div>
		<div class="w3-col m8 rounded" style="background-color: #fff">
			<table id="example" class="display" style="width:100%">
				<thead>
					<tr>
						<th>Hostel name</th><th>Location</th><th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$tq = $db->query("SELECT * FROM `hostel`");
					while ($row = $tq->fetch_assoc()) {
						$hid = $row['hostel_ID'];
						echo "<tr><td>{$row['hostel_name']}</td><td>{$row['location']}</td><td>";
						if (strlen($row['map']) > 2) {
							echo "available <a class='w3-text-blue w3-hover-text-green pointer' onclick=\"view('$hid');\">Edit</a>";
						}
						else{
							echo "<a class='w3-text-blue w3-hover-text-green pointer' onclick=\"view('$hid');\">Upload</a>";
						}
						echo "</td></tr>";
					}
					?>
    			</tbody>
    		</table>
		</div>
	</div>
	<button class="w3-btn w3-card-2 bg-success rounded" onclick="showCont();" style="position: fixed;bottom: 30px; right: 30px;display: none;" id="messageBtn"><i class="fa fa-comments"></i> <font class="w3-hide-small">Ask help?</font></button>
	<button class="w3-btn w3-card-2 bg-success rounded" onclick="hideCont();" style="position: fixed;bottom: 30px; right: 30px;display: none;" id="messageBtn2"><i class="fa fa-times"></i> Close</button>
	<div class="w3-row">
		<div class="w3-col m1">&nbsp;</div>
		<div class="w3-col m10 rounded">
			<hr>
			<center>
				<a href="aboutus.php">About Us</a> | <a href="team.php">Opengates Team</a><br><br>
			</center>

<!--The messaging content-->
<div class="w3-row" style="position: fixed; top: 50px; right: 2px; width: 500px;">
	<div class="w3-col m2">&nbsp;</div>
	<div class="w3-col m9">
		<p>&nbsp;</p>
		<div class="w3-card-4 w3-animate-right rounded" id="message_cont" style="display: none;">
			<div class="w3-container w3-padding-large bg-success rounded-top">Ask help from the administrators - <font id="online"></font></div>
			<div class="w3-padding w3-white" id="messageContainer" style="max-height: 400px;overflow-y: auto;">
				<?php
				$sql = $db->query("SELECT * FROM messages WHERE sender = '$userId' OR receiver = '$userId' ");
				$upd = $db->query("UPDATE messages SET status = 'read' WHERE receiver = '$userId'");

				//read the latest message 
				$sl = $db->query("SELECT * FROM messages WHERE sender = '$userId' OR receiver = '$userId' ORDER BY id DESC LIMIT 1");
				if ($sl->num_rows > 0) {
					$da = $sl->fetch_assoc();
					///check whether user already exists
					$tc = $db->query("SELECT * FROM limits WHERE friend1 = '$userId' AND friend2 = 'admin' ");
					if ($tc->num_rows > 0) {
						# update ...
						$upd = $db->query("UPDATE limits SET value = '".$da['time']."' WHERE friend1 = '$userId' AND friend2 = 'admin'");
					}
					else{
						#insert
						$in = $db->query("INSERT INTO limits (friend1, friend2, value) VALUES ('$userId', 'admin', '".$da['time']."')");
					}
				}
				else{
					$in = $db->query("INSERT INTO limits (friend1, friend2, value) VALUES ('$userId', 'admin', '0')");
				}
				if ($sql->num_rows > 0) {
					while ($row = $sql->fetch_assoc()) {
						$sender = $row['sender'];
						$receiver = $row['receiver'];
						if ($sender == "admin") {
							?>
							<div class="w3-row">
								<?php
								echo "<div class='w3-col s9'><div class='w3-grey w3-round-large w3-padding' style='background-color: #ddd;'>{$row['sender']} <i class='fa fa-caret-right'></i>{$row['receiver']}<br>{$row['message']}</div><p class='w3-small'>Sent on {$row['time']} - Status: {$row['status']}</p></div>";
								?>
								<div class="w3-col s3">&nbsp;</div>
							</div><br>
							<?php
						}
						else{
							?>
							<div class="w3-row">
								<div class="w3-col s3">&nbsp;</div>
								<?php
								echo "<div class='w3-col s9 w3-light-grey'><div class='w3-padding w3-round-large' style='background-color: #ddd;'>Me <i class='fa fa-caret-right'></i> Admin<br>{$row['message']}</div><p class='w3-small'>Sent on {$row['time']} - Status: {$row['status']}</p></div>";
								?></div><br>
								<?php

						}
						
					}
				}
				else{
					?>
					<div class="alert alert-success">You dont have any messages yet!</div>
					<?php
				}
				?>
			</div>
			<form class="w3-row" id="messageForm">
				<div class="w3-col s10 w3-padding-small">
					<input type="text" name="message" class="form-control" placeholder="Type your message.." id="inp" autocomplete="off" required>
				</div>
				<div class="w3-col s2">
					<button type="submit" class="btn btn-sm btn-success" style="margin-top: 3px;"><i class="fa fa-paper-plane"></i></button>
					<input type="reset" id="resetBtn" class="w3-hide">
				</div>
			</form>
		</div>
	</div>
</div>
<div id="mod"></div>
<?php
}
?>
</body>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	});

	function view(id) {
		$('#mod').load("modal.php?hostel="+id);
	}
</script>
</html>