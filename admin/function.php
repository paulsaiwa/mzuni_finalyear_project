<?php
function user(){
	$db = mysqli_connect("localhost", "root", "", "ictpms");
  $query = mysqli_query($db,"select count(user_id) as total from user");
  $result = mysqli_fetch_array($query);
  echo $result['total'];?>
}

?>