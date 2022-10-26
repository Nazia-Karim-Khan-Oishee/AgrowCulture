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
      $sql3 = "SELECT password FROM users WHERE user_name = '$user_name'";
       $result3 = mysqli_query($Conn , $sql3);
       $row=mysqli_fetch_assoc($result3);
      $hash = password_hash($row['password'], PASSWORD_DEFAULT);
      if(password_verify(md5($_POST['currentpass']),  $hash))
       {
        $currentpass = $_POST['currentpass'];
        $checkpassword = $_POST['new_password'];
        $new_password = md5($_POST['new_password']);
        $cpassword = md5($_POST['cpassword']);
        $uppercase = preg_match('@[A-Z]@', $checkpassword);
        $lowercase = preg_match('@[a-z]@', $checkpassword);
        $number    = preg_match('@[0-9]@', $checkpassword);
        $specialchars = preg_match('@[^\w]@', $checkpassword);
        $Validate= true;
        if(!$uppercase || !$lowercase || !$number || !$specialchars || strlen($checkpassword)<5 ) 
        {
            $Validate= false;
        }
        if($Validate)
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
      }
     else
        {
          unset($cpassword);
            unset($new_password);
            unset($currentpass);
            $_POST['new_password'] = "";
            $_POST['cpassword'] = "";
            $_POST['cpassword'] = "";
            //echo "<script>alert('Current Password does not match')</script>";
            $ShowMessage2 ="Current Password does not match";
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


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0ba00a17f9.js" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
   
    <link rel="stylesheet" type="text/css" href="userprofile.css">
    <title>Security</title>
  </head>
  <body class="bg-right">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-10 col-11 mx-auto">
              <h1>AGROWCULTURE</h1>   
              <ul class="breadcrumb">
                
                <li><a href="getstartedpage.php">Home</a></li>
                <li><a href="4optionss.php">Services</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="logout.php" class=" bg-transparent text-danger fw-bold"><i  class="fas fa-power-off me-2"></i>Logout</a></li>
               
              </ul>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 d-md-block">
                        <div class ="card bg-common card-left">
                            <div class="card-body">
                              <nav class="nav d-md-block d-none">
                                
                                      <a  class="nav-link" aria-current="page" href="profile.php"><i class="fa-solid fa-user mr-1"></i>  Profile</a>
                                      
                                      <a  class="nav-link" href="ChangePassandMobile.php"><i class="fa-solid fa-user-shield mr-1"></i> Security</a>
                                  </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                      <div class="card">
                        <div class="card-header border-bottom mb-3 d-md-none">
                          <ul class="nav nav-tabs card-header-tabs nav-fill">
                            <li class="nav-item">
                              <a  class="nav-link" aria-current="page" href="profile.php"><i class="fa-solid fa-user mr-1"></i> </a>
                            </li>
                            
                            <li class="nav-item">
                              <a  class="nav-link" href="ChangePassandMobile.php"><i class="fa-solid fa-user-shield mr-1"></i> </a>
                            </li>
                          </ul>
                        </div>

                        <div class="card-body  border-0">
                  
                    
                      <h6>SECURITY SETTINGS</h6>
                      <hr>
                      
            <form class="form" action="" method="POST" id="createAccount">
                <h3 class="form__title">Change Password</h3>
                <div class="form__message form__message--error"></div>
                <div class="form__input-group">
                <label for="exampleFormControlInput1" class="form-label">Current Password</label><br>
                    <input type="password" class="form__input" name="currentpass" autofocus placeholder="Current Password" onfocus="this.value=''"  required>
                    <span class="error"> <?php echo $ShowMessage2;?></span>
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                <label for="exampleFormControlInput1" class="form-label">New Password</label> <br>           
                    <input type="password" class="form__input" name="new_password" autofocus placeholder="New Password" autocomplete="off" onfocus="this.value=''"  required>
                    <span class="error"> <?php echo $ShowMessage3;?></span>
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                <label for="exampleFormControlInput1" class="form-label">Confirm Password</label> <br>           
                    <input type="password" class="form__input" name="cpassword" autofocus placeholder="Confirm Password" autocomplete="off" onfocus="this.value=''"  required>
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
                <label for="exampleFormControlInput1" class="form-label">Mobile Number</label><br>
                    <input type="text" class="form__input" name="MobileNumber" autofocus placeholder="Mobile Number" autocomplete="off" onfocus="this.value=''"  required>
                    <span class="error"> <?php echo $MobileError1;?></span>
                <div class="form__input-error-message"></div>
                </div>
                <input type="submit" name="submit2" class="form__button" value="Continue"/> 
    
    </form>
                      <!--<form>
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Current Password</label>
                          <input type="password" class="form__input" name="currentpass" autofocus placeholder="Current Password" onfocus="this.value=''"  required>

                         <input type="password"  class="form-control" name="currentpass" id="exampleFormControlInput1" placeholder="your current password" onfocus="this.value=''"  required>
                          <span class="error"> <?php echo $ShowMessage2;?></span>
                          <label for="exampleFormControlInput1" class="form-label">New Password</label>            
                          <input type="password" name="new_password" id="exampleFormControlInput"class="form-control" id="exampleFormControlInput1" placeholder="your new password" onfocus="this.value=''"  required>
                          <span class="error"> <?php echo $ShowMessage3;?></span>
                          <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>            
                          <input type="password" name="cpassword" class="form-control" id="exampleFormControlInput1" placeholder="confirm password" onfocus="this.value=''"  required><br>
                          <span class="error"> <?php echo $ShowMessage1;?></span>
                          <input type="submit" name="submit" class="form__button" value="Continue"/> 
                          <span class="error"> <?php echo $ShowMessage;?></span>

                          <button name="submitinfo" class="btn btn-primaryoutline-success" type="button" value="Continue"><b>Change Password</b></button><br>
                          <p>wwertyy</p>
                          <label for="exampleFormControlInput1" class="form-label">Change Mobile Number</label>
          
                          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="new mobile number">
                           
                                                
                                                
                        </div>
                        <button class="btn btn-outline-success" type="button"><b>Change Mobile Number</b></button>
                      </form>-->
              

                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

