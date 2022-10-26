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
    //echo "<script>alert('Wow! User Registration Completed.')</script>";
    header("Location: dashboard.php");
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
    unset($cpassword);
    unset($new_password);
    unset($currentpass);
    $_POST['new_password'] = "";
    $_POST['cpassword'] = "";
    $_POST['cpassword'] = "";
                //echo "<p class='er'><big>Password Changed.</big></p>";
                $ShowMessage ="Password Changed.";
                //header("Location: INDEX.php");
            } 
            else
            { 
                //echo "<script>alert('Password does not match')</script>";
                unset($cpassword);
    unset($new_password);
    unset($currentpass);
    $_POST['new_password'] = "";
    $_POST['cpassword'] = "";
    $_POST['cpassword'] = "";
                $ShowMessage1 ="Password does not match";
            }
       }
     else
        {unset($cpassword);
            unset($new_password);
            unset($currentpass);
            $_POST['new_password'] = "";
            $_POST['cpassword'] = "";
            $_POST['cpassword'] = "";
            //echo "<script>alert('Current Password does not match')</script>";
            $ShowMessage2 ="Current Password does not match";
         }
        }
        else{
            unset($cpassword);
    unset($new_password);
    unset($currentpass);
    $_POST['new_password'] = "";
    $_POST['cpassword'] = "";
    $_POST['cpassword'] = "";
            $ShowMessage3 ="Password should contain at least one 
            uppercase letter, one lowercase letter, one special character and one number ";
           // echo "<p class='er'><big>Password should contain at least one 
   // uppercase letter, one lowercase letter, one special character and one number </big>.</big></p>";

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
       // echo "<script>alert('Invalid Mobile Number.')</script>";
    $MobileError1 ="Invalid Mobile Number.";
    unset($MobileNumber);
    }
    elseif(strlen($MobileNumber) == 11 ) 
    {
        
        $sql4 = "UPDATE users SET MobileNumber = '$MobileNumber' WHERE user_name = '$user_name' ";
        $result4 = mysqli_query($Conn , $sql4);
        if($result4)
        {           
           // echo "<script>alert('Mobile Number Changed.')</script>";
            $MobileError1 ="Mobile Number Changed.";
            unset($MobileNumber);
        }
        else 
        {    
            $MobileError1 ="Something went wrong.";
            unset($MobileNumber);
           // echo "<script>alert('Something went wrong.')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width, Initial-scale-1.0">
        <link rel="stylesheet" href="change.css">
        <title>Change Info</title>
    </head>
    <body>
       
        
        <div class="profile-page"> 
       
        <div class="wrapper">
            
            <form class="form" action="" method="POST" id="createAccount">
                <h3 class="form__title">Change Password</h3>
                <div class="form__message form__message--error"></div>
                <div class="form__input-group">
                    <input type="password" class="form__input" name="currentpass" autofocus placeholder="Current Password" onfocus="this.value=''"  required>
                    <span class="error"> <?php echo $ShowMessage2;?></span>
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                    <input type="password" class="form__input" name="new_password" autofocus placeholder="NewPassword" onfocus="this.value=''"  required>
                    <span class="error"> <?php echo $ShowMessage3;?></span>
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                    <input type="password" class="form__input" name="cpassword" autofocus placeholder="Confirm Password" onfocus="this.value=''"  required>
                    <span class="error"> <?php echo $ShowMessage1;?></span>
              <div class="form__input-error-message"></div>
                </div>
                <input type="submit" name="submit" class="form__button" value="Continue"/> 
                <span class="error"> <?php echo $ShowMessage;?></span>
            </form> 
           
            <form class="form" action="" method="POST" id="createAccount">
                <h3 class="form__title">Change Mobile Number</h3>
                <div class="form__message form__message--error"></div>
                <div class="form__input-group">
                    <input type="text" class="form__input" name="MobileNumber" autofocus placeholder="MobileNumber" onfocus="this.value=''"  required>
                    <span class="error"> <?php echo $MobileError1;?></span>
                <div class="form__input-error-message"></div>
                </div>
                <input type="submit" name="submit2" class="form__button" value="Continue"/> 
    
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
                        <li><a href="getstartedpage.html">HOME</a></li>
                        <li><a href="4optionss.html">SERVICES</a></li>
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