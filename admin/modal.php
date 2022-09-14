<?php
$code = $_GET['code'];
include 'connection.php';

$sel=mysqli_query($connection,"SELECT * FROM assessment_details WHERE standard_code='$code'");
	$fetch=mysqli_fetch_array($sel);
?>	
<div class="w3-modal" style="display: block;" id="myT">
	<div class="w3-modal-content" style="width: 80%;">
		<div class="w3-padding w3-pale-red w3-center">Hospital Management Plans details<i class="fa fa-remove w3-hover-text-red w3-right pointer" onclick="$('#myT').remove()"></i></div>
		<form action="plan_db.php" method="POST" >
			<label style="margin-left: 50%">Standard planned</label><br>
			<input type="text" name="standard_code" value="<?php echo $fetch['standard_code']?>" readonly="" class="form-control" style="width: 80%; margin-left: 20%; margin-right: 20%" >

				<label class="w3-center" style="margin-left: 50%" >Recommendation</label></br>
				<input type="text" name="recommend" readonly="" value="<?php echo $fetch['comment']?>" class="w3-center form-control" style="width: 80%; margin-left: 20%; margin-right: 20%" /></br>

					<label style="margin-left: 50%;">Plan detail(s)</label><br>
					<textarea name="plan" placeholder="write planning details here..." class="form-control" required autocomplete="off" cols="10" rows="3" style="width: 80%; margin-left: 20%;" ></textarea> 
				
	<input type="submit" name="input" value="Submit" style="border:none; width: 100%; "></td></tr>
		
		</form>
	</div>


</div>
