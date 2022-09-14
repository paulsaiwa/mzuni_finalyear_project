<?php
require '../connect.php';

if (isset($_POST['id'])) {
	$id = $db->real_escape_string($_POST['id']);

	$sql = $db->query("SELECT * FROM assessment_details WHERE id = '$id' ");
	$data = $sql->fetch_assoc();
	?>
	<div class="w3-padding w3-blue w3-center" style="">Edit assessment details <i class="fa fa-remove w3-right w3-text-black w3-hover-text-red pointer" onclick="$('#fft').fadeOut();"></i></div>
	<div class="w3-padding" style="">
		<p>&nbsp;</p>
		<div class="w3-padding w3-border w3-border-green w3-round">
			<b>Assessed Criteria</b>: <?php echo '<b style="color:blue;">' .$data['do'].'</b>'; ?>
		</div><br>
		<form method="post" style="" id="myForm" style="">
			<div id="hmtlResult" style="width: "></div>
		
			<table class="ptable" style="">
			  </tr>
			  <tr>
			    <td>Observation</td>
			      <td><select name ="level_achieved" required class="form-control" style="width: 100%;">
					<option>Yes</option>
					<option>No</option>
					<option>Not Applicable</option>
					
				  </select>
			</td>
			  </tr>
			  <tr>
			    <td>comment</td>
			    <td><textarea name="comment" rows="3" cols="3" class="form-control" style="width: 100%"><?php echo $data['comment']; ?></textarea></td>
			    
			  </tr>
			 
				</tr>
				
			  <tr>
			    
			    <td>&nbsp;</td>
			    <input type="hidden" name="code" value="<?php echo $id;?>">
			    <td><input type="reset" id="resetBtn" style="display: none;"></td>
			  </tr>


			</table></form>
			<br>
			  <button class="btn btn-info" onclick="submitForm();">Submit</button>
		
		<?php
}



?>