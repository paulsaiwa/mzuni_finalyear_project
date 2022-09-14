
<?php
session_start();
$dep = $_SESSION['department_id'];
//connecting to database
$mysqli = new mysqli("localhost", "root", "", "ictpms");
//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0 && trim($q) != '') {
  // query in the database
  $sqla = $mysqli->query("SELECT * FROM standard WHERE standard_code LIKE '%{$q}%' AND department_id = '$dep' ");
   $people = $sqla->num_rows;
   
   //print response
   if ($people > 0) {
   	# code...
   
   while($row = $sqla->fetch_array()) {   
             echo "<p style='background-color:; margin-left:; margin-top:10px;' class=\"w3-left\"><a href = \"ass_search_stand.php?standard_code={$row['standard_code']}\"><b>{$row['standard_code']}
      {$row['description']}</b></a>  <br> "; 
			
         }
    }
    else{
    	echo '<p class="w3-center" style="color:red">No match for the input!</p>';
    }
}


?>