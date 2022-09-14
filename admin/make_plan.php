<?php

if (!isset($_SESSION)) {
  session_start();
}
if (isset($_SESSION['username'], $_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $username = $_SESSION['username'];
}
else{
  header("location: logout.php");
}

require '../connect.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>hims</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

 
	<?php 
  include 'connection.php';
 $id=$_REQUEST['id'];
$sel=mysqli_query($connection,"SELECT * FROM assessment_details WHERE id='$id'");
$_SESSION['id'] = $id;
$fetch=mysqli_fetch_array($sel);


?>		
	
		
		<center>
		<form method="post" style="width: 100%;'" action="plan_db.php" id="static_form" onsubmit="be_static(event);">
      <h3 class="alert alert-info w3-center" style="">Planners and Decision Makers</h3>
      <div id="static_result" class="w3-text-green"></div>
	<table class="w3-center" style="width: 500px; margin-left: -9%;">
  <tr>
    
    <td><input type="Hidden" name="standard_code" class="form-control" readonly="" value="<?php echo $fetch['standard_code'] ?>"   /></td>
	</tr>
	<tr>
    <td></td>
    <td><input type="Hidden" readonly="" name="level_achieved" class="form-control w3-disabled"value="<?php echo $fetch['level_achieved'] ?>" /></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="Hidden"  name="recommend" class="form-control w3-disabled" style="width: " value="<?php echo $fetch['comment']?>"></td>
    
  </tr>
  <tr>
    <td>Plan</td>
    <td><textarea name="plan" rows="3" cols="10" class="form-control" style="border-radius: 6px; margin-bottom: 3px;" required autofocus="on" minlength="5" autocomplete="off"></textarea></td>
	</tr>

  <tr>
    <td>Budget</td>
    <td><textarea name="budget_details" rows="3" cols="10" class="form-control"  style="border-radius: 6px; margin-bottom: 3px;" required minlength="3" autocomplete="off"></textarea></td>
  </tr>
	
  <tr>
    <td>Implementation Start </td>
    <td><input type="text"  name="startDate" rows="3" cols="10" class="form-control"  style="border-radius: 6px; margin-bottom: 3px;" required autocomplete="off"></td>
  </tr>

   <tr>
    <td>Implementation Finish</td>
    <td><input type="text"  name="endDate" rows="3" cols="10" class="form-control"  style="border-radius: 6px; margin-bottom: 3px;" required autocomplete="off"></td>
  </tr>
  <tr>
    
    <td>&nbsp;</td>
    <td><input type="submit" value="submit" class="form-control w3-green w3-hover-teal" name="isub" style="margin-bottom: 30%; border-radius: 6px;" /></td>
  </tr>
  
</table>
		</form>
		</center>
			
	</div>
	<div id="">
	<!---side bar slide --->
	
	
	
       
            </div>

        
	
	
	
	<!--- side bar slide --->
	
	</div>
</div>