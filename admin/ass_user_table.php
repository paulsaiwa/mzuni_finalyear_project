<?php error_reporting('E_NOTICE') ?>
<?php 
include('connection.php');

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
     <link href="../css/moodal.css" rel="stylesheet">
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
	width:248%;
	margin-left:  ;
	height: 34px;
	background: #428bca;
	text-align: ;
}

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


/* Dropdown Button */

</style>

	</head>
<body>
<!--------------------HEAD---------------------->
<?php //include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php //include 'sidebar.php'?>
<!-------------------SIDEBAR0------------------>
<div id="header">
	<h1 style=" font-size: 24px;"><img src="../images/health.png" style="width:80px;" />MINISTRY OF HEALTH MALAWI</h1>

</div>
<div id="menu" style="margin-top: -26px;">
	<h1 class="head2 w3-center" style="font-size:30px;color:lightblue;text-shadow:7px 7px 4px #000000; ">HOSPITAL IMPROVEMENT MONITORING SYSTEM</h1>
</div>
<div class="w3-center w3-sand" style="margin-top: -10px; margin-bottom: 4%;">
<a  href ="home.php?action=dash" class = "w3-button w3-hover-green fa fa-home w3-left" style="background-color:none; border:none;">Home </a>
  <a href="../logout.php" class="w3-button w3-hover-green w3-red fa fa-sign-out w3-right" style="background-color:; border:none;">Logout</a>
  
</div> 


		<div id = "" class = "">
				<div class = "alert alert-info w3-center" style="">Assessor(s) details</div>
				<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table" class = "table table-bordered" style="">
							<thead class="">
								<tr>
								
									<th>Fullname</th>
									<th>Department ID</th>
							
									<th>Area(Assess)</th>
									<th>Email Address</th>
									<th>Username</th>
									<th>Status</th>
									
									
									
								</tr>
							</thead>
							<tbody>
								<?php
								
									$s_query = $conn->query("SELECT * FROM user where role='Assessor'") or die(mysqli_error());
									while($s_fetch = $s_query->fetch_array()){	
								?>
								<tr>
									
									<td><?php echo $s_fetch['name']?></td>
									<td><?php echo $s_fetch['department_id']?></td>
									
									<td><?php echo $s_fetch['area']?></td>
									<td><?php echo $s_fetch['email_address']?></td>
									<td><?php echo $s_fetch['username']?></td>
									<td><?php echo $s_fetch['status']?></td>
									
									
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
				<div class = "modal fade" id = "delete_student" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
					<div class = "modal-dialog" role = "document">
						<div class = "modal-content ">
							<div class = "modal-body">
								<center><label class = "text-danger">Do you want Modifying the Assessor details?</label></center>
								<br />
								<center><a class = "btn btn-danger " ><span class = "glyphicon glyphicon-trash"></span> Ok</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> that's fine</button></center>
							</div>
						</div>
					</div>
				</div>
				
		</div>

	<div id="footer" class="w3-center">
	<?php include '../footer1.php';?>

	</div>
</body>	
<script src = "../js/js/jquery-3.1.1.js"></script>
<script src = "../js/js/sidebar.js"></script>
<script src = "../js/js/bootstrap.js"></script>
<script src = "../js/js/jquery.dataTables.min.js"></script>
<script src = "../js/js/script.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	});
</script>
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#pic')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200)
						.css('display', 'block');
					$('.pic_hide').hide();
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('.id').on('click', function(){
			$id = $(this).attr('name');
			$('.delete_student').on('click', function(){
				window.location = 'delete_student.php?id=' + $id;
			});
		});
	});
</script>
</html>