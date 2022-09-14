<div id="header">
	<h1 class=" w3-center" style="font-size: 30px;"><img src="../images/health.png" style="width:100px; height: 85px; font-size: 24px;" />MINISTRY OF HEALTH MALAWI</h1>

</div>

 

<div id="" class="w3-bar w3-grey w3-large w3-hover" style="margin-top: 6px; border-top-style: solid; border-top-color: red; border-bottom-style: solid; border-bottom-color: red; color: white">
  <a href="home.php?action=dash" class="w3-bar-item w3-button fa fa-home" style="margin-left: ; margin-right: 10%; font-size: 20px; color: white">Home</a>
  <a href="../logout.php" class="w3-bar-item w3-button fa fa-sign-out w3-red w3-right" style="margin-left: ;  font-size: 20px; color: white">Logout</a>

  <div class="w3-dropdown-hover" style="margin-top: 6px; margin-right: 10%;font-size: 20px; color: white">
    <button class="w3-button fa fa-caret-down">Region</button>
    <div class="w3-dropdown-content w3-bar-block w3-border w3-hover-red">
      <a href="home.php?action=region" class="w3-bar-item w3-button">Register Region</a>
      <a href="location_manage_table.php" class="w3-bar-item w3-button">Region</a>
      
    </div></div>

    <div class="w3-dropdown-hover" style="margin-top: 6px; margin-right: 10%;font-size: 20px; color: white ">
    <button class="w3-button fa fa-caret-down">District</button>
    <div class="w3-dropdown-content w3-bar-block w3-border w3-hover-red">
      <a href="home.php?action=district" class="w3-bar-item w3-button">Register District</a>
      <a href="location_manage_table.php" class="w3-bar-item w3-button">District</a>
      
    </div></div>

  <div class="w3-dropdown-hover" style="margin-top: 6px;  margin-right: 8%;font-size: 20px; color: white">
    <button class="w3-button fa fa-institution">Facility</button>
    <div class="w3-dropdown-content w3-bar-block w3-border w3-hover-red">
      <a href="home.php?action=facility" class="w3-bar-item w3-button">Add Facility</a>
      <a href="facility_table.php" class="w3-bar-item w3-button">Modify Facility</a>
     
    </div></div>
    <a href="home.php?action=search" class="w3-bar-item w3-button fa fa-user-md " style="margin-: ;  font-size: 20px; color: white">Profile</a>
  
</div>

<div class="w3-bar w3-#FFFFCC  w3-right " > <?php
			include "connection.php";
			$user_id=$_SESSION['user_id'];
			$result=mysqli_query($connection,"select * from user where user_id='$user_id'")or die(mysqli_error());
			$date=mysqli_query($connection,"SELECT curdate() as date");
			$row=mysqli_fetch_array($result);
			$d=mysqli_fetch_array($date);
			$fname=$row['fname'];
      $sname=$row['sname'];
			$role=$row['role'];
	
echo '<label  style="color:green; font-size:20px;" class="w3-right">
'.'<label style="color:black; " class="fa fa-user  ">'.'User:'.'
</label>'.$fname.'    '.$sname.'</label>';

?>

</div>
