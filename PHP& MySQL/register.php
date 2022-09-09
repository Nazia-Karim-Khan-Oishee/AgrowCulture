<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['user_name'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	//$id = $_POST['id'];
	//$user_id = $_POST['user_id'];
	$user_name = $_POST['user_name'];
	$MobileNumber = $_POST['Mobile Number'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE user_name='$user_name'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (user_name, Mobile Number,password)
					VALUES ('$user_name', '$MobileNumber', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				//$id = "";
	            // $user_id = "";
	            $user_name = "";
	//          $date = "";
	$MobileNumber="";
	//$password ="";
	//$cpassword
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form - Pure Coding</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<!--<div class="input-group">
				<input type="text" placeholder="User_name" name="user_name" value="<?php echo $user_name; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="id" name="" value="<?php echo $id; ?>" required>
			</div>
-->
			<div class="input-group">
				<input type="name" placeholder="user name" name="user_name" value="<?php echo $user_name; ?>" required>
			</div>
			<div class="input-group">
				<input type="number" placeholder="mobile number" name="Mobile Number" value="<?php echo $MobileNumber; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>