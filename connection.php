<?php 
$connection=new mysqli("localhost", "root", "","ictpms");
$conn = $connection;
$db = $conn;

function log_activity($user, $stmt)
{
    global $db;
    
    $time = time();
    $user = $_SESSION['user_id'];

    $stmt = $db->real_escape_string($stmt);

    $insert = $db->query("INSERT INTO `logs`(`user_id`, `times`, `description`) VALUES ('$user', '$time', '$stmt')");
}
?>

