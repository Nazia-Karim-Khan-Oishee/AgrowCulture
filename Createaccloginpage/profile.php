<?php 

include 'Config.php';
error_reporting(0);

session_start();
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
$user_name = $_SESSION['user_name'];
$query = "SELECT * FROM users WHERE user_name = '$user_name'";
$req = mysqli_query($Conn , $query);
$row = mysqli_fetch_assoc($req);
$Name= $row['Name'];
$user_name = $row['user_name'];
$MobileNumber = $row['MobileNumber'];

    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width, Initial-scale-1.0">
        
    <script src="https://kit.fontawesome.com/0ba00a17f9.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="profile2.css">
        <title>Profile Page</title>
    </head>
    <body>
        
        <div class="profile-page"> 
        <div class="wrapper">
            <h1>USER_INFO</h1>
            <form action=""method="post">
                <div class="inputBox">
                    <label for="full_name">Full Name:</label>
                    <span class="error"> <?php echo $Name;?></span> <br>
                </div>
                <div class="inputBox">
                    <label for="full_name">User Name:</label>
                    <span class="error"> <?php echo $user_name;?></span>
                </div>
                <!--<div class="inputBox">
                    <label for="email">Email:</label>
                    <input type ="email" id="email" name="email" > 
                </div>
            -->
                <div class="inputBox">
                    <label for="MobileNum">Mobile Number:</label>
                    <span class="error"> <?php echo $MobileNumber;?></span> 
                </div>
                <div>
                    <a href="Change.php" class="button button1">Update Profile</a>
                </div>
                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                    class="fas fa-power-off me-2"></i>Logout</a>
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