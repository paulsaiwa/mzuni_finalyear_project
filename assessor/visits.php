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
	header("location: ../logout.php");
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
		<link rel = "stylesheet" type = "text/css" href = "../css/moodal.css" />
		<link rel="stylesheet" type="text/css" href="../font-awesome/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/default.css">
		
		<style>
	
</style>

	</head>
<body>
<!--------------------HEAD---------------------->
<?php //include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php //include 'sidebar.php'?>
<!-------------------SIDEBAR0------------------>
<?php require 'assessor_header.php';?>
 <div class="w3-bar w3-grey w3-large w3-hover" style="margin-top: 6px; border-top-style: solid; border-top-color: red; border-bottom-style: solid; border-bottom-color: red;">
  <a href="assessor.php?action=dashboard" class="w3-bar-item w3-button fa fa-home" style="margin-left: %; margin-right: ; font-size: 20px; color: white;">Home</a>
 
 <a href="../logout.php" class="w3-bar-item w3-button w3-red w3-right fa fa-sign-out" style="font-size: 20px; color: white;">Logout</a>
</div>


<?php $user_id=$_SESSION['user_id'];
     
      
      $result=mysqli_query($connection,"select * from user, department where user.user_id='$user_id' AND user.department_id=department.department_id")or die(mysqli_error());
      $date=mysqli_query($connection,"SELECT curdate() as date");
      $row=mysqli_fetch_array($result);
      $d=mysqli_fetch_array($date);
      $Name=$row['department_id'];
      $role=$row['role'];
      $depName=$row['department_name'];
$_SESSION['department_id']=$Name;

?>
		<div id = "" class = "">
				<div class = "alert alert-info w3-center" style="margin-top: 3%; color: black; font-size: 24px;"><?php echo "$depName";?></div>
				<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table" class = "table table-bordered" style="">
							<thead>
								<tr>
									<th>Firstname</th>
									<th>Surname</th>
									<th>Department name</th>
									<th>System Date & Time</th>
									<th>Area Number</th>
									<th>System Feedback</th>
									
									
									
								</tr>
							</thead>
							<tbody>
								<?php
								
									$s_query = $conn->query("SELECT * FROM logs,user,department WHERE logs.user_id=user.user_id AND logs.user_id='$user_id' AND department.department_id=user.department_id ")or die(mysqli_error());
									while($s_fetch = $s_query->fetch_array()){	
								?>
								<tr>
									<td><?php echo $s_fetch['fname']?></td>
									<td><?php echo $s_fetch['sname']?></td>
									<td><?php echo $s_fetch['department_name']?></td>
									<td><?php echo  date('D d M, Y H:i sa', $s_fetch['times'])?></td>
									<td><?php echo $s_fetch['area']?></td>
									<td><?php echo $s_fetch['description']?></td>
									
									
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
								<center><label class = "text-danger">Registed</label></center>
								<br />
								<center><a class = "btn btn-danger " ><span class = "glyphicon glyphicon-trash"></span> Ok</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> that's fine</button></center>
							</div>
						</div>
					</div>
				</div>
				
		</div>
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<div id="footer" class="">
	<?php include '../footer.php';?>
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