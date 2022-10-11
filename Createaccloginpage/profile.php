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
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width, Initial-scale-1.0">
        <link rel="stylesheet" href="profile.css">
        <title>Profile Page</title>
    </head>
    <body>
        
        <div class="profile-page"> 
        <div class="wrapper">
            <h1>PROFILE</h1>
            <form action=""method="post">
                <div class="inputBox">
                    <label for="full_name">Full Name:</label>
                    <input type ="text" id="full_name" name="Name" required>
                </div>
                <div class="inputBox">
                    <label for="full_name">User Name:</label>
                    <input type ="text" id="user_name" name="user_name" required>
                </div>
               <!-- <div class="inputBox">
                    <label for="email">Email:</label>
                    <input type ="email" id="email" name="email" required> 
                </div>-->
                <div class="inputBox">
                    <label for="MobileNum">Mobile Number:</label>
                    <input type ="text" id="MobileNum" name="MobileNumber" required>
                </div>
                <!--<div class="inputBox">
                <label for="password">Change Password:</label>
                </div>
                <div class="inputBox">
                    <label for="password">Current Password:</label>
                    <input type ="password" id="password" name="password" required>
                </div>
                <div class="inputBox">
                    <label for="cpassword">Confirm Password:</label>
                    <input type ="password" id="password" name="cpassword" required>
                </div>-->
            
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