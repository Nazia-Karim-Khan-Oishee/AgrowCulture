<?php 

session_start();

if (!isset($_SESSION['user_name'])) 
{
    header("Location: INDEX.php");
}
if(isset($_SESSION['Just_Set']) && $_SESSION['Just_Set']==true)
{
    echo "<script>alert('Wow! User Registration Completed.')</script>";
    $SESSION['Just_Set'] = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php echo "<h1>Welcome " . $_SESSION['user_name'] . "</h1>"; ?>
    <a href="logout.php">Logout</a>
</body>
</html>