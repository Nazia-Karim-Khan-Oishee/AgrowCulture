<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "agrowculture";

$Conn = mysqli_connect($server, $user, $pass, $database);
// echo "hello world";
if (!$Conn) 
{
    die("<script>alert('Connection Failed.')</script>");
}

?>