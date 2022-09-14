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
		<link rel = "stylesheet" type = "text/css" href = "css/.css" />
	<script type="text/javascript" src="../vendor/jquery/jquery.min.js"></script>
	<link rel="stylesheet" href="../vendor/boostrap/css/boostrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/moodal.css">
	 <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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

h2,h3,h4 {
	color: ;
	font-size: 24px;
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
.pointer:hover{
	cursor: pointer;
}
.w3-hide{
	display: none;
}
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
	<h1 style="font-size: 30px;"><img src="../images/health.png" style="width:100px; height: 100%;" />MINISTRY OF HEALTH MALAWI</h1>

</div>

<div class="w3-row w3-grey" style="margin-top: -10px ; font-size: 17px; border-top-color: red; border-top-style:solid ; border-bottom-style:solid ; border-bottom-color: red;">
<a  href ="home.php?action=dash" class = " w3-btn w3-button fa fa-home" style="background-color:; border:none; margin-left: ; margin-right: 10%;font-size: 20px; color: white;"> Home</a>

<a  href ="../logout.php" class = "w3-btn w3-bar-item w3-red fa fa-sign-out w3-button w3-right" style="height:35px; padding-top: 8px; font-size: 20px;">Logout</a>

		</div>
		
		<div class="w3-col ">

			<div class="w3-container">
				 <h2 class="" style="margin-left: 30%; color: ">Department Standard Assessment Rules</h2>
<div class="w3-container w3-left-align" style="width: ; margin-left: ;">
  	<?php
  		$sql = $db->query("SELECT * FROM department");
  		$all_ids = array();
  		while ($data = $sql->fetch_assoc()) {
  			$department_id = str_replace(" ", "", $data['department_id']);
  			array_push($all_ids, $department_id);
  			?>
  			<div class="w3-padding w3-hover-light-grey pointer w3-row" style="font-size: 1.5rem;" onclick="showContent('<?="$department_id";?>')">
  				<div class="w3-col s12"><font id="icon_<?="$department_id";?>" class="icon"><i class="fa fa-chevron-down w3-padding"></i></font> &nbsp; <?php echo $data['department_name']; ?></div>
  			</div>
  			<div class="cc" id="cont_<?="$department_id";?>" style="display: none;">
  				<div class="w3-row">
	  				<div class="w3-col m3 w3-hide-small">&nbsp;</div>
	  				
  				</div>
  				<div>
  					<h3>Departmental Assessment Rules</h3>
  					<table id="example_<?="$department_id";?>" class=" w3-table w3-table-all table-bordered w3-large w3-text-black" cellspacing="0" width="100%;">
                                        <thead>
                                            <tr>
                                              	<th>Standard</th>
												<th style=""> Title</th>
												<th >Description</th>
												
												
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               
												<th>Standard</th>
												<th style=""> Title</th>
												<th >Description</th>
												
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        	<?php
								
						$s_query = $conn->query("SELECT * FROM assessment_rules WHERE department='$department_id'") or die(mysqli_error());
									while($s_fetch = $s_query->fetch_array()){	
								?>

								<tr>
									<td><?php echo $s_fetch['standard_code']?></td>
									<td><?php echo $s_fetch['title']?></td>
									<td><?php echo $s_fetch['description']?></td>
									
									
									
								</tr>
								<?php
									}
								?>
                            </tbody>
                            </table>
  				</div>
  			</div>
  			<?php
  		}
  	?> 
<tr><td>
	</td></tr>

</table>

            
</div>
<input type="hidden" id="deli">
</body>	
<!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/scripts.js"></script>


    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>


    <script src=""></script>
	<script src="../js/stopusers.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>
<script>

	//focus Antenatal care
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}


function CC1(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

function CC(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<script type = "text/javascript">
	$(document).ready(function(){
		<?php
			for($i = 0; $i < count($all_ids); $i++){
				?>
				$('#example_<?php echo $all_ids[$i];?>').DataTable();
				<?php
			}

		?>
	});
</script>



<script>

	//cancer department
function myCancer(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace("w3-", "w3-red");
    } else { 
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace("w3-red", "w3-");
    }
}
function showContent(id) {
	var deli = $('#deli').val();
	if (deli == id) {
		$('#cont_'+id).slideUp();
		$('.icon').html('<i class="fa fa-chevron-down w3-padding"></i>');
		$('#deli').val('');
	}
	else{
		$('.cc').hide();
		$('#cont_'+id).slideDown();
		$('.icon').html('<i class="fa fa-chevron-down w3-padding"></i>');
		$('#icon_'+id).html('<i class="fa fa-chevron-up w3-padding"></i>');
		$('#deli').val(id);
	}
	
}
</script>

</html>
