<?php 

$db = new mysqli("localhost", "root", "", "ictpms");

$conn = $db;

function log_activit($user, $stmt)
{
    global $db;
    
    $time = time();
    $user = $_SESSION['user_id'];

    $stmt = $db->real_escape_string($stmt);

    $insert = $db->query("INSERT INTO `logs`(`user_id`, `times`, `description`) VALUES ('$user', '$time', '$stmt')");
}
?>