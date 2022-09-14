<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "ictpms";
//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
//Select Database
mysql_select_db($dbname) or die(mysql_error());
// Retrieve data from Query String
$age = $_GET['standard_code'];
$sex = $_GET['role'];
$wpm = $_GET['username'];
$pass = $_GET['department'];
// Escape User Input to help prevent SQL Injection
$age = mysql_real_escape_string($age);
$sex = mysql_real_escape_string($sex);
$wpm = mysql_real_escape_string($wpm);
$pass = mysql_real_escape_string($pass);
//build query
$query = "SELECT * FROM standard WHERE standard_code = '$age'";
if(is_numeric($age))
$query .= " AND name <= $age";
if(is_numeric($wpm))
$query .= " AND username<= $wpm";

if(is_numeric($pass))
$query .= " AND department<= $pass";
//Execute query 


?>