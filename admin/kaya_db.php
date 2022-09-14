<?php
if(isset($_POST['name'])){
	echo "my name is".$_POST['name']."and your name is ".$_POST['age'];
	echo "<script>alert('saiwa')</script>";
}
else{
	echo "kokop";
}
?>