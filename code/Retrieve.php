<?php


include 'Config.php';
$user_name = $_SESSION['user_name'];

$query = "SELECT Name,user_name,MobileNumber FROM users where user_name = '$user_name'";


$row=mysqli_query($dbCon,$query);

?>