<?php
include 'Config.php';

error_reporting(0);

session_start();

if (isset($_POST['submit'])) 
{
    $user_name = $_POST['user_name'];
    $new_password = md5($_POST['new_password']);
    $cpassword = md5($_POST['cpassword']);
    $sql = "SELECT * FROM users WHERE user_name = '$user_name'";
    $result = mysqli_query($Conn, $sql);
    if ($result->num_rows > 0) 
    {
        //$sql2= "DELETE password FROM users where users.user_name = '$user_name'";
            $sql2 = "UPDATE users SET password = '$new_password' WHERE user_name = '$user_name' ";
            $result2 = mysqli_query($Conn , $sql2);
            header("Location: INDEX.php");

    }
            else 
            {
                echo "<script>alert('User not found.');</script>";
            }
        }
?>



<html>
<head>
<title>Change Password</title>
<!--<link rel="stylesheet" type="text/css" href="ChangePassword.js" />-->
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
</head>
<body>
<form class="form" action="" method="POST" id="createAccount">
            <h1 class="form__title">Change Password</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" class="form__input" name="user_name" autofocus placeholder="Username" value="<?php echo $user_name; ?>" required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" name="new_password" autofocus placeholder="NewPassword" value="<?php echo $_POST['newpassword']; ?>" required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" name="cpassword" autofocus placeholder="Confirm Password" value="<?php echo $_POST['cpassword']; ?>" required>
                <div class="form__input-error-message"></div>
            </div>
			<input type="submit" name="submit" class="form__button" value="Continue"/>
            
            
        </form> 
</body>
</html>