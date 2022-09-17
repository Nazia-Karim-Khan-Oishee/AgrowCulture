<?php 

include 'Config.php';
error_reporting(0);

session_start();

$currentpass = "";
$checkpassword = "";
$new_password = "";
$cpassword = "";
if (!isset($_SESSION['user_name'])) 
{
    header("Location: INDEX.php");
}
if(isset($_SESSION['Just_Set']) && $_SESSION['Just_Set']==true)
{
    echo "<script>alert('Wow! User Registration Completed.')</script>";
    $SESSION['Just_Set'] = false;
}
if (isset($_POST['submit'])) 
{
    $user_name = $_SESSION['user_name'];
    $currentpass = $_POST['currentpass'];
    $checkpassword = $_POST['new_password'];
    $new_password = md5($_POST['new_password']);
    $cpassword = md5($_POST['cpassword']);
    $uppercase = preg_match('@[A-Z]@', $checkpassword);
    $lowercase = preg_match('@[a-z]@', $checkpassword);
    $number    = preg_match('@[0-9]@', $checkpassword);
    $specialchars = preg_match('@[^\w]@', $checkpassword);
    $Validate= true;
    if(!$uppercase || !$lowercase || !$number || !$specialchars || strlen($checkpassword)<5 ) {
        $Validate= false;
    }
    
    if($Validate)
    {
      $sql3 = "SELECT password FROM users WHERE user_name = '$user_name'";
       $result3 = mysqli_query($Conn , $sql3);
       $row=mysqli_fetch_assoc($result3);
      $hash = password_hash($row['password'], PASSWORD_DEFAULT);
      if(password_verify(md5($_POST['currentpass']),  $hash))
       {

            if($new_password == $cpassword)
            {
                $sql2 = "UPDATE users SET password = '$new_password' WHERE user_name = '$user_name' ";
                $result2 = mysqli_query($Conn , $sql2);
                echo "<p class='er'><big>Password Changed.</big></p>";
                //header("Location: INDEX.php");
            } 
            else
            { 
                echo "<script>alert('Password does not match')</script>";
            }
       }
     else
        {
            echo "<script>alert('Current Password does not match')</script>";
            
         }
        }
        else{
            echo "<p class='er'><big>Password should contain at least one 
    uppercase letter, one lowercase letter, one special character and one number </big>.</big></p>";

        }
    }
    unset($currpass);
    unset($new_password);
    unset($cpassword);
    unset($_SESSION['user_name']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" type="text/css" href="ChangePassword.js" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/form.css" />
    <title>Welcome</title>
</head>
<body>
    <?php echo "<h1>Welcome " . $_SESSION['user_name'] . "</h1>"; ?>
    <form class="form" action="" method="POST" id="createAccount">
            <h1 class="form__title">Change Password</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="password" class="form__input" name="currentpass" autofocus placeholder="Current Password" onfocus="this.value=''" value="<?php echo $currentpass; ?>" required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" name="new_password" autofocus placeholder="NewPassword" onfocus="this.value=''" value="<?php echo $new_password; ?>" required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" name="cpassword" autofocus placeholder="Confirm Password" onfocus="this.value=''" value="<?php echo $cpassword; ?>" required>
                <div class="form__input-error-message"></div>
            </div>
			<input type="submit" name="submit" class="form__button" value="Continue"/> 
        </form> 

    <p><a href="logout.php">Logout</a></p>
</body>
</html>