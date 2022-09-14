<?php

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
	width:248%;
	margin-left:  ;
	height: 34px;
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
	<h1 class="w3-center" style="font-size: 24px;"><img src="../images/health.png" style="width:80px;" />MINISTRY OF HEALTH MALAWI</h1>

</div>
<div id="menu" style="margin-top: -29PX;">
	<h1 class="head2 w3-center" style="font-size:30px;color:lightblue;text-shadow:7px 7px 4px #000000; ">HOSPITAL IMPROVEMENT MONITORING SYSTEM</h1>
</div>
<div class="w3-row w3-sand w3-large" style="margin-top: -10px">
<a  href ="in-charge.php?action=dashb"><button  class = "w3-btn w3-button fa fa-home" style="background-color:; border:none; margin-left: 3%; margin-right: 3%;">Home</button> </a>

<div class="dropdown" style="margin-left:; margin-right:3%;">
  <button  class="w3-btn w3-button" style=""><span >Manage Assessment</span></button>
  <div class="dropdown-content">
       <button class="w3-btn w3-red w3-block" id="uview" >assessment</button>
    <button class="w3-btn w3-light-grey w3-block w3-disabled" id="uadd">Planning</button>
    <button class="w3-btn w3-light-grey w3-block w3-disabled" id="uedit">Budgeting</button>
     <button class="w3-btn w3-light-grey w3-block w3-disabled" id="udel">Delete-User</button>
    <a href="#"></a>
  </div>
</div>


<div class="dropdown" style="margin-left:; margin-right:3%;">
  <button  class="w3-btn w3-button" style=""><span >Facility</span></button>
  <div class="dropdown-content">
       <button class="w3-btn w3-red w3-block" id="uview" >facility</button>
    
    <a href="#"></a>
  </div>
</div> 

<div class="dropdown" style="margin-left:; margin-right:3%;">
  <button  class="w3-button w3-btn" style=""><span ></span>Standard</button>
  <div class="dropdown-content">
       <button class="w3-btn w3-red w3-block" id="uview" >View</button>
   
    <a href="#"></a>
  </div>
</div> 

<div class="dropdown" style="margin-left:; margin-right:3%;">
  <button  class="w3-button w3-btn" style=""><span ></span>District</button>
  <div class="dropdown-content">
       <button class="w3-btn w3-red w3-block"  >View-details</button>
    
    
    <a href="#"></a>
  </div>
</div> 

<div class="dropdown" style="margin-left:; margin-right:15%;">
  <button class="w3-btn w3-button" style="background-color:sand; border:none; margin-left: 4%;margin-right: 20%;">Criteria</button>
  <div class="dropdown-content">
       <button class="w3-btn w3-light-grey w3-block" >Viewing</button>
    <button class="w3-btn w3-light-grey w3-block  w3-disabled" >facility</button>
    <button class="w3-btn w3-light-grey w3-block w3-disabled" id="gh">Edit</button>
    <button class="w3-btn w3-light-grey w3-block w3-disabled" id="del">Delete</button>
    <a href="#"></a>
  </div>
</div> 
<a  href ="../logout.php"><button class = "w3-red w3-button" style="background-color:red; border:none; margin-left: 4%;">Logout</button> </a>

		</div>
		
		<div class="w3-col ">

			<div class="w3-padding cs" id="View">
				<div class = "alert alert-info w3-center" style="margin-bottom: -2px;">Standard(s) details</div>

				<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table" class = "table table-bordered" style="">
							<thead style="background-color: khaki">
								<tr>
									<th>Standard</th>
									<th>Description</th>
									<th>Criteria number</th>
									<th>Verification Criteria</th>
									<th>Department</th>
									<th>Area</th>
									
									
									
								</tr>
							</thead>
							<tbody>
								<?php
								
									$s_query = $conn->query("SELECT * FROM `standard`,`criteria` ,`department`where standard.
									standard_code=criteria.standard_code AND department.department_id=standard.department_id") or die(mysqli_error());
									while($s_fetch = $s_query->fetch_array()){	
								?>
								<tr>
									<td><?php echo $s_fetch['standard_code']?></td>
									<td><?php echo $s_fetch['description']?></td>
									<td><?php echo $s_fetch['number']?></td>
									<td><?php echo $s_fetch['criteria']?></td>
									<td><?php echo $s_fetch['name']?></td>
									<td><?php echo $s_fetch['area']?></td>
									
									
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
				
		</div>


			<div class="w3-padding cs" id="View-details" style="display: none;">
<div class = "alert alert-info w3-center">District(s) details</div>
	<?php
	include "connection.php";
	
		
		$selects=mysqli_query($connection,"SELECT * FROM districts ORDER by id");
		 $rowscheck=mysqli_num_rows($selects);
		 
		 
			?>				
		
		 <?php
		    echo ' <div id = "s_table" class = "panel panel-default" >';
			echo '<div  class = " panel-heading">';	
			echo '<table id="table5" id=""  class="w3-table w3-center table-bordered" style="width:60%;">';
			echo '<thead style="background-color:khaki; w3-center">';
			echo '<tr style=""><th>District ID</th><th>Name</th><th>Update</th><th>Delete</th></tr>';
			 echo '</thead style="width:400%;">';
			 echo '<tbody>';
			$flag=0;
			while($fetch=mysqli_fetch_array($selects,$selectdb)){
			if($flag%2==0)
				
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['id'].'</td><td>'.$fetch['name'].'</td>';
echo '<td><a href="district.php?id='.$fetch['id'].
					'" ><button><img src="../img/edit1.jpg" width="35" height="25"></button></a> </td>';

	echo '<td><a href="del_district.php?id='.$fetch['id'].
					'" ><button  ><img src="../img/del1.jpg" width="35" height="25"></button></a> </td></tr>';
			 $flag++;
			}
			echo '</tbody>';
			echo '</table>';
			echo '</div></div></div>';
	
			
		
		
		?>
	</div>


	<div class="w3-padding cs" id="Viewing" style="display: none;">
<div class = "alert alert-info">Criteria details</div>
		<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table2" class = "table table-bordered" style="">
							<thead style="background-color: khaki;">
								<tr>
									<th>Standard Code</th>
									<th>Criteria number</th>
									<th>Verification Criteria</th>
									
									
								</tr>
							</thead>
							<tbody>
								<?php
								
									$s_query = $conn->query("SELECT * FROM `criteria`  ORDER by number") or die(mysqli_error());
									while($s_fetch = $s_query->fetch_array()){	
								?>
								<tr>
									<td><?php echo $s_fetch['standard_code']?></td>
									<td><?php echo $s_fetch['number']?></td>
									<td><?php echo $s_fetch['criteria']?></td>
							
									
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
	</div>

	<div class="w3-padding cs" id="facility" style="display: none;">
<div class = "alert alert-info w3-center">Facility(s) details</div>
	<?php
	include "connection.php";
	
		
		$selects=mysqli_query($connection,"SELECT * FROM facility");
		 $rowscheck=mysqli_num_rows($selects);
		 if($rowscheck < 1){
		 echo 'No entry(s)';
		 
		 }else{
		 
			?>					<script language="javascript">
function caaictpms()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>HIMS </title>'); 
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" width="80" height="80" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> Facility details in e </P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:1200px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/17px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

                    
<div  id="print_content">
		
		 <?php
		    echo ' <div id = "s_table" class = "panel panel-default">';
			echo '<div  class = " panel-heading">';	
			echo '<table id="table3" id="results"  class="table  table-bordered">';
			echo '<thead style="background-color:khaki;">';
			echo '<tr style=""><th>facility name</th><th>Contacts</th>
			<th>Email</th><th>Type</th><th>Address</th></tr>';
			 echo '</thead style="width:400%;">';
			 echo '<tbody>';
			$flag=0;
			while($fetch=mysqli_fetch_array($selects)){
			if($flag%2==0)
				
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['name'].'</td><td>'.$fetch['contact'].'</td><td>'.$fetch['email'].'</td><td>'.$fetch['type'].'</td><td>'.$fetch['address'].'</td></tr>';
			 $flag++;
			}
			echo '</tbody>';
			echo '</table>';
			echo '</div></div></div>';
	
			
		}
		
		?>
	</div>

	<div class="w3-padding cs" id="assessment" style="display: none;">
		
<div class = "alert alert-info">Assessment(s) details</div>
	<?php
	include "connection.php";
	
		
		$selects=mysqli_query($connection,"SELECT * FROM assessment_details");
		 $rowscheck=mysqli_num_rows($selects);
		 if($rowscheck < 1){
		 echo 'No entry(s)';
		 
		 }else{
		 
			?>					<script language="javascript">
function caaictpms()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>HIMS </title>'); 
      docprint.document.write('<p align="center"> <FONT size="+3"><img src="../images/health.png" width="80" height="80" >MINISTRY OF HEALTH MALAWI</FONT></p><P  align="center">HOSPITAL IMPROVEMENT MONITORING SYSTEM</P><BR><P  align="center"> Facility details in e </P>');
   docprint.document.write('</head><body onLoad="self.print()" style="width:1200px; font-size:10px; margin-left:40px; -cell-padding:none;font: 12px/17px arial, sans-serif;color: rgb(50, 50, 50);">');
             
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

                    
<div  id="print_content">
		
		 <?php
		    echo ' <div id = "s_table" class = "panel panel-default">';
			echo '<div  class = " panel-heading">';	
			echo '<table id="table4" id="results"  class="table  table-bordered">';
			echo '<thead style="background-color:khaki;">';
			echo '<tr style=""><th>id</th><th>Standard</th>
			<th>Date</th><th>Criteria</th><th>Comment</th><th>Observation</th><td>Action</td></tr>';
			 echo '</thead style="width:400%;">';
			 echo '<tbody>';
			$flag=0;
			while($fetch=mysqli_fetch_array($selects)){
			if($flag%2==0)
				
			echo '<tr bgcolor=#E5E5E5>';
			
	else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['id'].'</td><td>'.$fetch['standard_code'].'</td><td>'.$fetch['date'].'</td><td>'.$fetch['do'].'</td><td>'.$fetch['comment'].'</td><td>'.$fetch['level_achieved'].'</td>';
echo '<td><a href=plan.php?id='.$fetch['id'].'><img src="../img/edit1.jpg" width=30 height=15  />'.'</a></td></tr>';
			 $flag++;
			}
			echo '</tbody>';
			echo '</table>';
			echo '</div></div></div>';
	
			
		}
		
		?>
	</div>


</div>


	<div id="footer" class="w3-center" >
	<?php require '../footer1.php';?>
	</div>
</body>	
<script src = "../js/js/jquery-3.1.1.js"></script>
<script src = "../js/js/sidebar.js"></script>
<script src = "../js/js/bootstrap.js"></script>
<script src = "../js/js/jquery.dataTables.min.js"></script>
<script src = "../js/js/script.js"></script>



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
		$('#table4').DataTable();
		$('#table5').DataTable();
	});
</script>



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


<?php
if (isset($_GET['act'])) {
	?>
	<script type="text/javascript">
		$('#gh').click();
		$('#del').click();
		$('#vadd').click();
		$('#uadd').click();
		$('#uview').click();
		$('#udel').click();
		$('#uedit').click();

	</script>
	<?php
}
?>
</html>