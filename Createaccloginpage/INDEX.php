<?php 

include 'Config.php';



//include_path='F:\XAMPP\php\PEAR';

error_reporting(0);

session_start();


if (isset($_SESSION['user_name'])) {
    header("Location: Welcome.php");
}

if (isset($_POST['submit'])) {
    echo "<script>alert(\"Hello World\");</script>";
	//$id = $_POST['id'];
	//$user_id = $_POST['user_id'];
	$user_name = $_POST['user_name'];
    echo "<script>alert(\"Hello World\");</script>";
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$sql = "SELECT * FROM users WHERE user_name='$user_name' AND password='$password'";
	$result = mysqli_query($Conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['user_name'] = $row['user_name'];
		header("Location: Welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Log in.css">
    <link href="http://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Log In</title>
</head>
<body>
    <div class="container1">
        <div class="container">

        <div class="titleDiv">
            <h1 class="form__title">Login</h1>
            <p class="form__text">Welcome back!</p>
        </div>
            <form action="" method="POST" class="form" id="login">

            <div class="form__message form__message--error"></div>

            <div class="form__input-group">
                <input type="text" class="form__input"  name="user_name" id="username" autofocus placeholder="Enter username" value="<?php echo $user_name; ?>" required>
                <div class="form__input-error-message"></div>
            </div>

            <div class="form__input-group">
                <input type="password" class="form__input" name="password" id="password" autofocus placeholder="Enter password" value="<?php echo $_POST['password']; ?>" required>
                <div class="form__input-error-message"></div>
            </div>

                
                <button class="form__button" type="submit" id="submitBtn" name="submit" value="Login" requied>Continue</button>
                </form>
                <p class="form__text">
                    <a href="#" class="form__link">Forgot your password</a>
                </p>

                <p class="form__text">Don't have an account?
                    <a href="create acccount.php">Create account</a>
                </p>
            </form>         
        </div>
    </div>

   
            <footer>
            <div class="row">
                <div class="col">
                    <h3>AGROWCULTURE</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta laudantium harum nulla deserunt consequatur nam, exercitationem velit. Accusamus eveniet asperiores atque qui delectus facilis necessitatibus ipsam quidem mollitia sapiente! Quos.</p>
                </div>
                <div class="col">
                    <h5>Address <div class="underline"><span></span></div></h5>
                    <p>Islamic University of Technology</p>
                    <p>Boardbazar,Gazipur</p>
                </div>
                <div class="col">
                    <h5>Links <div class="underline"><span></span></div></h5>
                    <ul>
                        <li><a href="getstartedpage.php">HOME</a></li>
                        <li><a href="4optionss.php">SERVICES</a></li>
                        <li><a href=""></a>ABOUT US</li>
                        <li><a href=""></a>CONTACTS</li>

                    </ul>
                </div>

                <ul class="social_icon">
                    <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
                  </ul>
                </div>
                <hr>
                <p class="copyright">2022 Copyright © Agrowculture. | Legal | Privacy Policy | Design by Namiha</p>

            </div> 
            </footer>
</body>
</html>