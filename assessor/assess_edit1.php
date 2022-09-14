<?php
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

  
function department($id)
{
	global $connection;
	$result = mysqli_query($connection,"SELECT * FROM  `department` WHERE department_id = '$id'");
	$data = mysqli_fetch_assoc($result);
	return $data['department_name'];
}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>hims</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" type="text/css" href="../w3.css">

<link rel = "stylesheet" type = "text/css" href = "../css/css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/style.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/css/jquery-ui.css" />
		<link rel="stylesheet" type="text/css" href="../font-awesome/font-awesome/css/font-awesome.min.css">
<link href="../css/default.css" rel="stylesheet" type="text/css" />
    <link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/moodal.css" rel="stylesheet">
	<link href="../date/htmlDatepicker.css" rel="stylesheet" />
	<script language="JavaScript" src="../date/htmlDatepicker.js" type="text/javascript"></script>
	<script type="text/javascript" src="../js/boxOver.js"></script>
	<script type="text/javascript" src="../vendor/jquery/jquery.min.js"></script>
	<style>
	input[type="text"]{ width:100%;}
	input[type="button"]{ width:100%;}
	select{ width:100%;}
		textarea{ width:100%;}
	form{ width:100%; border:red;}
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

.g{background-color: red; border:none;  border-radius:6px; } 
a{background-color: ; border:none; margin-left:;} 
button.hover{color:blue;}

input{ width:200%;}
	input[type="button"]{ width:100%;}
	select{ width:100%;}
	form{ width:300%; border:red;}
	</style>
</head>
<body>
<?php include 'assessor_header.php';?>
<div id="links" class="w3-bar  w3-large w3-hover" style="margin-top: 6px; border-top-style: solid; border-top-color: red; border-bottom-style: solid; border-bottom-color: red;">
  <a href="assessor.php?action=dashboard" class="w3-bar-item w3-button fa fa-home" style="margin-left: 10%; margin-right: ; font-size: 20px; color: white;">Home</a>
  <a href="assessor_assessment_details.php" class="w3-bar-item w3-button fa fa-archive" style="margin-left: 10%; margin-right: ; font-size: 20px; color: white;">General Observation</a>
  <a href="ass_search_stand.php" class="w3-bar-item w3-button fa fa-edit " style="margin-left: 10%; margin-right:; font-size: 20px; color: white;">Assessment</a>


  <a href="../logout.php" class="w3-button w3-red w3-right w3-bar-item fa fa-sign-out" style="border-radius: none; font-size: 20px;" >Logout</a>
</div>

<div class="w3-bar w3-#FFFFCC" style="margin-left:5%; margin-right: 6%;" > <?php
      include "connection.php";
      $user_id=$_SESSION['user_id'];
          
      $result=mysqli_query($connection,"select * from user where user_id='$user_id'")or die(mysqli_error);
      $date=mysqli_query($connection,"SELECT curdate() as date");
      $row=mysqli_fetch_array($result);
      $d=mysqli_fetch_array($date);
      $Name=$row['fname'];
      $role=$row['sname'];

      $department=$row['department_id'];
echo '<label class="w3-large"style="float:; color:black; margin-left:10%; margin-right:10%;">'.'Department name:'.' <b style="color:blue;">  '.department($department)."  ".'</t>';
  
?>

</div>


 
</div>

</div>

<div id="content" class="w3-content">
		<?php 
	include 'connection.php';
 $id=$_GET['standard_code'];
 //$dep=$_REQUEST['department_id'];
$sel=mysqli_query($connection,"SELECT * FROM standard WHERE standard_code='$id'");


$fetch=mysqli_fetch_array($sel);
$tsn = $fetch['standard_code'];

?>	
		
		<h3 class="w3-center alert alert-info  w3-center" style="color:black; background-color: rgb(240, 240, 240)" >Assessing standard<?php echo '<label class="w3-center w3-large" style="color:red; border:none;">'.'['.$fetch['standard_code'].
		']</label>'.'<br>'.' <textarea class="w3-" row="3" cols="3" readonly="" style="color:solid black; ">'.$fetch['description'].'</textarea>'?></h3>
		
		<form method="post" class="w3-center w3-content" style="margin-left:-1%; width:100%; margin-bottom:3%;" id="myForm">
		
	<table class="" style="margin-top:-20px; width:100%; border: none; ">
	<tr style="">
		</tr>
		<div id="report_status"></div>
		<tr>
    <td class="w3-center">Criteria</td>
	<td>    <select name="do" required  style="width:100%;" class="form-control" id="doing">
	<?php
                include "connection.php";
						$sel=mysqli_query($connection,"SELECT *FROM criteria where standard_code='$id'");
						echo '<option value=\'\'>--Select criteria--</option>';
						while($fetch=mysqli_fetch_array($sel)){
						
		               echo '<option value="'.$fetch['c_id'].'" id="'.$fetch['c_id'].'">'.$fetch['criteria'].'</option>';
			}
						?>
	</select>
	</td>
	</tr>
  </tr>
  <tr>
    <td>Observation</td>
      <td><select name ="level_achieved" required class="form-control" style="width: 100%">
		<option>--select observation--</option>
		<option>Yes</option>
		<option>No</option>
		<option>Not Applicable</option>
		
	  </select>
</td>
  </tr>

  <tr style="">
    <td class="">comment</td>
    <td><textarea name="comment" rows="3" cols="3" class="form-control" style="width: 100%"> </textarea></td>
    
  </tr>
 
	</tr>
	
  <tr>
    
    <td>&nbsp;</td>
    <input type="hidden" name="standard_code" value="<?php echo $tsn;?>">
    <td><input type="submit" value="submit" name="isub" style="width: 100%" class="w3-green w3-hover-teal w3-large" /><input type="reset" id="resetBtn" style="display: none; background-color: green;"></td>
  </tr>
  
</table>
		</form>
		
		
</div>

 

	



	

<div id="footer" class="w3-center">
	<?php include '../footer.php';?>
</div>

<div class="w3-modal" id="successCriteria" style="background-color:rgba(0,0,0,0.4)">
	<div class="w3-modal-content w3-card-16 " style="width: 300px;">
		<div class="w3-padding" style="background: #428bca;color:white;">Success</div>
		<div class="w3-padding">
			<p>&nbsp;</p>
			<p style="color: green;">Successfully added Verification criteria</p>
		</div>
	</div>
</div>


<!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>
	<script src="../js/stopusers.js"></script>
<script type="text/javascript">

	function rs() {
		$('#successCriteria').hide();
	}
	$('#myForm').on('submit', function(event) {
		event.preventDefault();
		var keyValue = $("#doing").val();
		if (isNaN(keyValue)) {
			alert("Values are empty");
		}
		else{
			var formdata = $('#myForm').serialize();
			$.ajax({
				url: "saving.php",
				method: "POST",
				data: formdata,
				success: function (result) {
					$('#successCriteria').show();
					//$('#report_status').html(result);
					$('#resetBtn').click();

					setTimeout(rs, 4000);
				}
			});
		}
		$("#"+keyValue).remove();
		
	});
</script>


<script type="text/javascript">
  $('.w3-block').click(function() {
    var text = $(this).text();
    //changing color of button
    $('.w3-block').removeClass('w3-red').removeClass('w3-light-grey');
    $(this).addClass('w3-red');
    //showing the div
    $('.cs').hide();
    $('#'+text).fadeIn();
  })
</script>
</body>
</html>
