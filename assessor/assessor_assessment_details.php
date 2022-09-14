<?php
if (!isset($_SESSION)) {
  session_start();
  require_once '../js/connect.php';
}
if (isset($_SESSION['username'], $_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $username = $_SESSION['username'];
}
else{
  header("location: ../logout.php");
}

  
function department($id)
{
	global $connection;
	$result = mysqli_query( $connection,"SELECT * FROM  `department` WHERE department_id = '$id'");
	$data = mysqli_fetch_assoc($result);
	return $data['department_name'];
}

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
		
		 
</style>

	</head>
<body>
<!--------------------HEAD---------------------->
<?php //include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php //include 'sidebar.php'?>
<!-------------------SIDEBAR0------------------>
<?php include 'assessor_header.php';?>
<div id="links" class="w3-bar  w3-large w3-hover" style="margin-top: 6px; border-top-style: solid; border-top-color: red; border-bottom-style: solid; border-bottom-color: red;">
  <a href="assessor.php?action=dashboard" class="w3-bar-item w3-button fa fa-home" style="margin-left: 10%; margin-right: ; font-size: 20px; ">Home</a>
  <a href="ass_search_stand.php" class="w3-bar-item w3-button fa fa-edit" style="font-size: 20px; margin-left: 20%;" >Assessment </a>


  <a href="../logout.php" class="w3-bar-item w3-button w3-red w3-right fa fa-sign-out" style="font-size: 20px;">Logout</a>
</div>

<div class="w3-bar w3-#FFFFCC" style="margin-left:; margin-right: ; font-size: 17px;" > 


     <?php
     include 'connection.php';
      $user_id=$_SESSION['user_id'];
     
      
      $result=mysqli_query($connection,"select * from user where user_id='$user_id'")or die(mysqli_error());
      $date=mysqli_query($connection,"SELECT curdate() as date");
      $row=mysqli_fetch_array($result);
      $d=mysqli_fetch_array($date);
      $Name=$row['department_id'];
      $role=$row['role'];
$_SESSION['department_id']=$Name;

?>
</div>
		<div id = "" class = "w3-content" style="margin-top: 2%;">
				<div class = "alert alert-info w3-center w3-large w3-text-black" style="margin-bottom: 6px; font-size: 20px;">Update Assessment Observation details </div>
				<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table" class = "table table-bordered" style="">
							<thead class="">
								<tr> <th>Department</th>
									<th>Standard</th>
									<th style="width: 50%;"> Criteria</th>
									<th >Observation</th>
									<th style="width: 40%;">Comment</th>
									
									<th style="width: 10%;">Action</th>
									
								</tr>
							</thead>
							<tbody id="mainCont">
								<?php
								
									$s_query = $conn->query("SELECT * FROM `assessment_details`,`standard`, `department` where assessment_details.standard_code=standard.standard_code AND department.department_id=standard.department_id AND standard.department_id='$Name'") or die(mysqli_error());
									while($s_fetch = $s_query->fetch_array()){	
								?>
								<tr>
									<td><?php echo $s_fetch['department_name']?></td>
									<td><?php echo $s_fetch['standard_code']?></td>
									<td style="width: 120px;"><?php echo $s_fetch['do']?></td>
									<td style="width:;"><?php echo $s_fetch['level_achieved']?></td>
									<td><?php echo $s_fetch['comment']?></td>
											
													
									
									<td><center> <a href="#" class = "btn btn-warning btn-sm it" title="Edit this" data="<?php echo $s_fetch['id'];?>"><i class="fa fa-edit"></i>Update</a></center></td>
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

	<div class="w3-modal" id="fft">
		<div class="w3-modal-content" id="contMe" style="width: 500px;">
		</div>
	</div>
	
	<div id="footer" class="w3-center">
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
	$('.it').click(function() {
		var id = $(this).attr('data');
		$.ajax({
			url: "fetch.php",
			data: {id:id},
			method: "POST",
			success: function(result) {
				$('#contMe').html(result);
				$('#fft').show();
			}
		})
	});


	function submitForm() {		
		var formdata = $('#myForm').serialize();
		$.ajax({
			url: "editing.php",
			method: "POST",
			data: formdata,
			success: function (result) {
				$('#hmtlResult').html(result);
				//$('#report_status').html(result);
				$('#mainCont').load("details_load.php");
				$('#resetBtn').click();
			}
		});
		
	}
</script>
</html>