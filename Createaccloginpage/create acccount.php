<?php 

include 'Config.php';

error_reporting(0);

session_start();


if (isset($_SESSION['user_name'])) {
    header("Location: Welcome.php");
}

//if (isset($_POST['submit'])) {
    
	//$id = $_POST['id'];
	//$user_id = $_POST['user_id'];
    if (isset($_POST['submit'])) 
    {
    $Name = $_POST['Name'];
	$user_name = $_POST['user_name'];
	$Just_Set = false;
    $Validate = true;
	$MobileNumber = $_POST['MobileNumber'];
	$checkpassword = ($_POST['password']);
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $uppercase = preg_match('@[A-Z]@', $checkpassword);
    $lowercase = preg_match('@[a-z]@', $checkpassword);
    $number    = preg_match('@[0-9]@', $checkpassword);
    $specialchars = preg_match('@[^\w]@', $checkpassword);
    if(!$uppercase || !$lowercase || !$number || !$specialchars || strlen($checkpassword)<5 ) {
        $Validate= false;
      }

    if($Validate)
	{
        if ($password == $cpassword) 
    {
        if(strlen($MobileNumber)<11)
        {
            unset($Name);
            unset($user_name);
            unset($MobileNumber);
            $_POST['password'] = "";
            $_POST['cpassword'] = "";
            echo "<p class='er'><big>Invalid MobileNumber.</big></p>";

        }
        else{
            
            if(strlen($user_name)<6)
        {
            unset($Name);
            unset($user_name);
            unset($MobileNumber);
            $_POST['password'] = "";
            $_POST['cpassword'] = "";
            echo "<p class='er'><big>Length of username should be at least 6 characters.</big></p>";

        }
        else{
		$sql = "SELECT * FROM users WHERE user_name = '$user_name'";
		$result = mysqli_query($Conn, $sql);
		if (!$result->num_rows > 0) 
		{
			$sql = "INSERT INTO users (Name, user_name, MobileNumber, password)
					VALUES ('$Name', '$user_name', '$MobileNumber', '$password')";
			$result = mysqli_query($Conn, $sql);
			if ($result)
            {
				echo "<script>alert('Registration Completed.Welcome to Agrowculture')</script>";
				$sql = "SELECT * FROM users WHERE user_name='$user_name' AND password='$password'";
				$row_fetch = mysqli_query($Conn, $sql);
				if ($row_fetch->num_rows > 0) 
                {
					$row = mysqli_fetch_assoc($row_fetch);
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['Just_Set'] = true;
					header("Location: Welcome.php");
				}
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} 
            else 
            {
                unset($Name);
                unset($user_name);
                unset($MobileNumber);
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                echo "<p class='er'><big>Something Wrong Went.Please try again later.</big></p>";
				//echo "<script>alert('Something Wrong Went.Please try again later')</script>";
			}
		} 
		else 
        {
            unset($Name);
            unset($user_name);
            unset($MobileNumber);
            $_POST['password'] = "";
            $_POST['cpassword'] = "";
            echo "<p class='er'><big>user_name already exists.</big></p>";
            //unset($password);
            //unset($cpassword);
            //$_POST['Name']="";
	        //$_POST['user_name']="";
            //echo "<div>This is a div.</div>";
	        //$_POST['MobileNumber']="";
            //die("user_name already exists.");
		}
    }
		
	} 
}
    else 
    {
            unset($Name);
            unset($user_name);
            unset($MobileNumber);
            $_POST['password'] = "";
            $_POST['cpassword'] = "";
		    echo "<script>alert('Password Not Matched.')</script>";
	}
}
else 
{   
    unset($Name);
    unset($user_name);
    unset($MobileNumber);
    $_POST['password'] = "";
    $_POST['cpassword'] = "";
    echo "<p class='er'><big>Password should contain at least one 
    uppercase letter, one lowercase letter, one special character and one number </big>.</big></p>";
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create account.css">
	<link href="http://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Create Account</title>
</head>
<body>
	<div class="container1">
    <div class="container">
        <form class="form" action="" method="POST" id="createAccount">
            <h1 class="form__title">Create Account</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" class="form__input" name="Name" autofocus placeholder="Name" value="<?php echo $Name; ?>" required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="text" class="form__input" name="user_name" autofocus placeholder="Username" value="<?php echo $user_name; ?>" required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="text" class="form__input" name="MobileNumber" autofocus placeholder="Mobile Number" value="<?php echo $MobileNumber; ?>" required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" name="password" autofocus placeholder="Password" value="<?php echo $_POST['password']; ?>" required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" name="cpassword" autofocus placeholder="Confirm Password" value="<?php echo $_POST['cpassword']; ?>" required>
                <div class="form__input-error-message"></div>
            </div>
			<input type="submit" name="submit" class="form__button" value="Continue"/>
            <p class="form__text">
                <a class="form__link" href="INDEX.php" id="linkLogin">Already have an account? Sign in</a>
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
			<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>