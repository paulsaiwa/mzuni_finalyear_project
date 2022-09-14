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
<div id="#hello" class="w3-bar w3-grey w3-large w3-hover" style="margin-top: -3px; border-top-style: solid; border-top-color: red; border-bottom-style: solid; border-bottom-color: red; font-size: 20px;  ">
  <a href="home.php?action=dash" class="w3-bar-item w3-button fa fa-home" style="margin-left: ; margin-right: 5%; font-size: 20px; color: white;">Home</a>
  <a href="follow-up.php" class="w3-bar-item w3-button fa fa-pencil" style="margin-left: ; margin-right: 5%; font-size: 20px; color: white;">Manage Follow ups</a>

  <a href="followups_report.php" class="w3-bar-item w3-button fa fa-envelope" style="margin-left: ; margin-right: 5%; font-size: 20px; color: white;">Follow up report</a>

  <a href="ass_search_stand.php" class="w3-bar-item w3-button fa fa-edit" style="font-size: 20px; margin-left: ;font-size: 20px; color: white" >Assessment </a>


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
				<div class = "alert alert-info w3-center w3-large w3-text-black" style="margin-bottom: 6px; font-size: 20px;">Verify and Validate Hospital Budget, Plan Details </div>
				<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table" class = "table table-bordered" style="">
							<thead class="">
								 
                                            <tr>
                                                 <th style="width: 10%;">Standard</th>
                                                 <th style="width: 10%;">Date</th>
                                                <th style="width: 50%;">Recommend(Assessor)</th>
                                                <th style="width: 50%;">Plan</th>
                                                <th style="width: 50%;">Write Comment</th>
                                                
                                              
                                               
                                                
                                            </tr>
                                        </thead>
                                       
                                        <tbody>  

                                            <?php
                                include '../connection.php';
                                
                                    $s_query = $conn->query("SELECT * FROM standard, department, action_plan where action_plan.standard_code=standard.standard_code AND standard.department_id=department.department_id  AND standard.department_id='$Name'") or die(mysqli_error());
                                    while($s_fetch = $s_query->fetch_array()){  
                                ?>
                                <tr>
                                    <td><?php echo $s_fetch['standard_code']?></td>
                                    <td><?php echo $s_fetch['date']?></td>
                                    <td><?php echo $s_fetch['recommend']?></td>
                                    <td><?php echo $s_fetch['plan']?></td>
                                    <td><?php echo "<a href='follow_up.php?action_id=".$s_fetch['action_id']."' class='w3-button w3-khaki w3-hover-green fa fa-pencil w3-large' style='width:100%; border-radius:4px;'>Comment</a> ";?></td>
                                   
                                    
                                    
                                    
                                    
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
						</table>
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