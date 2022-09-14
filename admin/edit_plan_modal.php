<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	.input[type='']::placeholder{text-align: center;}
	.input[type='budget_details']::placeholder{text-align: center;}
	.input[type='date']::placeholder{text-align: center;}
	.input[type='endDate']::placeholder{text-align: center;}
	
	
	

</style>
</head>
<body>

</body>
</html>
<?php
$code = $_GET['code'];
include 'connection.php';

$sel=mysqli_query($connection,"SELECT * FROM action_plan WHERE standard_code='$code'");
	$fetch=mysqli_fetch_array($sel);
?>	
<div class="w3-modal" style="display: block; margin-top: -40px" id="myT">
	<div class="w3-modal-content" style="width: 80%;">
		<div class="w3-padding w3-teal w3-center alert alert-info" style="color: red; font-size: 20px;">Modifying Commitee Plan(s) details<i class="fa fa-remove w3-hover-text-red w3-right pointer" onclick="$('#myT').remove()"></i></div>
		<form action="editPlan_db.php" method="POST" >

			<label style="margin-left: 40%">Standard Budgetted</label><br>
			<input type="text" name="standard_code" value="<?php echo $fetch['standard_code']?>" readonly="" class="form-control" style="width: 80%; margin-left: 10%; margin-right: 10%" >

				<label class="w3-center" style="margin-left: 40%" >Plan</label></br>
				<input type="text" name="plan" value="<?php echo $fetch['plan']?>" class="w3-center form-control" style="width: 80%; margin-left: 10%; margin-right: 10%"  />

				
	<input type="submit" name="input" value="Update" style="border:none; width: 100%; " class="w3-blue w3-hover-khaki">
		
		</form>
	</div>


</div>
