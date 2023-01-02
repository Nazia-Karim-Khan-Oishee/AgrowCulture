
<?php 
    session_start();
    include('Config.php');
    error_reporting(0);
    

    if(isset($_POST["verify"]))
    {
        //echo "<script>alert('Registration Completed.Welcome to Agrowculture')</script>";
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $Email = $_SESSION['email'];
        $otp_code = $_POST['otp_code'];
        $user_name = $_SESSION['user_name'];
        if($otp != $otp_code)
        {
            
                $Message ="Invalid OTP.";
                // $sql1="DELETE * FROM  users where user_name ='$user_name'";
                // $CONN=mysqli_query($Conn,$sql1);
                //header("Location: dashboard.php");

        }
        else
        {
           // echo "<script>alert('Registration Completed.Welcome to Agrowculture')</script>";
            $sql="UPDATE users SET status = 1 WHERE email = '$Email'";
          $result= mysqli_query($Conn,$sql );
          if($result)
          {            //echo "<script>alert('Verify account done, you may sign in now')</script>"; 

             header("Location: INDEX.php");
         }
         else 
         {
            $Message ="Something went wrong, please try again.";
            //echo "<script>alert('Something went wrong, please try again.')</script>"; 
         }
            ?>
             <script>
                // $sql2 = mysqli_query($Conn, "SELECT * FROM users WHERE user_name='$user_name'");
                // $rowCount = mysqli_num_rows($sql);
                // $row = mysqli_fetch_assoc(mysqli_query($Conn, $sql));
                        //$row_fetch = mysqli_query($Conn, $sql);
                    //    if ($rowCount > 0) 
                    //     {
                    //        $row = mysqli_fetch_assoc($row_fetch);
                    //         $_SESSION['user_name'] = $row['user_name'];
                    //        $_SESSION['Just_Set'] = true;
                   //window.location.replace("dashboard.php");
                        // }
                       
             </script>
             <?php
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
<style>
    .error {color:red;}
</style>
    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Verification</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Verification Account</a>
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
                    <div class="card-header">Verification Account</div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="form-group row">
                            <!--<label for="Message" class="col-md-4 col-form-label text-md-right">Please verify your account and log in to continue.</label>
                            <br>-->
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">OTP Code</label>
                                <div class="col-md-6">
                                    <input type="text" id="otp" class="form-control" name="otp_code" autocomplete="off" required autofocus>
                                    <span class="error"> <?php echo $Message;?></span>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Verify" name="verify">
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
