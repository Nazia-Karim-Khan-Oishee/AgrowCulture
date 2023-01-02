<?php 
include('Config.php');
error_reporting(0);

session_start() ;

if(isset($_POST["reset"])){

    //$user_name = $_SESSION['user_name'];
    //$password = $_POST["password"];
    $Message="";
    $checkpassword = $_POST['password'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $uppercase = preg_match('@[A-Z]@', $checkpassword);
    $lowercase = preg_match('@[a-z]@', $checkpassword);
    $number    = preg_match('@[0-9]@', $checkpassword);
    $specialchars = preg_match('@[^\w]@', $checkpassword);
    $Validate= true;
    if(!$uppercase || !$lowercase || !$number || !$specialchars || strlen($checkpassword)<5 ) {
        $Validate= false;
    }
    $token = $_SESSION['token'];
    $email = $_SESSION['email'];
if($Validate)
   {
    if($password==$cpassword)
    {

        $sql3 = "SELECT password FROM users WHERE email = '$email'";
        $result3 = mysqli_query($Conn , $sql3);
        $row=mysqli_fetch_assoc($result3);
       $hash = password_hash($row['password'], PASSWORD_DEFAULT);
       $password=password_hash($password,PASSWORD_BCRYPT);

        //$hash = password_hash( $password , PASSWORD_DEFAULT );

        // $sql = mysqli_query($Conn, "SELECT * FROM users WHERE email='$email'");
        // $query = mysqli_num_rows($sql);
        //   $fetch = mysqli_fetch_assoc($sql);

        if($email){
            //$new_pass = $hash;
            $sql="UPDATE users SET password ='$password' WHERE email='$email'";
            $result=mysqli_query($Conn, $sql);
            if($result)
           {?>
            <script>
                window.location.replace("INDEX.php");
                //alert("<?php echo "your password has been succesful reset"?>");
            </script>
            <?php
            }
            else 
            {                $ShowMessage ="Something went wrong.Please Try again.";
               // $Message="Something went wrong.Please Try again.";
 
            }
        }
        else{
                         $ShowMessage ="Something went wrong.Please Try again.";
            }
    }
    else {
        $ShowMessage ="Password does not match";
    }
}
else 
{
    $ShowMessage="Password should contain at least one 
    uppercase letter, one lowercase letter, one special character and one number";
}
}
    ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
<script>
      if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
      }
    </script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <title>Reset Password</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Password Reset Form</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Your Password</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="login">
                            <div class="form-group row">
                           <!-- <label for="password" class="col-md-4 col-form-label text-md-right">Rest Password and log in to Continue.</label>-->
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" autocomplete="off" required autofocus>
                                    <span class="error"> <?php echo $ShowMessage;?></span>
                                    <!--<i class="bi bi-eye-slash" id="togglePassword"></i>-->
                                </div><br><br><br>
                                <label for="Confirmpassword" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="cpassword" autocomplete="off"  required autofocus>
                                   <!-- <i class="bi bi-eye-slash" id="togglePassword"></i>-->
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Reset" name="reset">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
</html>

