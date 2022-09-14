<?php

if (!isset($_SESSION)) {
	session_start();
}
if (isset($_SESSION['username'], $_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
	$username = $_SESSION['username'];
}
else{
	header("location: logout.php");
}

require '../connect.php';
?>
<!DOCTYPE html>
<?php
	//require_once 'session.php';
	require_once '../js/connect.php';
?>
<html lang = "eng">
	<head>
		<title>hims</title>
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/style.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/.css" />
<link rel="stylesheet" type="text/css" href="../font-awesome/font-awesome/css/font-awesome.min.css">
		<script type="text/javascript" src="../vendor/jquery/jquery.min.js"></script>
	<link rel="stylesheet" href="../vendor/boostrap/css/boostrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/moodal.css">
		<style>
		#header h1 {
	margin-top: -12px;
	padding: 5px 20px 0px 0px;
	text-transform: uppercase;
	font-weight: bold;
	text-align:center;
	color:;
}

#header h2 {
	margin: 0 0 0 -80px;
	padding: 0px 0px 0px 95px;
	text-transform: uppercase;
	font-weight: bold;
	font-size: 13px;
}

/** MENU */

#menu {
	width:% ;
	margin: 0px auto;
	text-align:left;
	overflow-x:hidden;
}
#header.head1 { float:left; 
	padding-bottom:-5px; 
	color:#003399;}
.head2{   font: 24px/34px arial, sans-serif;
color:;
text-align:left;
background: #428bca;
height:70px;
width:
padding-left:20px;
padding-top:20px;
}

#footer {
	clear: both;
	
	background: #428bca;
	text-align: ;
}
.tr:hover {background-color:#f5f5f5;}

#footer p {
	margin: 0px;
	padding: 18px 0px 0px 0px;
	font-size: 10px;
	color: ;
	width:131.6%;
	margin-left:20%;
}

#footer a {
	color: ;
}

table{
	margin-left: ;
}
</style>

	</head>
<body>
<!--------------------HEAD---------------------->
<?php //include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php //include 'sidebar.php'?>

<?php include "user_header.php";?>
		</div>
		
		<div class="w3-col ">
<div class = "alert alert-info w3-center w3-xlarge w3-text-black " style="margin-top:3%;">User Modification</div>
				<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table" class = "table table-bordered" style="">
							<thead class="">
								<tr>
									
									<th>Firstname</th>
									<th>Surname</th>
									<th>Department</th>
									<th>Role</th>
									<th>Email</th>
									<th>Username</th>
									<th>S</th>
									
									
								</tr>
							</thead>
							<tbody>
								<?php
								
									$s_query = $conn->query("SELECT * FROM `user` WHERE username != '".trim($_SESSION['user_id'])."'") or die(mysqli_error());
									while($s_fetch = $s_query->fetch_array()){
									$user_id = $s_fetch['user_id'];
								?>
								<tr>
									
									<td><?php echo $s_fetch['fname']?></td>
									<td><?php echo $s_fetch['sname']?></td>
									<td><?php echo $s_fetch['department_id']?></td>
									<td><?php echo $s_fetch['role']?></td>
									<td><?php echo $s_fetch['email_address']?></td>
                                    
									<td><?php echo $s_fetch['username']?></td>
									<td><?php if ($s_fetch['status'] == "Off") {
										echo "<font id=\"tt$user_id\">".$s_fetch['status']."</font>";
									}
									else{
										echo "<font id=\"tt$user_id\">On</font>";
									} ?> &nbsp;<label class="switch">
									  <input type="checkbox" id="<?php echo $s_fetch['user_id']?>" onchange="see('<?php echo $s_fetch['user_id']?>');" <?php if ($s_fetch['status'] != "Off") { echo "checked";}?>>
									  <span class="slider round"></span>
									</label></td>									
								</tr>
		
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
	</div>



<div >
	<?php //include"../footer.php";?>
	</div>
	<?php include '../footer1.php';?>
	<div class="w3-modal" id="deModal">
		<div class="w3-modal-content" style="width: 500px;" id="modalContent"></div>
	</div>
</body>	

<script src = "../js/js/jquery-3.1.1.js"></script>
<script src = "../js/js/sidebar.js"></script>
<script src = "../js/js/bootstrap.js"></script>
<script src = "../js/js/jquery.dataTables.min.js"></script>
<script src = "../js/js/script.js"></script>


    <script src=""></script>
	<script src="../js/stopusers.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
		$('#table2').DataTable();
	});

	function deactivate(id) {
		$.ajax({
			url: "draw.php",
			method: "POST",
			data: {id:id},
			success: function(result) {
				$('#modalContent').html(result);
				$('#deModal').show();
			}
		})
	}

	function see(tab) {
	    var tabs = document.getElementById(tab);
	    if (tabs.checked == true) {
	    	var ched = "On";
	    	$.ajax({
				url: "draw.php",
				method: "POST",
				data: {id:tab, valu:ched},
				success: function(result) {
					$('#tt'+tab).html(result);
				}
			});
	    }
	    else{
	    	var ched = "Off";
	    	$.ajax({
				url: "draw.php",
				method: "POST",
				data: {id:tab, valu:ched},
				success: function(result) {
					$('#tt'+tab).html("Off");
				}
			});
	    }
	}
</script>



    <script src=""></script>
	<script src="../js/stopusers.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>

</script>


</html>