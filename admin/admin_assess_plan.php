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
	header("location:../logout.php");
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

		<link rel="stylesheet" type="text/css" href="../font-awesome/font-awesome/css/font-awesome.min.css">
		<link rel = "stylesheet" type = "text/css" href = "../css/css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/style.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/Default.css" />
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




/* Dropdown Button */
.dropbtn {
  background-color: ;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  height:20px;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: green;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: red;} 
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
	<h1 style="font-size: 30px;"><img src="../images/health.png" style="width:100px; height: 85px;" />MINISTRY OF HEALTH MALAWI</h1>

</div>
<div class="w3-row w3-grey" style="margin-top: 6px ; font-size: 17px; border-top-color: red; border-top-style: solid; border-bottom-style: solid; border-bottom-color: red;">
<a  href ="home.php?action=dash" class = " w3-btn w3-button fa fa-home" style="background-color:; border:none; margin-left: 10%; margin-right: 10%; padding-top: 8px;"> Home </a>
<div class="dropdown" style="margin-left:10%; margin-right:10%; padding-top: 8px;">
  <button class="w3-btn w3-button fa fa-users" style="background-color:sand; border:none; margin-left: 20%;margin-right: 10%;">Manage Plan Budget</button>
  <div class="dropdown-content">
       <button class="w3-btn w3-red w3-block"  >Budget</button>
       <button class="w3-btn w3-red w3-block">View-Budget</button>

    
    <a href="#"></a>
  </div>
</div> 


<a  href ="../logout.php" class = "w3-btn w3-red fa fa-sign-out w3-right w3-iten-bar " style="height: 35px; padding-top: 8px;" >Logout</a>

		</div>
		
		<div class="w3-col ">

			<div class="w3-padding cs" id="View-Budget">
				
				<div class = "alert alert-info w3-center w3-xlarge w3-text-black" style="margin-bottom: -8px; margin-top: 3px;">Hospital Management Assessment plan(s) details</div>
					<div  class = " panel-heading">	
						<table id = "table" class = "table table-bordered" style="">
							<thead class="">
								<tr>
									<th>Standard(ID)</th>
									<th>Assessor(s) recommendation</th>
									<th>Hospital Committe plan</th>
									<th>Date Planned</th>
									<th class="">Update</th>
									<th class="">Delete</th>
									
									
									
								</tr>
							</thead>
							<tbody>
								<?php
								
									$s_query = $conn->query("SELECT * FROM `action_plan` ") or die(mysqli_error());
									while($s_fetch = $s_query->fetch_array()){
										$std=$s_fetch['standard_code'];
									
								?>
								<tr>
									
									<td><?php echo $s_fetch['standard_code']?></td>
									<td><?php echo $s_fetch['recommend']?></td>
									<td><?php echo $s_fetch['plan']?></td>
									<td><?php echo $s_fetch['date']?></td>
									<td class="w3-khaki"><?php echo "update";?></td>
									<td class="w3-red"><?php echo "Delete";?></td>
                                    
									
									
																		
								</tr>
		
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
				
	

			</div>

			<div class="w3-padding cs" id="Budget" style="display: none;">
			
			<div class = "alert alert-info w3-center" style="margin-bottom: -8px;">Hospital Management Budget  details</div>
					<div  class = " panel-heading">	
						<table id = "table3" class = "table table-bordered" style="">
							<thead class="w3-khaki">
								<tr>
									<th>Standard(ID)</th>
									<th>Assessor(s) recommendation</th>
									<th>Hospital Committe plan</th>
									<th>Date Planned</th>
									<th class="">Update</th>
									<th>Delete</th>
									
									
									
								</tr>
							</thead>
							<tbody>
								<?php
								
									$s_query = $conn->query("SELECT * FROM `action_plan` ") or die(mysqli_error());
									while($s_fetch = $s_query->fetch_array()){
										$std=$s_fetch['standard_code'];
									
								?>
								<tr>
									
									<td><?php echo $s_fetch['standard_code']?></td>
									<td><?php echo $s_fetch['recommend']?></td>
									<td><?php echo $s_fetch['plan']?></td>
									<td><?php echo $s_fetch['date']?></td>
									<td class="w3-khaki"><?php echo "update";?></td>
									<td class="w3-red"><?php echo "Delete";?></td>
                                    
									
									
																		
								</tr>
		
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
				
			</div>

			<div class="w3-padding cs" id="Edit" style="display: none;">
		
				</div>


			<script type="text/javascript">
	$('.w3-block').click(function() {
		var text = $(this).text();
		//changing color of button
		$('.w3-block').removeClass('w3-red').removeClass('w3-light-grey');
		$(this).addClass('w3-red');
		//showing the div
		$('.cs').hide();
		$('#'+text).show();
	})
</script>
	<div id="footer" class="w3-center">
	<?php include "../footer.php";?>
	</div>
	<div class="w3-modal" id="deModal">
		<div class="w3-modal-content" style="width: 500px;" id="modalContent"></div>
	</div>

<div id="modalC"></div>
<div id="modalD"></div>
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
		$('#table3').DataTable();
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
<script type="text/javascript">
	function showModal(code) {
		$('#modalC').load("budget_modal.php?code="+code);
	}
</script>

<script type="text/javascript"> 
function EditModal(code){
	$('#modalD').load("edit_plan_modal.php?code="+code);
} 

function send_budget() {
	var form_data = $('#budget_form').serialize();
	var url = "budget_db.php";
	$.ajax({
		url: url,
		method: "POST",
		data: form_data,
		success: function(result) {
			var obj = JSON.parse(result);
			if (obj.status == true) {
				$('#budget_result').html("<div class='alert alert-success'>"+obj.message."</div>");
			}
			else{
				$('#budget_result').html("<div class='alert alert-danger'>"+obj.message."</div>");
			}
		}
	});
	return false;
}
</script>
</html>
