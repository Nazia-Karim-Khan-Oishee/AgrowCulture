<?php 

include 'Config.php';
error_reporting(0);

session_start();

$user_name = $_SESSION['user_name'];
$query = "SELECT * FROM users WHERE user_name = '$user_name'";
$req = mysqli_query($Conn , $query);
$row = mysqli_fetch_assoc($req);
$Name= $row['Name'];
$Username = $row['user_name'];
$Mobilenumber = $row['MobileNumber'];

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
        unset($currpass);
        unset($new_password);
        unset($cpassword);
    }
    if (isset($_POST['submit2'])) 
    {    
        $user_name = $_SESSION['user_name'];
        $MobileNumber = $_POST['MobileNumber'];
        if(strlen($MobileNumber) != 11 )
        {
        echo "<script>alert('Invalid Mobile Number.')</script>";

    }
    elseif(strlen($MobileNumber) == 11 ) 
    {
        
        $sql4 = "UPDATE users SET MobileNumber = '$MobileNumber' WHERE user_name = '$user_name' ";
        $result4 = mysqli_query($Conn , $sql4);
        if($result4)
        {           
            echo "<script>alert('Mobile Number Changed.')</script>";
            
        }
        else 
        {
            echo "<script>alert('Something went wrong.')</script>";
        }
    }
    unset($MobileNumber);
}
//session_destroy();
    
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
                <div>
                    <label>Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo $Name ?>" value="<?php echo $Name ?>">
                  </div>
                  <div>
                    <label>User Name</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $Username ?>" value="<?php echo $Username ?>">
                  </div>
                <div>
                    <label>Mobile Number</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="<?php echo $Mobilenumber ?>" value="<?php echo $Mobilenumber ?>">
                  </div>
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
       
        <form class="form" action="" method="POST" id="createAccount">
            <h1 class="form__title">Change Mobile Number</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" class="form__input" name="MobileNumber" autofocus placeholder="MobileNumber" onfocus="this.value=''"  required>
                <div class="form__input-error-message"></div>
            </div>
            <input type="submit" name="submit2" class="form__button" value="Continue"/> 

</form>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>