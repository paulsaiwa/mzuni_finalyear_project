<?php	
function criteria_name($id)
{
	# code...
}
error_reporting('E_NOTICE') ?>
<?php 
include('connection.php');
session_start();  
if(empty($_SESSION['user_id']) OR empty($_SESSION['password']) ) {  
  
   // header('Location: index.php?login=access_denied' );   
} 
	if (isset($_POST['do'])) {
	
/* get the posted data
$dcode = $_REQUEST['c_id'];
$dname= $_REQUEST['number'];
$darea= $_REQUEST['criteria'];
$dstandard=$_REQUEST['standard'];
//$date=$_REQUEST['initdate'];
//$user=$_REQUEST['user_id'];
//$rmarks=$_REQUEST['rmarks'];
//$areq = $_REQUEST['areq'];
//BACKUP

 
$Bpcode = $fetch['standard_code'];
$Bicode= $fetch[1];
$Bistatus= $fetch[2];
$Bpstatus=$fetch[3];
$Brmarks=$fetch[4];
$Bareq = $fetch[5];
$level = $fetch[6];
//$s=mysql_query("SELECT * FROM  WHERE Proj_code='$Bpcode'");

//$f=mysql_fetch_array($s);
//$g=$f['Project_name'];
*/
$date=mysqli_query($connection,"SELECT curdate() as date");
			
			$d=mysqli_fetch_array($date);
$s=$_POST['standard_code'];
$standard=$fetch['standard'];
$level=$_POST['level_achieved'];
$month=date('M');
$year=date('Y');
$name=$_POST['do'];
$sql = mysqli_query($connection,"SELECT *FROM criteria WHERE c_id='$name'");
$data_e = mysqli_fetch_assoc($sql);
$name = $data_e['criteria'];
$comment=$_POST['comment'];

$sel=mysqli_query($connection,"SELECT *FROM saiwa WHERE do='$name' and curdate()='$d'");//assess more than once
	$ro=mysqli_num_rows($sel);
	if ($ro > 0 ){
	echo 'Sory! Criteria already assessed. please chose another username';
	}else if($name==""){
	echo '<b style="color:red;">You forgot to select criteria. Criteria can\'t be empty</b>';
	}else{
		$backup=mysqli_query($connection,"INSERT INTO assessment_details(standard_code,date,do,level_achieved,comment, month,year) VALUES('$s',curdate(), '$name','$level', '$comment','$month','$year')");
		$kuyesa=mysqli_query($connection,"INSERT INTO recommendation(standard_code,date,level_achieved,comment) VALUES('$s',curdate(),'$level', '$comment')");
		if($backup){

}


else {echo mysqli_error();


	}}}

echo "<div class='alert alert-danger'>Successfully added Verification criteria</div>";


?>	